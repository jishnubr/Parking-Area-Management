<?php
	include("file protection.php");
	session_start();
	require("conection/connect.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="style/everyone_format.css" />
<link rel="stylesheet" type="text/css" href="style/menu.css"/>
<link rel="stylesheet" type="text/css" href="style/home.css"/>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::. PARKING AREA MANAGEMENT SYSTEM .::</title>
<body>
</div>
<br /><br />
<div id="admin">
	
        <div id="lmain">
               
                <div id="leftmanu">
                	<div >
                        <a href="?tag=home" title="HOME (Shift+Ctrl+H)">HOME</a><br />
                	</div>
                    
                 <div>
                    	<a href="everyone.php?tag=Heavy Vehicles_entry"> &nbsp;Heavy Vehicle Entry </a><br />
                    </div>
                    
                    <div>
                    	<a href="everyone.php?tag=Light Vehicles_entry" >&nbsp;Light Vehicles Entry</a>
                    </div>
                    
                     <div>
                    	<a href="everyone.php?tag=Two Wheelers_entry" >&nbsp;Two Wheelers Entry</a>
                    </div>
                    <div>
                    	<a href="everyone.php?tag=Two WheelerHelmet Entry" >&nbsp;Two Wheeler with &nbsp&nbsp&nbsp&nbsp&nbspa&nbsp&nbspHelmet Entry</a>
                    </div>
                     <div>
                    	<a href="everyone.php?tag=updtvehicle" >&nbsp;Update Vehicle Data</a>
                    </div>
                    
                     <div>
                    	<a href="everyone.php?tag=Vehicle Counts Status" >&nbsp;Vehicle Counts Status</a>
                    </div>
                    
                     <div>
                    	<a href="everyone.php?tag=Leave_Vehicle" >&nbsp;Leave vehicle</a>
                    </div>
                    
                     
                      <div>
                    	<a href="everyone.php?tag=Change Parking Area Limits"  >&nbsp;Change Parking Area &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Limits</a>
                    </div>
                    
                     <div>
                    	<a href="everyone.php?tag=About Us"  >&nbsp;About Us</a>
                    </div>
                    
                </div><!-- end of leftmanu -->
        </div><!--end of lmaim -->
        
        <div>
        
        
        </div>
    <div id="rmain">
    	<div id="pic_manu">
    		&nbsp&nbsp<a href="#" title="Heavy Vehicles"><img src="images/Heavy Vehicles.png" hspace="25px" /></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="#" title="Light Vehicles"><img src="images/Light Vehicles.png" hspace="20px" /></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="#" title="Two Wheelers"><img src="images/Two Wheelers.png" hspace="15px" /></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="#" title="Helmets"><img src="images/Helmets.png" hspace="10px" /></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="#" title="Rates"><img src="images/score.png" hspace="20px" /></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="#" title="create bill"><img src="images/bill.png" hspace="10px" /></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="#" title="Admin"><img src="images/user.png" hspace="15px" /></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="#" title="Contact"><img src="images/contact.png" hspace="10px" /></a>
         </div><!--end of pic_manu -->

         <div id="menu2">
                
                <div style="width:4px; height:37px; padding:0px; margin:0px; float:left;"></div>
                
                <li id="li_menu"><a href="">Heavy Vehicle</a>
                
                    
                    <ul>
                        <li id="li_submenu">
                        <a href="everyone.php?tag=Heavy Vehicles_entry" >Entry</a></li>
                        <li id="li_submenu"><a href="everyone.php?tag=view_Heavy Vehicles" >View</a></li>
                    </ul>
                
                
                </li>
                <li id="li_menu"><a href="#">Light Vehicle</a>
                    
                    <ul>
                        <li id="li_submenu">
                        <a href="everyone.php?tag=Light Vehicles_entry" >Entry</a></li>
                        <li id="li_submenu"><a href="everyone.php?tag=view_Light Vehicles" >View</a></li>
                    </ul>
                
                </li>
                <li id="li_menu"><a href="">Two Wheeler</a>
                
                    
                    <ul>
                        <li id="li_submenu"><a href="everyone.php?tag=Two Wheelers_entry" >Entry</a></li>
                        <li id="li_submenu"><a href="everyone.php?tag=view_Two Wheelers" >View</a></li>
                    </ul>
                
                
                </li>
                <li id="li_menu"><a href="#">Helmet</a>
                
                    
                    <ul>
                    	<li id="li_submenu"><a href="everyone.php?tag=Helmets_entry" >Entry</a></li>
                        <li id="li_submenu"><a href="everyone.php?tag=view_Helmets" >View</a></li>
                    </ul>
                
                
                </li>
           <li id="li_menu"><a href="">Rates</a>
                
                    
                    <ul>
                        
                        <li id="li_submenu"><a href="everyone.php?tag=Rates_Entry" >Entry</a></li>
                        <li id="li_submenu"><a href="everyone.php?tag=View_Rates" >View</a></li>
                    </ul>
                
                
                </li>
                
                <li id="li_menu" style="border-right:#CCC"><a href="">Billing</a>
                    <ul>
                        <li id="li_submenu"><a href="everyone.php?tag=Leave_Vehicle" >Generate Bill</a></li>
                        <li id="li_submenu"><a href="everyone.php?tag=view_bill" >View Bill</a></li>
			  <li id="li_submenu"><a href="everyone.php?tag=view_token" >View Tokens</a></li>
                    </ul>
                    
                </li>
              
               <li id="li_menu" style="border-right:#CCC"><a href="">Admin</a>
                
                    
                    <ul>
                        <li id="li_submenu"><a href="everyone.php?tag=users_entry" >Update</a></li>
                        <li id="li_submenu"><a href="everyone.php?tag=view_users" >View</a></li>
			<li id="li_submenu"><a href="everyone.php?tag=userLogout" >Logout</a></li>
			<li id="li_submenu"><a href="everyone.php?tag=Drop" >Drop DB</a></li>
                    </ul>
                    
                </li>
                
                
                </li>
                <li id="li_menu"><a href="">Contact</a>
                
                	<ul>
                        <li id="li_submenu"><a href="everyone.php?tag=About Us" >About Us</a></li>
                
                	</ul>
                </li>
                           
      </div><!--end of menu2--> 
            
            
            <div id="contents">
            
            	<div id="informations">
                	<div id="in_informations">
				<?php
   						if($tag=="home" or $tag=="")
							include("home.php");
                        elseif($tag=="Heavy Vehicles_entry")
                            include("Heavy Vehicles_Entry.php");
                        elseif($tag=="Light Vehicles_entry")
                            include("Light Vehicles_Entry.php");
                        elseif($tag=="Rates_Entry")
                            include("update_rate.php");	
                        elseif($tag=="Helmets_entry")
                            include("Helmets_Entry.php");
			 elseif($tag=="updtvehicle")
                            include("updtvehicle.php");
			elseif($tag=="Two WheelerHelmet Entry")
                            include("Two_wheelers_with_a helmet Entry.php");
                        elseif($tag=="Two Wheelers_entry")
                            include("Two Wheelers_Entry.php");
                        elseif($tag=="users_entry")
                            include("User_Update.php");	
                        elseif($tag=="view_Heavy Vehicles")
                            include("View_Heavy Vehicles select.php");

						elseif($tag=="view_Light Vehicles")
							include("View_Light Vehicles select.php");
						elseif($tag=="view_Helmets")
							include("View_helmet select.php");

						elseif($tag=="About Us")
							include("About Us.php");

						elseif($tag=="Vehicle Counts Status")
							include("vehicle_count.php");

						elseif($tag=="View_Rates")
							include("View_Rates.php");
						elseif($tag=="view_users")
							include("profile.php");
						elseif($tag=="userLogout")
						echo ("<script language='javascript'>
						window.alert('You are Loggedout Successfully')
						window.location.href='logout.php'
						</script>");
						elseif($tag=="Change Parking Area Limits")
						include("update_limit_checker.php");
						elseif($tag=="view_Two Wheelers")
							include("View_two wheeler select.php");
						elseif($tag=="Leave_Vehicle")
							include("Leaving_a_vehicle.php");
						elseif($tag=="view_bill")
							include("view_bill.php");
						elseif($tag=="view_token")
							include("view_token.php");
						elseif($tag=="Drop")
							include("Drop db.php");
                        ?>
                    </div><!--end of in_informations -->
                </div><!--end of informations -->
    		</div><!--end of contens -->   
     </div><!--end of rmain -->
    	
    </div><!--end of admin -->

</body>
</html>
