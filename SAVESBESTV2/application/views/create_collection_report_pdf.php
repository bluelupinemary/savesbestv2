<?php
define('FPDF_FONTPATH','/var/www/html/SAVESBESTV2/application/libraries/fpdf181/font/');
require('/var/www/html/SAVESBESTV2/application/libraries/fpdf181/fpdf.php');



$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$aVar = "Juan DC";
$pdf->Cell(40,10,'Hello World! '.$resultdata);
//$pdf->output('file.pdf','D');
$pdf->output();
?>