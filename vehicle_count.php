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
<body><center>
<?php
	include("file protection.php");
	$query=mysql_query("SELECT * FROM `parking_vehicle_count`");
	echo mysql_error();
?>
<h2>vehicles maximum parking limits</h2>
<table width="500" border>
  <tbody>
    <tr>
	<th scope="col">Heavy vehicles&nbsp;</th>
      <th scope="col">Light vehicles&nbsp;</th>
      <th scope="col">Two wheelers&nbsp;</th>
      <th scope="col">Helmets&nbsp;</th>
    </tr>

	<?php while($query2=mysql_fetch_array($query))
	{

	?>
    <tr>
	<?php 
		echo "<td>".$query2['Heavy_vehicles']."</td>";
		echo "<td>".$query2['Light_vehicles']."</td>";
		echo "<td>".$query2['Two_wheelers']."</td>";
		echo "<td>".$query2['Helmets_count']."</td>";
	}
	?>

<?php
	$query=mysql_query("SELECT * FROM `remaining_slots_count`");
	echo mysql_error();
?>


  </tbody>
</table>

<h2>Remaining slots count</h2>
<table width="500" border>
  <tbody>
    <tr>
	<th scope="col">Heavy vehicles&nbsp;</th>
      <th scope="col">Light vehicles&nbsp;</th>
      <th scope="col">Two wheelers&nbsp;</th>
      <th scope="col">Helmets&nbsp;</th>
    </tr>

	<?php while($query2=mysql_fetch_array($query))
	{

	?>
    <tr>
	<?php 
		echo "<td>".$query2['remaining_Heavy_vehicles']."</td>";
		echo "<td>".$query2['remaining_Light_vehicles']."</td>";
		echo "<td>".$query2['remaining_Two_wheelers']."</td>";
		echo "<td>".$query2['remaining_Helmets_count']."</td>";
	}
	?>
  </tbody>
</table>
</body>
</html>
