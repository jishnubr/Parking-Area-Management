<?php
	include("file protection.php");
	$sql = "SELECT `remaining_Helmets_count`FROM `remaining_slots_count`";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not enter data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$remaining_Helmets=$i['remaining_Helmets_count'];
	}
	mysql_free_result($retval);
	if($remaining_Helmets==0)
	{
		echo ("<script language='javascript'>
		window.location.href='empty free helmets slots.php'
		</script>");
	}
	else
	{
		echo ("<script language='javascript'>
		window.location.href='View free helmets slots.php'
		</script>");
	}
?>
