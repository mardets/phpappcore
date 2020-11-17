<?php

	require("../../appcore/config/dbconfig.php");
	require("../../appcore/config/storage.php");
	require("../../appcore/config/i18n.php");
	require("../../appcore/auth/auth.php");
    require("../../appcore/controller/controller.php");
    require("../../src/util/util.php");
	require('../../src/controller/auth.php');
	
	$data = BookingController::reject();
	$uri = 'Location: http://localhost:8083/togetherup/dashboard/withdrawal/list.php?user=';
	$username = $data['username'];
	$ul = "$uri$username";
	header($url);
	exit;


?>
