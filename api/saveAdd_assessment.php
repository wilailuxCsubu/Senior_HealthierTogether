<?php
	// $objConnect = mysql_connect("localhost","root","root");
	// $objDB = mysql_select_db("senior_healthiertogether") or die('Unable to Connect');
	//
  // mysqli_query("SET NAMES UTF8");

  $objConnect = mysqli_connect("localhost", "root", "root", "senior_healthiertogether") or die('Unable to Connect'); //ต่อฐานข้อมูล

	$strUserID = $_GET["sUserID"];
	$strHN = $_GET["sHN"];
	$strResult = $_GET["sResult"];
	$dating = date('Y-m-d');

	/*** Insert ***/
	$strSQL = "INSERT INTO assessment(HN,userID,result,date_n)
		VALUES (
      '".$strHN."',
			'".$strUserID."',
			'".$strResult."',
			'".$dating."'
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
