<?php
include "config.php";

 	$strID = $_POST["MemberID"];



  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");
  
  
	$sql = "SELECT p.HN,p.img,CONCAT(p.Name,' ',p.Last) AS name_p,a.result,p.age
            From patient p  
            INNER JOIN assessment a ON a.HN = p.HN 
            WHERE p.HN = '".$strID."' AND a.date_n = (select MAX(date_n) from assessment where HN=a.HN)
            GROUP BY name_p ORDER BY a.date_n DESC
            ";
          
      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");
 
    $obResult = mysqli_fetch_array($r);
	if($obResult)
	{
		$arr["result"] = $obResult["result"];
		$arr["name_p"] = $obResult["name_p"];
		$arr["img"] = $obResult["img"];
		$arr["age"] = $obResult["age"];
		$arr["HN"] = $obResult["HN"];

	}

	
	mysqli_close($con);

	
	 	echo json_encode(($arr),JSON_UNESCAPED_UNICODE);


 
 ?>
