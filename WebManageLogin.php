<?php
require_once 'include/db_functions.php';
 
// json response array
$response = array("error" => FALSE);
$postdata = file_get_contents("php://input");
$postdata = json_decode($postdata);
 
if (isset($postdata->username) && isset($postdata->password)) {
 //&&isset($_GET['password'])
    // receiving the post params
    $showroom_id = $postdata->username;
    $password = $postdata->password;
 
    // get the user by email and password
    $showroom = loginWebManage($showroom_id, $password);

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