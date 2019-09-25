<?php
	include("file protection.php");
	$sql = "SELECT `remaining_Two_wheelers`FROM `remaining_slots_count`";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not enter data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$remaining_Two_wheelers=$i['remaining_Two_wheelers'];
	}
	mysql_free_result($retval);
	if($remaining_Two_wheelers==0)
	{
		echo ("<script language='javascript'>
		window.location.href='empty free two wheeler slots.php'
		</script>");
	}
	else
	{
		echo ("<script language='javascript'>
		window.location.href='View free two wheeler slots.php'
		</script>");
	}
?>
