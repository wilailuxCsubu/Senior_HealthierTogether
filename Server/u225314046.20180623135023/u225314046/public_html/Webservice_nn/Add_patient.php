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
    <style> 
    
    .hide{
      display:none;  
    }
    
    </style>

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

           <? session_start();
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
                        <li ><a href="genogram.php?HN=<?php echo $HN ?>">ผังครอบครัว</a>
                        </li>
                        <li class="hide"><a href="#messages">รายงานผล</a>
                        </li>
                    </ul>

                  <br>  <br>
        <form role="form" method="post" action="formAdd_patient.php" enctype="multipart/form-data">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4>กรอกข้อมูลผู้ป่วย<h4>
                              </div><br>
                              <div class="panel-body">
                                  <div class="row" style="font-size:16px">
                                    <div class="col-lg-3">
                                    <center><img src="<?php echo $result["img"];?>" width="120px" height="120px" class="img-thumbnail">
                                    <p> </p>
                                    
                                    </center>
                                    </div>

                                      <div class="col-lg-9">
                                          
                                            <div class="row">
                                              <div class="form-group col-md-4" >
                                                  <label>รหัส HN</label>
                                                  <input name="HN" class="form-control" id="disabledInput" type="text"  placeholder="ใส่รหัส HN" >
                                              </div> 
                                              
                                            </div><br>
                                            <div class="row">
                                              <div class="form-group col-md-6">
                                                  <label>ชื่อผู้ใช้</label>
                                                  <input name="userName" class="form-control" placeholder="ตั้งชื่อผู้ใช้" >
                                              </div>
                                              <div class="form-group col-md-6">
                                                  <label>ตั้งรหัสผ่าน</label>
                                                  <input name="Pw" class="form-control" placeholder="ตั้งรหัสผ่านเริ่มต้น" >
                                              </div>
                                            </div><p></p>
                                            <div class="row">
                                              <div class="form-group col-md-6">
                                                  <label>ชื่อ</label>
                                                  <input name="name" class="form-control" placeholder="ใส่ชื่อ" >
                                              </div>
                                              <div class="form-group col-md-6">
                                                  <label>นาสกุล</label>
                                                  <input name="last" class="form-control" placeholder="ใส่นามสกุล" >
                                              </div>
                                            </div>
                                            
                                             <div class="form-group col-md-10">
                                              <label for = "man"></label>เพศ : &nbsp;&nbsp;
                                              <input type = "radio" name ="sex" id = "M" value = "M"/> ชาย
                                              <label for = "Lady"></label>&nbsp;&nbsp;
                                              <input type = "radio" name ="sex" id = "F" value = "F"/> หญิง
                                              </div>
                                            
                                            <div class="row">
                                              <div class="form-group col-md-3">
                                                  <label>อายุ</label>
                                                  <select class="form-control" name= "age">
                                                      <option value="">(เลือก)</option>
                                                      <?php
                                                      for($i=20; $i<=120 ;$i++){
                                                          echo "<option value=$i>$i</option>";
                                                      }
                                                      ?>
                                                    </select>
                                              </div>

                                            </div>
                                        
                                              <div class="form-group">
                                                  <label>ที่อยู่</label>
                                                  <textarea name="address" class="form-control" rows="3" placeholder="ใส่ที่อยู่"></textarea>
                                              </div><br>
                                              
                                              
                                               <div class="row">
                                              <div class="form-group col-md-8">
                                                  <label>สถานบริการที่เข้ารับการรักษา</label>
                                                  <input name="place" class="form-control" placeholder="ตั้งชื่อผู้ใช้" >
                                              </div>
                                             
                                            </div><p></p>

                                              <div class="form-group">
                                                  <label>สถานภาพ :</label> &nbsp;&nbsp;&nbsp;
                                                  <label class="radio-inline">
                                                      <input type="radio" name="status" id="optionsRadiosInline1" value="โสด"  >โสด
                                                  </label>
                                                  <label class="radio-inline">
                                                      <input type="radio" name="status" id="optionsRadiosInline2" value="คู่">คู่
                                                  </label>
                                                  <label class="radio-inline">
                                                      <input type="radio" name="status" id="optionsRadiosInline2" value="หย่าร้าง">หย่าร้าง
                                                  </label>
                                                  <label class="radio-inline">
                                                     <input type="radio" name="status" id="optionsRadiosInline2" value="หม้าย" >หม้าย
                                                  </label>
                                                  <label class="radio-inline">
                                                     <!--<input name="status" class="form-control" placeholder="อื่นๆ . . . ." <?php if ($result["status"] !="โสด" && $result["status"] !="คู่" && $result["status"] !="หย่า" && $result["status"] !="หม้าย" ) echo ' value=" '.$result["status"].' " ' ;?> >-->

                                                  </label>
                                              </div><br>
                                              <div class="form-group">
                                                  <label>อาชีพ :</label> &nbsp;&nbsp;&nbsp;
                                                  <label class="radio-inline">
                                                      <input type="radio" name="occupation" id="optionsRadiosInline1" value="ทำนา" >ทำนา
                                                  </label>
                                                  <label class="radio-inline">
                                                      <input type="radio" name="occupation" id="optionsRadiosInline2" value="ค้าขาย" >ค้าขาย
                                                  </label>
                                                  <label class="radio-inline">
                                                      <input type="radio" name="occupation" id="optionsRadiosInline3" value="รับจ้าง" >รับจ้าง
                                                  </label>
                                                  <label class="radio-inline">
                                                      <input type="radio" name="occupation" id="optionsRadiosInline3" value="รับราชการ" >รับราชการ
                                                  </label>
                                                  <label class="radio-inline">
                                                    <!--<input name="occupation" class="form-control" placeholder="อื่นๆ . . . ." <?php if ($result["occupation"] !="ทำนา" && $result["occupation"] !="ค้าขาย" && $result["occupation"] !="รับจ้าง" && $result["occupation"] !="รับราชการ" ) echo ' value=" '.$result["occupation"].' " ' ;?> >-->

                                                  </label>
                                              </div><br>
                                              <div class="form-group">
                                                  <label>สิทธิการรักษา :</label>
                                                  <div class="radio">
                                                      <label>
                                                          <input type="radio" name="treatment"  value="ประกันสุขภาพถ้วนหน้า" >ประกันสุขภาพถ้วนหน้า
                                                      </label>
                                                  </div>
                                                  <div class="radio">
                                                      <label>
                                                          <input type="radio" name="treatment"  value="จ่ายตรง"> จ่ายตรง
                                                      </label>
                                                  </div>
                                                  <div class="radio">
                                                      <label>
                                                          <input type="radio" name="treatment"  value="ประกันสังคม"   >ประกันสังคม
                                                      </label>
                                                  </div>
                                                  <div class="radio">
                                                      <label>
                                                          <input type="radio" name="treatment"  value="ต่างด้าว" >ต่างด้าว
                                                      </label>

                                                  </div>
                                                  <label class="radio-inline">
                                                    <!--<input name="treatment" class="form-control" placeholder="อื่นๆ . . . ." <?php if ($result["treatment"] !="บัตรประกันสุขภาพถ้วนหน้า" && $result["treatment"] !="จ่ายตรง" && $result["treatment"] !="บัตรประกันสังคม" && $result["treatment"] !="ต่างด้าว" ) echo ' value=" '.$result["treatment"].' " ' ;?> >-->
                                                  </label>
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label>โรคประจำตัว</label>
                                                  <textarea name="disease" class="form-control" rows="3" placeholder="ระบุโรคประจำตัว (หากมีหลายโรคให้ระบุ ',' คั่น)"></textarea>
                                              </div><br>
                                              
                                         <div class="row">
                                             <p><a target ="_blank" href= "https://www.google.co.th/maps/" ><img src="https://png.icons8.com/color/50/000000/google-maps.png"> เลือกตำแหน่งที่ตั้งจาก Google Map   </a></p> 

                                              <div class="form-group col-md-6">
                                                  <label>ละติจูด</label>
                                                  <input name="lat" class="form-control" placeholder="" >
                                              </div>
                                              <div class="form-group col-md-6">
                                                  <label>ลองจิจูด</label>
                                                  <input name="long" class="form-control" placeholder="" >
                                              </div>
                                            </div>
                                              
                                              <div class="form-group">
            <?php
            include "config.php";
            $objConnect = mysqli_connect("$servername","$username","$password","$database") or die("Error Connect to Database");
            
            $strSQL = "SELECT CONCAT(Name,' ',Last) AS name_p,userID From authorities ";
            $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]")
            ?>
            <label for="message-text" class="form-control-label">เลือกผู้ดูแล</label>
            <select class="form-control" name= "userID">
                <option value="">(เลือก)</option>
              <?php
              while($objResult = mysqli_fetch_array($objQuery)){
              ?>
              <option value="<?php echo $objResult["userID"];?>"><?php echo $objResult["name_p"];?></option>
              <?php
              }
              ?>
            </select>

                                             </div>
                                             
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
    <?php
        mysqli_close($objConnect);
        ?>


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
