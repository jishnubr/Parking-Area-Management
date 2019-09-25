<?php
	include("file protection.php");
	while($query2=mysql_fetch_array($query))
	{
			echo "<tr>";
			echo "<td>".$query2['slot_no'];
	}
?>
