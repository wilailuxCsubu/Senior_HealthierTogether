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

                  <div class="col-lg-12">
                    <br>  <br>
                    <ul class="nav nav-tabs" style="font-size:20px">
                        <li class="active"><a href="profile_p.php" >ข้อมูลประวัต</a>
                        </li>
                        <li ><a href="genogram.php">ผังครอบครัว</a>
                        </li>
                        <li><a href="#messages">รายงานผล</a>
                        </li>
                    </ul>

                  <br>  <br>

                  <div class="row">
                      <div class="col-lg-12">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4>ข้อมูลส่วนตัว<h4>
                              </div><br>
                              <div class="panel-body">
                                  <div class="row" style="font-size:16px">
                                    <div class="col-lg-3">

                                    </div>

                                      <div class="col-lg-9">
                                          <form role="form">
                                            <div class="row">
                                              <div class="form-group col-md-4" >
                                                  <label>รหัส HN</label>
                                                  <input class="form-control" id="disabledInput" type="text" placeholder="Disabled HN" disabled>
                                              </div>
                                              <!-- <div class="form-group col-md-4" >
                                                  <label>รหัส HN</label>
                                                  <input class="form-control" id="disabledInput" type="text" placeholder="Disabled HN" disabled>
                                              </div> -->
                                            </div><br>
                                            <div class="row">
                                              <div class="form-group col-md-6">
                                                  <label>ชื่อ</label>
                                                  <input class="form-control" placeholder="Enter text">
                                              </div>
                                              <div class="form-group col-md-6">
                                                  <label>นาสกุล</label>
                                                  <input class="form-control" placeholder="Enter text">
                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="form-group col-md-3">
                                                  <label>อายุ</label>
                                                  <input class="form-control" placeholder="Enter text">
                                              </div>

                                            </div>

                                              <!-- <div class="form-group">
                                                  <label>File input</label>
                                                  <input type="file">
                                              </div> -->
                                              <div class="form-group">
                                                  <label>ที่อยู่</label>
                                                  <textarea class="form-control" rows="3"></textarea>
                                              </div><br>

                                              <div class="form-group">
                                                  <label>สถานภาพ :</label> &nbsp;&nbsp;&nbsp;
                                                  <label class="radio-inline">
                                                      <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>โสด
                                                  </label>
                                                  <label class="radio-inline">
                                                      <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">คู่
                                                  </label>
                                                  <label class="radio-inline">
                                                      <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">หย่า
                                                  </label>
                                                  <label class="radio-inline">
                                                      <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">หม้าย
                                                  </label>
                                                  <label class="radio-inline">
                                                    <input class="form-control" placeholder="อื่นๆ . . . . ">
                                                      <!-- <input  name=" " id="" value=" " placeholder="อื่น ..."> -->
                                                  </label>
                                              </div><br>
                                              <div class="form-group">
                                                  <label>อาชีพ :</label> &nbsp;&nbsp;&nbsp;
                                                  <label class="radio-inline">
                                                      <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>ทำนา
                                                  </label>
                                                  <label class="radio-inline">
                                                      <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">ค้าขาย
                                                  </label>
                                                  <label class="radio-inline">
                                                      <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">รับจ้าง
                                                  </label>
                                                  <label class="radio-inline">
                                                      <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">รับราชการ
                                                  </label>
                                                  <label class="radio-inline">
                                                    <input class="form-control" placeholder="อื่นๆ . . . . ">
                                                      <!-- <input  name=" " id="" value=" " placeholder="อื่น ..."> -->
                                                  </label>
                                              </div><br>
                                              <div class="form-group">
                                                  <label>สิทธิการรักษา :</label>
                                                  <div class="radio">
                                                      <label>
                                                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>บัตรประกันสุขภาพถ้วนหน้า
                                                      </label>
                                                  </div>
                                                  <div class="radio">
                                                      <label>
                                                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">จ่ายตรง
                                                      </label>
                                                  </div>
                                                  <div class="radio">
                                                      <label>
                                                          <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">บัตรประกันสังคม
                                                      </label>
                                                  </div>
                                                  <div class="radio">
                                                      <label>
                                                          <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">ต่างด้าว
                                                      </label>

                                                  </div>
                                                  <label class="radio-inline">
                                                    <input class="form-control" placeholder="อื่นๆ . . . . ">
                                                      <!-- <input  name=" " id="" value=" " placeholder="อื่น ..."> -->
                                                  </label>
                                              </div>
                                              <!-- <div class="form-group">
                                                  <label>Selects</label>
                                                  <select class="form-control">
                                                      <option>1</option>
                                                      <option>2</option>
                                                      <option>3</option>
                                                      <option>4</option>
                                                      <option>5</option>
                                                  </select>
                                              </div> -->
                                              <br>
                                              <button type="submit" class="btn btn-primary btn-lg btn-block">บันทึก</button><br>
                                          </form>
                                      </div><br>
                                      <!-- /.col-lg-6 (nested) -->

                                  </div>
                                  <!-- /.row (nested) -->
                              </div>
                              <!-- /.panel-body -->
                          </div>
                          <!-- /.panel -->
                      </div>
                      <!-- /.col-lg-12 -->
                  </div>
                  <!-- /.row -->





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
