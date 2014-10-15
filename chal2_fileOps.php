<?php

namespace progchal2;

class fileOps{
		
		public static function open($file){
			$handle = fopen($file, "r");
			return $handle;
		}
		
		public static function close($handle){
			fclose($handle);
		}
	}
	
?>
