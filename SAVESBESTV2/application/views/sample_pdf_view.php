<?php
define('FPDF_FONTPATH','/var/www/html/SAVESBESTV2/application/libraries/fpdf181/font/');
require('/var/www/html/SAVESBESTV2/application/libraries/fpdf181/fpdf.php');




$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
//$pdf->output('file.pdf','D');
$pdf->output();
?>