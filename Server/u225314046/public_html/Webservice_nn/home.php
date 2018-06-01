<!DOCTYPE html>
<html lang="en">
<?php session_start(); 
  
?>

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
                <a class="navbar-brand" href="index.html" style="font-size:25px">Healthier Together</a>
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
                            <a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> หน้าแรก</a>
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
                            <a href="MapWeb.php"><i class="fa fa-street-view"></i> แผนที่รายงานกลุ่มเสี่ยง</a>
                        </li>
                        <li>
                            <a href="PieChart.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> สรุปรายงานผล</a>
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
                    <h1 class="page-header">หน้าแรก</h1> 
                    <!--<p><? echo $userName ?></p>-->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="font-size:17px">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-fw fa-thumbs-o-up fa-4x"></i>
                                </div>
        <?
      include "config.php";
      $objConnect = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");
      $strSQL = "SELECT result,COUNT(result) AS total From assessment a 
                WHERE date_n = (select MAX(date_n) from assessment where HN=a.HN) AND result='ไม่เป็นภาระพึ่งพา'  
                GROUP BY result
                ";
            
      $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
      $result=mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
      ?>
                                <div class="col-xs-10 text-right">
                                    <div class="huge"><?php echo $result["total"];?></div>
                                    <div>ไม่เป็นภาระเพิ่งพา</div>
                                </div>
                            </div>
        <?php
        mysqli_close($objConnect);
        ?>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">รายละเอียด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-fw fa fa-blind fa-4x"></i>
                                </div>
             <?
      include "config.php";
      $objConnect = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");
      $strSQL = "SELECT result,COUNT(result) AS total From assessment a 
                WHERE date_n = (select MAX(date_n) from assessment where HN=a.HN) AND result='ภาระพึ่งพาปานกลาง'  
                GROUP BY result
                ";
      $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
      $result=mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
      ?>
                                <div class="col-xs-10 text-right">
                                    <div class="huge"><?php echo $result["total"];?></div>
                                    <div>ภาระเพิ่งพาปานกลาง</div>
                                </div>
        <?php
        mysqli_close($objConnect);
        ?>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">รายละเอียด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
          <?
      include "config.php";
      $objConnect = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");
      $strSQL = "SELECT result,COUNT(result) AS total From assessment a 
                WHERE date_n = (select MAX(date_n) from assessment where HN=a.HN) AND result='ภาระพึ่งพารุนแรง'  
                GROUP BY result
                ";
      $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
      $result=mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
      ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                      <i class="fa fa-fw fa-wheelchair fa-4x"></i>
                                </div>
                                <div class="col-xs-10 text-right">
                                    <div class="huge"><?php echo $result["total"];?></div>
                                    <div>ภาระพึ่งพารุนแรง</div>
                                </div>
                            </div>
                        </div>
                         <?php
        mysqli_close($objConnect);
        ?>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">รายละเอียด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?
      include "config.php";
      $objConnect = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");
      $strSQL = "SELECT result,COUNT(result) AS total From assessment a 
                WHERE date_n = (select MAX(date_n) from assessment where HN=a.HN) AND result='ภาระพึ่งพาโดยสมบูรณ์'  
                GROUP BY result
                ";
      $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
      $result=mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
      ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    <!-- <i class="fa fa-support fa-3x"></i> -->
                                    <i class="fa fa-fw fa-bed fa-4x" ></i>
                                </div>
                                <div class="col-xs-10 text-right">
                                    <div class="huge"><?php echo $result["total"];?></div>
                                    <div>ภาระพึ่งพาโดยสมบูรณ์!</div>
                                </div>
                            </div>
                        </div>
                           <?php
        mysqli_close($objConnect);
        ?>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">รายละเอียด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="card-body">
                                <center>  <img class="img-responsive" src="../img/h1.jpg"></center>


                                </div>

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

          <?php
        mysqli_close($objConnect);
        ?>


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
