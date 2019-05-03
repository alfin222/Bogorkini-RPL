<?php

	include 'db_connect.php';
	
		$postdata = file_get_contents("php://input");
		$username ="";
		$password ="";
		
	if(isset($postdata)){
		$request = json_decode($postdata);
		$username = $request->username;
		$password = $request->password;
		
		if($request){
			$query_register = mysqli_query($connect, "INSERT INTO user (username, password) VALUES ('$username','$password')");
			
			if($query_register){
				$data = array(
					'message'=> "Register berhasil!",
					'status'=> "200"
				);
			}
			else{
				$data =array(
					'message'=> "Register gagal, silahkan coba lagi.",
					'status'=> "404"
				);
			}
		}
		else{
			$data =array(
				'message' => "Data kosong!",
				'status' => "503"
			);
		}
		echo json_encode($data);
	}
?>
