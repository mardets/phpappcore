<!DOCTYPE html>
<html>
  <head>
  </head>
  <?php 
  
	require("../appcore/config/dbconfig.php");
	require("../appcore/config/storage.php");
	require("../appcore/config/i18n.php");
	require("../appcore/auth/auth.php");
    	require("../appcore/controller/controller.php");
    	require("../src/util/util.php");
	require('../src/controller/auth.php');
	require('dashboard-data.php');
	
	$lang = Util::evalUrl($_SERVER['REQUEST_URI']);
	
	$lang_fr = '&lang=fr';
	$lang_en = '&lang=en';
	$req_uri = $_SERVER['REQUEST_URI'];
	$french = "$req_uri$lang_fr";
	$eng = "$req_uri$lang_en";

	
	$param = substr(strstr($req_uri, '?'), 6); 
	$data = DashboardData::queries($param);
	//Storage::setItem('data', $data);
	$profile = $data['profile'];
	print_r($data['profile']);
	$username = $data['profile']['username'];
	$firstname = $profile['firstname'];
	$lastname = $profile['lastname'];
	$fullname = "$firstname $lastname";
	print_r($fullname);
	$profiles = $data['profiles'];
	
	if($profile['role'] == 'user') {
		header('Location: dashboard-client.php');
	   exit;	
	}
  
  ?>
  <body>
	<p>Welcome <?php echo $param ?></p>
	<hr>
	<a href=<?php echo "profile/settings.php?user=$username" ?>>Profile</a> |
	<a href=<?php echo "car/list.php?user=$username" ?>>List of Cars</a> |
	<a href=<?php echo "booking/list.php?user=$username" ?>>List of Bookings</a>
  </body>
</html>
