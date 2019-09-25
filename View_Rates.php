<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	include("file protection.php");
	$query=mysql_query("SELECT * FROM `parking_rates`");
	echo mysql_error();
?>
<body><center>
<h2>Rate for Parking</h2>
<table width="500" border>
  <tbody>
    <tr>
     	 <th scope="col">Rate for Heavy Vehicle&nbsp;</th>
      	<th scope="col">Rate for Light Vehicle&nbsp;</th>
     	 <th scope="col">Rate for Two_wheelers&nbsp;</th>
	 <th scope="col">Rate for Helmets&nbsp;</th>
    </tr>
    <?php while($a=mysql_fetch_array($query))
	{

	?>
    <tr>
      <td>&nbsp;<?php echo $a['Heavy_rate'];?></td>
      <td>&nbsp; <?php echo $a['Light_rate'];?> </td>
      <td>&nbsp; <?php echo $a['Two_wheelers_rate'];?></td>
      <td>&nbsp; <?php echo $a['Helmet_rate'];?></td>
    </tr>
    <?php }?>
  </tbody>
</table>
</body>
</html>
