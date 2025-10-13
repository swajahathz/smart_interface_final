<?php
// jazzcash_payment.php

header("Content-Type: application/json");

// Get POST data from frontend (JSON)
$input = json_decode(file_get_contents('php://input'), true);

// JazzCash endpoint
$url = "https://payments.jazzcash.com.pk/ApplicationAPI/API/2.0/Purchase/DoMWalletTransaction";

// Prepare cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($input)); // form data

// Execute cURL
$response = curl_exec($ch);

// Handle errors
if (curl_errno($ch)) {
    echo json_encode(["error" => curl_error($ch)]);
    curl_close($ch);
    exit;
}

curl_close($ch);

// Return JazzCash API response to frontend
echo $response;
?>
