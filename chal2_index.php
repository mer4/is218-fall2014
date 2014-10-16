<?php

require 'chal2_autoloading.php';

spl_autoload_register('chal2_autoloading::autoload');

$csvFile1 = 'progchal2/data.csv';
$file1 = \progchal2::open($csvFile1);

$csvFile2 = 'progchal2/dict.csv';
$file2 = \progchal2::open($csvFile2);

$handle = new \progchal2\csvOps();
$handle2 = new \progchal2\csvOps();

$records = $handle->headCheck($file1, TRUE);
$names = $handle->headCheck($file2,TRUE);


if(isset($_GET['record'])){
	  $uni = $records[$_GET['record']]['INSTNM'];
}

\progchal2::showName($uni);
	
new \progchal2\showLinks($records, $names);

\progchal2::showTable($records, $names);
 
?>
