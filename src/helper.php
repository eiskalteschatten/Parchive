<?php
	class Helper {
		public static function echoWithSpaces($value) {
			echo "\n" . $value . "\n\n";
		}
		
		public static function stripProtocol($url) {
			$url = str_replace("http://", "", $url);
			$url = str_replace("https://", "", $url);
			
			return $url;
		}
		
		public static function prepareUrl($url) {
			$url = trim($url, "/");
			
			return $url;
		}
		
		public static function createDirIfDoesntExist($dir) {
			
		}
	}	
?>