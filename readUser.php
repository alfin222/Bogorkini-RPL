<?php
	include 'db_connect.php';
	
	$postdata = file_get_contents("php://input");
	$username ="";
	$password ="";
	
	$request = json_decode($postdata);
	$username = $request->username;
	$password = $request->password;
	
	$q = mysqli_query($connect,"SELECT password FROM user WHERE username='$username'");
	
	while($result=mysqli_fetch_assoc($q)){
		if($result==array('password'=>$password)){
			goto sukses;
		}
	}
	goto gagal;
	
	sukses:
	$data=array(
		'message'=>'Login success',
		'data'=>$result,
		'status'=>'200'
	);
	goto quit;
	
	gagal:
	$data=array(
		'message'=>'Login failed',
		'data'=>$result,
		'status'=>'699'
	);
	
	
	quit:
	echo json_encode($data);

?>
