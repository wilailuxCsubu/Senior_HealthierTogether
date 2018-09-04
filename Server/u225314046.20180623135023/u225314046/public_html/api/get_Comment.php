<?php
include "config.php";

    $strUsername = $_POST["strUser"];




  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");

  $sql =  "SELECT a.note,a.HN FROM assessment a WHERE HN = '".$strUsername."'
           AND a.date_n = (select MAX(date_n) from assessment where HN=a.HN)
            GROUP BY HN
        ";
          
      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");
 
    $obResult = mysqli_fetch_array($r);
	if($obResult)
	{
	    $arr['StatusID'] = "1";
		$arr['Error'] = "";
		$arr['MemberID'] = $obResult['ID'];
		$arr['type'] = $obResult['type'];
		
	}else
	{
		$arr['StatusID'] = "0";
		$arr['Error'] = "Incorrect Username and Password";
	}
	

	
	mysqli_close($con);


	 	echo json_encode(($arr),JSON_UNESCAPED_UNICODE);


 
 ?>
