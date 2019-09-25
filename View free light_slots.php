<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head><link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	include("file protection.php");
	$query=mysql_query("SELECT * FROM `light_slots`");
	echo mysql_error();
?>
<body>
<center>
<h2>Remaining slots on light vehicles</h2></center><right>
<a href='everyone.php?tag=view_Light%20Vehicles' /><input type="button"  value="GO BACK"/></a>
</right>
<center>
<table>
 <tbody>
   <tr>
	<th>free slots&nbsp;</th>
  </tr>
	<td><br><br>
		<?php
			include("slot view.php");
		?>
	</td>
</tbody>
</table>
<a href='everyone.php?tag=view_Light%20Vehicles' /><input type="button"  value="GO BACK"/></a>
</right>
</body>
</html>
