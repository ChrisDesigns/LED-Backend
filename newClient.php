<?php
session_start();
$fn = filter_var($_POST["fn"], FILTER_SANITIZE_STRING);
$ln = filter_var($_POST["ln"], FILTER_SANITIZE_STRING);
$MedNum = filter_var($_POST["MedNum"], FILTER_VALIDATE_INT);
$ContNum = filter_var($_POST["ContNum"], FILTER_SANITIZE_STRING);
$ContFN = filter_var($_POST["ContFN"], FILTER_SANITIZE_STRING);
$ContLN = filter_var($_POST["ContLN"], FILTER_SANITIZE_STRING);
$Add = filter_var($_POST["Add"], FILTER_SANITIZE_STRING);
$City = filter_var($_POST["City"], FILTER_SANITIZE_STRING);
$State = filter_var($_POST["State"], FILTER_SANITIZE_STRING);
$Zip = filter_var($_POST["Zip"], FILTER_VALIDATE_INT);

$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

$conn = mysql_connect($servername, $username, $password);
mysql_select_db($dbname);

if (!$conn) {
	die("Connection failed: " . mysql_connect_error());
}

$create = mysql_query("INSERT INTO Client (FirstName, LastName, MedicareNum, ContactNum, ContactFirstName, ContactLastName, Address, City, State, Zipcode) VALUES ('$fn', '$ln', '$MedNum', '$ContNum', '$ContFN', '$ContLN', '$Add', '$City', '$State', '$Zip')");
if ($create)
{
	echo "<h1>Client Created</h1>";

	echo "First Name: " . $fn . "<br/>";
	echo "Last Name: " . $ln . "<br/>";
	echo "Medicare Number: " . $MedNum . "<br/>";
	echo "Contact Number: " . $ContNum . "<br/>";
	echo "Contact First Name: " . $ContFN . "<br/>";
	echo "Contact Last Name: " . $ContLN . "<br/>";
	echo "Address: " . $Add . " " . $City .  ", " . $State . " " . $Zip . "<br/>";
}
?>