<!DOCTYPE html>
<html lang="en">
<? session_start(); ?>
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

            <?
      include "config.php";
      $objConnect = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");
      
      $strSQL = "SELECT userID,Img ,CONCAT(Name,' ',Last) AS name_p From authorities WHERE userName = '".$_SESSION["userName"]."' ";
      
      $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
      
      $result=mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

    ?>
            <div class="navbar-default_2 sidebar" role="navigation" style="font-size:17px">
                <div class="sidebar-nav navbar-collapse"><br>
                    <ul class="nav" id="side-menu">
                      <div class="testimonial-image">
                          <center><img src="<?php echo $result["Img"];?>" width="100px" height="100px"></center>
                        </div>
                            <p></p>
                            <center><span class="nav-link-text"><?php echo $result["name_p"];?></span></center>
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
                                 <li>
                                      <a href="Recommend.php">คำแนะนำตามเกณฑ์</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="MapWeb.php"><i class="fa fa-street-view"></i> แผนที่รายงานกลุ่มเสี่ยง</a>
                        </li>
                        <li>
                            <a href="PieChart.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> สรุปรายงานผล</a>
                        </li>
        <?php 
        $_SESSION["userID"] = $result["userID"]; 
        session_write_close();
        ?>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

     <?
     
      include "config.php";
      $objConnect = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");
    //   $strSQL = "SELECT a.HN, CONCAT(p.Name,' ',p.Last) AS name_p,a.userID,a.result,a.date_n,a.no_id From assessment a
    //             LEFT JOIN patient p ON a.HN = p.HN
    //             WHERE date_n = (select MAX(date_n) from assessment where HN=a.HN)
    //             ORDER BY date_n DESC
    //             ";
    
     $strSQL = "SELECT p.HN, CONCAT(p.Name,' ',p.Last) AS name_p, CONCAT(a.Name,' ',a.Last) AS name_a ,a.userID
                From patient p
                INNER JOIN authorities a ON p.userID = a.userID
                ORDER BY name_p
                ";
    
    //  $strSQL = "SELECT HN, CONCAT(Name,' ',Last) AS name_p,userID
    //             From patient
               
    //             ";
    
    
                
      $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]")
      
    

      ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">รายชื่อผู้ป่วย</h1>
                </div>
                
                 <center>
            
             <a role="button" class="btn btn-outline btn-primary btn-lg" href="Add_patient.php">
              เพิ่มสมาชิกผู้ป่วย <i class="fa fa fa-edit"></i>
            </a>          
          </center>
              <br>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                        <!-- <div class="panel-heading">
                            <i class="fa fa-table"></i>
                        </div> -->
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <form action="profile_p.php" method="post">
                            <table width="100%" class="table table-bordered table-hover" id="dataTables-example" style="font-size:17px">
                                <thead>
                                    <tr>
                                      <th>ชื่อ</th>
                                      <th>ผู้รับผิดชอบ</th>
                                      <!--<th>ผลการประเมิน</th>-->
                                      <!--<th>ว/ด/ป เยี่ยมล่าสุด</th>-->
                                      <!--<th>ครั้งที่ลงเยี่ยม</th>-->
                                    </tr>
                                </thead>
                                <?php
                while($objResult = mysqli_fetch_array($objQuery)){
                ?>
                                <tbody >
                                    <tr class="odd gradeX">
                                      <!-- <button type="button" class="btn btn-outline btn-info">Info</button> -->
                                      <td><a type="button" name="name" class="btn btn-outline btn-info" style="font-size:17px" href="profile_p.php?HN=<?php echo $objResult["HN"];?>"><?php echo $objResult["name_p"];?></a></td>
                                      <td><?php echo $objResult["name_a"];?></td>
                                      
                                      <!--<td><?php echo $objResult["result"];?></td>-->
                                      <!--<td><?php echo $objResult["date_n"];?></td>-->
                                      <!--<td><?php echo $objResult["no_id"];?></td>-->
                                    </tr>

                                </tbody>
                                <?php
                }
                ?>
                            </table>
                          </form>
                            <!-- /.table-responsive -->

                            <?php
                mysqli_close($objConnect);
                ?>

                        </div>
                        <!-- /.panel-body -->

                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
