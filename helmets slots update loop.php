<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<title>set limits of vehicles step2</title>
<meta charset=="utf-8"/>
</script>
</head>
<body>
<?php
	include("parking_vehicle_count all read.php");
	if($Helmets_count>0 )
	{
		$Helmets_slot=$Light_vehicles+$Heavy_vehicles+$Two_wheelers+$Helmets_count;
		$i = $Light_vehicles+$Heavy_vehicles+$Two_wheelers;
		while( $i < $Helmets_slot)
		{
			$i++;
			$sql = "INSERT INTO Helmets_slot ". "(slot_no) ". "VALUES('$i')";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not enter data: ' . mysql_error());
			}
		}
	}
	$login="0";
	$sql = "SELECT * FROM `registration`";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not enter data: ' . mysql_error());
	}
		while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$login=$i['login'];
	}
	mysql_free_result($retval);
	$sql = "UPDATE `registration` SET `add_limit_start`='0'";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not enter data: ' . mysql_error());
	}
	$Heavy_rate="e";
	$Light_rate="e";
	$Two_wheelers_rate="e";
	$Helmet_rate="e";
	$sql = "SELECT * FROM `parking_rates`";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not get data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$Heavy_rate=$i['Heavy_rate'];
		$Light_rate=$i['Light_rate'];
		$Two_wheelers_rate=$i['Two_wheelers_rate'];
		$Helmet_rate=$i['Helmet_rate'];
	}
	mysql_free_result($retval);
	if($Heavy_rate=="e"&&$Light_rate=="e"&&$Two_wheelers_rate=="e"&&$Helmet_rate=="e")
	{
		echo ("<script language='javascript'>
		window.alert('You can Now Enter Rates For Parking')
		window.location.href='Rates_Entry.php'
		</script>");
	}
	else
	echo ("<script language='javascript'>
	window.alert('maximum limit is changed successfuly')
	window.location.href='everyone.php'
	</script>");
?>
