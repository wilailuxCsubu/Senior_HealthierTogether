<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Healthier Together</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html" style="font-size:25px">Healthier Together</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion"><br>
        <div class="testimonial-image">
          <center><img src="./img/profile/user10.png" width="100px" height="100px"></center>
        </div>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.html">
            <center><span class="nav-link-text">นางวิไลลักษณ์  แหวนเงิน</span></center>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home" style="font-size:18px">
          <a class="nav-link" href="index.php">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span class="nav-link-text">หน้าแรก</span>
          </a>
        </li>


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components" style="font-size:18px">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-gears"></i>
            <span class="nav-link-text">การจัดการ</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="patient.php">ผู้ป่วย</a>
            </li>
            <li>
              <a href="authorities.php">บุคลาการทางการแพทย์</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts" style="font-size:18px">
          <a class="nav-link" href="mysick.php">
            <i class="fa fa-street-view"></i>
            <span class="nav-link-text">แผนที่รายงานกลุ่มเสี่ยง</span>
          </a>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>ออกจากระบบ</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">หน้าแรก</a>
          <li class="breadcrumb-item active">ผู้ป่วย</li>
        </li>

      </ol>

      <?php
      include "config.php";
      $objConnect = mysql_connect("$servername","$username","$password") or die("Error Connect to Database");
      $objDB = mysql_select_db("$dbname");
      $strSQL = "SELECT patient.HN,CONCAT(patient.Name,' ',patient.Last) AS name_p,
                patient.age,CONCAT(authorities.Name,' ',authorities.Last) AS name_a,
                assessment.result,MAX(assessment.date) AS date_n From patient
                INNER JOIN authorities ON patient.userID = authorities.userID
                INNER JOIN assessment ON  patient.HN = assessment.HN GROUP BY name_p ORDER BY date_n DESC";
      $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]")

      ?>

          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i>  รายชื่อผู้ป่วย</div>
            <div class="card-body">
              <div class="table-responsive">
                  <form action="profile_p.php" method="post">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ชื่อ</th>
                      <th>อายุ</th>
                      <th>ผู้รับผิดชอบ</th>
                      <th>ผลการประเมิน</th>
                      <th>ว/ด/ป เยี่ยมล่าสุด</th>
                      <!-- <th>จัดการ</th> -->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ชื่อ</th>
                      <th>อายุ</th>
                      <th>ผู้รับผิดชอบ</th>
                      <th>ผลการประเมิน</th>
                      <th>ว/ด/ป เยี่ยมล่าสุด</th>
                      <!-- <th>จัดการ</th> -->
                    </tr>
                  </tfoot>

                  <?php
                  while($objResult = mysql_fetch_array($objQuery)){
                  ?>

                  <tbody>
                    <tr >
                      <td><input name="name" onclick="myFunction()" class="btn btn-outline-info" type="submit" value="<?php echo $objResult["name_p"];?>"></td>
                      <td><?php echo $objResult["age"];?></td>
                      <td><?php echo $objResult["name_a"];?></td>
                      <td><?php echo $objResult["result"];?></td>
                      <td><?php echo $objResult["date_n"];?></td>
                    </tr>

                  </tbody>
                  <?php
                  }
                  ?>
                </table>
              </form>
                <?php
                mysql_close($objConnect);
                ?>
              </div>
            </div>
          </div>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>




  </div>
</body>

</html>
