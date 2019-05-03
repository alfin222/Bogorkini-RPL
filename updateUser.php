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
			//"UPDATE calonsiswa SET (nama,alamat,jenis_kelamin,sekolah_asal) VALUES('$nama','$alamat','$jenis_kelamin','$sekolah_asal')  WHERE id='$id'"
			$query_register = mysqli_query($connect, "UPDATE user SET (password) VALUES ('$password')  WHERE username='$username'");
			
			if($query_register){
				$data = array(
					'message'=> "Informasi berhasil diubah!",
					'status'=> "200"
				);
			}
			else{
				$data =array(
					'message'=> "Informasi gagal diubah, silahkan coba lagi.",
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
