<?php
 
require_once 'include/db_functions.php';
 
// json response array
$response = array("error" => FALSE);

 
if (isset($_GET['showroom_id'])) {

    // receiving the post params
    $showroom_id = $_GET['showroom_id'];
	

        // create a new user
        $showroom = deleteShowroomData($showroom_id);
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