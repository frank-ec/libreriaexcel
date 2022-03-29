<?php

require_once "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$mysqli = new mysqli('localhost', 'root', '3201442Ab*', 'emergencia_baseMadre');
mysqli_query($mysqli ,"SET CHARACTER SET 'utf8'");
mysqli_query($mysqli ,"SET SESSION collation_connection ='utf8_unicode_ci'");

if($mysqli->connect_error){
    die('Error en la conexion' . $mysqli->connect_error);
}

// Consulta
$sql = "SELECT * FROM usuarios";
$resultado = $mysqli->query($sql);
// Uso libreria
$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();

$hojaActiva->getColumnDimension ('A')->setWidth(15);
$hojaActiva->setCellValue('A1','ID');
$hojaActiva->getColumnDimension ('B')->setWidth(20);
$hojaActiva->setCellValue('B1','NOMBRE USUARIO');
$hojaActiva->getColumnDimension ('C')->setWidth(50);
$hojaActiva->setCellValue('C1','NOMBRES COMPLETOS');
$fila = 2;

while($rows = $resultado->fetch_assoc()){
    $hojaActiva->setCellValue('A'.$fila, $rows['id']);
    $hojaActiva->setCellValue('B'.$fila, $rows['usuario']);
    $hojaActiva->setCellValue('C'.$fila, $rows['nombres']);
    $fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="sql.xlsx"');
header('Cache-Control: max-age=0');
$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');

?>