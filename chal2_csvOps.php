<?php

namespace progchal2;

class csvOps{
		
  public function headCheck($handle, $header){
			
    while(($row = fgetcsv($handle, 450, ",")) == TRUE){
			if($header){
				$col_header = $row;
				$header = FALSE;
			} else{
				$record = array_combine($col_header, $row);
				$records[] = $record;
			}
		}
		
		\progchal2::close($handle);
		return $records;
	}
}
	
?>
