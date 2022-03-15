<?php
# Cargar librerias y cosas necesarias
require_once "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\IOFactory;


$rutaArchivo = "F008_PLANTILLA.xlsx";
$documento = IOFactory::load($rutaArchivo);

$totalDeHojas = $documento->getSheetCount();
$hojaActual = $documento->getSheet(0);
$coordenadas = "A1";
$celda = $hojaActual->getCell($coordenadas);
$valorRaw = $celda->getValue();

echo "En <strong>$coordenadas</strong> tenemos el valor <strong>$valorRaw</strong>. ";


?>