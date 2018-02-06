<?php
 
require_once 'include/db_functions.php';
 
// json response array
$response = array("error" => FALSE);
$postdata = file_get_contents("php://input");
$postdata = json_decode($postdata);
// echo $postdata->showroom_id;
// exit();
 
if (isset($postdata->music_box_id) && isset($postdata->name) 
&& isset($postdata->price)&& isset($postdata->detail)) {
 
    // receiving the post params
    $music_box_id = $postdata->music_box_id;
	$name = $postdata->name;
    $price = $postdata->price;
    $detail = $postdata->detail;

        // create a new user
        $musicbox = putMusicBoxData($music_box_id, $name, $price, $detail);
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