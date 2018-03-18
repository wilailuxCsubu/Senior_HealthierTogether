<?php
// include "config.php";
$servername = "localhost";
$database = "senior_healthiertogether";
$username = "root";
$password = "root";

 if($_SERVER['REQUEST_METHOD']=='GET'){

 	//$status  = $_GET['Name'];

  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");

  $sql = "SELECT patient.img,patient.age,patient.userID,patient.HN, CONCAT(patient.Name,' ',patient.Last) AS name_p,
        assessment.result
        FROM patient
        INNER JOIN assessment ON  patient.HN = assessment.HN GROUP BY name_p ORDER BY date_n DESC

        ";
            // $objQuery = mysql_query($strSQL) or die ("Error Query [".$sql."]")
  // $sql = "SELECT img, HN, CONCAT(Name,' ',Last) AS name_p  FROM patient ";


      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");


 	// $r = mysqli_query($con,$sql);


 	$result = array();


    while($row = mysqli_fetch_array($r))
      {
		   	// array_push($result,array("img"=>$row['img'],"Name"=>$row["Name"], "HN"=>$row["HN"]));
        array_push($result,array(
		   	    "img"=>$row['img'],
		   	    "Name"=>$row["name_p"],
		   	    "HN"=>$row["HN"],
		   	    "userID"=>$row["userID"],
		   	    "result"=>$row["result"]

		   	    ));

	  }

 	echo json_encode(($result),JSON_UNESCAPED_UNICODE);

 	mysqli_close($con);

 }
 ?>
