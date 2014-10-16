<?php

namespace progchal2;
	
class tableCreator{
		
  public static function showTable($records, $names){
		if(isset($_GET['record'])){
			echo '<table border="2">';
			$i = 0;
			foreach($records[$_GET['record']] as $key => $value){
					echo'<tr><th>' . $names[$i]['varTitle'] . '</th>';
					echo '<td>' . $value . '</td></tr>';
					$i++;
			}
			echo'</table>';
		}
	}
		
	public static function links($prim, $sec, $thir){
    echo '<a href="?' . $prim . '=' . $sec . '">' . $thir . '</a>';
		echo'<br>';
	}
	
	public static function showName($uni){
		if(empty($_GET)){
				echo '<h2 id="uni_name">Record</h1>';
		} else{
				echo '<h2 id="uni_name">' . $uni . '</h1>';
		}
	}
}

?>
