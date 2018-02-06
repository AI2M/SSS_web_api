<?php
 
require_once 'include/db_functions.php';
 
// json response array
$response = array("error" => FALSE);
$postdata = file_get_contents("php://input");
$postdata = json_decode($postdata);
// echo $postdata->showroom_id;
// exit();
 
if (isset($postdata->showroom_id) && isset($postdata->location) && isset($postdata->region)&& isset($postdata->password)
&& isset($postdata->detail)) {
 
    // receiving the post params
    $showroom_id = $postdata->showroom_id;
	$location = $postdata->location;
    $region = $postdata->region;
    $password = $postdata->password;
    $detail = $postdata->detail;

        // create a new user
        $showroom = postShowroomData($showroom_id, $location, $region, $password, $detail);
        if ($showroom) {
            
            $response = array();
            $response["error"] = FALSE;
            $response["showrooms"] = $showroom;
            
            header('Content-Type: application/json');
            //$ar =array("gg"=>"bb");
            echo json_encode($response);

        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred!";
            echo json_encode($response);
        }
    
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters missing!";
    echo json_encode($response);
}
?>