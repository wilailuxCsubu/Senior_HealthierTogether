<?php
include "config.php";

 	$strHowto = $_POST["sequence"];
//  	$strHowto = $_GET["sequence"];



  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");

  $sql =  "SELECT * FROM How_to WHERE 1 AND sequence = '".$strHowto."' ";
          
      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");
 
    $obResult = mysqli_fetch_array($r);
	if($obResult)
	{
		$arr["result"] = $obResult["result"];
		$arr["sequence"] = $obResult["sequence"];
		$arr["subject"] = $obResult["subject"];
	}

	
	mysqli_close($con);

	/*** return JSON by MemberID ***/
	/* Eg :
	{"MemberID":"2",
	"Username":"adisorn",
	"Password":"adisorn@2",
	"Name":"Adisorn Bunsong",
	"Tel":"021978032",
	"Email":"adisorn@thaicreate.com"}
	*/
	
// 	echo json_encode($arr);
	 	echo json_encode(($arr),JSON_UNESCAPED_UNICODE);


 
 ?>
