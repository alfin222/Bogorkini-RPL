<?php
	
	if (isset($_SERVER['HTTP_ORIGIN'])){
		header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Max-Age: 86400');
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
		
		if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
			header("Access-Control-Allow-Methods: GET,POST,OPTIONS");
			
		if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
			header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
		exit(0);
	}
	

	// hosting atspace.com
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$db_name = "bogorkini";
	
	$connect=mysqli_connect($hostname,$username,$password,$db_name);
	
	if($connect->connect_error){
		die("Connection failed: ". $connect->connect_error);
	}
	else{
		echo "Succesfully connected!";
	}
?>
