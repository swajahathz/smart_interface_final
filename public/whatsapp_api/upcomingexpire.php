<?php 


$servername = "localhost";
$username = "mynet_database";
$password = "6HsD5D5xtfMpnD8y";
$databasename = "mynet_database";



// Create connection
$conn = new mysqli($servername, $username, $password,$databasename );

// Check connection$pexptotalcashthismonth
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
} 



$find_upcoming = mysqli_query($conn,"SELECT username,mobile,firstname,lastname FROM rc_subscriber WHERE DATE(expiration) = DATE_ADD(CURDATE(), INTERVAL 2 DAY)");
while($row = mysqli_fetch_array($find_upcoming)){
    echo $row['username'].' '.$row['mobile'];
    $mobile = $row['mobile'];
    $name = ucfirst($row['firstname']).' '.$row['lastname'];
    
    
     $mobile = str_replace('-', '', $mobile);

    // Get the last 10 digits
    $lastTenDigits = substr($mobile, -10);

    $final_number = "92".$lastTenDigits;
    
    $text = "Dear ".$name.", your internet package will expire in 2 days. Please recharge your account.";
    
    whatsapp($final_number,$text);
    
}



function whatsapp($number,$text){

    $text .= "\n\nMyNet Broadband (Pvt.) Ltd";

    $url = "http://msgpk.com/api/send.php";
 
        $parameters = array("api_key" => "923255554433-acc3dac2-752e-4421-a8bd-6b5f5a4ccd89",
                            "mobile" => $number,
                            "message" => $text,
                            "priority" => "10",
                            "type" => 0
                            );
        
        $ch = curl_init();
        $timeout  =  30;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        $response = curl_exec($ch);
        curl_close($ch);
        
        echo $response ;

}
 
?>