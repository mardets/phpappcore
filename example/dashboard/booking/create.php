<?php

	require("../../appcore/config/dbconfig.php");
	require("../../appcore/config/storage.php");
	require("../../appcore/config/i18n.php");
	require("../../appcore/auth/auth.php");
    require("../../appcore/controller/controller.php");
    require("../../src/util/util.php");
	require('../../src/controller/auth.php');
	
	$data = BookingController::create();
	$uri = 'Location: http://localhost:8083/location/dashboard/booking/list.php?user=';
	$username = $data['username'];
	$ul = "$uri$username";
	header($url);
	exit;


?>
