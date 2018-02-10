<?php 
header("content-type:text/javascript;charset=utf-8");
define('HOST','localhost'); //ชื่อ host
define('USER','root'); //username
define('PASS','root'); //password
define('DB','webproject'); // ชื่อ database ที่จะติดต่อ

 if($_SERVER['REQUEST_METHOD']=='GET'){
 
 	//$status  = $_GET['Name'];
 
 	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect'); //ต่อฐานข้อมูล
	
	mysqli_set_charset($con,"utf8");
 
 	$sql = "SELECT * FROM cal_food ORDER BY Foodname ASC ";
 
 	$r = mysqli_query($con,$sql);
 
 	$result = array();

    while($row = mysqli_fetch_array($r))
      {
		   	array_push($result,array("Foodname"=>$row['Foodname']));
	  }

 	echo json_encode(array('result'=>$result),JSON_UNESCAPED_UNICODE);
 
 	mysqli_close($con);
 
 }
 ?>
