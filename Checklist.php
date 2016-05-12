<?PHP

$dbhost = "localhost";
$dbuser = "";
$dbpass = "";
$dbname = "";


$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die	('Error connecting to mysql');
mysql_select_db($dbname);

session_start();
if (empty($_SESSION["ID"]) && $_SESSION["ID"] != "0") {
	die("Please login in first.");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no">
<title>LED Transportation</title>
<script type="text/javascript">

function validate() 
	{
		var flag = 0;
		for (var i = 0; i< 9; i++) 
		{
			if(document.submitForm["Boop[]"][i].checked)
			{
			flag++;
			}
		}
		
		
		
		//if (!document.getElementById('mystring').value)
//		{
//			alert ("You must enter mileage.");
//		}
//		else
//		{
//			flag++;
//		}
		
//		var car = document.getElementById("cartype");
// 		var selectedValue = car.options[car.selectedIndex].value;
//    	if (selectedValue != "ID----")
//		{
//		flag++;
//		}
//		else
//		{
//			alert ("You must select car.");
//		}


		if (flag >= 0)
		{
			document.submitForm.submit();
		}
		else
		{
			alert ("You must check all areas.");
		}
	}

</script>
</head>

<body>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

 <form method="post" action="LaunchPad.php" id="submitForm" name="submitForm">
 <?php
$Name = $_SESSION['FirstName'];

echo '<p style="font-size:100px; margin:0px;">Driver: ' . $Name . '</p>';
?>
 <br><br />

 <p style="font-size:100px; margin:0px;">Vehicle: <select name="cars" id="cartype" style="font-size:70px;" required>
 <option value="ID----">---</option>
 <option value="ID-001">001</option>
 <option value="ID-002">002</option>
 <option value="ID-003">003</option>
 <option value="ID-004">004</option>
 <option value="ID-005">005</option>
 <option value="ID-006">006</option>
 <option value="ID-008">008</option>
 </select>
 <br />
 Mileage: 
 <input id="mileage" type="text" name="mileage" value="" style="-webkit-transform: scale(5); transform: scale(5); vertical-align:middle; margin-left:210px; width:100px;" required>
 <br><br />

 <input id="GO" type="checkbox" name="Boop[]" value="1" style="-webkit-transform: scale(5); transform: scale(5); vertical-align:middle; margin:30px;" required>Lights</input>
 <br>
 <input id="GO" type="checkbox" name="Boop[]" value="2" style="-webkit-transform: scale(5); transform: scale(5); vertical-align:middle; margin:30px;" required>Mirrors</input>
 <br >
 <input id="GO" type="checkbox" name="Boop[]" value="3" style="-webkit-transform: scale(5); transform: scale(5); vertical-align:middle; margin:30px;" required>First Aid Kit</input>
 <br>
 <input id="GO" type="checkbox" name="Boop[]" value="4" style="-webkit-transform: scale(5); transform: scale(5); vertical-align:middle; margin:30px;" required>Tires/Brakes</input>
 <br >
 <input id="GO" type="checkbox" name="Boop[]" value="5" style="-webkit-transform: scale(5); transform: scale(5); vertical-align:middle; margin:30px;" required>Glass</input>
 <br>
 <input id="GO" type="checkbox" name="Boop[]" value="6" style="-webkit-transform: scale(5); transform: scale(5); vertical-align:middle; margin:30px;" required>Oil </input>
 <br >
 <input id="GO" type="checkbox" name="Boop[]" value="7" style="-webkit-transform: scale(5); transform: scale(5); vertical-align:middle; margin:30px;" required>Fire Ex</input>
 <br>
 <input id="GO" type="checkbox" name="Boop[]" value="8" style="-webkit-transform: scale(5); transform: scale(5); vertical-align:middle; margin:30px;" required>Wipers/Horn </input>
 <br><br />

  Comments<br />
 <textarea style="font-size:50px;" name="Comments" rows="5" cols="25">
 </textarea>
 <br><br>

 <input id="GO" type="checkbox" name="Boop[]" value="Sign" style="-webkit-transform: scale(5); transform: scale(5); vertical-align:middle; margin:30px;" required>Signature</input>

 <br><br>
 <input type="button" value="submit" name="submitForm" onclick="validate()" style="font-size:100px; margin:0px; padding:0px;"></input>
</p>

 <?php
 $ID = $_SESSION['ID'];
 $date = date("U");
 if(isset($_POST['submitForm']))
 {
 mysql_query("INSERT INTO CarHistory ( 
	ID, dateTime, Mileage) VALUES ('$ID', '$date', '$id')");
 }
 ?>
 
</form> 

</body>
</html>