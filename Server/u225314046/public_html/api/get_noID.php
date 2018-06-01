<?php
include "config.php";

 	$strHN = $_POST["sHN"];



  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");

  $sql =  "SELECT * FROM assessment a WHERE HN = '".$strHN."' AND 
            a.date_n = (select MAX(date_n) from assessment where HN=a.HN)
            GROUP BY HN
        
        ";
          
      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");
 
    $obResult = mysqli_fetch_array($r);
	if($obResult)
	{
		$arr["HN"] = $obResult["HN"];
		$arr["result"] = $obResult["result"];
		$arr["date_n"] = $obResult["date_n"];
		$arr["no_id"] = $obResult["no_id"];
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
