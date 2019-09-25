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
	if($Heavy_vehicles>0 )
	{
		$i = 0;
		while( $i < $Heavy_vehicles)
		{
			$i++;
			$sql = "INSERT INTO  Heavy_slots". "(slot_no) ". "VALUES('$i')";
			$retval = mysql_query( $sql, $conn );
		}		
	}
	header('location:lightslots update loop.php');
?>
