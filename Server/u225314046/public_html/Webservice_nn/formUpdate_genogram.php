<meta charset="utf-8">

<?php
include "config.php";

$KeyID = $_POST["KeyID"];
$n = $_POST["name"];
$s = $_POST["sex"];
$m = $_POST["mom"];
$f = $_POST["fater"];
$ux = $_POST["ux"];
$vir = $_POST["vir"];
$byear = $_POST["byear"];

$fig = $_POST["fig"];
$dia = $_POST["dia"];
$hyper = $_POST["hyper"];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "UPDATE genogram SET 
			name = '$n' ,
			sex = '$s' ,
			mom = '$m' ,
			father = '$f' ,
			wife = '$ux',
			husband = '$vir',
			diabetes = '$dia',
			hyper = '$hyper',
			fig = '$fig',
			byear = '$byear'
			WHERE key_no = '$KeyID'
		 ";
		 
		 $query = mysqli_query($conn,$sql);

    if($query) {
	 echo "<script>";
        echo "alert(\" แก้ไขข้อมูลเรียบร้อย \");";
        echo "window.location.href = 'Update_genogram.php?name=$n' ;"; 
        echo "</script>";
	}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);


?>
