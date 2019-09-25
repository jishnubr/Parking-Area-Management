<?php
	include("file protection.php");
	if(! get_magic_quotes_gpc() )
	{
		$owner_ID_no = addslashes ($_POST['owner_ID_no']);
		$Vehicle_number = addslashes ($_POST['Vehicle_number']);
	}
	else
	{
		$owner_ID_no = $_POST['owner_ID_no'];
		$Vehicle_number = $_POST['Vehicle_number'];
	}
	$slot_no=0;
	$remaining_Heavy_vehicles=-1;
	$remaining_Light_vehicles=-1;
	$remaining_Two_wheelers=-1;
	$remaining_Helmets_count=-1;
	$total_Heavy_vehicles=-1;
	$total_Light_vehicles=-1;
	$total_Two_wheelers=-1;
	$total_Helmets_count=-1;
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
	$sql = 'SELECT * FROM `parking_vehicle_count`';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not get data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$total_Heavy_vehicles=$i['Heavy_vehicles'];
		$total_Light_vehicles=$i['Light_vehicles'];
		$total_Two_wheelers=$i['Two_wheelers'];
		$total_Helmets_count=$i['Helmets_count'];	
	}
	mysql_free_result($retval);
	if($total_Heavy_vehicles!=$remaining_Heavy_vehicles)
	{
		$sql = "SELECT `slot_no` FROM `heavy_vehicles` WHERE `Vehicle_number`='$Vehicle_number'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			
			die('Could not get data: ' . mysql_error());
		}
		while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			$slot_no=$i['slot_no'];
		}
		
		if($slot_no!=0)
		{
			include("re_type.php");
		}
		mysql_free_result($retval);
	}
	if($total_Light_vehicles!=$remaining_Light_vehicles)
	{
		$sql = "SELECT `slot_no` FROM `Light_vehicles` WHERE `Vehicle_number`='$Vehicle_number'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			
			die('Could not get data: ' . mysql_error());
		}
		while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			$slot_no=$i['slot_no'];
		}
		
		if($slot_no!=0)
		{
			include("re_type.php");
		}
		mysql_free_result($retval);
	}
	if($total_Two_wheelers!=$remaining_Two_wheelers)
	{
		$sql = "SELECT `slot_no` FROM `two_wheelers` WHERE `Vehicle_number`='$Vehicle_number'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			
			die('Could not get data: ' . mysql_error());
		}
		while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			$slot_no=$i['slot_no'];
		}
		
		if($slot_no!=0)
		{
			include("re_type.php");
		}
		mysql_free_result($retval);
	}
?>
