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
	require("file protection.php");
	include("data retriver for bills.php");
	include("date and duration cal.php");
?>
</h2>
<table width="500" border='1'>BILL FOR HELMETS
  <tbody>
    <tr>
      <th scope="col">bill no&nbsp;</th>
      <th scope="col">owner_ID_no&nbsp;</th>
	<th scope="col">join_date&nbsp;</th>
	 <th scope="col">halt_date&nbsp;</th><th scope="col">Charged_Duraton<small><br/>(in_hour(s))</small>&nbsp&nbsp;</th>
        <th scope="col">Rate_Per_Hour&nbsp&nbsp;</th>
	<th scope="col">charges&nbsp;</th>
    </tr>
    <tr>
      <td>&nbsp;<?php echo $bill_no;?></td>
      <td>&nbsp;<?php echo $owner_ID_no;?> </td>
	<td><?php echo $join_date.'<br>'.$join_time;?></td>
	 <td>&nbsp;<?php echo $halt_date.'<br>'.$halt_time;?></td>
     </td><td>&nbsp; <?php echo $duration;?></td>
     <td>&nbsp; <?php echo $rate;?></td>
	<td>&nbsp; <?php echo $charges;?></td>
    </tr>

  </tbody>
</table><br>
<a href="everyone.php">GO BACK TO HOME</a></td>
<form><br>
<input type="button" value="Print This Bill" onclick="window.print()" />
</form>
</body>
</html>
