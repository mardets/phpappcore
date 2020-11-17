
<?php
	
	require("../appcore/config/dbconfig.php");
	require("../appcore/config/storage.php");
        require("../appcore/auth/auth.php");
        require("../appcore/controller/controller.php");
        require("../src/util/util.php");
	require('../src/controller/auth.php');
	
	$data = AuthController::login();
	
	if($data['profile']['role'] == "admin") {
		//print_r($data['profile']['role_name']);
		$username = $data['profile']['username'];
		$uri = 'Location: http://localhost:8083/location/dashboard/dashboard-admin.php?user=';
		$url = "$uri$username";
	   header($url);
	   exit;
	} else {
		//print_r($data['profile']['role_name']);
		$username = $data['profile']['username'];
		print_r($username);
		$uri = 'Location: http://localhost:8083/location/dashboard/dashboard-client.php?user=';
		$url = "$uri$username";
	   header($url);
	   exit;
	}
	
	
?>
