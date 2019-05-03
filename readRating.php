<?php
	include 'db_connect.php';
	
	$postdata = file_get_contents("php://input");
	$infoID ="";
	
	$request = json_decode($postdata);
	$infoID = $request->infoID;
	
	$q = mysqli_query($connect,"SELECT rating FROM informasiRating WHERE infoID='$infoID'");
	int $rateNum=0;
	double $rateSum=0;
	
	while($result=mysqli_fetch_assoc($q)){
		
		$rateSum+=$result;
		$rateNum++;
	}
	double $avgRate=$rateSum/$rateNum;
	
	$data=array(
		'data'=>$avgRate,
		'status'=>'200'
	);
	echo json_encode($data);



?>
