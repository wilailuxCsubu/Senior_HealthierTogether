<?php
include "config.php";

    $strID = $_POST["MemberID"];


  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");
	
	$sql = "SELECT * From assessment WHERE HN = '".$strID."' ORDER BY no_id ASC  ";

   
      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");

 	$result = array();


    while($row = mysqli_fetch_array($r))
      {
		   	array_push($result,array(
		   	    "name"=>$row['HN'],
		   	    "score"=>$row["score"],
		   	    "no_id"=>$row["no_id"],
		   	    "note"=>$row["note"],
		   	    "date_n"=>$row["date_n"],
		   	    "result"=>$row["result"]
		   	    
		   	    
		   	    ));
		  
	  }

 	echo json_encode(($result),JSON_UNESCAPED_UNICODE);

 	mysqli_close($con);
 ?>
