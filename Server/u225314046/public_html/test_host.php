<?php
$servername = "mysql.hostinger.com";
$database = "u225314046_air";
$username = "u225314046_air";
$password = "Air451995";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}
echo "Connected successfully";
mysqli_close($conn);
?>
