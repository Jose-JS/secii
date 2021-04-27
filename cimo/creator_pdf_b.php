<?php
	require_once('../lib/tcpdf/config/lang/spa.php');
	require_once('../lib/tcpdf/tcpdf.php');
	require_once('consulta2.php');
	include('includes/config.php');
	
	
	$objConsulta=$dbh;
	$perfil="";
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('sistemas sim');
$pdf->SetTitle('FICHA TECNICA');
$pdf->SetSubject('FICHA TECNICA');
$pdf->SetKeywords('Reporte, usuario, ficha tecnica, mysql');
$image_file = K_PATH_IMAGES.'logo.png';
        $this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);



$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

$pdf->SetFont('helvetica', '', 9, '', true);

// Add a page 
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();



//$mask = $pdf->Image('../lib/reportes/logo.png', 50, 140, 100, '', '', '', '', false, 300, '', true);
//$pdf->Image('../lib/reportes/logo.png', 50, 140, 100, '', '', '', '', false, 300, '', false, $mask);
//*************
  ob_end_clean();//rompimiento de pagina
//************* 
 
$html = $objConsulta->reportePdfUsuarios();
$pdf->writeHTMLCell($w=0, $h=0, $x='1', $y='1', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
//$mask = $pdf->Image('../lib/reportes/logopdf.png', 50, 140, 100, '', '', '', '', false, 300, '', true);
  //  $pdf->Image('../lib/reportes/logopdf.png', 50, 140, 100, '', '', '', '', TRUE, 300, '', false, $mask);
$pdf->Output('Reporte usuarios.pdf', 'I');
?>
