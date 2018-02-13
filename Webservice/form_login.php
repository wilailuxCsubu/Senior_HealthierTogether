<meta charset="utf-8">
<?php
// session_start();
include "config.php";

// Thank you code by http://www.thaicreate.com/community/php-mysql-login-form-check-username-password.htm
	mysql_connect("$servername","$username","$password");
	mysql_select_db("$dbname");
	$strSQL = "SELECT * FROM authorities WHERE userID = '".mysql_real_escape_string($_POST['userID'])."'
	and Pw = '".mysql_real_escape_string($_POST['pw'])."'";
	$result = mysql_query($strSQL);
	$objResult = mysql_fetch_array($result) or die(mysql_error());
	if(!$objResult)
	{
    echo "<script>";
    echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
	}
	else
	{
			// $_SESSION["Name"] = $objResult["Name"];
      // $_SESSION["userID"] = $objResult["userID"];
      //
			// session_write_close();

			if($objResult["userID"] == " ")
			{
				header("location:index.php");
			}
			else
			{
				header("location:Home.php");
			}
	}
	mysql_close();

?>
