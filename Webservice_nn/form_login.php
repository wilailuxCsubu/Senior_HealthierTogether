<meta charset="utf-8">

<?php
session_start();
	include("config.php");

        if(isset($_POST['userID'])){
				//connection

									$con= mysqli_connect("$servername","$username","$password","$dbname") or die("Error: " . mysqli_error($con));
									mysqli_query($con, "SET NAMES 'utf8' ");
				//รับค่า user & password
                  $Username = $_POST['userID'];
                  $Password = $_POST['pw'];
				//query
                  $sql="SELECT * FROM authorities Where userID='".$Username."' and Pw ='".$Password."' ";

                  $result = mysqli_query($con,$sql);

                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

											if($objResult["userID"] == " ")
											{
												header("location:index.php");
											}
											else
											{
												header("location:home.php");
											}

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: form.php"); //user & password incorrect back to login again

        }
				mysql_close();
?>
