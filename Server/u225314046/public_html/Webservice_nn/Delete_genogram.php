
           
     <?php
     
    // echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script> ";
    // echo '<script type="text/javascript">';
    
    // echo " $('#myTableData').on('click', '#aa',function () { ";
    // echo " var currow = $(this).closest('tr');";
    // echo " var col = currow.find('td:eq(0)').text(); ";
    // echo 'window.location.href = "Edit_genogram.php?name=" + col;'; 
   
    // echo "  }); ";
    
    // echo '</script>';
    
    
    include "config.php";
    $Name = $_GET['name']; //ส่งค่าตัวแปร ระหว่าง javascript มาให้ php
   
    $con = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");

    mysqli_set_charset($con,"utf8");

    $sql = "DELETE FROM genogram WHERE name = '".$Name."' ";

    $r = mysqli_query($con,$sql);
    
    if(mysqli_affected_rows($con)) {
		 echo "<script>";
        echo "alert(\" ทำการลบข้อมูลเรียบร้อย \");";
        echo 'window.location.href = "Edit_genogram.php";'; 
        echo "</script>";
	}
   
   
    mysqli_close($con);
    
     ?>
     
      
 