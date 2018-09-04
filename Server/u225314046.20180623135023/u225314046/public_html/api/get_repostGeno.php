<?php
include "config.php";


 if($_SERVER['REQUEST_METHOD']=='GET'){

 	//$status  = $_GET['Name'];

  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");

  $sql = "SELECT * From assessment WHERE HN=5711407056 ";

      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");
      
    
//     while($row = mysqli_fetch_array($r))
//       {
// 		   	array_push($result,array(
// 		   	    "HN"=>$row['HN'],
// 		   	    "result"=>$row["result"],
// 		   	    "date"=>$row["date_n"],
		   	    
// 		   	    ));
// 	  }

	  
//  	echo json_encode(($result),JSON_UNESCAPED_UNICODE);

    

 }
 ?>
