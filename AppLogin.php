<?php
require_once 'include/db_functions.php';
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['showroom_id']) && isset($_POST['password'])) {
 
    // receiving the post params
    $showroom_id = $_POST['showroom_id'];
    $password = $_POST['password'];
 
    // get the user by email and password
    $showroom = getShowroomByIdAndPassword($showroom_id, $password);

    if ($showroom) {
        $response = array();
        $response["error"] = FALSE;
        $response["showroom"] = $showroom;

        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Wrong id or password entered! Please try again!";
        echo json_encode($response);
    }
} else {
    //required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters missing :(!";
    echo json_encode($response);
}
?>