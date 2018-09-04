<meta charset="utf-8">

<?php
include "config.php";

$HN = $_POST["HN"];
$userName = $_POST["userName"];
$Pw = $_POST["Pw"];
$n = $_POST["name"];
$last = $_POST["last"];
$userID = $_POST["userID"];
$age = $_POST["age"];
$address = $_POST["address"];
$status = $_POST["status"];
$oc = $_POST["occupation"];
$tr = $_POST["treatment"];
$place = $_POST["place"];
$lat = $_POST["lat"];
$long = $_POST["long"];
$disease = $_POST["disease"];

$idGeno = $_POST["idGeno"];
$name =$n." ".$last;
$byear = 2018 - $age ;


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
			treatment = '$tr',
			place = '$place',
			disease = '$disease',
			userID = '$userID',
			userName = '$userName',
			Latitude = '$lat',
			Longitude = '$long'
			
			WHERE HN = '$HN'
		 ";
		 
		 $query = mysqli_query($conn,$sql);
		 
    $sql2 = "UPDATE member SET 
			userName = '$userName',
			Pw = '$Pw'
			
			WHERE mem = '$HN'
		 ";
		 
		 $query2 = mysqli_query($conn,$sql2);
		 
	$sql3 = "UPDATE genogram SET 
			byear = '$byear',
			name = '$name'
			
			WHERE id = '$idGeno'
		 ";
		 
		 $query3 = mysqli_query($conn,$sql3);

    if($query & $query3) {
	 echo "<script>";
        echo "alert(\" แก้ไขข้อมูลเรียบร้อย \");";
        // echo "window.location.href = 'patient.php' ;"; 
        echo "window.location.href = 'profile_p.php?HN=$HN' ;";
        echo "</script>";
	}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "Error: " . $sql2 . "<br>" . $conn->error;
    echo "Error: " . $sql3 . "<br>" . $conn->error;
}

mysqli_close($conn);


?>
