<?php

header("Access-Control-Allow-Origin: *");

// Get parameters
$host = $_GET['host'];

$id_get = $_GET['id'];
$user = "<pppoe-" . $id_get . ">";


if($host == 'ultralink.smartispsolutions.net'){
         $nas = $_GET['nas'] . ":8728";
            // Remote HTTP endpoint
        $url = 'http://ultralinkauth.smartispsolutions.net/mikro_api/test/graph.php?nas='.$_GET['nas'].'&id='.$id_get; // yeh http hi rahega
        
        // Fetch data server-side
        $response = file_get_contents($url);
        
        // Return response
        header('Content-Type: application/json'); // ya appropriate type
        echo $response;
    
}
if($host == 'ebilling.rds.net.pk'){
         $nas = $_GET['nas'] . ":8728";
            // Remote HTTP endpoint
        $url = 'http://rdsauth.atozsofts.com/mikro_api/test/graph.php?nas='.$_GET['nas'].'&id='.$id_get; // yeh http hi rahega
        
        // Fetch data server-side
        $response = file_get_contents($url);
        
        // Return response
        header('Content-Type: application/json'); // ya appropriate type
        echo $response;
    
}

if($host == 'bill.mynet.pk'){
         $nas = $_GET['nas'] . ":8728";
            // Remote HTTP endpoint
        $url = 'http://mynetauth.atozsofts.com/mikro_api/test/graph.php?nas='.$_GET['nas'].'&id='.$id_get; // yeh http hi rahega
        
        // Fetch data server-side
        $response = file_get_contents($url);
        
        // Return response
        header('Content-Type: application/json'); // ya appropriate type
        echo $response;
    
}if ($host == 'cloudradius.alburakinternet.net.pk') {
    $nas = $_GET['nas'] . ":8728";
    $url = 'http://authdummyradius.sblinknetwork.com/mikro_api/test/graph.php?nas='.$_GET['nas'].'&id='.$id_get; // yeh http hi rahega
    // Fetch data server-side
        $response = file_get_contents($url);
        
        // Return response
        header('Content-Type: application/json'); // ya appropriate type
        echo $response;
}if ($host == 'partnerz.alburakinternet.net.pk') {
    $nas = $_GET['nas'] . ":8728";
    $url = 'http://auth.sblinknetwork.com/bras/api.php'; // yeh http hi rahega
    // Fetch data server-side
        $response = file_get_contents($url);
        
        // Return response
        header('Content-Type: application/json'); // ya appropriate type
        echo $response;
}if ($host == 'login.greennet.com.pk') {
    $nas = $_GET['nas'] . ":8728";
    $url = 'http://auth.greennet.com.pk/mikro_api/test/graph.php?nas='.$_GET['nas'].'&id='.$id_get; // yeh http hi rahega
    // Fetch data server-side
        $response = file_get_contents($url);
        
        // Return response
        header('Content-Type: application/json'); // ya appropriate type
        echo $response;
}else{
    
        $nas = $_GET['nas'] . ":8728";
        // Include MikroTik API and DB connection
        include_once('../core/routeros_api.class.php');
        include '../config/connection.php';
        
        $API = new RouterosAPI();
        $API->debug = false;
        
        if ($API->connect($nas, 'testapi', '123')) {
        
            $get_interfacetraffic = $API->comm("/interface/monitor-traffic", array(
                "interface" => "$user",
                "once" => "",
            ));
        
            $tx = $get_interfacetraffic[0]['tx-bits-per-second'] ?? 0;
            $rx = $get_interfacetraffic[0]['rx-bits-per-second'] ?? 0;
        
            // Return JSON with keys 'upload' and 'download'
            $response = array(
                'upload' => (int)$tx,
                'download' => (int)$rx
            );
        
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    
}






?>
