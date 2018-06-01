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
            <a role="button" class="btn btn-primary btn-lg" href="Edit_genogram.php">
            ย้อนกลับ <i class="fa fa fa-reply"></i>
            </a>
            </div> 
            <!--btn btn-secondary-->
         
          <!--</center>-->
              <br>
              
               <?
        $Name = $_GET['name'];
      include "config.php";
      $objConnect = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");
      $strSQL = "SELECT * From genogram WHERE name = '".$Name."' ";
      $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
      $result=mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

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
                            <form method="post" action="formUpdate_genogram.php">
        <div class="row" style="font-size:17px">
            <div class="form-group col-md-10">
                <input type="hidden" name="KeyID" value="<?php echo $result["key_no"];?>">
                
            <label for = "man"></label>เลือกประเภท : &nbsp;&nbsp;
            <input type = "radio" name ="fig" id = "t" <?php if (isset($result["fig"]) ) echo "checked";?> value = "1"/> เจ้าของผังเครือญาติ
            <label for = "Lady"></label>&nbsp;&nbsp;
            <input type = "radio" name ="fig" id = "f" <?php if (empty($result["fig"]) ) echo "checked";?> value = "0"/> สมาชิก
              </div>

          <div class="form-group col-md-10" >
          <label for = "man"></label>เพศ : &nbsp;&nbsp;
          <input type = "radio" name ="sex" id = "M" <?php if ($result["sex"] =="M") echo "checked";?> value = "M"/> ชาย
          <label for = "Lady"></label>&nbsp;&nbsp;
          <input type = "radio" name ="sex" id = "F" <?php if ($result["sex"] =="F") echo "checked";?> value = "F"/> หญิง
            </div>
          
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(':radio').click(function(){
               if($('#M').is(":checked")){
                   $( "#hus" ).prop( "disabled", true );
                   $( "#wif" ).prop( "disabled", false );
               }else if($('#F').is(":checked")){
                $( "#wif" ).prop( "disabled", true );
                $( "#hus" ).prop( "disabled", false );
               }
                
                
            });
        </script>
        
         
        
        <div class="row">
          <div class="form-group col-md-7 ">
            <label for="recipient-name" class="form-control-label">ชื่อ:</label>
            <input type = "text" class = "form-control" name= "name" value = "<?echo $result["name"];?>" >
          </div>
          <div class="form-group col-md-3">
            <label for="message-text" class="form-control-label">ปีที่เกิด :</label>
            
            <select class="form-control" name= "byear">
              <?php
              $myDate = $result['byear'];
              
              for($i=1918; $i<=2018 ;$i++){
                  
                $s='selected';
                
                echo "<option value=$i  > $i </option>";
                
                if ($myDate==$i){
                    echo "<option value=$i selected=$s > $i </option>";
                }
              }
              
              ?>
            </select>
            
          </div>

        </div>
        <p></p>

        <div class="row">
        <div class="form-group col-md-5">
          <?php
          include "config.php";
          $objConnect = mysqli_connect("$servername","$username","$password","$database") or die("Error Connect to Database");
        //   $strSQL = "SELECT * From genogram WHERE wife =''  AND husband ='' AND sex ='M' ";
            $strSQL = "SELECT * From genogram WHERE sex ='M' ";

          $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]")
          ?>
          <label for="message-text" class="form-control-label">สามี</label>
          
          <!--ค้นหาสามีจาก id -->
          <?php 
           $huspast = $result["husband"];
           include "config.php";
          $objConnectH = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");
          $strSQLH = "SELECT * From genogram WHERE key_no = '$huspast' ";
       
          $objQueryH = mysqli_query($objConnectH,$strSQLH) or die ("Error Query [".$strSQLH."]");
          $resultH=mysqli_fetch_array($objQueryH,MYSQLI_ASSOC);
          
          ?>
       
        <!--end หาสามี-->
        
          <select class="form-control" name= "vir" id="hus">
            <option value="<?php echo $resultH["key_no"];?>"><?php echo $resultH["name"];?></option>
               
          <?php
        mysqli_close($objConnectH);
        ?>
            <option value="0">(ไม่มี)</option>
            <?php
            while($objResult = mysqli_fetch_array($objQuery)){
            ?>
            <option value="<?php echo $objResult["key_no"];?>"><?php echo $objResult["name"];?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <?php
        mysqli_close($objConnect);
        ?>
        

        <div class="form-group col-md-2">
         <label>  </label>
         <p> </p>
        <!--<span class="badge badge-secondary">หรือ</span>-->
        <label for="recipient-name" class="form-control-label"></label>
        <button type="button" class="badge badge-secondary">หรือ</button>
        <!-- <input class="btn btn-primary" type="submit" value="หรือ"> -->

          </div>


        <div class="form-group col-md-5">
          <?php
          include "config.php";
          $objConnectW = mysqli_connect("$servername","$username","$password","$database") or die("Error Connect to Database");
          // $objDB = mysql_select_db("$dbname");
        //   $strSQLW = "SELECT * From genogram WHERE wife = '' AND husband ='' AND sex ='F' ";
         $strSQLW = "SELECT * From genogram WHERE sex ='F' ";
          $objQueryW = mysqli_query($objConnectW,$strSQLW) or die ("Error Query [".$strSQLW."]")
          ?>
          <label for="message-text" class="form-control-label">ภรรยา</label>
          
          <!--ค้นหา wife จาก id -->
          
          <?php 
           $wifepast = $result["wife"];
           include "config.php";
          $objConnectWi = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");
          $strSQLWi = "SELECT * From genogram WHERE key_no = '$wifepast' ";
       
          $objQueryWi = mysqli_query($objConnectWi,$strSQLWi) or die ("Error Query [".$strSQLWi."]");
          $resultWi=mysqli_fetch_array($objQueryWi,MYSQLI_ASSOC);
          
          ?>

          <select class="form-control" name= "ux" id="wif">
            <option value="<?php echo $resultWi["key_no"];?>"><?php echo $resultWi["name"];?></option>
        <?php
        mysqli_close($objConnectWi);
        ?>
         <!--end wife--> 
            <option value="0">(ไม่มี)</option>
            <?php
            while($objResultW = mysqli_fetch_array($objQueryW)){
            ?>
            <option value="<?php echo $objResultW["key_no"];?>"><?php echo $objResultW["name"];?></option>
            <?php
            } //end while
            ?>
          </select>
          
        </div>

        <?php
        mysqli_close($objConnectW);
        ?>

      </div>

        <p></p>
      <div class="row">
          <div class="form-group col-md-5">
            <?php
            include "config.php";
            $objConnect = mysqli_connect("$servername","$username","$password","$database") or die("Error Connect to Database");
            // $objDB = mysql_select_db("$dbname");
            // $strSQL = "SELECT * From genogram WHERE sex ='M' AND wife !='' ";
             $strSQL = "SELECT * From genogram WHERE sex ='M' ";
            $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]")
            ?>
            <label for="message-text" class="form-control-label">พ่อ</label>
            
            <!--ค้นหา father จาก id -->
          
          <?php 
           $fapast = $result["father"];
           include "config.php";
          $objConnectF = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");
          $strSQLF = "SELECT * From genogram WHERE key_no = '$fapast' ";
       
          $objQueryF = mysqli_query($objConnectF,$strSQLF) or die ("Error Query [".$strSQLF."]");
          $resultF=mysqli_fetch_array($objQueryF,MYSQLI_ASSOC);
          
          ?>
        
            <select class="form-control" name= "fater">
              <option value="<?php echo $resultF["key_no"];?>"><?php echo $resultF["name"];?></option>
    <?php
        mysqli_close($objConnectF);
        ?>
         <!--end  father -->
              <option value="0">(ไม่มี)</option>
              <?php
              while($objResult = mysqli_fetch_array($objQuery)){
              ?>
              <option value="<?php echo $objResult["key_no"];?>"><?php echo $objResult["name"];?></option>
              <?php
              }
              ?>
            </select>

          </div>
          <?php
          mysqli_close($objConnect);
          ?>

          <div class="form-group col-md-5">
            <?php
            include "config.php";
            $objConnect = mysqli_connect("$servername","$username","$password","$database") or die("Error Connect to Database");
            // $objDB = mysql_select_db("$dbname");
            // $strSQL = "SELECT * From genogram WHERE sex ='F' AND husband !='' ";
            $strSQL = "SELECT * From genogram WHERE sex ='F' ";
            $objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]")
            ?>
            <label for="message-text" class="form-control-label">แม่</label>
            
             <!--ค้นหา mom จาก id -->
          
          <?php 
           $Mompast = $result["mom"];
           include "config.php";
          $objConnectM = mysqli_connect($servername, $username, $password, $database)or die("Error Connect to Database");
          $strSQLM = "SELECT * From genogram WHERE key_no = '$Mompast' ";
       
          $objQueryM = mysqli_query($objConnectM,$strSQLM) or die ("Error Query [".$strSQLM."]");
          $resultM=mysqli_fetch_array($objQueryM,MYSQLI_ASSOC);
          
          ?>
          
            
            <select class="form-control" name= "mom">
              <option value="<?php echo $resultM["key_no"];?>"><?php echo $resultM["name"];?></option>
         <?php
        mysqli_close($objConnectM);
        ?>
         <!--end   mom -->      
              <option value="0">(ไม่มี)</option>
              <?php
              while($objResult = mysqli_fetch_array($objQuery)){
              ?>
              <option value="<?php echo $objResult["key_no"];?>"><?php echo $objResult["name"];?></option>
              <?php
              }
              ?>
            </select>

          </div>

        </div>

        <div class="row">


          </div>
          <p></p>
          <div class="row" style="font-size:17px">
          <div class="form-group col-md-10">
          <label ></label>เป็นโรคเบาหวานหรือไม่ ? : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type = "radio" name ="dia" <?php if (isset($result["diabetes"]) ) echo "checked";?> value = "1"/> เป็น
          <label ></label>&nbsp;&nbsp;
          <input type = "radio" name ="dia" <?php if (empty($result["diabetes"]) ) echo "checked";?>  value = "0"/> ไม่เป็น
            </div>

          </div> 

          <div class="row" style="font-size:17px">
          <div class="form-group col-md-10">
          <label ></label>เป็นโรคความดันหรือไม่ ? : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type = "radio" name ="hyper" id = "y" <?php if (isset($result["hyper"]) ) echo "checked";?> value = "1"/> เป็น
          <label ></label>&nbsp;&nbsp;
          <input type = "radio" name ="hyper" id = "n" <?php if (empty($result["hyper"]) ) echo "checked";?> value = "0"/> ไม่เป็น
            </div>

          </div>
        </div>


          <div class="modal-footer">
            <button type = "submit" class="btn btn-primary" id = "submit">บันทึก</button>
          </div>

        </form>
                            
        <?php
          mysqli_close($objConnect);
          ?>                     
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
    
     <?php
        mysqli_close($objConnect);
        ?>
    

    
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
