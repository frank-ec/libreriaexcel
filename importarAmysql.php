<?php

require_once "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

$mysqli = new mysqli('localhost', 'root', '3201442Ab*','libreriaexcel');
mysqli_query($mysqli ,"SET CHARACTER SET 'utf8'");
mysqli_query($mysqli ,"SET SESSION collation_connection ='utf8_unicode_ci'");

if($mysqli->connect_error){
    die('Error en la conexion' . $mysqli->connect_error);
}

$nombreArchivo = 'usuarios.xlsx';
$documento = IOFactory::load($nombreArchivo);
$totalHojas = $documento->getSheetCount();

$hojaActual = $documento->getSheet(0);
$numeroFilas = $hojaActual->getHighestDataRow();
$letra = $hojaActual->getHighestColumn();           // Ultima Letra de celda con datos

// Convertir numero a letra de la ultima colummna donde hay datos
$numeroLetra = Coordinate::columnIndexFromString($letra);

for($indiceFila = 1; $indiceFila<=$numeroFilas; $indiceFila++){
        $valorA = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
        $valorB = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
        $valorC = $hojaActual->getCellByColumnAndRow(3, $indiceFila);

$sql = "INSERT INTO usuarios (id, usuario, nombres)
                VALUES ('$valorA', '$valorB', '$valorC')";
        $mysqli->query($sql);
}

echo 'Carga completa';

?>