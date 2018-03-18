<?php
  // include "config.php";
  //
  // $objConnect = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล
  // //
  $objConnect = mysql_connect("localhost","root","root");
	$objDB = mysql_select_db("senior_healthiertogether");

	// mysqli_set_charset($objConnect,"utf8");

  $strUsername = $_GET["strUser"];
	$strPassword = $_GET["strPass"];

  // $strUsername = $_POST["strUser"];
	// $strPassword = $_POST["strPass"];


	//$_POST["strUser"] = "weerachai"; // for Sample
	//$_POST["strUser"] = "weerachai@1";  // for Sample

	$strSQL = "SELECT patient.HN, patient.Pw , authorities.userID, authorities.Pw
    FROM patient
    INNER JOIN authorities ON patient.userID = authorities.userID
    WHERE patient.HN = '".$strUsername."'
    AND patient.Pw = '".$strPassword."'
    OR authorities.userID = '".$strUsername."'
    AND authorities.Pw = '".$strPassword."'

		";

    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
  	$objResult = mysql_fetch_array($objQuery);
  	$intNumRows = mysql_num_rows($objQuery);

	if($intNumRows==0)
	{
		$arr['StatusID'] = "0";
		$arr['Error'] = "Incorrect Username and Password";

	}
	else
	{
		$arr['StatusID'] = "1";
    $arr['MemberID'] = "$strUsername";
		$arr['Error'] = "";
	}

    //
		// $arr['StatusID'] // (0=Failed , 1=Complete)
		// $arr['MemberID'] // MemberID
		// $arr['Error' // Error Message
    //


	mysql_close($objConnect);

	echo json_encode($arr);
?>
