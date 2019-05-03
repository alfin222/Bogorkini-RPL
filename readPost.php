<?php
	include 'db_connect.php';
	
	$postdata = file_get_contents("php://input");
	$infoID ="";
	
	$request = json_decode($postdata);
	$infoID = $request->infoID;
	
	$q = mysqli_query($connect,"SELECT * FROM informasi WHERE infoID=$infoID");
	
	$result=mysqli_fetch_assoc($q);
	
	$data=array(
		'data'=>$result,
		'status'=>'200'
	);
	echo json_encode($data);



?>
