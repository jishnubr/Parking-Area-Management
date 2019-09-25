<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>insert into Helmets</title>
<script type="text/javascript" src="javascripts/addchk.js">
</script>
</head>
<body>
<?php
	include("file protection.php");
	$slot_no=0;
	$sql = 'SELECT  `slot_no` FROM `tokens`';
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
	if($slot_no!=0)
	{
	$sql = "SELECT `owner_ID_no` FROM `two_wheelers` WHERE `slot_no`='$slot_no'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
		while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			$owner_ID_no=$i['owner_ID_no'];
		}
		mysql_free_result($retval);
	}
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
	else
	{
		$sql = 'SELECT `Helmet_rate` FROM `parking_rates`';
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not SELECT data: ' . mysql_error());
		}
		while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			$Helmet_rate=$i['Helmet_rate'];
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

		$jointime=time();
		if($slot_no!=0)
		{
			$sql = "INSERT INTO Helmets ". "(owner_ID_no, slot_no,
			join_date,jointime) ". "VALUES('$owner_ID_no','$slot_no', NOW(),$jointime)";
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
					$sql = "INSERT INTO tokens ". "(token_no,rate, slot_no) ". "VALUES('$token_no','$Helmet_rate','$slot_no')";
					$retval = mysql_query( $sql, $conn );
					if(! $retval )
					{
						die('Could not enter data: ' . mysql_error());
					}
					echo ("<script language='javascript'>
					window.location.href='token_for_helmet.php'
					</script>");
				}
			}
		}
}
	mysql_close($conn);
?>
