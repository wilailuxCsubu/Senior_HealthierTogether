<meta charset="utf-8">

<?php
include "config.php";

$n = $_POST["name"];
$s = $_POST["sex"];
$ag = $_POST["ag"];
$m = $_POST["mom"];
$f = $_POST["fater"];
$ux = $_POST["ux"];
$vir = $_POST["vir"];

// if ($m==0) {
//   $m ="";
// }
// if ($f==0) {
//   $f ="";
// }
// if ($ux==0) {
//   $ux ="";
// }
// if ($vir==0) {
//   $vir ="";
// }
// //
// echo "$n,  ";
// echo "$s,  ";
// echo "$ag,  ";
// echo "$m,  ";
// echo "$f,  ";
// echo "$ux,  ";
// echo "$vir  ";
//

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO genogram(name, sex, age, mom, father, wife, husband)
VALUES ('$n','$s','$ag','$m','$f','$ux','$vir')";


if ($conn->query($sql) === TRUE) {
    header("location:genogram.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
