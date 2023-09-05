<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load("TE01.xlsx");
$d=$spreadsheet->getSheet(0)->toArray();

//echo count($d);
$sheetData = $spreadsheet->getActiveSheet()->toArray();

$i=1;

unset($sheetData[0]);

foreach ($sheetData as $t) {
 // process element here;
// access column by index
	echo $i."---".$t[0].",".$t[1]." <br>";
	$i++;
}

?>