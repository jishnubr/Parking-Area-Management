<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<title>Add New Record in MySQL Database</title>
<meta charset=="utf-8"/>
<script type="text/javascript" src="javascripts/chk.js">
</script>
</head>
<?php
	include("file protection.php");
	if(isset($_POST['add']))
	{
		if(! get_magic_quotes_gpc() )
		{
			$Name= addslashes ($_POST['Name']);
			$Address= addslashes ($_POST['Address']);
			$org= addslashes ($_POST['org']);
			$pass= addslashes ($_POST['pass']);
		}
		else
		{
			$Name= $_POST['Name'];
			$Address= $_POST['Address'];
			$org= $_POST['org'];
			$pass= $_POST['pass'];
		}
		$sql = "UPDATE `registration` SET `Name`='$Name',`Address`='$Address',`org`='$org',`password`='$pass'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		else
		{
			echo ("<script language='javascript'>
			window.alert('success')
			window.location.href='everyone.php?tag=home'
			</script>");
		
		}
	mysql_close($conn);
	}
	else
	{
	?>
		<body>
		<center>
		<legend><h2>Update Your Registration</h2></legend><form id = "registration" form method = "post" action = "<?php $_PHP_SELF ?>">
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
				<td width = "100">re_enter password</td>
				<td><input type="password" name="pass" id="second"></td>
			</tr>
			<tr>
				<td width = "100"> </td>
				<td> </td>
			</tr>
			<tr>
				<th>&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" /></td></td>
				<td>&nbsp;&nbsp;<input name = "add" type = "submit" id = "add" value = "update"></td>
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
