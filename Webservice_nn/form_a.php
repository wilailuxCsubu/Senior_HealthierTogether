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


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$sql = "INSERT INTO authorities(Name, Last, age, Position, Under, callNum, Pw)
VALUES ('$n','$l','$ag','$p','$u','$c','$pw')";


if ($conn->query($sql) === TRUE) {
    header("location:genogram.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
