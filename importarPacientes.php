<?php

require_once "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

// $mysqli = new mysqli('localhost', 'root', '3201442Ab*','libreriaexcel');
$mysqli = new mysqli('localhost', 'root', '3201442','libreriaexcel');

mysqli_query($mysqli ,"SET CHARACTER SET 'utf8'");
mysqli_query($mysqli ,"SET SESSION collation_connection ='utf8_unicode_ci'");

if($mysqli->connect_error){
    die('Error en la conexion' . $mysqli->connect_error);
}

$nombreArchivo = 'pacientes.xlsx';
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
                    $valorD = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
                    $valorE = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
                    $valorF = $hojaActual->getCellByColumnAndRow(6, $indiceFila);
                    $valorG = $hojaActual->getCellByColumnAndRow(7, $indiceFila);
                    $valorH = $hojaActual->getCellByColumnAndRow(8, $indiceFila);
                    $valorI = $hojaActual->getCellByColumnAndRow(9, $indiceFila);
                    $valorJ = $hojaActual->getCellByColumnAndRow(10, $indiceFila);
                    $valorK = $hojaActual->getCellByColumnAndRow(11, $indiceFila);
                    $valorL = $hojaActual->getCellByColumnAndRow(12, $indiceFila);
                    $valorM = $hojaActual->getCellByColumnAndRow(13, $indiceFila);
                    $valorN = $hojaActual->getCellByColumnAndRow(14, $indiceFila);
                    $valorO = $hojaActual->getCellByColumnAndRow(15, $indiceFila);
                    $valorP = $hojaActual->getCellByColumnAndRow(16, $indiceFila);
          
            $sql = "INSERT INTO pacientes
                    (idti, hcu, cc, apellidos, nombres, nombre_padre, nombre_madre, fecha_nac, email,
                    fecha_reg, fecha_uc, estado, conteo, usuario_reg, usuario_uc, nota)
                    VALUES
                    ('$valorA','$valorB', '$valorC', '$valorD', '$valorE', '$valorF', '$valorG',
                     '$valorH', '$valorI', '$valorJ', '$valorK', '$valorL', '$valorM',
                     '$valorN', '$valorO', '$valorP')";
                    $mysqli->query($sql);

            /*    Validación para omitir subida de archivos  que contenga valor A en la columna 3
                      if($valorC != 'A'){
                                $sql = "INSERT INTO usuarios
                                        (id, usuario, nombres)
                                        VALUES
                                        ('$valorA', '$valorB', '$valorC')";
                                        $mysqli->query($sql);
                        }
            */
            }

echo 'Carga completa';

?>