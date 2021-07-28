<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    require_once('../lib/tcpdf/config/lang/spa.php');
	require_once('../lib/tcpdf/tcpdf.php');
	//require_once('conexion2.php');	
include('../includes/config.php');
    $eid=intval($_GET['i']);
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        //background
        $img_file2 = K_PATH_IMAGES.'logof.png';
        $this->Image($img_file2, 40, 80,125, 148.5, '', '', '', false, 300, '', false, false, 0);
        
        // Logo
        $image_file = K_PATH_IMAGES.'logo.png';
        $this->Image($image_file, 10, 10, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'b',18);
        // Title
        $this->Cell(0, 10, 'DECLARACION TECNICO', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$sql3 = "SELECT * FROM tblnovelties where id='$eid' ";	
$query3 = $dbh -> prepare($sql3);
$dbh ->exec('SET CHARACTER SET utf8');
$query3->execute();
$cnt3=1;
if($query3->rowCount() > 0)
{
    foreach($query3 as $result3)
{ 
$invoice=$result3['invoice'];
$date=$result3['date'];
$description=$result3['description'];
$firm1=$result3['firm1'];
$firm2=$result3['firm2'];
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('JJSH');
$pdf->SetTitle('ACTA ADMINISTRATIVA');
$pdf->SetSubject('ACTA ADMINISTRATIVA');
$pdf->SetKeywords('TCPDF, PDF, ACTA ADMINISTRATIVA');

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
$pdf->SetFont('helvetica', '',12);
$pdf->addPage();         

$html= '
<div><br />
<table border="0" CELLPADDING="2">
<tr>
<td colspan="8"align="right"></td>
<td colspan="3" border="1" align="left"><b>FOLIO:<font color="red"> '.$invoice.'</font></b></td>
</tr>
<tr>
<td colspan="8"align="right"></td>
<td colspan="3" border="1"align="left"><b>FECHA:</b> '.$date.'</td>
</tr>

<tr>
<td colspan="11" align="center" border="1"><b>BOLETA DE AMONESTACION</b><br> '.$description.'</td>
</tr>
</table>
</div>
</body>


<div>
<table CELLPADDING="2">
<tr>
<td colspan="5"align="center"><img src="'.$firm1.'" align="left" width="100" height="120"></td>
<td colspan="6" align="center"><img src="'.$firm2.'" align="left" width="100" height="120"></td>
</tr>       
<tr>
<td colspan="5"align="center"> <b>FIRMA TECNICO</b></td>
<td colspan="6"align="center"> <b>FIRMA SUPERVISOR</b></td>
</tr>
</table>
</div>
';
    }
$cnt3++;}
 //output the HTML content
$pdf->writeHTML($html, true, 0, true, 0); 
   
$pdf->lastPage();

//---------código HTML--------------    
//$html = '<h1>HTML Example</h1>
//<div style="text-align:left">FIRMA J.T. O J.S.<br />
//<img src="'.$firm1.'" alt="test alt attribute" width="200" height="100" border="0" />
//</div>';

// output the HTML content
//$pdf->writeHTML($html, true, false, true, false, '');     

	$pdf->lastPage();


	$pdf->output('NOVEDADES.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+