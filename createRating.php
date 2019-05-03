<?php

	include 'db_connect.php';
	
		$postdata = file_get_contents("php://input");
		$userID ="";
		$infoID ="";
		$rating ="";
		
	if(isset($postdata)){
		$request = json_decode($postdata);
		$userID = $request->userID;
		$infoID = $request->infoID;
		$rating = $request->rating;
		
		if($request){
			$query_register = mysqli_query($connect, "INSERT INTO informasirating SET infoID=(SELECT infoID FROM informasi WHERE infoID='$infoID'),rating='$rating',byUserID=(SELECT userID FROM user WHERE userID='$userID')");
			
			if($query_register){
				$data = array(
					'message'=> "Rating berhasil",
					'status'=> "200"
				);
			}
			else{
				$data =array(
					'message'=> "Rating gagal, silahkan coba lagi.",
					'status'=> "404"
				);
			}
		}
		else{
			$data =array(
				'message' => "Input kosong!",
				'status' => "503"
			);
		}
		echo json_encode($data);
	}
?>
