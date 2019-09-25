<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<link rel="stylesheet" type="text/css" href="style/style_view.css">
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body><center>
<legend><h2>Login</h2></legend>
<form action="" method="post">
<table width="500" >
  <tbody>
    <tr>
      <th>&nbsp;UserName</td>
      <td>&nbsp;<input type="text" name="name" value=""></td>
    </tr>
    <tr>
      <th>&nbsp;Password</td>
      <td>&nbsp;<input type="password" name="Password"/></td>
    </tr>
	<tr>
      <th>&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" /></td></td>
      <td>&nbsp;&nbsp;<input type="submit" name="submit" value="Login"></td>
    </tr>
  </tbody>
</table>
</form>
<?php
	include("conection/config.php");
	$login="0";
	$sql = "SELECT * FROM `registration`";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not enter data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$login=$i['login'];
	}
	mysql_free_result($retval);
	if($login!="0")
	{
		$Heavy_vehicles="e";
		$Light_vehicles="e";
		$Two_wheelers="e";
		$Helmets_count="e";
		$Heavy_rate="e";
		$Light_rate="e";
		$Two_wheelers_rate="e";
		$Helmet_rate="e";
		$sql = "SELECT `Heavy_vehicles`, `Light_vehicles`, `Two_wheelers`, `Helmets_count` FROM `parking_vehicle_count`";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
		while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			$Heavy_vehicles=$i['Heavy_vehicles'];
			$Light_vehicles=$i['Light_vehicles'];
			$Two_wheelers=$i['Two_wheelers'];
			$Helmets_count=$i['Helmets_count'];
		}
		mysql_free_result($retval);
		if($Heavy_vehicles=="e"&&$Light_vehicles=="e"&&$Two_wheelers=="e"&&$Helmets_count=="e")
		{
			echo ("<script language='javascript'>
			window.alert('You can enter maximum count of vehicles')
			window.location.href='add_max_value.php'
			</script>");
		}
		$add_limit_start="0";
		$sql = "SELECT * FROM `registration`";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			$add_limit_start=$i['add_limit_start'];
		}
		mysql_free_result($retval);
		if($add_limit_start!="0")
		{
			echo ("<script language='javascript'>	
			window.location.href='repair limit.php'
			</script>");
		}
		$sql = "SELECT * FROM `parking_rates`";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
		while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			$Heavy_rate=$i['Heavy_rate'];
			$Light_rate=$i['Light_rate'];
			$Two_wheelers_rate=$i['Two_wheelers_rate'];
			$Helmet_rate=$i['Helmet_rate'];
		}
		mysql_free_result($retval);
		if($Heavy_rate=="e"&&$Light_rate=="e"&&$Two_wheelers_rate=="e"&&$Helmet_rate=="e")
		{
			echo ("<script language='javascript'>
			window.alert('You can enter Rates For Parking')
			window.location.href='Rates_Entry.php'
			</script>");
		}
		else
			echo ("<script language='javascript'>
			window.location.href='everyone.php'
			</script>");
	}
	if(isset($_POST['submit']))
	{
		$a=$_POST['name'];
		$b=$_POST['Password'];
		$query=mysql_query("SELECT * FROM `registration` WHERE `Name`='$a' AND `Password`='$b'");
		$res=mysql_fetch_array($query);
		if($res)
		{

			$sql = "UPDATE `registration` SET `login`='1'";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
				die('Could not enter data: ' . mysql_error());
			}
			else
				echo ("<script language='javascript'>
				window.alert('You are logged in')
				window.location.href='everyone.php'
				</script>");		
		}
		else
		{
			echo ("<script language='javascript'>
			window.alert('Your Login Name or Password is invalid')
			</script>");
			echo ("\tPlease try again!");	
		}	
	}
?>
</body>
</html>
