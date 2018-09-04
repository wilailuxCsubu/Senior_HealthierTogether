<?php
	
	include "config.php";

  $objConnect = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อม
	
   mysqli_query("SET NAMES UTF8");

	
	$HN = $_POST["sHN"];
    
    $food = $_POST["food"];
    $sfood = $_POST["symptomF"];
    $Rx = $_POST["Rx"];
    $sRx = $_POST["symptomR"];
    $dating = date('Y-m-d');


	$sql = "INSERT INTO allergy(HN,food,Rx,symptomF,symptomR,date) 
	        VALUES('$HN','$food','$Rx','$sfood','$sRx','$dating') ";

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
