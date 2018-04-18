<?php
require_once 'include/db_functions.php';
header('Access-Control-Allow-Origin: *');
 
// json response array
$response = array("error" => FALSE);
if (isset($_GET['showroom1'])||isset($_GET['showroom2'])||isset($_GET['showroom3'])){

    $showroom1 = 0;
    $showroom2 = 0;
    $showroom3 = 0;

    if(($_GET['showroom1'])){
        $showroom1 = ($_GET['showroom1']);
    };
   
    if(($_GET['showroom2'])){
        $showroom2 = ($_GET['showroom2']);
    };
    if(($_GET['showroom3'])){
        $showroom3 = ($_GET['showroom3']);
    };

    $chartData = getMultiChartData($showroom1,$showroom2,$showroom3);    
    if ($chartData != false) {
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
        $response["chartData"] = $chartData;
        
        header('Content-Type: application/json');
        //$ar =array("gg"=>"bb");
        echo json_encode($response);
    } else {
      
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
    
 
    

  
 
   

?>