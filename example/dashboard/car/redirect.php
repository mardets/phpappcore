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
   if(stristr($_SERVER['REQUEST_URI'], 'car/car.php')) {
		$uri = 'Location: http://localhost:8083/location/dashboard/car/car.php?user=';
		$url = "$uri$param";
		header($url);
		exit;	
	} 
	if(stristr($_SERVER['REQUEST_URI'], 'car/update.php')) {
		$uri = 'Location: http://localhost:8083/location/dashboard/car/update.php?user=';
		$url = "$uri$param";
		header($url);
		exit;	
	} 
	if(stristr($_SERVER['REQUEST_URI'], 'car/delete.php')) {
		$uri = 'Location: http://localhost:8083/location/dashboard/car/delete.php?user=';
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
		$uri = 'Location: http://localhost:8083/location/dashboard/booking/list.php?user=';
		$url = "$uri$param";
		header($url);
		exit;	
	} 
	if(stristr($_SERVER['REQUEST_URI'], 'booking/create.php')) {
		$uri = 'Location: http://localhost:8083/location/dashboard/booking/create.php?user=';
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
