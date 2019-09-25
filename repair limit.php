<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<title>set rates for parking</title>
<meta charset=="utf-8"/>
<script type="text/javascript" src="javascripts/chkmax.js">
</script>
</head>
<body>
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
		window.alert('sorry failed to enter heavy vehicle rate into database')
		window.alert('Invalid input found.Inputs should only be integers')
		window.location.href='update_limit_checker.php'
		</script>");
	elseif (preg_match("/[^0-9]/", $Light_vehicles, $match)) 
	echo ("<script language='javascript'>
		window.alert('sorry failed to enter heavy vehicle rate into database')
		window.alert('Invalid input found.Inputs should only be integers')
		window.location.href='update_limit_checker.php'
		</script>");
	elseif  (preg_match("/[^0-9]/", $Two_wheelers, $match)) 
	echo ("<script language='javascript'>
		window.alert('sorry failed to enter heavy vehicle rate into database')
		window.alert('Invalid input found.Inputs should only be integers')
		window.location.href='update_limit_checker.php'
		</script>");
	elseif (preg_match("/[^0-9]/", $Helmets_count, $match)) 
	echo ("<script language='javascript'>
		window.alert('sorry failed to enter heavy vehicle rate into database')
		window.alert('Invalid input found.Inputs should only be integers')
		window.location.href='update_limit_checker.php'
		</script>");
	else
	{
		$sql = "UPDATE `registration` SET `add_limit_start`='1'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}

		$sql ="UPDATE `parking_vehicle_count` SET `Heavy_vehicles`='$Heavy_vehicles',`Light_vehicles`='$Light_vehicles',
		`Two_wheelers`='$Two_wheelers',`Helmets_count`='$Helmets_count'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		
		$sql ="TRUNCATE heavy_slots";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		$sql ="TRUNCATE helmets_slot";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		$sql ="TRUNCATE light_slots";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		$sql ="TRUNCATE two_wheelers_slot";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		else
		{
			$sql = "UPDATE `remaining_slots_count` SET `remaining_Heavy_vehicles`=$Heavy_vehicles,
			`remaining_Light_vehicles`=$Light_vehicles,`remaining_Two_wheelers`=$Two_wheelers,`remaining_Helmets_count`=$Helmets_count";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not enter data: ' . mysql_error());
			}
			else
			{
				echo ("<script language='javascript'>
				window.location.href='heavyslots update loop.php'
				</script>");
			}
		}
	}
	
	mysql_close($conn);
}else
{
?>
<body><center>

<legend><h2>Set the limit of your parking area</h2></legend><br>
<form id = "max" form method = "post" action = "<?php $_PHP_SELF ?>">
<table width = "400" border = "0" cellspacing = "1"
cellpadding = "2">
<tr>
<td width = "100">Heavy vehicles count</td>
<td><input name = "Heavy_vehicles" type = "int"
id = "Heavy_vehicles"></td>
</tr>
<tr>
<td width = "100">Light_vehicles  count</td>
<td><input name = "Light_vehicles" type = "int"
id = "Light_vehicles"></td>
</tr>
<tr>
<td width = "100">Two wheelers count</td>
<td><input name="Two_wheelers" type="int" id = "Two_wheelers"></td>
</tr>
<tr>
<td width = "100">Helmets  count</td>
<td><input name="Helmets_count" type="int" id = "Helmets_count"></td>
</tr>
<tr>
<td width = "100"> </td>
<td> </td>
</tr>
<tr>
<th>&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" /></td></td>
<td>&nbsp;&nbsp;<input name = "add" type = "submit" id = "add" value = "Update Limit"></td>
</tr>
</table>
</form></center>
<?php
}
?>
<script type="text/javascript" src="javascripts/maxchkr.js">
</script>
</body>
</html>
