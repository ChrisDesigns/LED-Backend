<?php
	$dbhost = "localhost";
	$dbuser = "";
	$dbpass = "";
	$dbname = "";
	
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	mysql_select_db($dbname);
	
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adding Driver</title>
</head>
<form action="addDriverSubmit.php" method="post">
	First Name: <input type="text" name="FirstName" required/><br />
	Last Name: <input type="text" name="LastName" required/><br />
    Username: <input type="text" name="Username" required/><br />
    Password: <input type="password" name="Password" required/><br />
    <button type="submit">Submit</button>
    </form>
<body>
</body>
</html>
