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
	$car = $data['car'];
	print_r($car);
	$location = $data['location'];
	//print_r($location);
  ?>
  <body>
  	 <div id="model">
	   <h3>Model</h3>
	   <?php 
		$car_name = $car['car_name'];
		$type_car = $car['type_car'];
		$year = $car['year'];
		$seats = $car['seats'];
	   ?>
           <p>Véhicule <?php echo "$car_name $type_car" ?><?php echo " année $year : $seats places"  ?></p>
           
	</div>
    <?php if(strcmp($role, 'client') === 0): ?> 
    <form method="post" action=<?php echo "booking-create.php?user=$username&immatriculation=$param_immat" ?>>
 	
	<hr>
	<div id="information">
	   <h3>Location Information</h3>
	   <input type="number" name="days" placeholder="Days of location"/>
	   <select name="type">
	      <option>Riding</option>
	      <option>Travelling</option>
	   </select>
           <select name="itinerary">
	      <option>Between 5 - 20 km</option>
	      <option>Between 21 - 50 km</option>
	      <option>Between 51 - 100 km</option>
	      <option>Between 101 - 150 km</option>
	      <option>Between 151 - 300 km</option>
	      <option> > 301 km</option>
	   </select>
	</div>
	<input type="submit" value="Booking">
    </form>
    <?php endif; ?>
    <hr>
    <form method="post" action=<?php echo "upload.php?user=$username" ?>>
	<input type="file" value="Upload">
	<input type="submit" value="Upload"/>
    </form>
    <hr>
	<a href=<?php echo "redirect.php?link=dashboard/dashboard.php&user=$username" ?>>Dashboard</a> |
	<a href=<?php echo "redirect.php?link=car/list.php&user=$username" ?>>List of Cars</a> |
	<a href=<?php echo "redirect.php?link=booking/list.php&user=$username" ?>>List of Bookings</a>
  </body>
</html>
