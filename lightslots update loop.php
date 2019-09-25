<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<title>set limits of vehicles step2</title>
<meta charset=="utf-8"/>
</script>
</head>
<body>
<center>
Please wait <br>Parking area management system is writing data into database.
<?php
	include("parking_vehicle_count all read.php");
	if($Light_vehicles>0 )
	{
		$Lightslot=$Light_vehicles+$Heavy_vehicles;
		$i = $Heavy_vehicles;
		while( $i < $Lightslot)
		{
			$i++;
			$sql = "INSERT INTO  light_slots". "(slot_no) ". "VALUES('$i')";
			$retval = mysql_query( $sql, $conn );
		}
	}
	header('location:two wheeler slots update loop.php');
?>
