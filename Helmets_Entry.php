<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<title>insert into Helmets</title>
<script type="text/javascript" src="javascripts/entrychkhel.js">
</script>
</head>
<body>
<?php
	include("file protection.php");
	$remaining_Helmets_count=-1;
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
	if($remaining_Helmets_count==0 )
	{
		echo ("<script language='javascript'>
			window.alert('Helmets slot is already filled')
			window.location.href='everyone.php'
			</script>");
	}
if(isset($_POST['add']))
{
		$sql = 'SELECT `Helmet_rate` FROM `parking_rates`';
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not SELECT data: ' . mysql_error());
		}
		while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			$rate=$i['Helmet_rate'];
		}
		mysql_free_result($retval);


		$sql = 'SELECT `slot_no` FROM `helmets_slot';
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


		$sql = "DELETE FROM `helmets_slot` WHERE  `slot_no`='$slot_no'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not DELETE  data: ' . mysql_error());
		}
		if(! get_magic_quotes_gpc() )
		{
			$owner_ID_no = addslashes ($_POST['owner_ID_no']);
		}
		else
		{
			$owner_ID_no = $_POST['owner_ID_no'];
		}
		$jointime=time();
		$sql = "INSERT INTO Helmets ". "(owner_ID_no, slot_no,
		jointime) ". "VALUES('$owner_ID_no','$slot_no',$jointime)";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		else
		{
	
			$remaining_Helmets_count--;
			$sql = "UPDATE `remaining_slots_count` SET `remaining_Helmets_count`=$remaining_Helmets_count";
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
				$sql = "INSERT INTO tokens ". "(token_no,rate, slot_no) ". "VALUES('$token_no','$rate','$slot_no')";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}
				else
				echo ("<script language='javascript'>
				window.location.href='token_for_helmet.php'
				</script>");
			}
		}
	mysql_close($conn);
}
else
{
?>
	<body><center>
	<legend><h2>Adding a Helmets data</h2></legend><br>
	<form id=add_vehicles  method = "post" action = "<?php $_PHP_SELF ?>">
	<table width = "400" border = "0" cellspacing = "1"
	cellpadding = "2">
	<tr>
	<td width = "100">owner_ID_no</td>
	<td><input name = "owner_ID_no" type = "text"
	id = "owner_ID_no"></td>
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
<script type="text/javascript" src="javascripts/entrychkrhel.js">
</script>
</body>
</html>
