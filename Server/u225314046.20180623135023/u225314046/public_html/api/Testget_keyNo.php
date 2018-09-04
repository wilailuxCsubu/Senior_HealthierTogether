<?php
include "config.php";

 	$familyID = "5711403296";



  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");

  $sql =  "SELECT MAX(key_no) FROM genogram WHERE familyID = '$familyID' ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());;
    
    $obResult = mysqli_fetch_array($result);
    	if($obResult){
    // 		$key_no = $obResult["key_no"];
    		$arr["key_no"] = $obResult["key_no"];
    	}
    	

	
	mysqli_close($con);
	
// 	echo $key_no;

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
