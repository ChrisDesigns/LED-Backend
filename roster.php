<?php
session_start();
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

$conn = mysql_connect($servername, $username, $password);
mysql_select_db($dbname);

if (!$conn) {
	die("Connection failed: " . mysql_connect_error());
}

if (empty($_SESSION["ID"]) && $_SESSION["ID"] != "0") {
	die("Please login in first.");
}
//TODO look through riders on route
//click to pickup/drop off
//if green-drop off and if red-pickup
$i = 0;
$DriverID = filter_var($_SESSION["ID"], FILTER_VALIDATE_INT);
$results = mysql_query("SELECT * FROM Client");
$resultsLimit = mysql_query("SELECT * FROM Rider WHERE IsRiding='1'");

echo "<h1>Rider(s):</h2>";
echo "<form action='basic.php' method='GET'>";
echo '<table>';
echo '<tr>';
echo '<th>Select Client</th>';
echo "<th>First Name</th>";
echo "<th>Last Name</th>";
echo '</tr>';
	$new_array = array();
	while($rowRiders = mysql_fetch_Assoc($resultsLimit)) {
		 $new_array[] = $rowRiders['ID'];
	}
	
	while($row = mysql_fetch_Assoc($results)) {
		if (in_array($row['ID'], $new_array))
		{
			echo '<tr>';
			echo "<td> <input type='checkbox' name='ID[" . $i . "]' value='" . $row['ID'] . "'/> </td>";
			echo "<td style='color: red;'>" . $row['FirstName'] . "</td>";
			echo "<td style='color: red;'>" . $row['LastName'] . "</td>";
			echo "</tr>";
		} else {
			echo '<tr>';
			echo "<td> <input type='checkbox' name='ID[" . $i . "]' value='" . $row['ID'] . "'/> </td>";
			echo "<td style='color: green;'>" . $row['FirstName'] . "</td>";
			echo "<td style='color: green;'>" . $row['LastName'] . "</td>";
			echo "</tr>";
		}
		$i++;
	}

echo "</table>";
echo "<input type='submit' value='Drop Off'>";
echo "</form>";
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=2, user-scalable=no">

<title>LED Transportation</title>

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

</head>

</html>