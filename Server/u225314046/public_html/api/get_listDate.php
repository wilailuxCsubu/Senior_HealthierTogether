<?php
include "config.php";

    $strID = $_POST["MemberID"];


  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");
	
	
		$sql = "SELECT MakeDate.date ,patient.img ,CONCAT(patient.Name,' ',patient.Last) AS name_p 
		    From MakeDate
            INNER JOIN patient ON patient.HN = MakeDate.HN 
            WHERE MakeDate.userID = '".$strID."' ORDER BY MakeDate.date ASC
            ";

   
      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");

 	$result = array();


    while($row = mysqli_fetch_array($r))
      {
		   	array_push($result,array(
		   	  //  "userID"=>$row['userID'],
		   	  //  "HN"=>$row["HN"],
		   	    "img"=>$row["img"],
		   	    "name"=>$row["name_p"],
		   	    "date"=>$row["date"],
		   
		   	    
		   	    ));
	  }

 	echo json_encode(($result),JSON_UNESCAPED_UNICODE);

 	mysqli_close($con);
 ?>
