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
		$query = "SELECT * from Customers where phone_num = '{$phone_num}'";

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
	function getShowroomDataByid($showroom_id){
		global $connection;
		$query = "SELECT * from Showrooms WHERE showroom_id=$showroom_id";
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
	function putShowroomData($showroom_id, $location, $region, $password, $detail, $latitude, $longitude){
		global $connection;
		$query = "UPDATE Showrooms SET location= '{$location}',region= ' {$region}' ,password='{$password}', detail= '{$detail}', latitude= '{$latitude}', longitude= '{$longitude}' ";
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

	function postShowroomData($showroom_id, $location, $region, $password, $detail, $latitude, $longitude){
		global $connection;
		$query = "INSERT INTO Showrooms(";
		$query .= "showroom_id, location, region, password, detail, latitude, longitude) ";
		$query .= "VALUES('{$showroom_id}', '{$location}','{$region}','{$password}','{$detail}','{$latitude}','{$longitude}')";
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
			$query.= "INNER JOIN Showrooms on Showrooms.showroom_id = ShowrromsAndCustomers.showroom_id ";
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
	//transactions

	function getTransactionData($type){
		global $connection;
		$query = " ";
		if($type=="last7"){
			$query = "SELECT * FROM Transactions INNER JOIN Showrooms on Transactions.showroom_id = Showrooms.showroom_id ";
			$query.= "WHERE datetime BETWEEN current_date()-6 AND current_date()+1 ";
		}
		elseif($type=="thismonth"){
			$query = "SELECT * FROM Transactions INNER JOIN Showrooms on Transactions.showroom_id = Showrooms.showroom_id WHERE MONTH(datetime) = MONTH(CURRENT_DATE()) ";
			$query.= "AND YEAR(datetime) = YEAR(CURRENT_DATE()) ";
		}
		elseif($type=="thisyear"){
			$query = "SELECT * FROM Transactions INNER JOIN Showrooms on Transactions.showroom_id = Showrooms.showroom_id WHERE YEAR(datetime) = YEAR(CURRENT_DATE()) ";
		}
		elseif($type=="all"){
			$query = "SELECT * FROM Transactions INNER JOIN Showrooms on Transactions.showroom_id = Showrooms.showroom_id ORDER BY datetime DESC" ;
		}

		$transactions = mysqli_query($connection, $query);
		$data = array();
		if($transactions){
			while ($res = mysqli_fetch_assoc($transactions)){
				array_push($data,$res);
			}
			return $data;
		}
		else{
			return false;
		}


	}

	//transactionsMap
	function getTransactionMapData(){
		global $connection;
		$query = "SELECT Transactions.showroom_id, COUNT(Transactions.showroom_id) as count ,Showrooms.latitude,Showrooms.longitude, Showrooms.location ";
		$query.= "FROM `Transactions`  INNER JOIN Showrooms on Transactions.showroom_id = Showrooms.showroom_id GROUP BY showroom_id ";
		
		$transactions = mysqli_query($connection, $query);
		$data = array();
		if($transactions){
			while ($res = mysqli_fetch_assoc($transactions)){
				array_push($data,$res);
			}
			return $data;
		}
		else{
			return false;
		}


	}

	//showroomandmusicbox
	function getMandSData($showroom_id){
		global $connection;
		$query ="SELECT * FROM ShowroomsAndMusicBoxs  ";
		$query.="INNER JOIN MusicBoxs on ShowroomsAndMusicBoxs.music_box_id=MusicBoxs.music_box_id ";
		$query.="WHERE showroom_id = $showroom_id ORDER BY position ASC";

		$m_and_s = mysqli_query($connection, $query);
		$data = array();
		if($m_and_s){
			while ($res = mysqli_fetch_assoc($m_and_s)){
				array_push($data,$res);
			}
			return $data;
		}
		else{
			return false;
		}
	}
	function putMandSData($showroom_id,$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9){
		global $connection;
		$query = "DELETE FROM ShowroomsAndMusicBoxs WHERE showroom_id = '{$showroom_id}'";
		$result = mysqli_query($connection, $query);

		$query = "INSERT INTO ShowroomsAndMusicBoxs (`showroom_id`, `music_box_id`, `position`) ";
		$query.= "VALUES ($showroom_id,$m1,1),($showroom_id,$m2,2),($showroom_id,$m3,3) ";
		$query.= ",($showroom_id,$m4,4),($showroom_id,$m5,5),($showroom_id,$m6,6) ";
		$query.= ",($showroom_id,$m7,7),($showroom_id,$m8,8),($showroom_id,$m9,9)";
		$result = mysqli_query($connection, $query);
		if($result){
			return $result;
		}
		else{
			return false;
		}

	}
	//---------------------application----------------------------//

	function AppStoreCustomerData($phone_num, $age, $sex, $salary, $job, $showroom_id){
		global $connection;
		$query = "INSERT INTO Customers(";
		$query .= "phone_num, age, sex, salary, job) ";
		$query .= "VALUES('{$phone_num}', '{$age}','{$sex}','{$salary}','{$job}')";
		$result = mysqli_query($connection, $query);
		
		$query2 = "INSERT INTO ShowrromsAndCustomers (phone_num,showroom_id) ";
		$query2.= "VALUES ('{$phone_num}','{$showroom_id}') ";
		$result2 = mysqli_query($connection, $query2);

		if($result && $result2){
			return true;
			// $query3 = "SELECT * FROM ShowrromsAndCustomers  WHERE phone_num = $phone_num ";
			// $result3 = mysqli_query($connection, $query3);
			// $data = array();
			// 	if($result3){
			// 		while ($res = mysqli_fetch_assoc($result3)){
			// 		array_push($data,$res);
			// 	}
			// return $data;
			// }
		}
		else{
			return false;
		}
	}

	function AppStoreTransactionData($datetime, $showroom_id, $music_box_id, $position){
		global $connection;
		$query = "INSERT INTO Transactions(";
		$query .= "datetime, showroom_id, music_box_id, position) ";
		$query .= "VALUES('{$datetime}', '{$showroom_id}','{$music_box_id}','{$position}')";
		$result = mysqli_query($connection, $query);
		if($result){
			return true;
		}
		else{
			return false;
		}
	}

	function getShowroomByIdAndPassword($showroom_id, $password){
		global $connection;
		$query = "SELECT * FROM Showrooms WHERE (showroom_id = $showroom_id AND password = $password) ";
		$result = mysqli_query($connection, $query);
		$data = array();
		if($result){
			while ($res = mysqli_fetch_assoc($result)){
				array_push($data,$res);
			}
			return $data;
		}
		else{
			return false;
		}
	}



?>