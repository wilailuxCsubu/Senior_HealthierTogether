<?php
include "config.php";
    $strID = $_POST["MemberID"];

  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); 
	mysqli_set_charset($con,"utf8");
	
	$sql = "SELECT p.HN,p.img,p.userID,p.userName,CONCAT(p.Name,' ',p.Last) AS name_p,a.date_n,a.no_id
            From patient p  
            INNER JOIN assessment a ON a.HN = p.HN 
            WHERE p.userID = '".$strID."' AND a.date_n = (select MAX(date_n) from assessment where HN=a.HN)
            GROUP BY name_p ORDER BY a.date_n DESC
            ";
      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");

 	$result = array();
    while($row = mysqli_fetch_array($r)) {
		   	array_push($result,array(
		   	    "img"=>$row['img'],
		   	    "Name"=>$row["name_p"],
		   	    "HN"=>$row["HN"],
		   	    "userID"=>$row["userID"],
		   	    "date_n"=>$row["date_n"],
		   	    "no_id"=>$row["no_id"]
		   	    ));
	  }
 	echo json_encode(($result),JSON_UNESCAPED_UNICODE);
 	mysqli_close($con);
 ?>
