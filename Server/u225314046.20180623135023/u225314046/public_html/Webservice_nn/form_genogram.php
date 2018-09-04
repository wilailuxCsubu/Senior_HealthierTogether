<meta charset="utf-8">

<?php
include "config.php";

$n = $_POST["name"];
$s = $_POST["sex"];
$m = $_POST["mom"];
$f = $_POST["fater"];
$ux = $_POST["ux"];
$vir = $_POST["vir"];
$byear = $_POST["byear"];

$dia = $_POST["dia"];
$hyper = $_POST["hyper"];
$familyID = $_POST["familyID"];
$no = $_POST["no"];

// $m = $m ?: 'default';
// $f = $f ?: 'default';
// $ux = $ux ?: 'default';
// $vir = $m ?: 'default';
// $ux = !empty($ux) ? "'$ux'" : NULL;




// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $sql2 = "INSERT INTO genogram(name, sex, mom, father, wife, husband, diabetes, hyper,byear,familyID,key_no)
    VALUES ('$n','$s','$m','$f','$ux','$vir','$dia','$hyper','$byear','$familyID','$no')";
    $result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
   
    	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result2){
	echo "<script>";
        echo "window.location.href = 'genogram.php?HN=$familyID' ;";
        echo "</script>";
	}
	else{
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "Error: " . $sq2 . "<br>" . $conn->error;
}
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);


// if ($conn->query($sql2) === TRUE) {
//     header("location:genogram.php?HN=$familyID");
// } else {
//     echo "Error: " . $sql2 . "<br>" . $conn->error;
// }

// $conn->close();


?>