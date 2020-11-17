<?php

	require('encoder.php');
	
	class Util {
	
		public static function getDb() {
			$db = new Dbconfig();

			$db->setPassword("");
			$db->setUsername("root");
			$db->setHostname("localhost");
			$db->setDbname("location");
			$db->setPort("3308");
			
			//echo "db exist";
			Dbconfig::getConnection('mysql', $db);
			return $db;
		}	
		
		
		
				
		public static function evalUrl($url) {
			return strcmp(strstr($url, '?'), '?lang=en') !== 0 ? i18n::en() : i18n::fr();
		}
			
	}

?>
