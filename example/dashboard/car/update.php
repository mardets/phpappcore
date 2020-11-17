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
	$username = $data['profile']['username'];
	$firstname = $profile['firstname'];
	$lastname = $profile['lastname'];
	$fullname = "$firstname $lastname";
	$car = $data['car'];
	$location = $data['location'];
	$name = $car['car_name'];
	
  ?>
  <body>
    <form method="post" action=<?php echo "edit.php?user=$username&immatriculation=$param_immat" ?>>
 	<div id="model">
	   <h3>Model</h3>
           <input type="text" name="car_name" placeholder="Name of the car" value=<?php echo $name ?> >
	   <input type="text" name="brand" placeholder="Brand of the car" value=<?php echo $car['brand'] ?> />
           <input type="text" name="model" placeholder="Model of the car" value=<?php echo $car['model'] ?> />
	   <input type="text" name="year" placeholder="Year of edition" value=<?php echo $car['year'] ?> />
	   <input type="text" name="immatriculation" placeholder="Car Immatriculation" value=<?php echo $car['immatriculation'] ?> />	
	   <input type="text" name="type_car" placeholder="Type of the car" value=<?php echo $car['type_car'] ?> />
	   <input type="number" name="seats" placeholder="Number of seats" value=<?php echo $car['seats'] ?> />
	   <input type="number" name="doors" placeholder="Number of doors" value=<?php echo $car['doors'] ?> />
	   <input type="text" name="location_price" placeholder="Location price" value=<?php echo $car['location_price'] ?> />
	</div>
	<input type="submit" value="Update">
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
