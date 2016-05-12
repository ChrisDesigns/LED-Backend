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
<title>LED Transportation</title>
</head>

<body>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$result = mysql_query("SELECT * FROM Driver WHERE Username ='$username' AND Password ='$password'") or die(mysql_error());
	
	if (mysql_num_rows($result) > 0)
	{
		//redirect here
		//$result = mysql_query("SELECT * FROM Driver WHERE Username ='$username'");
		$row = mysql_fetch_assoc($result);
		$_SESSION['FirstName'] = $row['FirstName'];
		$_SESSION['ID'] = $row['ID'];
		$ID = $row['ID'];
		$loginDate = date("U");
		mysql_query("INSERT INTO DriverHistory (ID, dateTime) VALUES ('$ID','$loginDate')");
		
		header('Location: Checklist.php');
	}
	else
	{
		header('Location: index.php');
	}
?>
</body>
</html>
