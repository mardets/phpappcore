<?php

	require("../../appcore/config/dbconfig.php");
	require("../../appcore/config/storage.php");
	require("../../appcore/config/i18n.php");
	require("../../appcore/auth/auth.php");
    require("../../appcore/controller/controller.php");
    require("../../src/util/util.php");
	require('../../src/controller/auth.php');
	require('../../src/controller/booking.php');
	
	BookingController::create();
	
	$req_uri = $_SERVER['REQUEST_URI'];

	
	$param = substr(strstr($req_uri, '&'), 6, 5); 

	$uri = 'Location: http://localhost:8083/location/dashboard/dashboard.php?user=';
	$url = "$uri$param";
	header($url);
	exit;


?>
