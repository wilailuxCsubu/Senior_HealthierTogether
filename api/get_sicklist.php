<?php
include "config.php";


 if($_SERVER['REQUEST_METHOD']=='GET'){

 	//$status  = $_GET['Name'];

  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");

  $sql = "SELECT patient.HN,patient.img,patient.userID,CONCAT(patient.Name,' ',patient.Last) AS name_p,
            patient.age,MAX(assessment.date_n) AS date_new,assessment.result From patient
            INNER JOIN assessment ON  patient.HN = assessment.HN
            GROUP BY name_p ORDER BY date_new DESC";

            // $objQuery = mysql_query($strSQL) or die ("Error Query [".$sql."]")

//  	$sql = "SELECT patient.img,patient.age,patient.userID,patient.HN, CONCAT(patient.Name,' ',patient.Last) AS name_p,
//  	        assessment.result
//  	        FROM patient
//  	        INNER JOIN authorities ON patient.userID = authorities.userID
//  	        INNER JOIN assessment ON  patient.HN = assessment.HN GROUP BY name_p ORDER BY date_n DESC

//  	        ";


      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");

 	// $r = mysqli_query($con,$sql);


 	$result = array();


    while($row = mysqli_fetch_array($r))
      {
		   	array_push($result,array(
		   	    "img"=>$row['img'],
		   	    "Name"=>$row["name_p"],
		   	    "HN"=>$row["HN"],
		   	    "age"=>$row["age"],
		   	    "date_new"=>$row["date_new"],
		   	    "userID"=>$row["userID"],
		   	    "result"=>$row["result"]

		   	    ));

		  //array_push($result,array("img"=>$row['img'],"Name"=>$row["name_p"],"HN"=>$row["HN"],"age"=>$row["age"],
		  //"result"=>$row["result"],"date_n"=>$row["date_n"],"userID"=>$row["userID"]));

	  }

 	echo json_encode(($result),JSON_UNESCAPED_UNICODE);

 	mysqli_close($con);

 }
 ?>
