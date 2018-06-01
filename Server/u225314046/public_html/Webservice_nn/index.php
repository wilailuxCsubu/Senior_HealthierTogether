<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>เข้าสู่ระบบผู้ใช้งาน</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

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

    <div class="container">
        <div class="row" style="font-size:17px">
            <div class="col-md-4 col-md-offset-4" >
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title" style="font-size:22px">เข้าสู่ระบบ
                          <i class="fa fa-user-md fa-lg" aria-hidden="true"></i>
                        </h1>

                    </div>
                    <div class="panel-body">
                      <div class="form-group">
              <center><img src="img/logo2.png" width="210px" height="140px"></center>
          </div>
                        <form role="form" method="post"  action="form_login.php" >
                            <fieldset>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">ชื่อผู้ใช้งาน</label>
                                    <input class="form-control" placeholder="ใส่รหัสผู้ใช้งาน" name="userID" type="text" autofocus style="font-size:18px">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">รหัสผ่าน</label>
                                    <input class="form-control" placeholder="ใส่รหัสผ่าน" name="pw" type="password" style="font-size:18px">
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-primary btn-block " style="font-size:18px"> ยืนยัน</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
