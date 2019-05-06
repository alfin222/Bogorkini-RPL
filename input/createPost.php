<?php

	include 'db_connect.php';
	
		$postdata = file_get_contents("php://input");
		$judul ="";
		$url_gambar ="";
		$teks ="";
		$date ="";
		$penulis="";
		
	if(isset($postdata)){
		$request = json_decode($postdata);
		$judul = $request->judul;
		$url_gambar = $request->url_gambar;
		$teks = $request->teks;
		$date = $request->date;
		$penulis = $request->penulis;
		
		if($request){
			$query_register = mysqli_query($connect, "INSERT INTO news SET judul='$judul', url_gambar=$url_gambar, text='$teks', date='$tanggal', penulis='$penulis'");
			
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
