<!-- This file is used to view tokens generated for pareking. -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Include styles in external style sheet files -->
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">

<title>PREVIOUS TOKENS</title>
<script type="text/javascript" src="javascripts/addchk.js">
</script>
</head>
<?php
	require("file protection.php");		/*	file protection.php calls connection file , and check whether registration table's login value is '1'.
					otherwise Token will not seen*/

	$token_no=0;			//initialize variable  $token_no as 0
	$sql = "SELECT * FROM `tokens` ";//selecct all contents from table tokens
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not get data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$token_no=$i['token_no'];	//token_no from table tokens is stored into variable  $token_no
	}
	mysql_free_result($retval);
	if($token_no=="0")//would not change in initialized value of token no, implies that no previous tokens are generated.
	{
		echo ("<script language='javascript'>
			window.alert('Sorry no Previous tokens Found for search')
			window.location.href='everyone.php'
			</script>");		//Javascript alert box and goto home page (everyone.php) .
	}

	else	//variable $token_no contains the token number fetched from database . so token shold be displayed
	{
?>
<body><center>
<h2>RESULT FROM tokens</h2>
<table width="500" border>
  <tbody>
    <tr>
	<th scope="col">token no&nbsp;</th>
	<th scope="col">slot no&nbsp;</th>
	<th scope="col">owner id no&nbsp;</th>
      <th scope="col">Vehicle type&nbsp;</th>
    </tr>

<?php
	
$query=mysql_query("SELECT * FROM `tokens` ");	// $query is contain token table contents 
echo mysql_error();				// Display any error


include("parking_vehicle_count all read.php");
$sql = 'SELECT * FROM remaining_slots_count';
	$retval = mysql_query( $sql, $conn );// $retval is contain token table contents 
	if(! $retval )
	{
		die('Could not get data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$remaining_Heavy_vehicles=$i['remaining_Heavy_vehicles'];
		$remaining_Light_vehicles=$i['remaining_Light_vehicles'];
		$remaining_Two_wheelers=$i['remaining_Two_wheelers'];
		$remaining_Helmets_count=$i['remaining_Helmets_count'];
	}
	mysql_free_result($retval);
	$Lightslot=$Light_vehicles+$Heavy_vehicles;
	$Two_wheelers_slot=$Light_vehicles+$Heavy_vehicles+$Two_wheelers;
	$Helmets_slot=$Light_vehicles+$Heavy_vehicles+$Two_wheelers+$Helmets_count;

	 while($i = mysql_fetch_array($query, MYSQL_ASSOC))
	{
		$slot_no=$i['slot_no'];
		$token_no=$i['token_no'];

		if($slot_no<=$Heavy_vehicles)
		{
			$Vehicle_type='Heavy vehicles';
			$sql = "SELECT * FROM `heavy_vehicles` WHERE `slot_no`='$slot_no'";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not get data: ' . mysql_error());
			}
			while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
			{
				$owner_ID_no=$i['owner_ID_no'];
			}
			mysql_free_result($retval);
		}
		else if($slot_no<=$Lightslot)
		{
			$Vehicle_type='Light vehicles';
			$sql = "SELECT * FROM `light_vehicles` WHERE `slot_no`='$slot_no'";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not get data: ' . mysql_error());
			}
			while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
			{
				$owner_ID_no=$i['owner_ID_no'];
			}
			mysql_free_result($retval);
		}
		else if($slot_no<=$Two_wheelers_slot)
		{
			$Vehicle_type='Two wheelers';
			$sql = "SELECT *FROM `two_wheelers` WHERE `slot_no`='$slot_no'";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not get data: ' . mysql_error());
			}
			while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
			{
				$owner_ID_no=$i['owner_ID_no'];
			}
			mysql_free_result($retval);
		}
		else if($slot_no<=$Helmets_slot)
		{
			$Vehicle_type='Helmets';
			$sql = "SELECT * FROM `helmets` WHERE `slot_no`='$slot_no'";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not get data: ' . mysql_error());
			}
			while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
			{
				$owner_ID_no=$i['owner_ID_no'];
			}
			mysql_free_result($retval);
		}
		echo "<td>".$token_no."</td>";
		echo "<td>".$slot_no."</td>";
		echo "<td>".$owner_ID_no."</td>";
		echo "<td>".$Vehicle_type."</tr></td>";
	}
	}
?>
<script type="text/javascript" src="addchkr.js">
</script>
</body>
</html>
