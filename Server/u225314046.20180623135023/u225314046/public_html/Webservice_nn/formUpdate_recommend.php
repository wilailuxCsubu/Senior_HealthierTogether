<meta charset="utf-8">

<?php
include "config.php";

$sequence = $_POST["sequence"];

$subject = $_POST["subject"];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "UPDATE How_to SET 
			subject = '$subject' 
			WHERE sequence = $sequence
		 ";
		 
		 $query = mysqli_query($conn,$sql);

    if($query) {
	 echo "<script>";
        echo "alert(\" แก้ไขข้อมูลเรียบร้อย \");";
        echo "window.location.href = 'Edit_recommend.php?name=$sequence' ;"; 
        echo "</script>";
	}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);


?>
