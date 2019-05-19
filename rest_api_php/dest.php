<?php


include 'db_connect.php';



	$q = mysqli_query($connect,"SELECT nama,lokasi,text,url_gambar FROM dest ORDER BY id DESC");



	while($result=mysqli_fetch_assoc($q)){

		$result_set[]=$result;

	}



	$data=array(

		'message'=>'Get Data Health History Success',

		'data'=>$result_set,

		'status'=>'200'

	);

	echo json_encode($data);

?>