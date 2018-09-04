<?php
include "config.php";

 if($_SERVER['REQUEST_METHOD']=='GET'){

 	//$status  = $_GET['Name'];

  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");

 	$sql = "SELECT img, HN, CONCAT(Name,' ',Last) AS Name  FROM patient ";

 	$r = mysqli_query($con,$sql);

 	$result = array();


    while($row = mysqli_fetch_array($r))
      {
		   	array_push($result,array("img"=>$row['img'],"Name"=>$row["Name"], "HN"=>$row["HN"]));
	  }

 	echo json_encode(($result),JSON_UNESCAPED_UNICODE);

 	mysqli_close($con);

 }
 ?>
