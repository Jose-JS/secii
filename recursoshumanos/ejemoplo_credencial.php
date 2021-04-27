<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    require_once('../lib/tcpdf/config/lang/spa.php');
	require_once('../lib/tcpdf/tcpdf.php');
	//require_once('conexion2.php');	
include('includes/config.php');
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        //background
        $img_file2 = K_PATH_IMAGES.'logof.png';
        $this->Image($img_file2, 10, 10,50, '', '', '', '', false, 300, '', false, false, 0);
        
        // Logo
        $image_file = K_PATH_IMAGES.'logo.png';
        $this->Image($image_file, 10, 10, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'b',18);
        // Title
        $this->Cell(0, 10, 'ANEXO A', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 8, 'DOBLETES GRUPO DE REACCION', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', '',8);
        // Page number
       // $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        
        
    }
}

// create new PDF document
$pdf = new MYPDF('P', 'mm', array(51.5,83), true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('JJSH');
$pdf->SetTitle('Anexo A');
$pdf->SetSubject('Anexo A');
$pdf->SetKeywords('TCPDF, PDF, Anexo A');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '',10);

//P = Horizontal L = Vertical
$eid=intval($_GET['empid']);
//$pdf = new TCPDF('P', 'mm', array(51.5,83));
//Ocultar Cabecera y Pie
//$pdf->setPrintHeader(false);
//$pdf->setPrintFooter(false);
//Generar Pagina
$sql22 = "SELECT * from  tbldocument where idemp='$eid' and name='MEDIO CUERPO'";
$query22 = $dbh -> prepare($sql22);
$dbh ->exec('SET CHARACTER SET utf8');
$query22->execute();


		
if($query22->rowCount() > 0)
{
foreach($query22 as $result22)
{   
	$namedoc=$result22['namedoc']; 
	$content = '';
	$content .= '<body>';
	$content .= '<table>';
	$content .= '<tr>';
	$content .= '<td>';
	$content .= '<img src="'.$namedoc.'" align="left" width="100" height="120">'; 	
	$content .= '</td>';
	$content .= '</tr>';
	$content .= '</table>';
    $content .= '</body>';
    
		} }

   $pdf->AddPage();

	$pdf->writeHTML($content, true, 0, true, 0);
	$pdf->output('ANEXO A.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+