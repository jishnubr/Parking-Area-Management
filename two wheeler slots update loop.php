<!--creating Two Wheelers Slots on Database-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<title>set limits of vehicles step 2</title>
<meta charset=="utf-8"/>
</script>
</head>
<body>
<center>
Please wait <br>Parking area management system is writing data into database.<!--For Display Please Wait-->
<?php
	include("parking_vehicle_count all read.php"); /* Read Counts of vehicles by (parking_vehicle_count all read.php) file and Stored Values in Variables namely $Light_vehicles ,$Two_wheelers etc
							By using while loop Insert no of Slots (one by one)into DataBase*/
	if($Two_wheelers>0 )
	{		
		$Two_wheelers_slot=$Light_vehicles+$Heavy_vehicles+$Two_wheelers;
		$i = $Light_vehicles+$Heavy_vehicles;
		while( $i < $Two_wheelers_slot)
		{
			$i++;
			$sql = "INSERT INTO Two_wheelers_slot ". "(slot_no) ". "VALUES('$i')";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )// check For failure of insertion operation and terminate execution
			{
				die('Could not enter data: ' . mysql_error());
			}
		}
	}
	header('location:helmets slots update loop.php');// goto slot updation for helmets 
?>
