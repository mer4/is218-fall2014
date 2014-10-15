<?php

namespace progchal2;

class showLinks{
		
		public function __construct($records, $names){
			$i = -1;
			if(empty($_GET)){
				foreach($records as $record){
					$i++;
					\progchal2::links('record', $i, $record['INSTNM']);
				}
			}
		}
	}
	
	?>
