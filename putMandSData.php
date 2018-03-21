<?php
 
require_once 'include/db_functions.php';
header('Access-Control-Allow-Origin: *');
 
// json response array
$response = array("error" => FALSE);
$postdata = file_get_contents("php://input");
$postdata = json_decode($postdata);

//echo $postdata->m1;
 //exit();
 if (isset($postdata->m1)&&isset($postdata->m2)&&isset($postdata->m3)
 &&isset($postdata->m4)&&isset($postdata->m5)
 &&isset($postdata->m6)&&isset($postdata->m7)&&isset($postdata->m8)
 &&isset($postdata->m9)&&isset($_GET['showroom_id'])){

    $showroom_id = $_GET['showroom_id'];
    $m1 = $postdata->m1;
    $m2 = $postdata->m2;
    $m3 = $postdata->m3;
    $m4 = $postdata->m4;
    $m5 = $postdata->m5;
    $m6 = $postdata->m6;
    $m7 = $postdata->m7;
    $m8 = $postdata->m8;
    $m9 = $postdata->m9;
    $data = putMandSData($showroom_id,$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9);
    if($data){
               
                   $response = array();
                   $response["error"] = FALSE;
                   $response["data"] = $data;
                   
                   header('Content-Type: application/json');
                   //$ar =array("gg"=>"bb");
                   echo json_encode($response);
       
               } else {
                   // user failed to store
                   $response["error"] = TRUE;
                   $response["error_msg"] = "Unknown error occurred!";
                   echo json_encode($response);
               }

 }
 else{
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters missing!";
    echo json_encode($response);
 }

 
// if (isset($postdata->showroom_id) && isset($postdata->location) && isset($postdata->region)&& isset($postdata->password)
// && isset($postdata->detail)&& isset($postdata->latitude)&& isset($postdata->longitude)) {
 
//     // receiving the post params
//     $showroom_id = $postdata->showroom_id;
// 	$location = $postdata->location;
//     $region = $postdata->region;
//     $password = $postdata->password;
//     $detail = $postdata->detail;
//     $latitude = $postdata->latitude;
//     $longitude = $postdata->longitude;

//         // create a new user
//         $showroom = putShowroomData($showroom_id, $location, $region, $password, $detail, $latitude,$longitude);
//         if ($showroom) {
            
//             $response = array();
//             $response["error"] = FALSE;
//             $response["showrooms"] = $showroom;
            
//             header('Content-Type: application/json');
//             //$ar =array("gg"=>"bb");
//             echo json_encode($response);

//         } else {
//             // user failed to store
//             $response["error"] = TRUE;
//             $response["error_msg"] = "Unknown error occurred!";
//             echo json_encode($response);
//         }
    
// } else {
//     $response["error"] = TRUE;
//     $response["error_msg"] = "Required parameters missing!";
//     echo json_encode($response);
// }
?>