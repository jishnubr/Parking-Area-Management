<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Record in MySQL Database</title>
<meta charset=="utf-8"/>
</script>
</head>
<?php
	include("conection/config.php");
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
	if($login=="0")
	{
		echo ("<script language='javascript'>
		window.alert('You are not logged in')
		window.location.href='index.php'
		</script>");
	}

?>
