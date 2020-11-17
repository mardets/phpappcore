<?php

	require("../../appcore/config/dbconfig.php");
	require("../../appcore/config/storage.php");
	require("../../appcore/config/i18n.php");
	require("../../appcore/auth/auth.php");
    require("../../appcore/controller/controller.php");
    require("../../src/util/util.php");
	require('../../src/controller/auth.php');
	require('../../src/controller/booking.php');
	
	BookingController::createBooking();
	
	$req_uri = $_SERVER['REQUEST_URI'];

	
	$param_user = substr(strstr($req_uri, '?'), 6, 5); 
	print_r($param_user);
	$param_immat = substr(strstr($req_uri, '?'), 28);
	print_r($param_immat); 
	//$data = DashboardData::queriesOption($param_user, $param_immat); 

	$uri = 'Location: http://localhost:8083/location/dashboard/dashboard.php?user=';
	$url = "$uri$param_user";
	header($url);
	exit;


?>
