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
<?php
	include("file protection.php");
	$query=mysql_query("SELECT * FROM `helmets`");
	echo mysql_error();
?>
<body><center>
<h2>view helmets</h2>
<table width="500" border>
  <tbody>
    <tr>
	<th scope="col">token_no&nbsp;</th>
	<th scope="col">slot_no&nbsp;</th>
      <th scope="col">owner_ID_no&nbsp;</th>
      <th scope="col">Update&nbsp;</th>
    </tr>

	<?php while($i = mysql_fetch_array($query, MYSQL_ASSOC))
	{
		$slot_no=$i['slot_no'];
		$owner_ID_no=$i['owner_ID_no'];
		$token_no=235;

		$sql = "SELECT * FROM `tokens` WHERE  `slot_no`='$slot_no'";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
		while($ii = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			$token_no=$ii['token_no'];
		}

		echo "<td>".$token_no."</td>";
		echo "<td>".$slot_no."</td>";
		echo "<td>".$owner_ID_no."</td>";
		echo "<td><a href='edithelmets.php?slot_no=".$slot_no."'>Edit</a></tr></td>";
	}

	?>
  </tbody>
</table><br>
<a href='everyone.php' /><input type="button"  value=" Go Back To Home"/></a>
</center>
<a href='helmets view select.php' /><input type="button"  value="View free helmets slots"/></a>
</body>
</html>
