<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use App\Models\PaymentCallback;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class SwichPayInController extends Controller
{
    /**
     * Handle Swich PayIn Success Callback
     * 
     * This endpoint receives GET requests from Swich PayIn API
     * when payment is successful. It verifies the checksum and
     * stores the callback data in the database.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function successCallback(Request $request): JsonResponse
    {
        return $this->handleCallback($request, 'success');
    }

    /**
     * Handle Swich PayIn Failure Callback
     * 
     * This endpoint receives GET requests from Swich PayIn API
     * when payment fails or is rejected. It verifies the checksum and
     * stores the callback data in the database.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function failureCallback(Request $request): JsonResponse
    {
        return $this->handleCallback($request, 'failure');
    }

    /**
     * Handle Swich PayIn callback (Legacy - for backward compatibility)
     * 
     * This endpoint receives GET requests from Swich PayIn API
     * with payment status updates. It verifies the checksum and
     * stores the callback data in the database.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function callback(Request $request): JsonResponse
    {
        // Legacy callback - use the status from request
        $status = $request->get('Status', 'pending');
        return $this->handleCallback($request, $status);
    }

    /**
     * Common callback handler for both success and failure
     * 
     * @param Request $request
     * @param string $expectedStatus The expected status (success/failure) based on the URL
     * @return JsonResponse
     */
    private function handleCallback(Request $request, string $expectedStatus): JsonResponse
    {
        try {
            // Get all request parameters
            $paymentType = $request->get('PaymentType');
            $status = $request->get('Status', $expectedStatus); // Use Status from request, fallback to expected
            $orderId = $request->get('OrderId');
            $customerTransactionId = $request->get('CustomerTransactionId');
            $amount = $request->get('Amount');
            $checksum = $request->get('Checksum');

            // Determine callback type for logging
            $callbackType = $expectedStatus === 'success' ? 'Success' : 'Failure';

            // Log the incoming request for debugging
            Log::info("Swich PayIn {$callbackType} Callback Received", [
                'callback_type' => $callbackType,
                'payment_type' => $paymentType,
                'status' => $status,
                'order_id' => $orderId,
                'customer_transaction_id' => $customerTransactionId,
                'amount' => $amount,
                'checksum' => $checksum,
                'all_params' => $request->all(),
            ]);

            // Validate required parameters
            if (empty($orderId) || empty($customerTransactionId) || 
                empty($amount) || empty($checksum)) {
                Log::warning("Swich PayIn {$callbackType} Callback: Missing required parameters", [
                    'request' => $request->all()
                ]);
                
                return response()->json([
                    'status' => 'error',
                    'message' => 'Missing required parameters'
                ], 400);
            }

            // Verify checksum
            $secretKey = config('services.swich.secret_key', env('SWICH_SECRET_KEY'));
            $checksumVerified = $this->verifyChecksum(
                $customerTransactionId,
                $orderId,
                $amount,
                $status,
                $checksum,
                $secretKey
            );

            // Store all request data as JSON
            $rawData = json_encode($request->all());

            // Save callback to database
            $paymentCallback = PaymentCallback::create([
                'payment_type' => $paymentType,
                'status' => $status,
                'order_id' => $orderId,
                'customer_transaction_id' => $customerTransactionId,
                'amount' => $amount,
                'checksum' => $checksum,
                'checksum_verified' => $checksumVerified,
                'raw_data' => $rawData,
            ]);

            // Log checksum verification result
            if (!$checksumVerified) {
                Log::warning("Swich PayIn {$callbackType} Callback: Checksum verification failed", [
                    'order_id' => $orderId,
                    'customer_transaction_id' => $customerTransactionId,
                ]);
            } else {
                Log::info("Swich PayIn {$callbackType} Callback: Checksum verified successfully", [
                    'order_id' => $orderId,
                    'customer_transaction_id' => $customerTransactionId,
                    'status' => $status,
                ]);
            }

            // Return success response as per Swich API documentation
            return response()->json([
                'status' => 'success'
            ], 200);

        } catch (\Exception $e) {
            Log::error("Swich PayIn {$callbackType} Callback Error", [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all(),
            ]);

            // Still return success to prevent retries for permanent errors
            // But log the error for investigation
            return response()->json([
                'status' => 'success'
            ], 200);
        }
    }

    /**
     * Verify the checksum from Swich PayIn
     * 
     * According to Swich documentation:
     * $plain = "SWCallback:CustomerTransactionId:OrderId:Amount:Status";
     * $signature = hash_hmac('sha256', $plain, $SecretKey, false);
     * 
     * @param string $customerTransactionId
     * @param string $orderId
     * @param string $amount
     * @param string $status
     * @param string $receivedChecksum
     * @param string $secretKey
     * @return bool
     */
    private function verifyChecksum(
        string $customerTransactionId,
        string $orderId,
        string $amount,
        string $status,
        string $receivedChecksum,
        string $secretKey
    ): bool {
        // Create the plain text string as per Swich documentation
        $plain = "SWCallback:{$customerTransactionId}:{$orderId}:{$amount}:{$status}";
        
        // Generate the expected checksum
        $expectedChecksum = hash_hmac('sha256', $plain, $secretKey, false);
        
        // Compare checksums (use hash_equals for timing attack prevention)
        return hash_equals($expectedChecksum, $receivedChecksum);
    }
}