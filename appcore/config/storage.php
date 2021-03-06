<?php

	class Storage {
		
		public static function getItem($key) {
			$jsonArray = json_decode(Storage::fread('../dashboard/storage.txt'), true);
			//var_dump($jsonArray);
			if(!$jsonArray) {
				$jsonArray = json_decode(Storage::fread('../../files/storage.txt'), true);		
				//var_dump($jsonArray);
			}
			if($jsonArray != NULL) {
				return $jsonArray[$key];
			}
		}
		
		public static function setItem($key, $value) {
			$storage = json_decode(Storage::fread('../dashboard/storage.txt'), true);
			if($storage) {
				$storage = json_decode(Storage::fread('../dashboard/storage.txt'), true);			
			}
			//print_r($storage);
			if(!$storage) {
				$storage = array();
			}
			
			$storage[$key] = $value;
			//print_r($storage);
			Storage::fput('../dashboard/storage.txt', json_encode($storage, true));
		}
		
		public static function removeItem($key) {
			$jsonArray = json_decode(Storage::fread('../dashboard/storage.txt'), true);
			$newJsonArray = array();
			if($jsonArray != NULL && array_key_exists($key, $jsonArray)) {
				foreach($jsonArray as $item => $value) {
					if($value != $jsonArray[$key]) {
						$newJsonArray[$item] = $value;	
					}
				}
			}
			Storage::fput('../dashboard/storage.txt', json_encode($newJsonArray, true));
			
		}
		
		public static function clear() {
			unlink('../dashboard/storage.txt');
		}
		
		public static function fput($filename, $content) {
			// Open the file to get existing content
			file_put_contents($filename, $content);
		}
		
		public static function fread($filename) {
			if(file_exists($filename)) {
				$content = file_get_contents($filename);
				return $content;
			}
		}
		
	}


?>
