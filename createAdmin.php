<?php

	include 'db_connect.php';
	
		$postdata = file_get_contents("php://input");
		$username ="";
		
	if(isset($postdata)){
		$request = json_decode($postdata);
		$username = $request->username;
		
		if($request){
			$query_register = mysqli_query($connect, "INSERT INTO userAdm SET userID=(SELECT userID FROM user WHERE username='$username'), isAdmin='yes'");
			
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
