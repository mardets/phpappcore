<?php
	
	$req_uri = $_SERVER['REQUEST_URI'];

	
	$param = substr(strstr($req_uri, '&'), 6); 

	if(stristr($_SERVER['REQUEST_URI'], 'car/new.php')) {
		$uri = 'Location: http://localhost:8083/location/dashboard/car/new.php?user=';
		$url = "$uri$param";
		header($url);
		exit;	
	} 
	if(stristr($_SERVER['REQUEST_URI'], 'car/list.php')) {
		$uri = 'Location: http://localhost:8083/location/dashboard/car/list.php?user=';
		$url = "$uri$param";
		header($url);
		exit;	
	} 
	if(stristr($_SERVER['REQUEST_URI'], 'profile/settings.php')) {
		$uri = 'Location: http://localhost:8083/location/dashboard/profile/settings.php?user=';
		$url = "$uri$param";
		header($url);
		exit;	
	} 
	if(stristr($_SERVER['REQUEST_URI'], 'booking/list.php')) {
		$uri = 'Location: http://localhost:8083/location/dashboard/location/list.php?user=';
		$url = "$uri$param";
		header($url);
		exit;	
	} 
	if(stristr($_SERVER['REQUEST_URI'], 'dashboard/dashboard.php')) {
		$uri = 'Location: http://localhost:8083/location/dashboard/dashboard.php?user=';
		$url = "$uri$param";
		header($url);
		exit;	
	}
?>
