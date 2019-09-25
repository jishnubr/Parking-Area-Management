<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<title>set limits of vehicles</title>
<meta charset=="utf-8"/>
<script type="text/javascript" src="javascripts/chkmax.js">
</script>
</head>
<?php
	include("file protection.php");
if(isset($_POST['add']))
{?>
	<center>
	Please wait <br>Parking area management system is writing data into database.
<?php
	if(! get_magic_quotes_gpc() )
	{
		$Heavy_vehicles = addslashes ($_POST['Heavy_vehicles']);
		$Light_vehicles = addslashes ($_POST['Light_vehicles']);
		$Two_wheelers = addslashes ($_POST['Two_wheelers']);
		$Helmets_count = addslashes ($_POST['Helmets_count']);
	}
	else
	{
		$Heavy_vehicles = $_POST['Heavy_vehicles'];
		$Light_vehicles = $_POST['Light_vehicles'];
		$Two_wheelers = $_POST['Two_wheelers'];
		$Helmets_count = $_POST['Helmets_count'];
	}
	if (preg_match("/[^0-9]/", $Heavy_vehicles, $match))
	echo ("<script language='javascript'>
		window.alert('Invalid Heavy vehicles rate.Input should only be integer')
		window.location.href='add_max_value.php'
		</script>");
	elseif (preg_match("/[^0-9]/", $Light_vehicles, $match)) 
	echo ("<script language='javascript'>
		window.alert('Invalid Light vehicles rate.Input should only be integer')
		window.location.href='add_max_value.php'
		</script>");
	elseif  (preg_match("/[^0-9]/", $Two_wheelers, $match)) 
	echo ("<script language='javascript'>
		window.alert('Invalid Two wheelers rate .Input should only be integer')
		window.location.href='add_max_value.php'
		</script>");
	elseif (preg_match("/[^0-9]/", $Helmets_count, $match)) 
	echo ("<script language='javascript'>
		window.alert('Invalid Helmet rate .Input should only be integer')
		window.location.href='add_max_value.php'
		</script>");
	else
	{
		$sql = "UPDATE `registration` SET `add_limit_start`='1'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		$sql = "INSERT INTO parking_vehicle_count". "(Heavy_vehicles,Light_vehicles, Two_wheelers,
		Helmets_count) ". "VALUES('$Heavy_vehicles','$Light_vehicles','$Two_wheelers', '$Helmets_count')";
		
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		else
		{
			$sql = "INSERT INTO remaining_slots_count". "(remaining_Heavy_vehicles,remaining_Light_vehicles, remaining_Two_wheelers,
				remaining_Helmets_count) ". "VALUES('$Heavy_vehicles','$Light_vehicles','$Two_wheelers', '$Helmets_count')";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not enter data: ' . mysql_error());
			}
			else
			{
				echo ("<script language='javascript'>
				window.location.href='heavyslots loop.php'
				</script>");
			}
		}
	}
	mysql_close($conn);
}
else
{
?>
<body><center>
<legend><h2>Set the limit of your parking area</h2></legend>
<form id = "max" form method = "post" action = "<?php $_PHP_SELF ?>">
<table width = "400" border = "0" cellspacing = "1"
cellpadding = "2">
	<tr>
		<td width = "100">count of Heavy_vehicles</td>
		<td><input name = "Heavy_vehicles" type = "int"
		id = "Heavy_vehicles"></td>
	</tr>
	<tr>
		<td width = "100">count of Light_vehicles</td>
		<td><input name = "Light_vehicles" type = "int"
		id = "Light_vehicles"></td>
	</tr>
	<tr>
		<td width = "100">Two_wheelers count</td>
		<td><input name="Two_wheelers" type="int" id ="Two_wheelers"></td>
	</tr>
	<tr>
		<td width = "100">Helmets count</td>
		<td><input name="Helmets_count" type="int" id = "Helmets_count" ></td>
	</tr>
	<tr>
		<td width = "100"> </td>
		<td> </td>
	</tr>
	<tr>
		<th>&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" /></td></td>
		<td>&nbsp;&nbsp;<input name = "add" type = "submit" id = "add" value = "Set Limits"></td>
	</tr>
</table>
</form>
<?php
}
?>
<script type="text/javascript" src="javascripts/maxchkr.js">
</script>
</body>
</html>
