<meta charset="utf-8">

<?php
include "config.php";

$HN = $_POST["HN"];
$userName = $_POST["userName"];
$Pw = $_POST["Pw"];
$name = $_POST["name"];
$last = $_POST["last"];
$age = $_POST["age"];
$address = $_POST["address"];
$status = $_POST["status"];
$oc = $_POST["occupation"];
$tr = $_POST["treatment"];
$userID = $_POST["userID"];
$place = $_POST["place"];
$type ="patient";
$lat = $_POST["lat"];
$long = $_POST["long"];
$disease = $_POST["disease"];

$n = $name." ".$last;
$s = $_POST["sex"];
// $age = $_POST["age"];
$m = "0";
$f = "0";
$ux = "0";
$vir = "0";
$byear = 2018 - $age ;
$fig = 1;
$dia = "0";
$hyper = "0";
$key_no = 1;

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

		echo "Copy/Upload Complete<br>";
		//*** Insert Record ***//
	//table1
	$sql = "INSERT INTO patient(HN, Name, Last, age, address, occupation, status, treatment, place, userID, userName, Latitude, Longitude, disease)
			 VALUES('$HN', '$name', '$last', '$age', '$address', '$oc','$status','$tr', '$place','$userID','$userName','$lat','$long','$disease')";
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
		
	

	//table2
	$sql2 = "INSERT INTO member(userName, mem, PW, type)
			 VALUES('$userName','$HN','$Pw','$type')";
	$result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
 
    $sql3 = "INSERT INTO genogram(name, sex, mom, father, wife, husband, diabetes, hyper,fig,byear,familyID,key_no)
    VALUES ('$n','$s','$m','$f','$ux','$vir','$dia','$hyper',$fig,'$byear','$HN',$key_no)";
    $result3 = mysqli_query($conn, $sql3) or die ("Error in query: $sql3 " . mysqli_error());
    
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result & $result2){
	echo "<script>";
        echo "alert(\" บันทึกข้อมูลเรียบร้อย \");";
        echo "window.location.href = 'patient.php' ;";
        echo "</script>";
	}
	else{
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "Error: " . $sq2 . "<br>" . $conn->error;
        echo "Error: " . $sq3 . "<br>" . $conn->error;
}
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);



?>
