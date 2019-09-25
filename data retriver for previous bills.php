<?php
	include("file protection.php");
	if(isset($_POST['add'])) 
	{
		$sql = "SELECT `bill_no`, `owner_ID_no`, `Vehicle_number`,
		`jointime`, `halttime`, `rate`, `charges` FROM `bill` WHERE `bill_no`='$bill_no'";
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
	}
?>
