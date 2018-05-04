<?php
	session_start();
	mysql_connect("localhost","root","");
	mysql_select_db("dbtest2");
	$strSQL = "SELECT * FROM restaurant WHERE RUsername = '".mysql_real_escape_string($_POST['txtUsername'])."' 
	and Rpasswords = '".mysql_real_escape_string($_POST['txtPassword'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["IDRestaurant"] = $objResult["IDRestaurant"];
			
				header("location:C:\xampp\htdocs\udondelivery3\_protected\frontend\views\site\index.php");
			
	}
	mysql_close();
?>