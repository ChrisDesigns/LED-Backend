<?php
session_start();
if (empty($_SESSION["ID"]) && $_SESSION["ID"] != "0") {
	die("Please login in first.");
}
	$dbhost = "localhost";
	$dbuser = "";
	$dbpass = "";
	$dbname = "";
	
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	mysql_select_db($dbname);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=2, user-scalable=no">
<title>LED Transportation</title>
</head>
<body>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

<br />

<FORM METHOD="LINK" ACTION="roster.php">
<INPUT TYPE="submit" VALUE="Pick Up/ Drop Off" style="width:100%; font-size:20px;">
</FORM>
<br />

<FORM METHOD="LINK" ACTION="qrgen.php">
<INPUT TYPE="submit" VALUE="QR Generator" style="width:100%; font-size:20px;">
</FORM>
<br />

<FORM METHOD="LINK" ACTION="newClient.html">
<INPUT TYPE="submit" VALUE="New Client" style="width:100%; font-size:20px;">
</FORM>
<br />

<FORM METHOD="LINK" ACTION="logout.php">
<INPUT TYPE="submit" VALUE="Logout" style="width:100%; font-size:20px;">
</FORM>

</body>
</html>
