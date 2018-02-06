<?php
require_once 'include/db_functions.php';
 
// json response array
$response = array("error" => FALSE);
 
// get the user by email and password
    $musicbox = getMusicBoxData();
 
    if ($musicbox != false) {
        // user is found

        // $response["error"] = FALSE;
		// $response["musicbox"]["musicbox_id"] = $musicbox["musicbox_id"];
        // $response["musicbox"]["musicbox_id"] = $musicbox["musicbox_id"];
        // $response["musicbox"]["name"] = $musicbox["name"];
        // $response["musicbox"]["price"] = $musicbox["price"];
        // $response["musicbox"]["detail"] = $musicbox["detail"];
        // $response["musicbox"]["position"] = $musicbox["position"];
        $response = array();
        $response["error"] = FALSE;
        $response["musicboxs"] = $musicbox;
        
        header('Content-Type: application/json');
        //$ar =array("gg"=>"bb");
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "error";
        echo json_encode($response);
    }

  
 
   

?>