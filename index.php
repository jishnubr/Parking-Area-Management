<!DOCTYPE html PUBLIC '-//w3c//DTD XHTML 1.1//EN'
'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>
<html xmlns = 'http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css">
<meta charset="utf-8">
<title>Welcome</title>
</head>
<body><center>
<h2>Welcome To parking Area Management<br>system</h2><br>
<?php
srand( microtime() * 1000000 );
$num = rand( 1, 4 );
switch( $num )
{
	case 1: $image_file = "images/2.jpg";
	break;
	case 2: $image_file = "images/3.jpg";
	break;
	case 3: $image_file = "images/4.jpg";
	break;
	case 4: $image_file = "images/1.jpg";
	break;
}
echo "<img src=$image_file width=700px height=400px />";
?><br><br>
<a href='start.php' /><input type="button"  value="START"/></a>
</body>
</html>
