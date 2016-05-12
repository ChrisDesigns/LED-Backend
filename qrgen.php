<?php
	session_start();
	$servername = "localhost";
	$username = "";
	$password = "";
	$dbname = "";

	$conn = mysql_connect($servername, $username, $password);
	mysql_select_db($dbname);

	//$url = "http://" . $_SERVER['HTTP_HOST'] . "/LED/basic.php";
	$url = "http://" . $_SERVER['HTTP_HOST'] . "/PSD/Lenart/LED/basic.php";
	
	if (!$conn) {
		die("Connection failed: " . mysql_connect_error());
	}
		
	if (empty($_SESSION["ID"]) && $_SESSION["ID"] != "0") {
		die("Please login in first.");
	}
	
	if(isset($_GET['ID'])) 
	{
		$ID = filter_var($_GET["ID"], FILTER_VALIDATE_INT);
		
		$result = mysql_query("SELECT * FROM Client WHERE ID ='" . $ID . "'");
		
		$FullName = "";
		
		while($row = mysql_fetch_Assoc($result)) {
			$FullName = $row['FirstName'] . " " . $row['LastName'];
		}
		
		$API= "https://chart.googleapis.com/chart?chs=360x360&cht=qr&chl=". $url ."?ID[0]=" . $ID . "";

		echo "<center><img id='QRCode' src='" . $API . "'></center>";
		echo "<center><h1>" . $FullName . "</h1></center>";
	} else {
		
		echo "<form action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' method='GET'>";
		echo '<table>';
		echo '<tr>';
		echo "<th>Select Client</th>";
		echo "<th>First Name</th>";
		echo "<th>Last Name</th>";
		echo "<th>ID</th>";
		echo '</tr>';
		
		$result = mysql_query("SELECT * FROM Client");
		
		while($row = mysql_fetch_Assoc($result)) {
			echo "<tr>";
			echo "<td> <input type='radio' name='ID' value='" . $row['ID'] . "'/> </td>";
			echo "<td>" . $row['FirstName'] . "</td>";
			echo "<td>" . $row['LastName'] . "</td>";
			echo "<td>" . $row['ID'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<input type='submit' value='Generate QR Code'>";
		echo "</form>";

	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=2, user-scalable=no">

<title>LED Transportation</title>

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

</head>

</html>