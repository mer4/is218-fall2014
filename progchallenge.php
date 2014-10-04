<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
	
	class fileOps {
		
		public static function open($file){
			$handle = fopen($file, "r");
			return $handle;
		}
		
		public static function close($handle){
			fclose($handle);
		}
	}
	
	class csvOps extends fileOps{
		
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
				return $records;
		}
		
		public static function headGet($handle, $header){
			
			while(($row = fgetcsv($handle)) == TRUE){
					
					if($header){
						$col_header = $row;
						$header = FALSE;
					} else{
						$record = array_combine($col_header, $row);
						$records[$record['varname']] = $record['varTitle'];
					}	
					
				}
				return $records;
		}
	}
	
	class tableCreator{
		
		public static function showTable($records,$uni_name){
			
			if(isset($_GET[$uni_name])){
				$nfile = fileOps::open('dict.csv');
				$headers = csvOps::headGet($nfile,TRUE);
				
				echo '<table border="2">';
				foreach($records[$_GET[$uni_name]] as $key => $value){
					echo '<tr><th>' . $headers[$key] . '</th>';
					echo '<td>' . $value . '</td></tr>';
				}
				echo '</table>';
			}
		}
	}
	
	class showLinks extends tableCreator{
		
		public function __construct($records){
			$i = -1;
			if(empty($_GET)){
				foreach($records as $record){
					$i++;
					echo '<a href=' . '"http://web.njit.edu/~mer4/IS218/progchallenge.php?record=' .$i. '">' . $record['INSTNM'] . '</a>';
					echo'</p>';
				}
			}
			tableCreator::showTable($records, 'record');
		}
	}

$file = fileOps::open('data.csv');
$handle = new csvOps();
$records = $handle->headCheck($file, TRUE);
new showLinks($records);
	
?>
