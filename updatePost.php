<?php

	include 'db_connect.php';
	
		$postdata = file_get_contents("php://input");
		$judul ="";
		$isi ="";
		$infoID ="";
		$fotoFilePath ="";
		$category="";
		
	if(isset($postdata)){
		$request = json_decode($postdata);
		$judul = $request->judul;
		$isi = $request->isi;
		$fotoFilePath = $request->fotoFilePath;
		$infoID = $request->infoID;
		$category = $request->category;
		
		if($request){
			if($judul){
				//"UPDATE calonsiswa SET (nama,alamat,jenis_kelamin,sekolah_asal) VALUES('$nama','$alamat','$jenis_kelamin','$sekolah_asal')  WHERE id='$id'"
				$query_register = mysqli_query($connect, "UPDATE informasi SET judul='$judul'  WHERE infoID='$infoID'");
			}
			
			if($isi){
				$query_register = mysqli_query($connect, "UPDATE informasi SET isi='$isi'  WHERE infoID='$infoID'");
			}
			
			if($fotoFilePath){
				$query_register = mysqli_query($connect, "UPDATE informasi SET isi='$fotoFilePath'  WHERE infoID='$infoID'");
			}
			
			if($category){
				$query_register = mysqli_query($connect, "UPDATE informasi SET isi='$category'  WHERE infoID='$infoID'");
			}
	
			$data = array(
				'message'=> "Info berhasil diinput",
				'status'=> "200"
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
?>
