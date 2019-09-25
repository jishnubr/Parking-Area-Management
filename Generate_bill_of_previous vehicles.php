<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body><center><h2>
<?php
	include("file protection.php");
	if(isset($_GET['bill_no']))
	{
		$bill_no=$_GET['bill_no'];
		$sql = "SELECT * FROM `bill` WHERE `bill_no`='$bill_no'";
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
</h2>
<table width="500" border='1'>BILL
  <tbody>
    <tr>
      <th scope="col">bill no&nbsp;</th>
      <th scope="col">owner_ID_no&nbsp;</th>
      <th scope="col">Vehicle_number&nbsp;</th>
	<th scope="col">join_date&nbsp;</th>
	 <th scope="col">halt_date&nbsp;</th>
	<th scope="col">charges&nbsp;</th>
    </tr>
    <tr><?php	if($Vehicle_number=="")
		$Vehicle_number="Helmet";
	?>
      <td>&nbsp;<?php echo $bill_no;?></td>
      <td>&nbsp; <?php echo $owner_ID_no;?> </td>
	  			<?php	
						$join_date=date("d-M-Y",$jointime);
						$join_time=date("\a\\t g.i a",$jointime);
						$halt_date=date("d-M-Y",$halttime);
						$halt_time=date("\a\\t g.i a",$halttime);
				?>
      <td>&nbsp; <?php echo $Vehicle_number;?></td>
      	
	<td>&nbsp;<?php echo $join_date.'<br>'.$join_time;?></td>
	 <td>&nbsp;<?php echo $halt_date.'<br>'.$halt_time;?></td>
	<td>&nbsp; <?php echo $charges;?></td>
    </tr>
  </tbody>
</table><br>
 <td>&nbsp;<a href="everyone.php">GO BACK TO HOME</a></td>
<form><br>
<input type="button" value="Print This Bill" onclick="window.print()" />
</form>
</body>
</html>
