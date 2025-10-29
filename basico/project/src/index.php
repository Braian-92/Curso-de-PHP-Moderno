<?php

require_once __DIR__ . '/../vendor/autoload.php';


use app\interfaces\ExcelInterface;
use app\interfaces\DataInterface;
use app\data\BeerData;
use app\excel\CreatorExcel;
use app\business\GeneratorExcel;

$now = date('Y-m-d');

$filesDir = __DIR__ . '/files';
// Crear el directorio files si no existe
if (!is_dir($filesDir)) {
    mkdir($filesDir, 0755, true);
}

$filePath = $filesDir . '/beers-' . $now . '.xlsx';

$repository = new BeerData();
$excel = new CreatorExcel();
$generator = new GeneratorExcel($repository, $excel);

$generator->generate($filePath);

echo "Excel creado exitosamente en: " . $filePath;