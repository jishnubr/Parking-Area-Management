<!DOCTYPE html PUBLIC '-//w3c//DTD XHTML 1.1//EN'
'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>
<html xmlns = 'http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<link rel="stylesheet" type="text/css" href="style/style_view.css">
<meta charset="utf-8">
<title>Drop</title>
</head>
<body><center>
<legend><h2></h2></legend>
<form action="" method="post">
<table width="500" >
  <tbody>
    <tr>
      <th>&nbsp;Password</td>
      <td>&nbsp;<input type="password" name="Password"/></td>
    </tr>
	<tr>
      <th>&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" /></td></td>
      <td>&nbsp;&nbsp;<input type="submit" name="submit" value="Drop db"></td>
    </tr>
  </tbody>
</table>
<h2>all Your Data Wil be Loss After Deletion</h2>
</form>
<a href='everyone.php' /><input type="button"  value="GO BACK"/></a>
<?php
	include("file protection.php");
	$password="0";
	$sql = "SELECT * FROM `registration`";
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
		die('Could not enter data: ' . mysql_error());
	}
	while($i = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$password=$i['password'];
	}
	mysql_free_result($retval);
	if(isset($_POST['submit']))
	{
		$a=$_POST['Password'];
		if($a==$password)
		{
			$sql ="DROP DATABASE vehicle_db";
			$retval = mysql_query( $sql, $conn );
			if($retval )
				echo ("<script language='javascript'>
				window.alert('Your database Deleted Successfully')
				window.location.href='index.php'
				</script>");
		}	
		else
		{
			echo ("Your  Password is incorrect.");
			echo ("\tPlease try again");	
		}
		
	}
?>
</center>
</body>
</html>
