<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<title>set rates for parking</title>
<meta charset=="utf-8"/><script type="text/javascript" src="javascripts/chkrate.js">
</script>
</head>
<body>
<?php
	include("file protection.php");
	$sql = "SELECT `rate` FROM `tokens`";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		$rate=1234;
		die('Could not get data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$rate=$i['rate'];
	}
	mysql_free_result($retval);
	$sql = "UPDATE `tokens` SET `rate`=$rate";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		echo ("<script language='javascript'>
		window.location.href='update_limit.php'
		</script>");
	}
	echo ("<script language='javascript'>
	window.alert('You have some vehicles one parking area')
	window.alert('Please make sure that area is empty before updating limits')
	window.location.href='everyone.php'
	</script>");
mysql_close($conn);
?>









