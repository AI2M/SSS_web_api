<?php
require_once 'include/db_functions.php';
 
// json response array
$response = array("error" => FALSE);
if (isset($_GET['type'])){

    $type = $_GET['type'];
    $customer = getCustomerData($type);
    
    if ($showroom != false) {
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
        $response["customers"] = $customer;
        
        header('Content-Type: application/json');
        //$ar =array("gg"=>"bb");
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "error";
        echo json_encode($response);
    }

}
    
 
    

  
 
   

?>