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

        <?php
    include "config.php";
    $objConnect = mysql_connect("$servername","$username","$password") or die("Error Connect to Database");
    $objDB = mysql_select_db("$dbname");
    $strSQL = "SELECT CONCAT(Name,' ',Last) AS name_a ,age ,Position ,Under ,callNum  From authorities ";
    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]")

    ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">รายชื่อบุคลาการทางการแพทย์</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <center><button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">เพิ่มรายชื่อ <i class="fa fa-user-plus"></i></button></center>
                    <br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                        <!-- <div class="panel-heading">
                            <i class="fa fa-table"></i>
                        </div> -->
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <form action="profile_p.php" method="post">
                            <table width="100%" class="table table-bordered " id="dataTables-example" style="font-size:17px">
                                <thead>
                                    <tr>
                                      <th>ชื่อ</th>
                                      <th>อายุ (ปี)</th>
                                      <th>ตำแหน่ง</th>
                                      <th>สังกัด</th>
                                      <th>เบอร์โทรติดต่อ</th>
                                    </tr>
                                </thead>
                                <?php
                while($objResult = mysql_fetch_array($objQuery)){
                ?>
                                <tbody >
                                    <tr >
                                      <!-- <button type="button" class="btn btn-outline btn-info">Info</button> -->
                                      <td><input name="name" onclick="myFunction()" class="btn btn-outline btn-warning" type="submit" value="<?php echo $objResult["name_a"];?>" style="font-size:17px"></td>
                                      <td><?php echo $objResult["age"];?></td>
                                      <td><?php echo $objResult["Position"];?></td>
                                      <td><?php echo $objResult["Under"];?></td>
                                      <td>0<?php echo $objResult["callNum"];?></td>
                                    </tr>

                                </tbody>
                                <?php
                }
                ?>
                            </table>
                          </form>
                            <!-- /.table-responsive -->

                            <?php
                mysql_close($objConnect);
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


    <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">เพิ่มรายชื่อบุคคลากรทางการแพทย์</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body">
          <form method="post" action="form_a.php">
            <div class="row">
              <div class="form-group col-md-6 ">
                <label for="recipient-name" class="form-control-label">ชื่อ:</label>
                <input type = "text" class = "form-control" name= "name">
              </div>
              <div class="form-group col-md-6 ">
                <label for="recipient-name" class="form-control-label">นามสกุล:</label>
                <input type = "text" class = "form-control" name= "last">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-4 ">
                <label for="message-text" class="form-control-label">อายุ:</label>
                <select class="form-control" name= "age" type="number">
                  <!-- <option></option> -->
                  <?php
                  for($i=1; $i<=200 ;$i++){
                      echo "<option value=$i>$i</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-5 ">
                <label for="recipient-name" class="form-control-label">เบอร์โทรติดต่อ:</label>
                <input type ="tel" class = "form-control" name= "call">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6 ">
                <label for="recipient-name" class="form-control-label">ตำแหน่ง:</label>
                <input type = "text" class = "form-control" name= "posi">
              </div>
              <div class="form-group col-md-6 ">
                <label for="recipient-name" class="form-control-label">สังกัด:</label>
                <input type = "text" class = "form-control" name= "under">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-5 ">
                <label for="recipient-name" class="form-control-label">ตั้งรหัสผ่านเริ่มต้น:</label>
                <input type = "text" class = "form-control" name= "pw" placeholder="ควรใส่ 4 ตัวอักษรขึ้นไป">
              </div>

            </div>





            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
              <button type = "submit" class="btn btn-primary" id = "submit">บันทึก</button>
            </div>

          </div>
            </form>
          </div>
        </div>
      </div>



    <script>
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
    })
  </script>

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
