<?php
	include("file protection.php");
	$sql = "SELECT `Heavy_vehicles`, `Light_vehicles`, `Two_wheelers`, `Helmets_count` FROM `parking_vehicle_count`";
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
?>
