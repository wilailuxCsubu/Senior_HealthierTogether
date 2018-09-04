<meta charset="utf-8">

<?php
include "config.php";

$n = $_POST["name"];
$l = $_POST["last"];
$ag = $_POST["age"];
$c = $_POST["call"];
$p = $_POST["posi"];
$u = $_POST["under"];
$pw = $_POST["pw"];
$userName = $_POST["userName"];
$type ="authorities";



// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

   $sql = "INSERT INTO authorities(Name, Last, age, Position, Under, callNum, userName)
    VALUES ('$n','$l','$ag','$p','$u','$c','$userName')
    ";
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
 
	//table2
	$sql2 = "INSERT INTO member(userName, PW, type)
			 VALUES('$userName','$pw','$type')";
	$result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
if($result){
	echo "<script>";
        echo "alert(\" บันทึกข้อมูลเรียบร้อย \");";
        echo "window.location.href = 'authorities.php' ;";
        echo "</script>";
	}
	else{
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "Error: " . $sq2 . "<br>" . $conn->error;
}
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);


?>
