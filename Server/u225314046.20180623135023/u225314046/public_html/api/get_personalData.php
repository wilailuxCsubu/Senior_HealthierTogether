<?php
include "config.php";

    $strID = $_POST["MemberID"];


  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");
	
	$sql = "SELECT p.HN,CONCAT(p.Name,' ',p.Last) AS name_p,p.age ,p.address,p.place
            From patient p  
            INNER JOIN authorities a ON a.userID = p.userID 
            WHERE p.userID = '".$strID."' 
            ";

   
      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");

 	$result = array();


    while($row = mysqli_fetch_array($r))
      {
		   	array_push($result,array(
		   	    "Name"=>$row["name_p"],
		   	    "HN"=>$row["HN"],
		   	    "userID"=>$row["age"],

		   	    ));
		 
	  }

 	echo json_encode(($result),JSON_UNESCAPED_UNICODE);

 	mysqli_close($con);
 ?>
