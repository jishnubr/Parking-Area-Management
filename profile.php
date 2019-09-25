<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" type="text/css" href="style/table.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/Box Model.css">
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<center>
<?php
	include("file protection.php");
	$query=mysql_query("SELECT * FROM `registration`");
	echo mysql_error();
?>
<table>
  <tbody><h2>Admin details<table border>
    <tr>
      <th>Name&nbsp;</th>
      <th>Address&nbsp;</th>
      
    </tr>
    <?php while($a=mysql_fetch_array($query))
	{

	?>
	    <tr>
	      <td><?php echo $a['Name'];?></td>
	       <td><?php echo $a['Address'];?> </td>
	       </td>
	    </tr>
	    <?php 
	}	?>
  </tbody>
</table><br />
<br /><h3>
</h3>