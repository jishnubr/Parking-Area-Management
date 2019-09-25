<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<title>inserting into Heavy_vehicles</title>
<script type="text/javascript" src="javascripts/entrychk.js">
</script>
</head>
<body>
<?php
	include("file protection.php");
	$remaining_Heavy_vehicles=-1;
	$sql = 'SELECT * FROM remaining_slots_count';
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
	if($remaining_Heavy_vehicles==0 )
	{
		echo ("<script language='javascript'>
			window.alert('Heavy vehicles slot is already filled')
			window.location.href='everyone.php'
			</script>");
	}
if(isset($_POST['add'])) 
{
	$call=1;
	include("duplicate checker for vehicle no.php");
		$sql = 'SELECT `Heavy_rate` FROM `parking_rates`';
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not SELECT data: ' . mysql_error());
		}
		while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			$Heavy_rate=$i['Heavy_rate'];
		}
		mysql_free_result($retval);


		$sql = 'SELECT `slot_no` FROM `heavy_slots';
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not SELECT data: ' . mysql_error());
		}
		while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			$slot_no=$i['slot_no'];
		}
		mysql_free_result($retval);

		$sql = "DELETE FROM `heavy_slots` WHERE  `slot_no`='$slot_no'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not DELETE  data: ' . mysql_error());
		}
		$jointime=time();
		$sql = "INSERT INTO Heavy_vehicles ". "(owner_ID_no,Vehicle_number, slot_no,
		jointime) ". "VALUES('$owner_ID_no','$Vehicle_number','$slot_no',$jointime)";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		else
		{	
			$remaining_Heavy_vehicles--;
			$sql = "UPDATE `remaining_slots_count` SET `remaining_Heavy_vehicles`=$remaining_Heavy_vehicles";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not get data: ' . mysql_error());
			}
			else
			{
				$sql = 'SELECT `token_no` FROM `tokens';
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not SELECT data: ' . mysql_error());
				}
				while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
				{
					$token_no=$i['token_no'];
				}
				mysql_free_result($retval);
				$token_no++;
					
				$sql = "INSERT INTO tokens ". "(token_no,rate, slot_no) ". "VALUES('$token_no','$Heavy_rate','$slot_no')";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}
				else
				echo ("<script language='javascript'>
				window.location.href='token_for_heavy.php'
				</script>");
				mysql_free_result($retval);
			}
		}
	mysql_close($conn);
}
else
{
	?>
	<body><center>
	<legend><h2>Adding a Heavy vehicles data</h2></legend><br>
	<form id=add_vehicles method = "post" action = "<?php $_PHP_SELF ?>">
	<table width = "400" border = "0" cellspacing = "1"
	cellpadding = "2">
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

	<th>&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" /></td></td>
		<td>&nbsp;&nbsp;<input name = "add" type = "submit" id = "add" value = "Generate token"></td>
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
