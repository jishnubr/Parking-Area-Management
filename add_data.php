<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<title>Add New Record in MySQL Database</title>
<meta charset=="utf-8"/>
<script type="text/javascript" src="javascripts/chk.js">
</script>
</head>
<?php
	include("conection/config.php");
	$login=2;
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
	if(isset($_POST['add']))
	{
		if(! get_magic_quotes_gpc() )
		{
			$Name = addslashes ($_POST['Name']);
			$Address = addslashes ($_POST['Address']);
			$org = addslashes ($_POST['org']);
			$pass = addslashes ($_POST['pass']);
		}
		else
		{
			$Name = $_POST['Name'];
			$Address = $_POST['Address'];
			$org = $_POST['org'];
			$pass = $_POST['pass'];
		}
		$sql = "INSERT INTO registration ". "(Name,Address,org, password,
		join_date,login,add_limit_start) ". "VALUES('$Name','$Address','$org','$pass', NOW(),'1','0')";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		echo ("<script language='javascript'>
		window.alert('You can Now enter maximum count of vehicles')
		window.location.href='add_max_value.php'
		</script>");
		mysql_close($conn);
	}
	else
	{
	?>
		<body><center>
		<legend><h2>Registration Form</h2></legend><form id = "registration" form method = "post" action = "<?php $_PHP_SELF ?>">
		<table width = "400" border = "0" cellspacing = "1"
		cellpadding = "2">
			<tr>
				<td width = "100">Name</td>
				<td><input name = "Name" type = "text"
				id = "Name"></td>
			</tr>
			<tr>
				<td width = "100">Address</td>
				<td><input name = "Address" type = "text"
				id = "Address"></td>
			</tr>
			<tr>
				<td width = "100">organisatin/company name</td>
				<td><input name = "org" type = "text"
				id = "org"></td>
			</tr>
			<tr>
				<td width = "100">password</td>
				<td><input type="password" name="pass" id="initial" ></td>
			</tr>
			<tr>
				<td width = "100">confirm password</td>
				<td><input type="password" name="pass" id="second"></td>
			</tr>
			<tr>
				<td width = "100"> </td>
				<td> </td>
			</tr>
			<tr>
				<th>&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" /></td></td>
				<td>&nbsp;&nbsp;<input name = "add" type = "submit" id = "add" value = "Add registration"></td>
			</tr>
	

		</table>
		</form> 
	<?php
	}
?>
<script type="text/javascript" src="javascripts/chkr.js">
</script>
</body>
</html>