<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<title>Untitled Document</title>
</head>
<?php
	include("file protection.php");
?>
<body>
<center><h2>
<?php
	$sql = 'SELECT `token_no`, `slot_no` FROM `tokens`';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not enter data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$token_no=$i['token_no'];
		$slot_no=$i['slot_no'];
	}
	mysql_free_result($retval);
	$sql = "SELECT `owner_ID_no`, `jointime` FROM `helmets` WHERE  `slot_no`='$slot_no'";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not get data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$owner_ID_no=$i['owner_ID_no'];
		$jointime=$i['jointime'];
	}
	mysql_free_result($retval);
	$sql = 'SELECT org FROM registration';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not get data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$org=$i['org'];
	}
	mysql_free_result($retval);
	echo "$org\n";
	echo "parking area\n";
?>
</h2>
<table width="500" border='1'>TOKEN FOR HELMETS
  <tbody>
    <tr>
      <th scope="col">token no&nbsp;</th>
      <th scope="col">slot_no&nbsp;</th>
	<th scope="col">date&nbsp;</th>
    </tr>
    
    <tr>
      <td>&nbsp;<?php echo $token_no;?></td>
      <td>&nbsp; <?php echo $slot_no;?></td>
	<td>&nbsp; <?php
	$join_date=date("d-M-Y",$jointime);
	$time=date("\a\\t h.i a",$jointime);
	echo $join_date.'<br>'.$time;?></td>
    </tr>
  </table><br>
 <td>&nbsp;<a href="everyone.php">GO BACK TO HOME</a></td>
<form><br>
<input type="button" value="Print This Token" onclick="window.print()" />
</form>
</body>
</html>