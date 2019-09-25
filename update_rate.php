<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<title>set rates for parking</title>
<meta charset=="utf-8"/><script type="text/javascript" src="javascripts/chkrate.js">
</script>
</head>
<?php
	include("file protection.php");
?>
<body>
<?php
if(isset($_POST['add']))
{
	if(! get_magic_quotes_gpc() )
		{
			$Heavy_vehicles = addslashes ($_POST['Heavy_rate']);
			$Light_vehicles = addslashes ($_POST['Light_rate']);
			$Two_wheelers = addslashes ($_POST['Two_wheelers_rate']);
			$Helmets_count = addslashes ($_POST['Helmet_rate']);
		}
		else
		{
			$Heavy_vehicles = $_POST['Heavy_rate'];
			$Light_vehicles = $_POST['Light_rate'];
			$Two_wheelers = $_POST['Two_wheelers_rate'];
			$Helmets_count = $_POST['Helmet_rate'];
		}
	if (preg_match("/[^0-9]/", $Heavy_vehicles, $match))
	echo ("<script language='javascript'>
		window.alert('sorry failed to enter heavy vehicle rate into database')
		window.alert('Invalid input found.Inputs should only be integer')
		window.location.href='everyone.php?tag=Rates_Entry'
		</script>");
	elseif (preg_match("/[^0-9]/", $Light_vehicles, $match)) 
	echo ("<script language='javascript'>
		window.alert('sorry failed to enter light vehicle rate into database')
		window.alert('Invalid input found.Inputs should only be integer')
		window.location.href='everyone.php?tag=Rates_Entry'
		</script>");
	elseif  (preg_match("/[^0-9]/", $Two_wheelers, $match)) 
	echo ("<script language='javascript'>
		window.alert('sorry failed to enter two wheelers rate into database')
		window.alert('Invalid input found.Inputs should only be integer')
		window.location.href='everyone.php?tag=Rates_Entry'
		</script>");
	elseif (preg_match("/[^0-9]/", $Helmets_count, $match)) 
	echo ("<script language='javascript'>
		window.alert('sorry failed to enter Helmets rate into database')
		window.alert('Invalid input found.Inputs should only be integer')
		window.location.href='everyone.php?tag=Rates_Entry'
		</script>");
	else
	{
		$sql ="UPDATE `parking_rates` SET `Heavy_rate`='$Heavy_vehicles',`Light_rate`='$Light_vehicles',
		`Two_wheelers_rate`='$Two_wheelers',`Helmet_rate`='$Helmets_count'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		echo ("<script language='javascript'>
			window.alert('Updated successfully')
			window.location.href='everyone.php'
			</script>");
	}
	mysql_close($conn);
}else
{
?>
<body><center>

<legend><h2>Set Wage for parking(HOURLY)</h2></legend><br>
<form id = "rate" form method = "post" action = "<?php $_PHP_SELF ?>">
<table width = "400" border = "0" cellspacing = "1"
cellpadding = "2">
<tr>
<td width = "100">For Heavy_vehicles</td>
<td><input name = "Heavy_rate" type = "int"
id = "Heavy_rate"></td>
</tr>
<tr>
<td width = "100">For Light_vehicles</td>
<td><input name = "Light_rate" type = "int"
id = "Light_rate"></td>
</tr>
<tr>
<td width = "100">For Two_wheelers no</td>
<td><input name="Two_wheelers_rate" type="int" id = "Two_wheelers_rate"></td>
</tr>
<tr>
<td width = "100">For Helmets</td>
<td><input name="Helmet_rate" type="int" id = "Helmet_rate"></td>
</tr>
<tr>
<td width = "100"> </td>
<td> </td>
</tr>
<tr>
<th>&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" /></td></td>
<td>&nbsp;&nbsp;<input name = "add" type = "submit" id = "add" value = "Update Rates"></td>
</tr>
</table>
</form>
<?php
}
?><script type="text/javascript" src="javascripts/ratechkr.js">
</script>
</body>
</html>
