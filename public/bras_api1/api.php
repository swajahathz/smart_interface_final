 <?php
// // traffic.php

// $username   = $_GET['username']   ?? 'test0003';
// $iterations = $_GET['iterations'] ?? 2;
// $interval   = $_GET['interval']   ?? 1;
// // http://103.161.48.141:8448/traffic?username=test0003&secret=asdasdjsadhas____NSADSAF1231231&iterations=30&interval=1
// $baseUrl = "http://103.161.48.141:8448/traffic";
// $secret  = "asdasdjsadhas____NSADSAF1231231";

// $url = $baseUrl . "?secret=" . urlencode($secret) .
//       "&username=" . urlencode($username) .
//       "&iterations=" . urlencode($iterations) .
//       "&interval=" . urlencode($interval);

// header('Content-Type: text/event-stream');
// header('Cache-Control: no-cache');
// header('Connection: keep-alive');
// ob_implicit_flush(true);
// ob_end_flush();

// $previous = null; // store previous stats

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// curl_setopt($ch, CURLOPT_TIMEOUT, 0);

// curl_setopt($ch, CURLOPT_WRITEFUNCTION, function($ch, $data) use (&$previous) {
//     $lines = explode("\n", $data);
//     foreach ($lines as $line) {
//         $line = trim($line);
//         if (strpos($line, "data:") === 0) {
//             $json = trim(substr($line, 5));
//             $decoded = json_decode($json, true);
//             if ($decoded) {
//                 if ($previous === null) {
//                     // Ignore first response
//                     $previous = $decoded['stats'];
//                     continue;
//                 }

//                 // Calculate difference
//                 $diff = [
                    
//                         'upload'   => $decoded['stats']['up_bytes'] - $previous['up_bytes'],
//                         'download' => $decoded['stats']['down_bytes'] - $previous['down_bytes']
                    
//                 ];

//                 echo json_encode($diff) . "\n\n";
//                 flush();

//                 // Update previous
//                 $previous = $decoded['stats'];
//             }
//         }
//     }
//     return strlen($data);
// });

// curl_exec($ch);
// curl_close($ch);




// API URL
$apiUrl = "http://103.161.48.141:8448/traffic?username=test0003&secret=asdasdjsadhas____NSADSAF1231231&iterations=60&interval=3";

// API se data fetch
$response = file_get_contents($apiUrl);

// Agar response aya
if ($response === FALSE) {
    die("API request failed.");
}

$data = json_decode($response, true);

if (!$data) {
    die("Invalid JSON response.");
}

// Last result
$last = end($data);

// Sirf up_bps aur down_bps return karo
$result = [
    'sec'   => $last['seconds'],
    'upload'   => $last['stats']['down_bps'],
    'download' => $last['stats']['up_bps'],
];

echo json_encode($result);
