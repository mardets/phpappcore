
<?php
	
	require("../appcore/config/dbconfig.php");
	require("../appcore/config/storage.php");
	require("../appcore/config/i18n.php");
        require("../appcore/auth/auth.php");
        require("../appcore/controller/controller.php");
        require("../src/util/util.php");
	require('../src/controller/auth.php');
	require('dashboard-data.php');
	
	$param = '';
	$req_uri = $_SERVER['REQUEST_URI'];
	$param = substr(strstr($req_uri, '?'), 6);
	print_r($param);
	echo $param;
	$data = DashboardData::queries($param);
	print_r($data['profile']['role']);
	
	if($data['profile']['role'] == "admin") {
		$username = $data['profile']['username'];
		$uri = 'Location: http://localhost:8083/location/dashboard/dashboard-admin.php?user=';
		$url = "$uri$username";
	   header($url);
	   exit;
	} else {
		$username = $data['profile']['username'];
		$uri = 'Location: http://localhost:8083/location/dashboard/dashboard-client.php?user=';
		$url = "$uri$username";
	   header($url);
	   exit;	
	}
	
	
?>
