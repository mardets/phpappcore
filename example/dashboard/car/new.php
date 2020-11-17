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

	
	$param = substr(strstr($req_uri, '?'), 6); 
	$data = DashboardData::queries($param);

	$profile = $data['profile'];
	//print_r($data['profile']['role_name']);
	$username = $data['profile']['username'];
	$firstname = $profile['firstname'];
	$lastname = $profile['lastname'];
	$fullname = "$firstname $lastname";
	$car = $data['car'];
	$location = $data['location'];
	
  ?>
  <body>
    <form method="post" action=<?php echo "create.php?user=$username" ?>>
 	<div id="model">
	   <h3>Model</h3>
           <input type="text" name="car_name" placeholder="Name of the car"/>
	   <input type="text" name="brand" placeholder="Brand of the car"/>
           <input type="text" name="model" placeholder="Model of the car"/>
	   <input type="text" name="year" placeholder="Year of edition"/>	
	   <input type="text" name="immatriculation" placeholder="Car Immatriculation"/>
	   <input type="text" name="type_car" placeholder="Type of the car"/>
	   <input type="number" name="seats" placeholder="Number of seats"/>
	   <input type="number" name="doors" placeholder="Number of doors"/>
	   <input type="text" name="location_price" placeholder="Location price"/>
	</div>
	
	<input type="submit" value="Create">
    </form>
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
