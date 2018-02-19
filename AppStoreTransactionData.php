<?php
 
require_once 'include/db_functions.php';
 
// json response array
$response = array("error" => FALSE);

// $phone_num = $_POST['phone_num']="222";
// $age = $_POST['age']="333";
// $sex = $_POST["sex"]="333";
// $salary = $_POST["salary"]="333";
// $job = $_POST["job"]="333";
// $showroom_id = $_POST["showroom_id"]="3";

 
if (isset($_POST['datetime']) && isset($_POST['showroom_id']) && isset($_POST['music_box_id'])
&& isset($_POST['position'])) {
 
    // receiving the post params
    $datetime = $_POST['datetime'];
	$showroom_id = $_POST['showroom_id'];
    $music_box_id = $_POST["music_box_id"];
    $position = $_POST["position"];

        $transaction = AppStoreTransactionData($datetime, $showroom_id, $music_box_id, $position);
        if ($transaction) {
            // user stored successfully
            $response = array();
            $response["error"] = FALSE;
            $response["transaction"] = $transaction;
            header('Content-Type: application/json');
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