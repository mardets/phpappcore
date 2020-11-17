<!DOCTYPE html>
<html>
  <head>
  </head>
  <?php 
	
	require("../../appcore/config/dbconfig.php");
	require("../../appcore/config/storage.php");
	require("../../appcore/config/i18n.php");
	require("../../appcore/auth/auth.php");
     	require("../../appcore/controller/controller.php");
     	require("../../src/util/util.php");
	require('../../src/controller/auth.php');
	require('../dashboard-data.php');
	
	$lang = Util::evalUrl($_SERVER['REQUEST_URI']);
	
	$lang_fr = '&lang=fr';
	$lang_en = '&lang=en';
	$req_uri = $_SERVER['REQUEST_URI'];
	$french = "$req_uri$lang_fr";
	$eng = "$req_uri$lang_en";

	
	$param_user = substr(strstr($req_uri, '?'), 6, 5); 
	print_r($param_user);
	$param_immat = substr(strstr($req_uri, '?'), 28);
	print_r($param_immat); 
	$data = DashboardData::queriesOption($param_user, $param_immat);
   
	$profile = $data['profile'];
	//print_r($data['profile']['role_name']);
	$role = $profile['role'];
	$username = $data['profile']['username'];
	$firstname = $profile['firstname'];
	$lastname = $profile['lastname'];
	$fullname = "$firstname $lastname";
	$booking = $data['booking'];
	print_r($booking);
	//$location = $data['location'];
	//print_r($location);
  ?>
  <body>
  	 <div id="booking">
	   <h3>Status</h3>
           <p>Booking : <?php echo $booking['status'] ?>
           
	</div>
   
    <hr>
	<a href=<?php echo "redirect.php?link=dashboard/dashboard.php&user=$username" ?>>Dashboard</a> |
	<a href=<?php echo "redirect.php?link=car/list.php&user=$username" ?>>List of Cars</a> |
	<a href=<?php echo "redirect.php?link=booking/list.php&user=$username" ?>>List of Bookings</a>
  </body>
</html>
