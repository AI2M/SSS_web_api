<?php
require_once 'include/db_functions.php';
header('Access-Control-Allow-Origin: *');
 
// json response array
$response = array("error" => FALSE);

    $transactionMap = getTransactionMapData();    
    if ($transactionMap != false) {
        // customer is found

        // $response["error"] = FALSE;
		// $response["showroom"]["showroom_id"] = $showroom["showroom_id"];
        // $response["showroom"]["showroom_id"] = $showroom["showroom_id"];
        // $response["showroom"]["name"] = $showroom["name"];
        // $response["showroom"]["price"] = $showroom["price"];
        // $response["showroom"]["detail"] = $showroom["detail"];
        // $response["showroom"]["position"] = $showroom["position"];
        $response = array();
        $response["error"] = FALSE;
        $response["transactionMaps"] = $transactionMap;
        
        header('Content-Type: application/json');
        //$ar =array("gg"=>"bb");
        echo json_encode($response);
    } else {
      
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown error occurred!";
        echo json_encode($response);
    }

    
 
    

  
 
   

?>