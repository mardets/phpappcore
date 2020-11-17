<?php 
	
	require("../../src/config/dbconfig.php");
	require("../../src/auth/auth.php");
     	require("../../src/controller/controller.php");
     	require("../../src/util/util.php");
	require('../../src/controller/auth.php');

	$data = AuthController::register();
	var_dump($data);


?>
