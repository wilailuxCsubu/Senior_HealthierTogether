<?php
include "config.php";

    $strUsername = $_POST["strUser"];
	$strPassword = $_POST["strPass"];



  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");

  $sql =  "SELECT * FROM member WHERE userName = '".$strUsername."' AND Pw = '".$strPassword."'  
        ";
          
      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");
 
    $obResult = mysqli_fetch_array($r);
	if($obResult)
	{
	    $arr['StatusID'] = "1";
		$arr['Error'] = "";
		$arr['MemberID'] = $obResult['userName'];
		$arr['type'] = $obResult['type'];
		
	}else
	{
		$arr['StatusID'] = "0";
		$arr['Error'] = "Incorrect Username and Password";
	}
	

	
	mysqli_close($con);


	 	echo json_encode(($arr),JSON_UNESCAPED_UNICODE);


 
 ?>
