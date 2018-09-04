<?php
	// $objConnect = mysql_connect("localhost","root","root");
	// $objDB = mysql_select_db("senior_healthiertogether") or die('Unable to Connect');
	
	include "config.php";

  $objConnect = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อม
	
   mysqli_query("SET NAMES UTF8");


    $strUserID = $_POST["sUserID"];
	$strHN = $_POST["sHN"];
	$strResult = $_POST["sResult"];
	$strComment = $_POST["sComment"];
	$strDate = $_POST["sDate"];
	$dating = date('Y-m-d');
	$strScor = $_POST["sCore"];
	$strNoiD = $_POST["sNo_id"];

	/*** Insert ***/
	$strSQL = "INSERT INTO assessment(HN,userID,result,note,date_n,score,no_id)
		VALUES (
      '".$strHN."',
			'".$strUserID."',
			'".$strResult."',
			'".$strComment."',
			'".$dating."',
			'".$strScor."',
			'".$strNoiD."'
			)
		";
	
	$strSQL2 =" INSERT INTO MakeDate(userID,HN,date)
			VALUES ('".$strUserID."',
			        '".$strHN."',
			        '".$strDate."'
			        )
	            ";

	$objQuery = mysqli_query($objConnect,$strSQL)or die ("Error Query [".$strSQL."]");
	$objQuery2 = mysqli_query($objConnect,$strSQL2)or die ("Error Query [".$strSQL2."]");
	if(!$objQuery && !$objQuery2)
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
