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
	include("data retriver for bills.php");
?>
</h2>
<table width="500" border='1'>BILL FOR TWO WHEELERS
<?php
	include("tbdy for bills.php");
?>
</table><br>
 <td>&nbsp;<a href="everyone.php">GO BACK TO HOME</a></td>
<form><br>
<input type="button" value="Print This Bill" onclick="window.print()" />
</form>
</body>
</html>
