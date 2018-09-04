<?php
include "config.php";

 	$strID = $_POST["MemberID"];
 	$dating = date('Y-m-d');



  $con = mysqli_connect($servername, $username, $password, $database) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");

  $sql =  "SELECT * FROM patient WHERE HN = '".$strID."' ";
          
      $r = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");
 
    $obResult = mysqli_fetch_array($r);
    
    $nameG =$obResult["Name"]." ".$obResult["Last"];
    
    $sql2 = "SELECT * From genogram WHERE name = '$nameG' AND fig='1' ";
	$objGeno = mysqli_query($con,$sql2) or die ("Error Query [".$sql2."]");
    $resultGeno=mysqli_fetch_array($objGeno,MYSQLI_ASSOC);
        
        //  echo $resultGeno["id"];
    
	if($obResult)
	{
	    $arr["IdGeno"] = $resultGeno["id"];
		$arr["Date"] = $dating;
		$arr["HN"] = $obResult["HN"];
		$arr["Name"] = $obResult["Name"];
		$arr["Last"] = $obResult["Last"];
		$arr["age"] = $obResult["age"];
		$arr["address"] = $obResult["address"];
		$arr["status"] = $obResult["status"];
		$arr["occupation"] = $obResult["occupation"];
		$arr["treatment"] = $obResult["treatment"];
		$arr["place"] = $obResult["place"];
		$arr["disease"] = $obResult["disease"];
		$arr["Latitude"] = $obResult["Latitude"];
		$arr["Longitude"] = $obResult["Longitude"];
		$arr["Tel"] = $obResult["Tel"];
	}

	
	mysqli_close($con);

	
	 	echo json_encode(($arr),JSON_UNESCAPED_UNICODE);


 
 ?>
