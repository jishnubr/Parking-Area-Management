<?php
	include("file protection.php");
	$sql = "SELECT `remaining_Light_vehicles`FROM `remaining_slots_count`";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not enter data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$remaining_Light_vehicles=$i['remaining_Light_vehicles'];
	}
	mysql_free_result($retval);
	if($remaining_Light_vehicles==0)
	{
		echo ("<script language='javascript'>
		window.location.href='empty free light_slots.php'
		</script>");
	}
	else
	{
		echo ("<script language='javascript'>
		window.location.href='View free light_slots.php'
		</script>");
	}
?>
