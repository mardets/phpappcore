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
	
	if($profile['role_name'] == 'admin') {
		header('Location: dashboard-admin.php');
	   exit;	
	}
  ?>
  <body>
    <form method="post" action="list.php">
 	<div id="model">
	   <h3>Model</h3>
           <input type="text" name="car_name" placeholder="Name of the car"/>
	   <input type="text" name="brand" placeholder="Brand of the car"/>
           <input type="text" name="model" placeholder="Model of the car"/>
	   <input type="text" name="year" placeholder="Year of edition"/>	
	   <input type="text" name="car_name" placeholder="Name of the car"/>
	   <input type="text" name="car_type" placeholder="Type of the car"/>
	   <input type="number" name="seats" placeholder="Number of seats"/>
	   <input type="number" name="doors" placeholder="Number of doors"/>
	</div>
	<hr>
	<div id="information">
	   <h3>Location Information</h3>
           <input type="text" name="price" placeholder="Name of the car"/>
	   <input type="number" name="days" placeholder="Brand of the car"/>
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
    </form>
    <hr>
    <form method="post" action="upload.php">
	<input type="file" value="Upload">
	<input type="submit" value="Upload"/>
    </form>

  </body>
</html>
