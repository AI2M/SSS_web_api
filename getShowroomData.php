<?php
require_once 'include/db_functions.php';
 
// json response array
$response = array("error" => FALSE);
 
// get the user by email and password
    $showroom = getShowroomData();
 
    if ($showroom != false) {
        // user is found

        // $response["error"] = FALSE;
		// $response["showroom"]["showroom_id"] = $showroom["showroom_id"];
        // $response["showroom"]["showroom_id"] = $showroom["showroom_id"];
        // $response["showroom"]["name"] = $showroom["name"];
        // $response["showroom"]["price"] = $showroom["price"];
        // $response["showroom"]["detail"] = $showroom["detail"];
        // $response["showroom"]["position"] = $showroom["position"];
        $response = array();
        $response["error"] = FALSE;
        $response["showrooms"] = $showroom;
        
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