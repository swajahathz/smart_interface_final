<?php
error_reporting(1);


$mac = $_GET['mac'];
$nas = $_GET['nas'].":8728";


include_once('../core/routeros_api.class.php');

$API = new RouterosAPI();
$API->debug = false;




// foreach (file('../config/config.php',FILE_SKIP_EMPTY_LINES) as $line) {
//     $ss = explode("'", $line)[1];
//     clearstatcache();
//     if ($ss == "newtest") {
          
//         $iphost = get_config($line,"newtest".'!', "'");
//         $userhost = get_config($line,"newtest".'@|@', "'");
//         $passwdhost = get_config($line,"newtest".'#|#', "'");
//     }
//   }





 if($API->connect($nas, 'api', '123456'));


    include'../config/connection.php';
  
    $get_interface = $API->comm("/ppp/active/print");

    $json_data = json_encode($get_interface);

   // $ip = $get_interface[0]['active-address'];

    // $d = new jsEncode();

    // $json_enc = $d->encodeString($json_data,25);

    echo $json_data;
    


 ?>