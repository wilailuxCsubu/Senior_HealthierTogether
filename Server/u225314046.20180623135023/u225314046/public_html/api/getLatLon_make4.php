<?php
include "config.php";

    $strID = $_POST["MemberID"];


  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");
	
	$sql = "SELECT a.score,p.Latitude,p.Longitude,CONCAT(p.Name,' ',p.Last) AS name_p
            From patient p
            INNER JOIN assessment a ON a.HN = p.HN 
            WHERE a.date_n = (select MAX(date_n) from assessment where HN=a.HN) AND a.score >=12 
            GROUP BY name_p ORDER BY a.date_n DESC
            ";
   
      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");

 	$result = array();


    while($row = mysqli_fetch_array($r))
      {
		   	array_push($result,array(
		   	    "Name"=>$row["name_p"],
		   	    "Latitude"=>$row["Latitude"],
		   	    "Longitude"=>$row["Longitude"],
		   	    "score"=>$row["score"]

		   	    ));
	  }

 	echo json_encode(($result),JSON_UNESCAPED_UNICODE);

 	mysqli_close($con);
 ?>
