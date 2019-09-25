<?php
	echo ("<script language='javascript'>
	window.alert('This is a duplicate vehicle number this vehicle could not be enter into the area')
	window.alert('original vehicle is on slot $slot_no')
	</script>");
	if($call=='1')
		echo ("<script language='javascript'>
		window.location.href='everyone.php?tag=Heavy%20Vehicles_entry'
		</script>");
	if($call=='2')
		echo ("<script language='javascript'>
		window.location.href='everyone.php?tag=Light%20Vehicles_entry'
		</script>");
	if($call=='3')
		echo ("<script language='javascript'>
		window.location.href='everyone.php?tag=Two%20Wheelers_entry'
		</script>");
	die(' ' . mysql_error());
?>
