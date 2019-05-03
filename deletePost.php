<?php

	include 'db_connect.php';
	
		$postdata = file_get_contents("php://input");
		$infoID ="";
		
	if(isset($postdata)){
		$request = json_decode($postdata);
		$infoID = $request->infoID;
		
		if($request){
			mysqli_query($connect,"DELETE FROM informasirating WHERE infoID=(SELECT infoID FROM informasi WHERE infoID='$infoID')");
			$query_register = mysqli_query($connect, "DELETE FROM informasi WHERE infoID='$infoID'");
			
			if($query_register){
				$data = array(
					'message'=> "Delete Success!",
					'status'=> "200"
				);
			}
			else{
				$data =array(
					'message'=> "Delete gagal!",
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
