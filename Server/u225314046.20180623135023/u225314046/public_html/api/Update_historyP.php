<?php
	
	include "config.php";

  $objConnect = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อม
	
   mysqli_query("SET NAMES UTF8");

	
	$HN = $_POST["sHN"];
    $n = $_POST["sName"];
    $last = $_POST["sLast"];
    $age = $_POST["sAge"];
    $address = $_POST["sAddress"];
    
    $genoID = $_POST["genoID"];
    $name =$n." ".$last;
    $byear = 2018 - $age ;
    
    // $nameGeno=$n." ".$last;


	$sql = "UPDATE patient SET 
			Name = '$n' ,
			Last = '$last' ,
			age = '$age' ,
			address = '$address'

			WHERE HN = '$HN'
		 ";
	$objQuery = mysqli_query($objConnect,$sql)or die ("Error Query [".$sql."]");
	
		$sql2 = "UPDATE genogram SET 
			byear = '$byear',
			name = '$name'
			
			WHERE id = '$genoID'
		 ";
		 
		 $query2 = mysqli_query($objConnect,$sql2)or die ("Error Query [".$sql."]");

	
	
	if(!$objQuery&!$query2)
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
