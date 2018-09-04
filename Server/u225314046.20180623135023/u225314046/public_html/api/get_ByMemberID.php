<?php
include "config.php";

 	$strID = $_POST["MemberID"];



  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");

  $sql =  "SELECT userID,Img,userName,CONCAT(Name,' ',Last) AS name_a FROM authorities WHERE 1 AND userName = '".$strID."' ";
          
      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");
 
    $obResult = mysqli_fetch_array($r);
	if($obResult)
	{
		$arr["userID"] = $obResult["userID"];
		$arr["name_a"] = $obResult["name_a"];
		$arr["Img"] = $obResult["Img"];
	}

	
	mysqli_close($con);

	
	 	echo json_encode(($arr),JSON_UNESCAPED_UNICODE);


 
 ?>
