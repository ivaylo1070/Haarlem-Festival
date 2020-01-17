<?php
require("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",16);
$pdf->Image('img/logo.png',0,1,60,60,'PNG','C');



$pdf->Cell(10,10,"Haarlem Festival Ticket",0,1);
$pdf->Cell(10,10,"Payment Details",0,1);

$pdf->output();
 ?>
