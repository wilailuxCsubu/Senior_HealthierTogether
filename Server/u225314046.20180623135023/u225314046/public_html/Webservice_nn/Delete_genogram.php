
           
     <?php
     
   
    include "config.php";
    $id = $_GET['id']; //ส่งค่าตัวแปร ระหว่าง javascript มาให้ php
    $HN = $_GET['HN'];
    
    $con = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");

    mysqli_set_charset($con,"utf8");

    $sql = "DELETE FROM genogram WHERE id = '".$id."' ";

    $r = mysqli_query($con,$sql);
    
    if(mysqli_affected_rows($con)) {
		 echo "<script>";
        echo "alert(\" ทำการลบข้อมูลเรียบร้อย \");";
        echo "window.location.href = 'Edit_genogram.php?HN=$HN';"; 
        echo "</script>";
	}
   
   
    mysqli_close($con);
    
     ?>
     
      
 