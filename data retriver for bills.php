<?php
	require("file protection.php");
	$bill_no=-1;
	$sql = "SELECT `bill_no`, `owner_ID_no`, `Vehicle_number`, `jointime`, `halttime`, `rate`, `charges` FROM `bill`";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not get data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$bill_no=$i['bill_no'];
		$owner_ID_no=$i['owner_ID_no'];
		$Vehicle_number=$i['Vehicle_number'];
		$jointime=$i['jointime'];
		$halttime=$i['halttime'];
		$rate=$i['rate'];
		$charges=$i['charges'];
	}
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
