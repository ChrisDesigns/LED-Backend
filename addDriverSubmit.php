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

<body>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<?php
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	date_default_timezone_set('America/New_York');
	$dateOnly = date("Y-m-d");
	$timeOnly = date("G:i a)");
	$date = date("D M d, Y G:i a");
	//$date2 = date("U");
	$date2  = 1444391400;
	$date3 = gmdate("D M d, Y G:i a", $date2);
	
	mysql_query("INSERT INTO Driver ( 
	FirstName, LastName, IsActive, Username, Password) VALUES ('$FirstName',
'$LastName', 'True', '$Username', '$Password')");

	$result = mysql_query("SELECT * FROM Driver WHERE Username ='$Username'") or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	if (mysql_num_rows($result) > 0)
	{
	$id = $row['ID'];
	}
	
	echo $now . '<br />';
	echo $FirstName . '<br />';
	echo $LastName . '<br />';
	echo $Username . '<br />';
	echo $Password . '<br />';
	//echo $other . '<br />';
	//echo $date . '<br />';
	echo $date2 . '<br />';
	echo $date3 . '<br />';
	//echo $time;
?>
</body>
</html>
