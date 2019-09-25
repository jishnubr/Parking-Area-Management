<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<title>Update a vehicle</title>
<script type="text/javascript" src="javascripts/entrychk.js">
</script>
</head>
<body>
<?php
	include("file protection.php");
	$slot_no=0;
	$sql = "SELECT * FROM `tokens` ";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not get data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$slot_no=$i['slot_no'];
	}
	mysql_free_result($retval);
	if($slot_no=="0")
	{
		echo ("<script language='javascript'>
			window.alert('Sorry This option is unavailable Parking area is empty')
			window.location.href='everyone.php'
			</script>");
	}
if(isset($_POST['add']))
{
	include("conection/config.php");
	if(! get_magic_quotes_gpc() )
	{
		$token_no= addslashes ($_POST['token_no']);
		$owner_ID_no = addslashes ($_POST['owner_ID_no']);
		$Vehicle_number = addslashes ($_POST['Vehicle_number']);
	}
	else
	{
		$token_no= $_POST['token_no'];
		$owner_ID_no = $_POST['owner_ID_no'];
		$Vehicle_number = $_POST['Vehicle_number'];
	}
	$slot_no=0;
	$sql = "SELECT `token_no`,`slot_no` FROM `tokens` WHERE `token_no`='$token_no'";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		echo ("<script language='javascript'>
			window.alert('Sorry Invalid token number entry')
			window.location.href='everyone.php'
			</script>");
		die('Could not get data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$slot_no=$i['slot_no'];
	}
	$sql = "SELECT * FROM `parking_vehicle_count`";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not get data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$Heavy_vehicles=$i['Heavy_vehicles'];
		$Light_vehicles=$i['Light_vehicles'];
		$Two_wheelers=$i['Two_wheelers'];
		$Helmets_count=$i['Helmets_count'];
	}
	mysql_free_result($retval);
	$Lightslot=$Light_vehicles+$Heavy_vehicles;
	$Two_wheelers_slot=$Light_vehicles+$Heavy_vehicles+$Two_wheelers;
	$Helmets_slot=$Light_vehicles+$Heavy_vehicles+$Two_wheelers+$Helmets_count;
	if($token_no<=0||$token_no>$Helmets_slot)
	{
		echo ("<script language='javascript'>
		window.alert('Invalid entry')
		window.location.href='everyone.php'
		</script>");
	}
	if($slot_no<=$Heavy_vehicles&&$slot_no!=0)
	{
		$sql = "UPDATE `heavy_vehicles` SET `owner_ID_no`='$owner_ID_no',`Vehicle_number`='$Vehicle_number' WHERE `slot_no`='$slot_no'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
		else
		{
			echo ("<script language='javascript'>
			window.alert('Successfully updated')
			window.location.href='everyone.php'
			</script>");
		}
	}
	else if($slot_no<=$Lightslot&&$slot_no!=0)
	{
		$sql = "UPDATE `light_vehicles` SET `owner_ID_no`='$owner_ID_no',`Vehicle_number`='$Vehicle_number' WHERE `slot_no`='$slot_no'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
		else
			echo ("<script language='javascript'>
			window.alert('Successfully updated')
			window.location.href='everyone.php'
			</script>");
	}
	else if($slot_no<=$Two_wheelers_slot&&$slot_no!=0)
	{
		$sql = "UPDATE `two_wheelers` SET `owner_ID_no`='$owner_ID_no',`Vehicle_number`='$Vehicle_number' WHERE `slot_no`='$slot_no'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
		else
			echo ("<script language='javascript'>
			window.alert('Successfully updated')
			window.location.href='everyone.php'
			</script>");
	}
	else if($slot_no<=$Helmets_slot&&$slot_no!=0)
	{
		$sql = "UPDATE `helmets` SET `owner_ID_no`='$owner_ID_no' WHERE `slot_no`='$slot_no'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
		else
			echo ("<script language='javascript'>
			window.alert('Successfully updated')
			window.location.href='everyone.php'
			</script>");
		}
		else
		{
			echo ("<script language='javascript'>
			window.alert('Sorry Invalid token number entry')
			window.location.href='everyone.php'
			</script>");
		}
	mysql_close($conn);
}
else
{
	?>
	<body><center>
	<legend><h2>Change vehicles Details</h2></legend><br>
	
	<form id=add_vehicles  method = "post" action = "<?php $_PHP_SELF ?>">
	<table width = "400" border = "0" cellspacing = "1"
	cellpadding = "2">
	<tr>
	<td width = "100">token_no</td>
	<td><input name = "token_no" type = "text"
	id = "token_no"></td>
	</tr>

	<tr>
	<td width = "100">owner_ID_no</td>
	<td><input name = "owner_ID_no" type = "text"
	id = "owner_ID_no"></td>
	</tr>
	<tr>
	<td width = "100">Vehicle_number</td>
	<td><input name = "Vehicle_number" type = "text"
	id = "Vehicle_number"></td>
	</tr>

	<tr>
	<td width = "100"> </td>
	<td> </td>
	</tr>
	<tr>
	<th>
	&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" /></td></td>
	<td>&nbsp;&nbsp;<input name = "add" type = "submit" id = "add" value = "Update"></td>
	</tr>
	</table>
	</form>
	<?php
}
?>
<script type="text/javascript" src="javascripts/entrychkr.js">
</script>
</body>
</html>
