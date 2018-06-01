<?php
include "config.php";

 	$strID = $_POST["MemberID"];



  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");

  $sql =  "SELECT HN,userID,Img,CONCAT(Name,' ',Last) AS name_p FROM patient WHERE 1 AND HN = '".$strID."' ";
          
      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");
 
    $obResult = mysqli_fetch_array($r);
	if($obResult)
	{
		$arr["HN"] = $obResult["HN"];
		$arr["name_p"] = $obResult["name_p"];
		$arr["Img"] = $obResult["Img"];
		$arr["userID"] = $obResult["userID"];
	}

	
	mysqli_close($con);

	
	 	echo json_encode(($arr),JSON_UNESCAPED_UNICODE);


 
 ?>
