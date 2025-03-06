<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

try {

    $spreadsheet = new Spreadsheet();

    // Obtener la hoja de cálculo activa
    $sheet = $spreadsheet->getActiveSheet();

    // Agregar datos a las celdas
    $sheet->setCellValue('A1', 'Facturacion del 2024');
    $sheet->setCellValue('B1', 'Esta es una celda');
    $sheet->setCellValue('A2', 123);
    $sheet->setCellValue('B2', '=A2*2'); // Fórmula simple

    // Estilos básicos
    $sheet->getStyle('A1')->getFont()->setBold(true);
    $sheet->getColumnDimension('A')->setWidth(20);

    // Generar un nombre de archivo dinámico
    $fileName = 'archivo_' . date('Ymd_His') . '.xlsx';

    // Guardar el archivo Excel
    $writer = new Xlsx($spreadsheet);
    $writer->save($fileName);

    // Encabezados de respuesta para la descarga
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    readfile($fileName);

    // Eliminar el archivo temporal
    unlink($fileName);

} catch (Exception $e) {
    echo "Error al generar el archivo Excel: " . $e->getMessage();
}

?>