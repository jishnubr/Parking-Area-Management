<?php
	include("file protection.php");
	$sql = "SELECT `remaining_Heavy_vehicles`FROM `remaining_slots_count`";
	$remaining_Heavy_vehicles=-1;
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not enter data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$remaining_Heavy_vehicles=$i['remaining_Heavy_vehicles'];
	}
	mysql_free_result($retval);
	if($remaining_Heavy_vehicles==0)
	{
		echo ("<script language='javascript'>
		window.location.href='empty free Heavy_slots.php'
		</script>");
	}
	else
	{
		echo ("<script language='javascript'>
		window.location.href='View free heavy slots.php'
		</script>");
	}
?>
