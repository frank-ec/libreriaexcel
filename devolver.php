<?php
# Cargar librerias y cosas necesarias
require_once "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\IOFactory;

$rutaArchivo = "F008_PLANTILLA.xlsx";
$documento = IOFactory::load($rutaArchivo);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="file.xlsx"');
header('Cache-Control: max-age=0');
$writer = IOFactory::createWriter($documento, 'Xlsx');
$writer->save('php://output');
exit;


?>