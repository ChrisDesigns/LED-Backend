<?php
	$dbhost = "localhost";
	$dbuser = "";
	$dbpass = "";
	$dbname = "";
	
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	mysql_select_db($dbname);
	
	session_start();
	if ($_SERVER['REQUEST_METHOD'] === 'GET'){
		$id = $_GET['id'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=2, user-scalable=no">
<title>LED Transportation</title>

<style>
html {
	margin: auto;
	text-align: center;
}
</style>
</head>

<body>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<?php
	/*no get data*/
	if ($id == "" || $conn == "")
	{
	echo '<form action="Validation.php" method="post">
    Username: <input type="text" name="username" /><br />
    Password: <input type="password" name="password" /><br />
    <button type="submit">Submit</button>
    </form>
    <br/>';
	}
	/*has get data and a connection*/
	else
	{
	$result = mysql_query("SELECT * FROM Driver WHERE ID ='$id'") or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	if (mysql_num_rows($result) > 0)
		{
		$username = $row['Username'];
		echo '<form action="Validation.php" method="post">
		Username: <input type="text" name="username" value="'. $username . '"/><br />
		Password: <input type="password" name="password" /><br />
		<button type="submit">Submit</button>
		</form>
		<br/>';
		}
	}
	
	$result = mysql_query("SELECT * FROM DriverHistory WHERE ID ='$id' ORDER BY dateTime DESC limit 1") or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	if (mysql_num_rows($result) > 0)
		{
		$date = Date($row['dateTime']);
		}
		
    //$date = Date($row['dateTime']);
//	$CurrDate = date("Y-m-d");

//	echo $date;
//	echo $CurrDate;
	
	/*has session data and get data*/
	//&& $date == $CurrDate
	if (isset($_SESSION['ID']))
	{
		header("Location: LaunchPad.php");
	}
	
	?>
</body>
</html>