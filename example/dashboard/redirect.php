<?php
	
	$uri = $_SERVER['REQUEST_URI'];

	if(stristr($_SERVER['REQUEST_URI'], 'subscription/new.php')) {
		//echo 'subscription new';
		header('Location: http://localhost:8083/togetherup/dashboard/subscription/new.php');
		exit;	
	} 
	if(stristr($_SERVER['REQUEST_URI'], 'subscription/list.php')) {
echo 'subscription list';
		header('Location: http://localhost:8083/togetherup/dashboard/subscription/list.php');
		exit;
	} 
	if(stristr($_SERVER['REQUEST_URI'], 'profile/network.php')) {
		header('Location: http://localhost:8083/togetherup/dashboard/profile/network.php');
		exit;
	} 
	if(stristr($_SERVER['REQUEST_URI'], 'profile/settings.php')) {
		header('Location: http://localhost:8083/togetherup/dashboard/profile/settings.php');
		exit;
	} 
	if(stristr($_SERVER['REQUEST_URI'], 'withdrawal/list.php')) {
		header('Location: http://localhost:8083/togetherup/dashboard/withdrawal/list.php');
		exit;
	} 
	if(stristr($_SERVER['REQUEST_URI'], 'withdrawal/new.php')) {
		header('Location: http://localhost:8083/togetherup/dashboard/withdrawal/new.php');
		exit;
	}

	if(stristr($_SERVER['REQUEST_URI'], 'dashboard-redirect.php')) {
		header('Location: http://localhost:8083/togetherup/dashboard/dashboard-redirect.php');
		exit;
	}

?>
