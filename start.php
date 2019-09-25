<!DOCTYPE html PUBLIC '-//w3c//DTD XHTML 1.1//EN'
'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>
<html xmlns = 'http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
</head>
<body>
<?php
	include("conection/config.php");
	$org="0";
	$db = "vehicle_db";
	$sql = "CREATE Database $db";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
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
		if($org=="0")
		{
			echo ("<script language='javascript'>
			window.alert('Please fillup your Registration form')
			window.location.href='add_data.php'
			</script>");
		}
		else
		{
			header('location:login.php');
		}
		die('');
	}
	$sql = 'CREATE TABLE registration( '.
	'Name VARCHAR(20) NOT NULL, '.
	'Address VARCHAR(20) NOT NULL, '.
	'org VARCHAR(20) NOT NULL, '.
	'password VARCHAR(20) NOT NULL, '.
	'join_date timestamp(5) NOT NULL, '.
	'login INT NOT NULL, '.
	'add_limit_start INT NOT NULL, '.
	'primary key ( Name ))';
	mysql_select_db('vehicle_db');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create table: ' . mysql_error());
	}
	$sql = 'CREATE TABLE  bill( '.
	'bill_no INT NOT NULL AUTO_INCREMENT , '.
	'owner_ID_no VARCHAR(10) , '.
	'Vehicle_number VARCHAR(10), '.
	'jointime int NOT NULL , '.
	'halttime int NOT NULL , '.
	'rate int NOT NULL , '.
	'charges int NOT NULL , '.
	'primary key ( bill_no ))';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create table: ' . mysql_error());
	}
	$sql = 'CREATE TABLE parking_vehicle_count( '.
	'Heavy_vehicles int(4) , '.
	'Light_vehicles int(4) , '.
	'Two_wheelers int(4), '.
	'Helmets_count int(4) )';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create table: ' . mysql_error());
	}
	$sql = 'CREATE TABLE remaining_slots_count( '.
	'remaining_Heavy_vehicles int(4) , '.
	'remaining_Light_vehicles int(4) , '.
	'remaining_Two_wheelers int(4), '.
	'remaining_Helmets_count int(4) )';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create remaining_slots_count table: ' . mysql_error());
	}
	$sql = 'CREATE TABLE Helmets_slot( '.
	'slot_no int(4)  NOT NULL  , '.
	'primary key ( slot_no ))';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create  Two_wheelers_slot table: ' . mysql_error());
	}
	$sql = 'CREATE TABLE Helmets( '.
	'owner_ID_no VARCHAR(10) NOT NULL , '.
	'slot_no int(4)  NOT NULL , '.
	'jointime int NOT NULL , '.
	'halttime int NOT NULL , '.
	'primary key ( slot_no ))';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create Helmets table: ' . mysql_error());
	}
	$sql = 'CREATE TABLE Two_wheelers_slot( '.
	'slot_no int(4)  NOT NULL  , '.
	'primary key ( slot_no ))';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create   Two_wheelers_slot table: ' . mysql_error());
	}
	$sql = 'CREATE TABLE Two_wheelers( '.
	'owner_ID_no VARCHAR(10) NOT NULL , '.
	'Vehicle_number VARCHAR(10) NOT NULL  , '.
	'slot_no int(4)  NOT NULL , '.
	'jointime int NOT NULL , '.
	'halttime int NOT NULL , '.
	'primary key ( slot_no ))';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create Heavy_vehicles table: ' . mysql_error());
	}
	$sql = 'CREATE TABLE aboutus( '.
	'name VARCHAR(20) NOT NULL,  '.
	'phone VARCHAR(20) NOT NULL, '.
	'email VARCHAR(25) NOT NULL)';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create   Light_slots table: ' . mysql_error());
	}

	$sql = 'INSERT INTO aboutus '.
	'(name,phone,email) '.
	'VALUES ( "SAYOOJ A O","9532342342","ItzMeUrSayooj@gmail.com" )';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create   Light_slots table: ' . mysql_error());
	}
	$sql = 'INSERT INTO aboutus '.
	'(name,phone,email) '.
	'VALUES ( "Vivek R B","9532342342","mail.vivekrb@gmail.com" )';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create   Light_slots table: ' . mysql_error());
	}
	$sql = 'INSERT INTO aboutus '.
	'(name,phone,email) '.
	'VALUES ( "Jishnu B R","9555825973","jishnubr2014@gmail.com" )';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create   Light_slots table: ' . mysql_error());
	}
	$sql = 'INSERT INTO aboutus '.
	'(name,phone,email) '.
	'VALUES ( "Sibi PM","9532342342","Sibi@gmail.com" )';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create   Light_slots table: ' . mysql_error());
	}
	$sql = 'CREATE TABLE Light_slots( '.
	'slot_no int(4)  NOT NULL  , '.
	'primary key ( slot_no ))';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create   Light_slots table: ' . mysql_error());
	}
	$sql = 'CREATE TABLE Light_vehicles( '.
	'owner_ID_no VARCHAR(10) NOT NULL , '.
	'Vehicle_number VARCHAR(10) NOT NULL  , '.
	'slot_no int(4)  NOT NULL , '.
	'jointime int NOT NULL , '.
	'halttime int NOT NULL , '.
	'primary key ( slot_no ))';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create Heavy_vehicles table: ' . mysql_error());
	}
	$sql = 'CREATE TABLE Heavy_slots( '.
	'slot_no int(4)  NOT NULL  , '.
	'primary key ( slot_no ))';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create  Heavy_slots table: ' . mysql_error());
	}
	$sql = 'CREATE TABLE Heavy_vehicles( '.
	'owner_ID_no VARCHAR(10) NOT NULL , '.
	'Vehicle_number VARCHAR(10) NOT NULL  , '.
	'slot_no int(4)  NOT NULL , '.
	'jointime int NOT NULL , '.
	'halttime int NOT NULL , '.
	'primary key ( slot_no ))';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create Heavy_vehicles table: ' . mysql_error());
	}
	$sql = 'CREATE TABLE parking_rates( '.
	'Heavy_rate int(4) , '.
	'Light_rate int(4) , '.
	'Two_wheelers_rate int(4), '.
	'Helmet_rate int(4) )';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create table: ' . mysql_error());
	}
	$sql = 'CREATE TABLE tokens( '.
	'token_no int(5)  NOT NULL , '.
	'rate int(5)  NOT NULL , '.
	'slot_no int(4) )';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not create Bill_No table: ' . mysql_error());
	}
	echo ("<script language='javascript'>
	window.alert('Please Register On Parking Area Management')
	window.location.href='add_data.php'
	</script>");
	mysql_close($conn);
?>
</body>
</html>
