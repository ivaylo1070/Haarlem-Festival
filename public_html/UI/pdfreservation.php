
<?php
session_start();
require_once('fpdf/fpdf.php');

//create fpdf object with parameters
$pdf = new fpdf('p','mm','A4');
//add page
$pdf->addPage();
//set font to bold , arial ,14pt
$pdf->setFont('Arial','B',16);
// add cell(width,height,text,border,endline,align)
$pdf->Cell(130,5,'Haarlem Festival',0,0);
$pdf->Cell(59,5,'Reservation proof',0,1); // end of line

//set font to regular , arial ,12pt
$pdf->setFont('Arial','',11);
$pdf->Cell(130,5,'45 Parklaan Street, 2011KR',0,0);
$pdf->Cell(59,5,'',0,1);

$pdf->Cell(130,5,'Haarlem',0,0);
$pdf->Cell(25,5,'Date:',0,0);
$pdf->Cell(34,5, date("d-m-Y"),0,1);

$pdf->Cell(130,5,'Netherlands',0,0);
$pdf->Cell(25,5,'Reservation #',0,0);
$pdf->Cell(34,5,'4567',0,1);

$pdf->Cell(130,5,'Phone [+263 774 163 923]',0,0);
$pdf->Cell(25,5,'Customer ID:',0,0);
$pdf->Cell(34,5,' 45',0,1);
$pdf->Cell(130,5,'    Fax [+263 774 163 923]',0,0);

// make a dummy empty cells
$pdf->Cell(189,10,'',0,1);
// billing address
$pdf->setFont('Arial','B',12);

$pdf->Cell(100,5,'This reservation was made for',0,1);
$pdf->setFont('Arial','',11);


$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5,'Address',0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5,'restaurant  name : '. $_SESSION["RestoName"],0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5,'Located At '.$_SESSION["RestoAddress"],0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5,'Menu price :'.$_SESSION["Menuprice"],0,1);

// make a dummy cell
$pdf->Cell(189,10,'',0,1);

// invoice content
//set set
$pdf->setFont('Arial','',12);

// column headers
$pdf->setFont('Arial','B',12);
$pdf->Cell(10,5,'for',1,0);
$pdf->Cell(120,5,'Description',1,0);
$pdf->Cell(25,5,$_SESSION["Menuprice"],1,0);
$pdf->Cell(34,5,'Total (Euro)',1,1,'C');


$pdf->setFont('Arial','',11);
// display items
  $tax = 0.15 * $_SESSION["Menuprice"];
  $Total = $_SESSION["Menuprice"] + $tax;


// set set


$pdf->Cell(189,15,'',0,1);
$pdf->Cell(130,5,'NB: Payment is at the restaurant for more information visit :',0,1);
$pdf->Cell(130,5,'Visit www.haarlemfestival.com',0,1);
$pdf->Output();

 ?>
