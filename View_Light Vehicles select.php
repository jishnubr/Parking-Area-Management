
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<title>set rates for parking</title>
<meta charset=="utf-8"/>
<script type="text/javascript" src="javascripts/chkrate.js">
</script>
</head>
<body>
<?php
	include("file protection.php");
	$sql = "SELECT `Light_vehicles` FROM `parking_vehicle_count`";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not enter data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$totalLight_vehicles=$i['Light_vehicles'];
	}
	mysql_free_result($retval);
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
	if($totalLight_vehicles==$remaining_Light_vehicles)
	{
		include("empty Light vehicles.php");
	}
	else
	{
		echo ("<script language='javascript'>
		window.location.href='View_Light vehicles.php'
		</script>");
	}
	mysql_close($conn);
?>
