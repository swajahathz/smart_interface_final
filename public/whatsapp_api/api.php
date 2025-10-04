<?php 

if(isset($_GET['to'])){
    $to = $_GET['to'];
    // sirf last 9 digits l
    
    // Remove the hyphen
    $mobile = str_replace('-', '', $to);

    // Get the last 10 digits
    $lastTenDigits = substr($mobile, -10);

    $final_number = "92".$lastTenDigits;
    
    $text  = "Dear Customer, your account has been successfully recharged.";

   

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