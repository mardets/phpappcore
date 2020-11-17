<?php
	
	class Encoder {
	
		public static function decode($str)	{
			
			return json_decode($str, true);
		}
	}
	
	
	

?>