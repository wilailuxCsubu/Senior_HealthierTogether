

   <?php

include "config.php";

    
// Create connection
$conn = new mysqli($servername, $username, $password, $database) or die('Unable to Connect');
mysqli_query("SET NAMES UTF8");
 
 if($_SERVER['REQUEST_METHOD'] == 'POST'){

 $strUsername = $_POST["MemberID"];
 
 $ImageData = $_POST['image_path'];
    
 
 $DefaultId="555";
 
 $ImagePath = "img/$DefaultId.png";
 
 $ServerURL = "http://aorair.esy.es/$ImagePath";
 
  $InsertSQL = "UPDATE patient SET 
                img = '$ServerURL'
             WHERE userName = '".$strUsername."'";
             
 if(mysqli_query($conn, $InsertSQL)){

 file_put_contents($ImagePath,base64_decode($ImageData));

 echo "Your Image Has Been Uploaded.";
 }
 
 mysqli_close($conn);
 }else{
 echo "Not Uploaded";
 }
 

?>