<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/style_view.css" />
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body><center>
<?php
	include("file protection.php");
	echo ("<script language='javascript'>
	var question=confirm('Please Enter Password For Confirm to Drop DataBase From the harddisk')
	if(question==true)
	window.location.href='delete_database.php'
	else
	window.location.href='everyone.php'
	</script>");
?>
</center>
</body>
</html>
