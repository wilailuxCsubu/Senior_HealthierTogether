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

//Connect to the database
$connection = mysql_connect($hostname, $username, $password);
mysql_select_db($dbname, $connection);

//Setup our query
$query = "SELECT * FROM $usertable";

//Run the Query
$result = mysql_query($query);

//If the query returned results, loop through
// each result
if($result)
{
  while($row = mysql_fetch_array($result))
  {
    $name = $row["$yourfield"];
    echo "Name: " . $name;

  }
}

?>
