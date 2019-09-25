<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<meta charset="utf-8">
<title>Untitled Document</title>
<script type="text/javascript" src="javascripts/entrychk.js">
</script>
</head>
<body><center>
<?php
	include("file protection.php");
	if(isset($_GET['slot_no']))
	{
		$slot_no=$_GET['slot_no'];
		if(isset($_POST['submit']))
		{
			$owner_ID_no=$_POST['owner_ID_no'];
			$Vehicle_number=$_POST['Vehicle_number'];
			$query3=mysql_query("update two_wheelers set owner_ID_no='$owner_ID_no', Vehicle_number='$Vehicle_number' where slot_no='$slot_no'");
			if($query3)
			{
				echo ("<script language='javascript'>
					window.alert('Updated Successfully')
					window.location.href='everyone.php'
					</script>");
			}
		}
		$query1=mysql_query("select * from two_wheelers where slot_no='$slot_no'");
		$query2=mysql_fetch_array($query1);
?>
<legend><h2>Update vehicles</h2></legend><br>
<form id=add_vehicles  method = "post" action = "<?php $_PHP_SELF ?>">
<table width = "400" border = "0" cellspacing = "1"
	cellpadding = "2">

<tr>
	<td width = "100">owner_ID_no</td>
	<td><input name = "owner_ID_no" type = "text"
	id = "owner_ID_no" value="<?php echo $query2['owner_ID_no']; ?>"></td>
</tr>
<tr>
	<td width = "100">Vehicle_number</td>
	<td><input name = "Vehicle_number" type = "text"
	id = "Vehicle_number" value="<?php echo $query2['Vehicle_number']; ?>"></td>
</tr>
<tr>
	
	<td width = "100">&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" /></td><td><input type="submit" name="submit" value="update" />
	</td>
</tr>
</form></table></center>
<a href='View_Two%20wheelers.php' /><input type="button"  value=" Go Back"/></a>
<center>
<a href='everyone.php' /><input type="button"  value=" Go Back To Home"/></a>
<?php
}
?>
<script type="text/javascript" src="javascripts/entrychkr.js">
</script>
</body>
</html>
