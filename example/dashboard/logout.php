<?php
	
	require("../appcore/config/dbconfig.php");
	require("../appcore/config/storage.php");
	
	session_destroy();
	Storage::clear();
	header('Location: http://localhost:8083/togetherup/index.php');
	exit;

?>