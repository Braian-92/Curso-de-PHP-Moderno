<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$now = Carbon::now();

// echo "la fecha actual es: " . $now->toDateTimeString();

$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Nombre');
$sheet->setCellValue('A2', 'Braian');

$writer = new Xlsx($spreadsheet);

$filename = 'exceles/myExcel.xlsx';
$writer->save($filename);

echo "Excel creado exitosamente en: " . $filename;

?>





