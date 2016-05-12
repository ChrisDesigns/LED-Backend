<?php
session_start();

$_SESSION['FirstName'] = "";
$_SESSION['ID'] = "";

session_destroy();
header("Location: index.php");
exit();

?>