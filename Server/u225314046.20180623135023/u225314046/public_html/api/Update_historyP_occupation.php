<?php
	
	include "config.php";

  $objConnect = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อม
	
   mysqli_query("SET NAMES UTF8");

	
	$HN = $_POST["sHN"];
    
    $occupation = $_POST["status"];


	$sql = "UPDATE patient SET occupation = '$occupation' WHERE HN = '$HN' ";

	$objQuery = mysqli_query($objConnect,$sql)or die ("Error Query [".$sql."]");
	if(!$objQuery)
	{
		$arr['StatusID'] = "0";
		$arr['Error'] = "Cannot save data!";
	}
	else
	{
		$arr['StatusID'] = "1";
		$arr['Error'] = "";
	}


	mysqli_close($objConnect);

	echo json_encode($arr);
?>
