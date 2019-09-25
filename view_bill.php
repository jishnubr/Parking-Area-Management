<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<title>SEARCH PREVIOUS BILL</title>
<script type="text/javascript" src="javascripts/addchk.js">
</script>
</head>
<?php
	include("file protection.php");
	$bill_no=0;
	$sql = "SELECT * FROM `bill` ";
	$retval = mysql_query( $sql, $conn );
	
	
	if(! $retval )
	{
		die('Could not get data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$bill_no=$i['bill_no'];
	}
	mysql_free_result($retval);
	if($bill_no=="0")
	{
		echo ("<script language='javascript'>
			window.alert('Sorry no Previous Bills Found for search')
			window.location.href='everyone.php'
			</script>");
	}
	else
	{
?>
<body><center>
	<legend><h2>SEARCH FROM PREVIOUS BILLS</h2></legend><br>
	<form id=add_vehicles method = "post" action = "<?php $_PHP_SELF ?>">
	<table width = "400" border = "0" cellspacing = "1"
	cellpadding = "2">
	<tr>
	<td width = "100">bill no</td>
	<td><input name = "bill_no" type = "text"
	id = "bill_no"></td>
	</tr>

	<tr>
	<td width = "100"> </td>
	<td> </td>
	</tr>
	<tr>
	<th>
	&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" /></td>
	<td>&nbsp;&nbsp;<input name = "add" type = "submit" id = "add" value = "View Bil"></td>
	</tr>
	</table>
	</form>
<?php
	if(isset($_POST['add'])) 
	{
		if(! get_magic_quotes_gpc() )
		{
			$bill_no= addslashes ($_POST['bill_no']);
		}
		else
			$bill_no= $_POST['bill_no'];
		$rate=0;
		$sql = "SELECT * FROM `bill` WHERE `bill_no`='$bill_no'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
		while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			$rate=$i['rate'];
		}
		mysql_free_result($retval);
		if($rate=="0"||$bill_no=="")
		{
			echo ("<script language='javascript'>
				window.alert('Sorry Invalid bill_no entry')
				window.location.href='everyone.php?tag=view_bill'
				</script>");
		}
		else
		{
			$query=mysql_query("SELECT * FROM `bill` WHERE `bill_no`='$bill_no'");
			echo mysql_error();
	?>
<h2>RESULT FROM BILL</h2>
<table width="500" border>
  <tbody>
    <tr>
	<th scope="col">bill_no&nbsp;</th>
	<th scope="col">owner_ID_no&nbsp;</th>
      <th scope="col">Vehicle_number&nbsp;</th>
	<th scope="col">join_date&nbsp;</th>
      <th scope="col">halt_date&nbsp;</th>
	<th scope="col">rate&nbsp;</th>
      <th scope="col">charges&nbsp;</th>
    </tr>
	<?php
		     while($a=mysql_fetch_array($query))
			{
		
			if($a['Vehicle_number']=="")
			$a['Vehicle_number']="Helmet";
				?>
			<tr>
			<td>&nbsp;<?php echo $a['bill_no'];?></td>
    			<td>&nbsp;<?php echo $a['owner_ID_no'];?></td>
			<td>&nbsp; <?php echo $a['Vehicle_number'];?></td>
            	<?php	
						$jointime=$a['jointime'];
						$halttime=$a['halttime'];
						$join_date=date("d-M-Y",$jointime);
						$join_time=date("\a\\t g.i a",$jointime);
						$halt_date=date("d-M-Y",$halttime);
						$halt_time=date("\a\\t g.i a",$halttime);
				?>
			<td>&nbsp;<?php echo $join_date.'<br>'.$join_time;?></td>
			<td>&nbsp; <?php echo $halt_date.'<br>'.$halt_time;?></td>
			<td>&nbsp;<?php echo $a['rate'];?></td>
			<td>&nbsp; <?php echo $a['charges'];?></td>
			</tr><tr><?php echo "<a href='Generate_bill_of_previous vehicles.php?bill_no=".$a['bill_no']."'>";?><input type="button"  value="Print This Bill"/></tr></a>
    			<?php }
		}
		}
	}
	?>
<script type="text/javascript" src="addchkr.js">
</script>
</body>
</html>
