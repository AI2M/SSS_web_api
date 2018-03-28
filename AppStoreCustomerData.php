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

 
if (isset($_POST['phone_num'])&& isset($_POST['facebook'])  && isset($_POST['age']) && isset($_POST['sex'])&& isset($_POST['salary'])
&& isset($_POST['job'])&& isset($_POST['showroom_id'])&&isset($_POST['customer_id'])) {
 
    // receiving the post params
    $customer_id=$_POST['customer_id'];
    $facebook=$_POST['facebook'];
    $phone_num = $_POST['phone_num'];
	$age = $_POST['age'];
    $sex = $_POST["sex"];
    $salary = $_POST["salary"];
    $job = $_POST["job"];
    $showroom_id = $_POST["showroom_id"];
 
    // check if user already exists with the same email
  
        // create a new user
        $customer = AppStoreCustomerData($phone_num,$facebook, $age, $sex, $salary, $job, $showroom_id,$customer_id);
        if ($customer) {
            // user stored successfully
            $response = array();
            $response["error"] = FALSE;
            $response["customer"] = $customer;
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