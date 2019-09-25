<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/home.css"/>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<title>::. Parking Area Management .::</title>
</head>
<body>
<div id="content">
	<div >
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
		echo "<img src=$image_file width=950px height=308px />";
		?>
    </div>
    
    <div id="space"></div>
    
    <div id="question">
    	What do you know about Parking Area Management?
    </div>
    
    <div id="space"></div>
    
    <div style="text-indent:40px; text-align:justify">
    The main aim of PARKING AREA MANAGEMENT SYSTEM is to provide the parking area efficiently for vehicles in a railway station. For nearly ten years, planners, engineers have wrestled with the challenge presented by the increasing prevalence of the automobiles parking. In order to overcome existing system problems with this new system, Parking area management system is a response to this situation and is the deployment of strategic plans and strategies to plan the Parking area efficiently.

  </div>
</div><!--end of content -->
</body>
</html>
