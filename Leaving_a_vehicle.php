<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<title>Leaving a vehicle</title>
<script type="text/javascript" src="javascripts/leavechk.js">
</script>
</head>
<body>
<?php
	include("parking_vehicle_count all read.php");
	$Lightslot=$Light_vehicles+$Heavy_vehicles;
	$Two_wheelers_slot=$Light_vehicles+$Heavy_vehicles+$Two_wheelers;
	$Helmets_slot=$Light_vehicles+$Heavy_vehicles+$Two_wheelers+$Helmets_count;
	$sql = 'SELECT * FROM remaining_slots_count';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not get data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$remaining_Heavy_vehicles=$i['remaining_Heavy_vehicles'];
		$remaining_Light_vehicles=$i['remaining_Light_vehicles'];
		$remaining_Two_wheelers=$i['remaining_Two_wheelers'];
		$remaining_Helmets_count=$i['remaining_Helmets_count'];
	}
	mysql_free_result($retval);
	if($remaining_Heavy_vehicles==$Heavy_vehicles&&$remaining_Light_vehicles==$Light_vehicles&&$remaining_Two_wheelers==$Two_wheelers&&$remaining_Helmets_count==$Helmets_count)
	{
			echo ("<script language='javascript'>
			window.alert('No items remains For leaving')
			window.location.href='everyone.php'
			</script>");
	}
	else
	{
		if(isset($_POST['add']))
		{
			if(! get_magic_quotes_gpc() )
			{
				$token_no= addslashes ($_POST['token_no']);
			}
			else
			$token_no= $_POST['token_no'];
			$slot_no=0;
			$sql = "SELECT `token_no`,`rate`, `slot_no` FROM `tokens` WHERE `token_no`='$token_no'";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not get data: ' . mysql_error());
			}
			while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
			{
				$slot_no=$i['slot_no'];
				$rate=$i['rate'];
			}
			mysql_free_result($retval);
			if($token_no==""||$slot_no=="0")
			{
				echo ("<script language='javascript'>
				window.alert('Sorry Invalid token number entry')
				window.location.href='everyone.php?tag=Leave_Vehicle'
				</script>");
			}
			else
			{
			if($slot_no<=$Heavy_vehicles)
			{
				$sql = "SELECT * FROM `heavy_vehicles` WHERE `slot_no`='$slot_no'";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not get data: ' . mysql_error());
				}
				while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
				{
					$owner_ID_no=$i['owner_ID_no'];
					$Vehicle_number=$i['Vehicle_number'];
					$jointime=$i['jointime'];
				}
				mysql_free_result($retval);

				$sql = 'SELECT remaining_Heavy_vehicles FROM remaining_slots_count';
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not get data: ' . mysql_error());
				}
				while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
				{
					$remaining_Heavy_vehicles=$i['remaining_Heavy_vehicles'];
				}
				mysql_free_result($retval);
				$remaining_Heavy_vehicles++;
				$sql = "UPDATE `remaining_slots_count` SET 
				`remaining_Heavy_vehicles`=$remaining_Heavy_vehicles";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}
				$sql = "DELETE FROM `heavy_vehicles` WHERE `slot_no`='$slot_no'";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}
			$halttime=time();
			$sql = "INSERT INTO `bill`(`owner_ID_no`, `Vehicle_number`,`jointime`, `halttime`, `rate`) VALUES	('$owner_ID_no','$Vehicle_number','$jointime','$halttime','$rate')";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not enter data: ' . mysql_error());
			}
			$sql = "INSERT INTO `heavy_slots`(`slot_no`) VALUES ('$slot_no')";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not enter data: ' . mysql_error());
			}
			include("charge_calculator_for bills.php");
			$sql = "DELETE FROM `tokens` WHERE `token_no`='$token_no' ";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not enter data: ' . mysql_error());
			}
			else
			{
				echo ("<script language='javascript'>
				window.location.href='Generate_bill_of_Heavy_vehicle.php'
				</script>");
			}
		}
		else if($slot_no<=$Lightslot)
		{
			$sql = "SELECT * FROM `light_vehicles` WHERE `slot_no`='$slot_no'";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not get data: ' . mysql_error());
			}
			while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
			{
				$owner_ID_no=$i['owner_ID_no'];
				$Vehicle_number=$i['Vehicle_number'];
				$jointime=$i['jointime'];
			}
			mysql_free_result($retval);

			$sql = 'SELECT remaining_Light_vehicles FROM remaining_slots_count';
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not get data: ' . mysql_error());
			}
			while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
			{
				$remaining_Light_vehicles=$i['remaining_Light_vehicles'];
			}
			mysql_free_result($retval);
			$remaining_Light_vehicles++;
			$sql = "UPDATE `remaining_slots_count`
			SET `remaining_Light_vehicles`=$remaining_Light_vehicles";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not enter data: ' . mysql_error());
			}
			$sql = "DELETE FROM `light_vehicles` WHERE `slot_no`='$slot_no'";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not enter data: ' . mysql_error());
			}
			$halttime=time();
			$sql = "INSERT INTO `bill`(`owner_ID_no`, `Vehicle_number`,`jointime`, `halttime`, `rate`) VALUES 					('$owner_ID_no','$Vehicle_number','$jointime','$halttime','$rate')";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}

			$sql = "INSERT INTO `light_slots`(`slot_no`) VALUES ('$slot_no')";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}
			include("charge_calculator_for bills.php");
			$sql = "DELETE FROM `tokens` WHERE `token_no`='$token_no' ";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not enter data: ' . mysql_error());
			}
			else
			{
				echo ("<script language='javascript'>
				window.location.href='Generate_bill_of_light_vehicle.php'
				</script>");
			}
		}
		else if($slot_no<=$Two_wheelers_slot)
		{
			$sql = "SELECT * FROM `two_wheelers` WHERE `slot_no`='$slot_no'";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not get data: ' . mysql_error());
			}
			while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
			{
				$owner_ID_no=$i['owner_ID_no'];
				$Vehicle_number=$i['Vehicle_number'];
				$jointime=$i['jointime'];
			}
			mysql_free_result($retval);

			$sql = 'SELECT remaining_Two_wheelers FROM remaining_slots_count';
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not get data: ' . mysql_error());
			}
			while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
			{
				$remaining_Two_wheelers=$i['remaining_Two_wheelers'];
			}
			mysql_free_result($retval);
			$remaining_Two_wheelers++;

			$sql = "UPDATE `remaining_slots_count` 
			SET `remaining_Two_wheelers`=$remaining_Two_wheelers";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not enter data: ' . mysql_error());
			}
			$sql = "DELETE FROM `two_wheelers` WHERE `slot_no`='$slot_no'";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{

				die('Could not enter data: ' . mysql_error());
			}
			$halttime=time();
			$sql = "INSERT INTO `bill`(`owner_ID_no`, `Vehicle_number`, `jointime`, `halttime`, `rate`) VALUES 					('$owner_ID_no','$Vehicle_number','$jointime','$halttime','$rate')";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}


			$sql = "INSERT INTO `two_wheelers_slot`(`slot_no`) VALUES ('$slot_no')";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}
			include("charge_calculator_for bills.php");
			$sql = "DELETE FROM `tokens` WHERE `token_no`='$token_no' ";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}
				else
				{
					echo ("<script language='javascript'>
					window.location.href='Generate_bill_of_two_wheeler.php'
					</script>");
				}
		}
		else if($slot_no<=$Helmets_slot)
		{
			$sql = "SELECT * FROM `helmets` WHERE `slot_no`='$slot_no'";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not get data: ' . mysql_error());
				}
			while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
			{
				$owner_ID_no=$i['owner_ID_no'];
				$jointime=$i['jointime'];
			}
			mysql_free_result($retval);

			$sql = 'SELECT remaining_Helmets_count FROM remaining_slots_count';
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not get data: ' . mysql_error());
				}
				while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
				{
					$remaining_Helmets_count=$i['remaining_Helmets_count'];
				}
				mysql_free_result($retval);
				$remaining_Helmets_count++;

				$sql = "UPDATE `remaining_slots_count`
				SET `remaining_Helmets_count`=$remaining_Helmets_count";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}
				$sql = "DELETE FROM `helmets` WHERE `slot_no`='$slot_no'";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}
				$halttime=time();
			$sql = "INSERT INTO `bill`(`owner_ID_no`,
				`jointime`, `halttime`, `rate`) VALUES ('$owner_ID_no'
				,'$jointime','$halttime','$rate')";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}
			$sql = "INSERT INTO `helmets_slot`(`slot_no`) VALUES ('$slot_no')";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}
			include("charge_calculator_for bills.php");
			$sql = "DELETE FROM `tokens` WHERE `token_no`='$token_no' ";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}
				else
				{
					
					echo ("<script language='javascript'>
					window.location.href='Generate_bill_of_helmets.php'
					</script>");
				}
			}
		else
		{
			echo ("<script language='javascript'>
			window.alert('Invalid entry')
			window.location.href='everyone.php'
			</script>");
		}
	}
	mysql_close($conn);
}
else
{
	?>
	<body><center>
	<legend><h2>Leaving vehicles</h2></legend><br>
	<form id=leave_vehicle method = "post" action = "<?php $_PHP_SELF ?>">
	<table width = "400" border = "0" cellspacing = "1"
	cellpadding = "2">
	<tr>
	<td width = "100">token_no</td>
	<td><input name = "token_no" type = "text"
	id = "token_no"></td>
	</tr>

	<tr>
	<td width = "100"> </td>
	<td> </td>
	</tr>
	<tr>
	<th>
	&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" /></td></td>
	<td>&nbsp;&nbsp;<input name = "add" type = "submit" id = "add" value = "Generate Bil"></td>
	</tr>
	</table>
	</form>
	<?php
	}
}
?>
<script type="text/javascript" src="leavechkr.js">
</script>
</body>
</html>
