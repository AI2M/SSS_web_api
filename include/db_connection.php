<?php
	/**
	*Database config variables
	*/
	define("DB_HOST","http://202.28.24.69/");
	define("DB_USER","oasys10");
	define("DB_PASSWORD","@!oasys10_Oasys517(#2074)");
	define("DB_DATABASE","oasys10");

	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

	if(mysqli_connect_errno()){
		die("Database connnection failed " . "(" .
			mysqli_connect_error() . " - " . mysqli_connect_errno() . ")"
				);
	}
?>