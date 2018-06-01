<meta charset="utf-8">

<?php
include "config.php";

$n = $_POST["name"];
$s = $_POST["sex"];
// $age = $_POST["age"];
$m = $_POST["mom"];
$f = $_POST["fater"];
$ux = $_POST["ux"];
$vir = $_POST["vir"];
$byear = $_POST["byear"];

$fig = $_POST["fig"];
$dia = $_POST["dia"];
$hyper = $_POST["hyper"];

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




$sql = "INSERT INTO genogram(name, sex, mom, father, wife, husband, diabetes, hyper,fig,byear)
VALUES ('$n','$s','$m','$f','$ux','$vir','$dia','$hyper','$fig','$byear')";


if ($conn->query($sql) === TRUE) {
    header("location:genogram.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
