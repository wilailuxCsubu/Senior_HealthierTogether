<?php
include "config.php";

 	$strID = $_POST["MemberID"];
 	$dating = date('Y-m-d');



  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");

  $sql =  "SELECT * FROM allergy WHERE HN = '".$strID."' AND 
            date =(select MAX(date) from allergy where HN='".$strID."') ";
          
      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");
 
    $obResult = mysqli_fetch_array($r);
	if($obResult)
	{
		$arr["HN"] = $obResult["HN"];
		$arr["food"] = $obResult["food"];
		$arr["Rx"] = $obResult["Rx"];
		$arr["symptomF"] = $obResult["symptomF"];
		$arr["symptomR"] = $obResult["symptomR"];
		
	}

	
	mysqli_close($con);

	
	 	echo json_encode(($arr),JSON_UNESCAPED_UNICODE);


 
 ?>
