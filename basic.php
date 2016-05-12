<?php
session_start();
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

date_default_timezone_set('America/New_York');
$conn = mysql_connect($servername, $username, $password);
mysql_select_db($dbname);

if (!$conn) {
	die("Connection failed: " . mysql_connect_error());
}
if (empty($_SESSION["ID"]) && $_SESSION["ID"] != "0") {
	die("Please login in first.");
}
$DriverID = filter_var($_SESSION["ID"], FILTER_VALIDATE_INT);
$ID = $_GET["ID"];
$time = time();

if (!empty($_GET["ID"]) || !empty($DriverID))
{
	if (isset($_GET["mil"])) 
	{
		$mile = filter_var($_GET["mil"], FILTER_VALIDATE_INT);
		foreach ($ID as $IDs => $value)
		{
			$value = filter_var($value, FILTER_VALIDATE_INT);
			$results = mysql_query("SELECT * FROM Rider WHERE ID='" . $value . "' ORDER BY StartTime DESC LIMIT 1");

			$PickUP = "";
			$OldRide = "";
			$OldStartMil = "";
			$OldDriverID = "";
			$OldStartTime = "";
			$OldID = "";
			$OldEndTime = "";
			$OldEndMil = "";
			
			while($row = mysql_fetch_Assoc($results)) {
				$PickUP = filter_var($row['IsRiding'], FILTER_VALIDATE_INT);
				$OldRide = $row['IsRiding'];
				$OldStartMil = $row['StartMil'];
				$OldDriverID = $row['DriverID'];
				$OldStartTime = $row['StartTime'];
				$OldID = $row['ID'];
				$OldEndTime = $row['EndTime'];
				$OldEndMil = $row['EndMil'];
			}
			
			if ($PickUP == "1")
			{
				echo "<center>Dropped off client.</center><br/>";
				mysql_query("UPDATE Rider SET EndMil ='" . $mile . "', IsRiding ='0', EndTime='" . $time . "' WHERE ID='" . $value . "'");
				header( "refresh:5;url=LaunchPad.php" );
				echo("<center>You are being redirect back in 5 seconds.</center></br>");
			
			} else if ($PickUP == "0") {
				
					mysql_query("INSERT INTO RiderHistory (IsRiding, StartMil, DriverID, StartTime, ID, EndTime, EndMil) VALUES ('$OldRide', '$OldStartMil', '$OldDriverID', '$OldStartMil', '$OldID', '$OldEndTime', '$OldEndMil') ");
					echo "<center>Picked-up client.</center><br/>";
					mysql_query("UPDATE Rider SET IsRiding = '1', StartMil = '$mile', DriverID = '$DriverID', StartTime = '$time', EndTime = '0', EndMil = '0' WHERE ID='" . $value . "'");
					header( "refresh:5;url=LaunchPad.php" );
					echo("<center>You are being redirect back in 5 seconds.</center></br>");
					
			} else if (empty($PickUP) && $PickUP != "0") {
				echo "<center>Picked-up client.</center><br/>";
				mysql_query("INSERT INTO Rider (IsRiding, StartMil, DriverID, StartTime, ID, EndTime, EndMil) VALUES ('1', '$mile', '$DriverID', '$time', '$ID[$IDs]', '0', '0') ");
				header( "refresh:5;url=LaunchPad.php" );
				echo("<center>You are being redirect back in 5 seconds.</center></br>");
			}
		}
	} else {
		echo "
			<form action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' method='GET'>
			<h2>Odometer Miles</h2>
			<input type='text' name='mil' required>
			";
		foreach ($ID as $IDs => $value)
		{
			echo "<input type='hidden' name='ID[" . $IDs . "]' value='" . $value . "'>";
		}
		echo "
			</br>
			<input type='submit' value='submit'>
		";
	
	}
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=2, user-scalable=no">

<title>LED Transportation</title>

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<style>

html {
	margin: auto;
	text-align: center;
}
input {
	padding: 10px;
	width: 50%;
	margin-bottom: 10px;
	display: inline-block;
}

</style>
</head>

</html>