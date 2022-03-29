<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

### Conexion a la base de datos
$mysqli = new mysqli('localhost', 'root', '3201442Ab*', 'emergencia_baseMadre');
mysqli_query($mysqli ,"SET CHARACTER SET 'utf8'");
mysqli_query($mysqli ,"SET SESSION collation_connection ='utf8_unicode_ci'");

if($mysqli->connect_error){
    die('Error en la conexion' . $mysqli->connect_error);
}
// Fin de conexion

## Consulta
$sql = "SELECT * FROM usuarios WHERE id = 1714632575";
$resultado = $mysqli->query($sql);

$documento = new Spreadsheet();

$rutaArchivo = "F008_PLANTILLA.xlsx";
$documento = IOFactory::load($rutaArchivo);

$documento->setActiveSheetIndex(0);
$hojaActiva = $documento->getActiveSheet();

// Array con datos del registro
$row = $resultado->fetch_assoc();

// Almacena datos para asignar nombre de archivo .xlsx
$numeroF08 = $row['id'];
$nombreArchivo = $row['usuario'].'_'.$row['nombres'];
$fechaF08 = date('Y-m-d');

// Imprime datos en la hoja de calculo
  $hojaActiva->setCellValue('BB3', $row['id']);
  $hojaActiva->setCellValue('B7', $row['usuario']);
  $hojaActiva->setCellValue('O7', $row['nombres']);

// $hojaActiva->setCellValue('B2', 'MSP');  Dato manual

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$numeroF08.'_'.$nombreArchivo.'_'.$fechaF08.'.xlsx"');
header('Cache-Control: max-age=0');
$writer = IOFactory::createWriter($documento, 'Xlsx');
$writer->save('php://output');
exit;

?>