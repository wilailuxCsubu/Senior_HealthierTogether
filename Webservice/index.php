<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>เข้าสู่ระบบผู้ใช้งาน</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container" >
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" >เข้าสู่ระบบ
      <i class="fa fa-user-md fa-lg" aria-hidden="true"></i>
      </div>

      <div class="card-body">
        <form method="post"  action="form_login.php">
          <div class="form-group">
              <center><img src="../img/logo2.png" width="210px" height="140px"></center>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">รหัสผู้ใช้งาน</label>
            <input name="userID" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="ใส่รหัสผู้ใช้งาน...">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">รหัสผ่าน</label>
            <input name="pw" class="form-control" id="exampleInputPassword1" type="password" placeholder="รหัสผ่าน...">
          </div><br>
          <button type="submit" class="btn btn-primary btn-block ">ยืนยัน</button>
        </form>

      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
