<meta charset="utf-8">

<?php
include "config.php";

$HN = $_POST["HN"];
$n = $_POST["name"];
$last = $_POST["last"];
$age = $_POST["age"];
$address = $_POST["address"];
$status = $_POST["status"];
$oc = $_POST["occupation"];
$tr = $_POST["treatment"];

//   if($_POST["status"]=='status1'){
//       $status ="โสด";
//   }else if($_POST["status"]=='status2'){
//       $status ="คู่";
       
//   }else if($_POST["status"]=='status3'){
//       $status ="หย่าร้าง";
       
//   }else if($_POST["status"]=='status4'){
//       $status ="หม้าย";
       
//   }else{
//       $status = $_POST["status"];;
//   }

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "UPDATE patient SET 
			Name = '$n' ,
			Last = '$last' ,
			age = '$age' ,
			address = '$address' ,
			occupation = '$oc',
			status = '$status',
			treatment = '$tr'
			WHERE HN = '$HN'
		 ";
		 
		 $query = mysqli_query($conn,$sql);

    if($query) {
	 echo "<script>";
        echo "alert(\" แก้ไขข้อมูลเรียบร้อย \");";
        // echo "window.location.href = 'patient.php' ;"; 
        echo "window.location.href = 'profile_p.php?HN=$HN' ;";
        echo "</script>";
	}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);


?>
