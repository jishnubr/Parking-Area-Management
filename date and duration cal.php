<?php	
	$duration= $halttime-$jointime;
	$duration=$duration/3600;
	if($duration<1)
	{
		$duration='1';
	}
	elseif($duration%3600!=0)
	{
		$duration++;
	}
	$duration = (int)$duration;// php typecasting
	$join_date=date("d-M-Y",$jointime);
	$join_time=date("\a\\t g.i a",$jointime);
	$halt_date=date("d-M-Y",$halttime);
	$halt_time=date("\a\\t g.i a",$halttime);
?>
