<?php
 
require_once 'include/db_functions.php';
header('Access-Control-Allow-Origin: *');
 
// json response array
$response = array("error" => FALSE);

 
if (isset($_GET['music_box_id'])) {

    // receiving the post params
    $music_box_id = $_GET['music_box_id'];
	

        // create a new user
        $musicbox = deleteMusicBoxData($music_box_id);
        if ($musicbox) {
            
            $response = array();
            $response["error"] = FALSE;
            $response["musicboxs"] = $musicbox;
            
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