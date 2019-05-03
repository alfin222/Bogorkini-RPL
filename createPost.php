<?php

	include 'db_connect.php';
	
		$postdata = file_get_contents("php://input");
		$judul ="";
		$isi ="";
		$authorID ="";
		$fotoFilePath ="";
		$category="";
		
	if(isset($postdata)){
		$request = json_decode($postdata);
		$judul = $request->judul;
		$authorID = $request->authorID;
		$isi = $request->isi;
		$fotoFilePath = $request->fotoFilePath;
		$category = $request->category;
		
		if($request){
			$query_register = mysqli_query($connect, "INSERT INTO informasi SET judul='$judul', authorID=(SELECT userID FROM userAdm WHERE userID='$authorID' AND isAdmin=1), isi='$isi', fotoFilePath='$fotoFilePath', category='$category'");
			
			if($query_register){
				$data = array(
					'message'=> "Info berhasil diinput",
					'data'=>$query_register,
					'status'=> "200"
				);
			}
			else{
				$data =array( //Input gagal, silahkan coba lagi.
					'message'=> "Input gagal, silahkan coba lagi",
					'data'=>$query_register,
					'status'=> "404"
				);
			}
		}
		else{
			$data =array(
				'message' => "Input kosong!",
				'data'=>$query_register,
				'status' => "503"
			);
		}
		echo json_encode($data);
	}
?>
