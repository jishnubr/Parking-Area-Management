<!--For Showing Details of  Developers-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::. Parking Area Management .::</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/Box Model.css">
</head>
<body>
<?php
	include("file protection.php");//This file shocld not access when user is logged out!
?>
<h2>project group</h2>
<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    </tr>
</table>
</form>
</div><!--- end of style_div -->
<br />
<div id="content-input">
<form method="post">

    <table border="1"  border="1" width="70%" height="80%" align="center" cellpadding="3" class="mytable" cellspacing="10">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>E-mail</th>
        </tr>

        <?php
		 $sql_sel=mysql_query("SELECT * FROM aboutus");
    $i=0;
    while($row=mysql_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['email'];?></td>
        </tr>
    <?php
    }

    ?>
    </table>
</form>
</div>
</body>
</html>
