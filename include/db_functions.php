<?php require_once("include/db_connection.php");?>
<?php

	function storeshowroom($showroomname, $email, $password){
		global $connection;
		
		$query = "INSERT INTO showrooms(";
		$query .= "showroomname, email, password) ";
		$query .= "VALUES('{$showroomname}', '{$email}','{$password}')";

		$result = mysqli_query($connection, $query);

		if($result){
			$showroom = "SELECT * FROM showrooms WHERE email = '{$email}'";
			$res = mysqli_query($connection, $showroom);

			while ($showroom = mysqli_fetch_assoc($res)){
				return $showroom;
			}
		}else{
				return false;
			}

	}

	function storeCustomer($phone_num, $age, $sex, $salary, $job, $showroom_id){
		global $connection;
		
		$query = "INSERT INTO Customer(";
		$query .= "phone_num, age, sex, salary, job, showroom_id) ";
		$query .= "VALUES('{$phone_num}', '{$age}','{$sex}','{$salary}','{$job}','{$showroom_id}')";

		$result = mysqli_query($connection, $query);

		if($result){
			$showroom = "SELECT * FROM Customer WHERE phone_num = '{$phone_num}'";
			$res = mysqli_query($connection, $showroom);

			while ($showroom = mysqli_fetch_assoc($res)){
				return $showroom;
			}
		}else{
				return false;
			}

	}
	function storeCustomer2($phone_num){
		global $connection;
		
		$query = "INSERT INTO Customer(";
		$query .= "phone_num) ";
		$query .= "VALUES('{$phone_num}')";

		$result = mysqli_query($connection, $query);

		if($result){
			$showroom = "SELECT * FROM Customer WHERE phone_num = '{$phone_num}'";
			$res = mysqli_query($connection, $showroom);

			while ($showroom = mysqli_fetch_assoc($res)){
				return $showroom;
			}
		}else{
				return false;
			}

	}


	function storeTransactions($time, $date, $showroom_id, $music_box_id, $position){
		global $connection;
		
		$query = "INSERT INTO Transactions(";
		$query .= "transactions_id, time, date, showroom_id, music_box_id, position) ";
		$query .= "VALUES( ' ', '{$time}', '{$date}', '{$showroom_id}', '{$music_box_id}', '{$position}')";

		$result = mysqli_query($connection, $query);

		if($result){
			$showroom = "SELECT * FROM Transactions WHERE showroom_id = '{$showroom_id}'";
			$res = mysqli_query($connection, $showroom);

			while ($showroom = mysqli_fetch_assoc($res)){
				return $showroom;
			}
		}else{
				return false;
			}

	}



	function getshowroomByEmailAndPassword($email, $password){
		global $connection;
		$query = "SELECT * from showrooms where email = '{$email}' and password = '{$password}'";
	
		$showroom = mysqli_query($connection, $query);
		
		if($showroom){
			while ($res = mysqli_fetch_assoc($showroom)){
				return $res;
			}
		}
		else{
			return false;
		}
	}

	function GetDataByID($showroom_id){
		global $connection;
		$query = "SELECT * from Music_box where showroom_id = '{$showroom_id}' ORDER BY position ASC ";
	
		$showroom = mysqli_query($connection, $query);
		$data = array();
		if($showroom){
			while ($res = mysqli_fetch_assoc($showroom)){
				//$data.append($res);
				array_push($data,$res);
				
			}
			return $data;
		}
		else{
			return false;
		}
	}



	function emailExists($email){
		global $connection;
		$query = "SELECT email from showrooms where email = '{$email}'";

		$result = mysqli_query($connection, $query);

		if(mysqli_num_rows($result) > 0){
			return true;
		}else{
			return false;
		}
	}

	function phoneExists($phone_num){
		global $connection;
		$query = "SELECT * from Customer where phone_num = '{$phone_num}'";

		$result = mysqli_query($connection, $query);

		if(mysqli_num_rows($result) > 0){
			return true;
		}else{
			return false;
		}
	}
	//-------------------------------------------------------------------------------------------------//


	//showroom
	function getShowroomData(){
		global $connection;
		$query = "SELECT * from Showrooms";
		$showrooms = mysqli_query($connection, $query);
		$data = array();
		if($showrooms){
			while ($res = mysqli_fetch_assoc($showrooms)){
				array_push($data,$res);
			}
			return $data;
		}
		else{
			return false;
		}
	}
	function putShowroomData($showroom_id, $location, $region, $password, $detail){
		global $connection;
		$query = "UPDATE Showrooms SET location= '{$location}',region= ' {$region}' ,password='{$password}', detail= '{$detail}' ";
		$query.= "WHERE showroom_id = '{$showroom_id}'"; 

		$result = mysqli_query($connection, $query);
		$data = array();

		if($result){
			$query2 = "SELECT * FROM Showrooms WHERE showroom_id = '{$showroom_id}'";
			$showrooms = mysqli_query($connection, $query2);
			if($showrooms){
				while ($res = mysqli_fetch_assoc($showrooms)){
					array_push($data,$res);
				}
				return $data;
			}else{
					return false;
				}
			}
			else{
				return false;
			}
	}

	function postShowroomData($showroom_id, $location, $region, $password, $detail){
		global $connection;
		$query = "INSERT INTO Showrooms(";
		$query .= "showroom_id, location, region, password, detail) ";
		$query .= "VALUES('{$showroom_id}', '{$location}','{$region}','{$password}','{$detail}')";
		$result = mysqli_query($connection, $query);
		$data = array();

		
		if($result){
			$query2 = "SELECT * FROM Showrooms WHERE showroom_id = '{$showroom_id}'";
			$showrooms = mysqli_query($connection, $query2);
			if($showrooms){
				while ($res = mysqli_fetch_assoc($showrooms)){
					array_push($data,$res);
				}
				return $data;
			}else{
					return false;
				}
			}
			else{
				return false;
			}

			
	}

	function deleteShowroomData($showroom_id){
		global $connection;
		$query = "DELETE FROM `Showrooms` WHERE `showroom_id` = '{$showroom_id}'";
		$result = mysqli_query($connection, $query);
		if($result){
			return $result;
		}
		else{
			return false;
		}

	}
	//MusicBox
	function getMusicBoxData(){
		global $connection;
		$query = "SELECT * from MusicBoxs";
		$musicboxs = mysqli_query($connection, $query);
		$data = array();
		if($musicboxs){
			while ($res = mysqli_fetch_assoc($musicboxs)){
				array_push($data,$res);
			}
			return $data;
		}
		else{
			return false;
		}
	}

	function putMusicBoxData($music_box_id, $name, $price, $detail){
		global $connection;
		$query = "UPDATE MusicBoxs SET name= '{$name}',price= ' {$price}' , detail= '{$detail}' ";
		$query.= "WHERE music_box_id = '{$music_box_id}'"; 

		$result = mysqli_query($connection, $query);
		$data = array();

		if($result){
			$query2 = "SELECT * FROM MusicBoxs WHERE music_box_id = '{$music_box_id}'";
			$musicboxs = mysqli_query($connection, $query2);
			if($musicboxs){
				while ($res = mysqli_fetch_assoc($musicboxs)){
					array_push($data,$res);
				}
				return $data;
			}else{
					return false;
				}
			}
			else{
				return false;
			}
	}

	function postMusicBoxData($music_box_id, $name, $price, $detail){
		global $connection;
		$query = "INSERT INTO MusicBoxs(";
		$query .= "music_box_id, name, price, detail) ";
		$query .= "VALUES('{$music_box_id}', '{$name}','{$price}','{$detail}')";
		$result = mysqli_query($connection, $query);
		$data = array();

		
		if($result){
			$query2 = "SELECT * FROM MusicBoxs WHERE music_box_id = '{$music_box_id}'";
			$musicboxs = mysqli_query($connection, $query2);
			if($musicboxs){
				while ($res = mysqli_fetch_assoc($musicboxs)){
					array_push($data,$res);
				}
				return $data;
			}else{
					return false;
				}
			}
			else{
				return false;
			}

	}

	function deleteMusicBoxData($music_box_id){
		global $connection;
		$query = "DELETE FROM `MusicBoxs` WHERE `music_box_id` = '{$music_box_id}'";
		$result = mysqli_query($connection, $query);
		if($result){
			return $result;
		}
		else{
			return false;
		}

	}

	//customer
	function getCustomerData($type){
		global $connection;
		$query = " ";
		if($type=="all"){
			$query = "SELECT *,ShowrromsAndCustomers.showroom_id AS showroom_id  FROM Customers ";
			$query.= "INNER JOIN ShowrromsAndCustomers on Customers.phone_num = ShowrromsAndCustomers.phone_num ";
		}
		elseif($type=="age"){
			$query = "SELECT age , COUNT(age) AS age_count FROM Customers ";
			$query.= "GROUP BY age ";
			$query.= "ORDER BY age_count DESC ";
		}
		elseif($type=="sex"){
			$query = "SELECT sex , COUNT(sex) AS sex_count FROM Customers ";
			$query.= "GROUP BY sex ";
			$query.= "ORDER BY sex_count DESC ";
		}
		elseif($type=="job"){
			$query = "SELECT job , COUNT(job) AS job_count FROM Customers ";
			$query.= "GROUP BY job ";
			$query.= "ORDER BY job_count DESC ";
		}
		elseif($type=="salary"){
			$query = "SELECT salary , COUNT(salary) AS salary_count FROM Customers ";
			$query.= "GROUP BY salary ";
			$query.= "ORDER BY salary_count DESC ";
		}
		elseif($type=="showroom_id"){
			$query = "SELECT ShowrromsAndCustomers.showroom_id,COUNT(ShowrromsAndCustomers.showroom_id) AS counts FROM Customers ";
			$query.= "INNER JOIN ShowrromsAndCustomers on Customers.phone_num = ShowrromsAndCustomers.phone_num ";
			$query.= "GROUP BY ShowrromsAndCustomers.showroom_id ORDER BY counts DESC ";
			
		}
		$customers = mysqli_query($connection, $query);
		$data = array();
		if($customers){
			while ($res = mysqli_fetch_assoc($customers)){
				array_push($data,$res);
			}
			return $data;
		}
		else{
			return false;
		}
	}



?>