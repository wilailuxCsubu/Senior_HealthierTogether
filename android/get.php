<?php
header("content-type:text/javascript;charset=utf-8");
define('HOST','localhost'); //ชื่อ host
define('USER','root'); //username
define('PASS','root'); //password
define('DB','senior_healthiertogether'); // ชื่อ database ที่จะติดต่อ

 if($_SERVER['REQUEST_METHOD']=='GET'){

 	//$status  = $_GET['Name'];

 	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect'); //ต่อฐานข้อมูล

	mysqli_set_charset($con,"utf8");

 	$sql = "SELECT * FROM patient ORDER BY HN ASC ";

 	$r = mysqli_query($con,$sql);

 	$result = array();
  $de = array('class'=>'go.GraphLinksModel',
              'nodeCategoryProperty'=>'s',
              'linkLabelKeysProperty'=>'labelKeys');

    while($row = mysqli_fetch_array($r))
      {
		   	array_push($result,array("Name"=>$row['Name'],"HN"=>$row["HN"]));
	  }
    // "class": "go.GraphLinksModel",
    //   "nodeCategoryProperty": "s",
    //   "linkLabelKeysProperty": "labelKeys",

  // echo json_encode($de,JSON_UNESCAPED_UNICODE);
 	echo json_encode($de + array('result'=>$result),JSON_UNESCAPED_UNICODE);

 	mysqli_close($con);

 }
 ?>
