<?php
	include("file protection.php");
	$bill_no=-1;
	$sql = "SELECT `bill_no`,`jointime`, `halttime`, `rate` FROM `bill`";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not get data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$bill_no=$i['bill_no'];
		$jointime=$i['jointime'];
		$halttime=$i['halttime'];
		$rate=$i['rate'];
	}
	if($bill_no!=-1)
	{
		mysql_free_result($retval);
		
		$duration= $halttime-$jointime;
		$charges=$duration/3600;
		if($charges<1)
		{
			$charges='1';
		}
	elseif($duration%3600!=0)
		{
			$charges++;
		}
		
		$charges=(int)$charges;  //type casting in php
		
		$charges=$charges*$rate;
		$sql = "UPDATE `bill` SET
		`charges`='$charges' 
		WHERE bill_no = '$bill_no'" ;
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not update data: ' . mysql_error());
		}
	}
?>
