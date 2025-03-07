<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Healthier Together</title>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style="font-size:25px">
                  <i class="fa fa-heartbeat" aria-hidden="true"></i> Healthier Together</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">


                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> ข้อมูลส่วนตัว</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> การตั้งค่า</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> ออกจากระบบ</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default_2 sidebar" role="navigation" style="font-size:17px">
                <div class="sidebar-nav navbar-collapse"><br>
                    <ul class="nav" id="side-menu">
                      <div class="testimonial-image">
                          <center><img src="../img/profile/user10.png" width="100px" height="100px"></center>
                        </div>

                            <center><span class="nav-link-text">นางวิไลลักษณ์  แหวนเงิน</span></center>
                          </a><br>

                        <li>
                            <a href="home.php"><i class="fa fa-home" aria-hidden="true"></i> หน้าแรก</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gears"></i> การจัดการ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="patient.php">ผู้ป่วย</a>
                                </li>
                                <li>
                                      <a href="authorities.php">บุคลาการทางการแพทย์</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-street-view"></i> แผนที่รายงานกลุ่มเสี่ยง</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i> สรุปรายงานผล</a>
                        </li>



                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                  <br>  <br>
                    <div class="col-md-12">
                      <ul class="nav nav-tabs" style="font-size:16px">
                      <li ><a href="profile_p.php" >ข้อมูลประวัติ</a>
                      </li>
                      <li class="active"><a href="genogram.php">ผังครอบครัว</a>
                      </li>
                      <li><a href="#messages">รายงานผล</a>
                      </li>
                    </ul>
                  </div>
  <br>  <br>


  
  

                <!-- Icon Cards-->
            <div class="container">
            <div class="row">

              <!-- <div class="col-md-12">
                <button onclick="load()">Load</button>
              </div> -->
              <br><br>
                <!--<center>-->
                <div class="row">
                     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            <a role="button" class="btn btn-primary btn-lg" href="genogram.php">
            ย้อนกลับ <i class="fa fa fa-reply"></i>
            </a>
            </div> 
            <!--btn btn-secondary-->
         
          <!--</center>-->
              <br>
              
               <?
      include "config.php";
      $objConnect = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");
    //   $objDB = mysqli_select_db("$database");
      $strSQL = "SELECT name,key_no From genogram 
                ORDER BY key_no ASC
                ";
   
      $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]")
      
    

      ?>
            

              <!-- /.row -->
              <div class="col-md-12 col-sm-12 ">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-info">
                            <div class="panel-heading" style="font-size:19px">
                                <!-- <h4>สัญลักษณ์</h4> -->
                                แก้ไขสมาชิกในครอบครัว
                            </div>
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="myTableData" class="table table-hover" style="font-size:17.5px">
                                   
                                    <thead>
                                        <tr>
                                            
                                            <th width="60%">ชื่อ</th>
                                            <th width="20%">แก้ไข</th>
                                            <th width="20%">ลบ</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php
                while($objResult = mysqli_fetch_array($objQuery)){
                ?>
                                <tbody>
                                   <!--<tr id="somerow">-->
                                   <tr>
                                           <td ><?php echo $objResult["name"];?></td>
                                            <td><a type="button" class="btn btn-warning" id="up" href="Update_genogram.php?name=<?php echo $objResult["name"];?>" >
                                             <i class="fa fa fa-edit">
                                            </a></td>
                                            <td><a type="button" class="btn btn-danger" id ="del" href="JavaScript:if(confirm('แน่ใจว่าคุณต้องการลบ?')==true){window.location='Delete_genogram.php?name=<?php echo $objResult["name"];?>';}">
                                             <i class="fa fa-trash-o">
                                            </a></td>
                                            
                                        </tr>
                                       
                                    </tbody>
                <?php
                }
                ?>
                                </table>
                                
                            <?php
                mysqli_close($objConnect);
                ?>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->

                        </div>
                    </div>


                </div>
                 
                </div>
              </div>
              
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    

    
    <!-- // <php
     
    <!--echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script> ";-->
    <!--echo '<script type="text/javascript">';-->
    
    <!--echo " $('#myTableData').on('click', '#up',function () { ";-->
    <!--echo " var currow = $(this).closest('tr');";-->
    <!--echo " var col = currow.find('td:eq(0)').text(); ";-->
    <!--echo 'window.location.href = "Edit_genogram.php?name=" + col;'; -->
    <!--echo "  }); ";-->
    
    
    <!--echo '</script>';-->
    
    
    <!--include "config.php";-->
    <!--$Name = $_GET['name']; //ส่งค่าตัวแปร ระหว่าง javascript มาให้ php-->
   
    <!--$con = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");-->

    <!--mysqli_set_charset($con,"utf8");-->

    <!--$sql = "SELECT * FROM genogram WHERE name = '$Name' ";-->

    <!--$r = mysqli_query($con,$sql);-->
    <!--$result = array();-->
    <!--  while($row = mysqli_fetch_array($r)) {-->
      
    <!--      array_push($result,array(-->
    <!--        "n"=>$row["name"],-->
    <!--        "s"=>$row["sex"],-->

    <!--      ));-->
    <!--  }-->
    <!--$my = json_encode(($result),JSON_UNESCAPED_UNICODE);-->

    <!--mysqli_close($con);-->
    
    <!-- ?>-->
     
      
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

   

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
