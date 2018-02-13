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
          <center><img src="img/profile/user10.png" width="100px" height="100px"></center>
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
              <a href="cards.html">บุคลาการทางการแพทย์</a>
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
          <li class="breadcrumb-item active"><a href="patient.php">ผู้ป่วย</a></li>
            <li class="breadcrumb-item active">ข้อมูลส่วนตัว</li>
        </li>

      </ol>
      <br>


      <ul class="nav nav-tabs" style="font-size:20px">
          <li class="nav-item">
            <a class="nav-link active" href="profile_p.php">ข้อมูลประวัต</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="genogram.php">ผังครอบครัว</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">รายงานผล</a>
          </li>

        </ul>

        <br>  <br>
      <!-- Icon Cards-->
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-sm-12 mb-3">
          <div class="card mb-3">
            <div class="card-body">
              <img class="card-img-top img-fluid w-100" src="../img/h1.jpg" alt="">
            </div>
          </div>
        </div>

        <div class="col-xl-9 col-sm-12 mb-3">
          <form>
            <div class="form-row">
              <div class="form-group col-md-4">
                <h5><label for="inputEmail4">รหัส HN </label></h5>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
              </div>
              <div class="form-group col-md-3">
                <h5><label for="inputEmail4">อายุ </label></h5>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
              </div>

            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <h5><label for="inputEmail4">ชื่อ</label></h5>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
              </div>
              <div class="form-group col-md-6">
                <h5><label for="inputPassword4">นามสกุล</label></h5>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <h5><label for="inputAddress">ที่อยู่</label><h5>
              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>


            <h5><div class="form-row">
              <div class="form-group col-md-2">
                <label for="inputEmail4">สถานภาพ :</label>
              </div>
              <div class="form-group col-md-1">
                <label class="checkbox-inline">
                   <input type="checkbox" value=""> โสด
                 </label>
              </div>
              <div class="form-group col-md-1">
                <label class="checkbox-inline">
                  <input type="checkbox" value=""> คู่
                </label>
              </div>
              <div class="form-group col-md-1">
                <label class="checkbox-inline">
                  <input type="checkbox" value=""> หย่า
                </label>
              </div>
              <div class="form-group col-md-2">
                <label class="checkbox-inline">
                  <input type="checkbox" value=""> หม้าย
                </label>
              </div>
              <div class="form-group col-md-2">
                <input type="email" class="form-control" id="inputEmail4" placeholder="อื่น....">
              </div>
            </div></h5>

            <h5><div class="form-row">
              <div class="form-group col-md-2">
                <label for="inputEmail4">อาชีพ :</label>
              </div>
              <div class="form-group col-md-2">
                <label class="checkbox-inline">
                   <input type="checkbox" value=""> ทำนา
                 </label>
              </div>
              <div class="form-group col-md-2">
                <label class="checkbox-inline">
                  <input type="checkbox" value=""> ค้าขาย
                </label>
              </div>
              <div class="form-group col-md-2">
                <label class="checkbox-inline">
                  <input type="checkbox" value=""> รับจ้าง
                </label>
              </div>
              <div class="form-group col-md-2">
                <label class="checkbox-inline">
                  <input type="checkbox" value=""> รับราชการ
                </label>
              </div>
              <div class="form-group col-md-2">
                <input type="email" class="form-control" id="inputEmail4" placeholder="อื่น....">
              </div>
            </div></h5>

            <h5><div class="form-row">
              <div class="form-group col-md-3.5">
                <label for="inputEmail4">สิทธิการรักษา :</label>
                <label class="checkbox-inline">
                  <input type="checkbox" value=""> บัตรประกันสุขภาพถ้วนหน้า <br>
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value=""> จ่ายตรง<br>
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value=""> บัตรประกันสังคม<br>
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value=""> ต่างด้าว<br>
                </label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="อื่น....">
              </div>


              </div>
            </div></h5>

            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Check me out
                </label>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Sign in</button>
          </form>
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

    <!-- <?php
    $n = $_POST["name"];

    echo "<script>";
    echo "alert(\" $n\");";
    echo "</script>";

    ?> -->


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
