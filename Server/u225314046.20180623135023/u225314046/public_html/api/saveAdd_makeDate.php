<?php
	
	include "config.php";

  $objConnect = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อม
	
   mysqli_query("SET NAMES UTF8");

    $strUserID = $_POST["sUserID"];
	$strHN = $_POST["sHN"];
	$strDate = $_POST["sDate"];


	/*** Insert ***/
	$strSQL = "INSERT INTO MakeDate(HN,userID,date)
		VALUES (
        '".$strHN."',
	    '".$strUserID."',
		'".$strDate."'
			)
		";

	$objQuery = mysqli_query($objConnect,$strSQL)or die ("Error Query [".$strSQL."]");
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
