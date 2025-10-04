<?php
require __DIR__ . '/vendor/autoload.php';

use zfhassaan\jazzcash;
// 9t69y5x007
// JazzCash configuration
$config = [
    "MERCHANT_ID"   => "65545014", // apna merchant id
    "PASSWORD"      => "xzcf4uyz8s", // apna password
    "HASH_KEY"      => "xxxxxx", // apna hash key
    "MPIN"          => "xxxxxx", // apna MPIN
    "RETURN_URL"    => "https://yourdomain.com/jazzcash_return.php", // return url
    "PAYMENT_MODE"  => "sandbox", // sandbox | production
    "SANDBOX_URL"   => "https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform/",
    "PRODUCTION_URL"=> "https://payments.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform/"
];

// Payment request values
$amount             = 100; // Rs 100
$billReference      = "ORDER-12345";
$productDescription = "Test Product";

try {
    $jazzcash = new JazzCash($config);

    $jazzcash->setAmount($amount);
    $jazzcash->setBillReference($billReference);
    $jazzcash->setProductDescription($productDescription);

    // sendRequest() hosted checkout form return karega
    echo $jazzcash->sendRequest();

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
