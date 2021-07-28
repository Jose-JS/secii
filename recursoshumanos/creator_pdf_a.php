<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    require_once('../lib/tcpdf/config/lang/spa.php');
	require_once('../lib/tcpdf/tcpdf.php');
	//require_once('conexion2.php');	
include('../includes/config.php');
    $eid=intval($_GET['i']);
   $emp=$_GET['emp'];
   $id=$_GET['d'];
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
		//$this->Cell(0, 8, "Report generated with Open-LIMS (" . date("d-m-Y h:i:s", time("now")) . ")", 0, 1, 'L', 0, '', 0, false, 'M', 'M');
        
        
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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

// add a page
$pdf->addPage();

$content = '';
$content .= '<body>';

$sql3 = "SELECT * FROM tblservicedelivery where invoice='$eid' ";	
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
    
	
    $content .='<section>';
    $content .='<div align="left">';
    $content .='<table CELLPADDING="2">';	
    $content .='<tr>';
    $content .='<td colspan="5"align="left"></td>';    
    $content .='<td colspan="2" border="1"align="left"><b>FECHA:</b> '.$date.'</td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="5"align="left"></td>';
    $content .='<td colspan="2" border="1"align="left"><b>FOLIO:<font color="red"> '.$invoice.'</font></b></td>';
    $content .='</tr>';    
            
    $content .= '</table>';
    $content .='</div>';
    $content .='</section>';
    }
$cnt3++;}


$content .='<table border="1">';	
	
	$content .='<tr>';
    $content .='<td border="1"align="center"><b>SEDE</b></td>';
	$content .='<td border="1"align="center"colspan="2"><b>TECNICO</b></td>';
	$content .='<td border="1"align="center"><b>TURNO</b></td>';
	$content .='<td border="1"align="center"><b>MOTIVO</b></td>';
	$content .='<td border="1"align="center"><b>HORA DE RELEVO</b></td>';
	$content .='<td border="1"align="center"><b>FIRMA SUPERVISOR</b></td>';  
    $content .='</tr>'; 
	$content .= '</table>';	 





$sql = "SELECT * FROM tbldoublets where empid='$emp' and id='$id'";	
	$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{

	 foreach($query as $result){ 
$invoice=$result['invoice'];
$datetime=$result['datetime'];  
$service=$result['service'];        
$technical=$result['technical'];
$turn=$result['turn'];
$reason=$result['reason'];
$relaytime=$result['relaytime'];        
$firm=$result['firm'];


 

// set some text to print
    
		 
		 
    $content .='<table border="1">';		 
    $content .='<tr border="1">';
    $content .='<td align="center"><br> '.$service.'</td>';
	$content .='<td align="center" colspan="2"><br> '.$technical.'</td>';	 
	$content .='<td align="center"><br> '.$turn.'</td>';	 
	$content .='<td align="center"><br> '.$reason.'</td>';
	$content .='<td align="center"><br> '.$relaytime.'</td>';	 
	$content .='<td align="center"><img src="'.$firm.'" align="center" width="120" height="100"></td>';  
    $content .='</tr>';    
    $content .= '</table>';
     
$r=$invoice;
        

       
   
    }
$cnt++;}

$sql2 = "SELECT * FROM tblservicedelivery where invoice='$invoice' ";	
$query2 = $dbh -> prepare($sql2);
$dbh ->exec('SET CHARACTER SET utf8');
$query2->execute();
$cnt2=1;
if($query2->rowCount() > 0)
{
    foreach($query2 as $result2)
{ 
$firm1=$result2['firm1'];       
$firm2=$result2['firm2'];        
        
        
    $content .='<section >';
    $content .='<div align="left">';
    $content .='<table  CELLPADDING="2">';	

    
    
    $content .='<tr>';
    $content .='<td colspan="2"align="center"><img src="'.$firm1.'" align="left" width="120" height="100"></td>'; 
    $content .='<td colspan="2"align="center"><img src="'.$firm2.'" align="left" width="120" height="100"></td>'; 
    $content .='</tr>';   
        
    $content .='<tr>';
    $content .='<td colspan="2"align="left"><b>FIRMA DEL SUPERVISOR QUE ENTREGA</b></td>';
    $content .='<td colspan="2"align="left"><b>FIRMA DEL SUPERVISOR QUE RECIBE</b></td>';
    $content .='</tr>';    
            
    $content .= '</table>';
    $content .='</div>';
    $content .='</section>';        
        
   
        
    }
$cnt2++;} 
    

	//$content .= '
		//<div class="row padding">
        //	<div class="col-md-12" style="text-align:center;">
          //  	<span>Pdf Creator </span><a>By sistema sim</a>
            $content .= '</body>';// print a block of text using Write()
	
	$pdf->writeHTML($content, true, 0, true, 0);
   
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table



	
	
//---------código HTML--------------    
//$html = '<h1>HTML Example</h1>
//<div style="text-align:left">FIRMA J.T. O J.S.<br />
//<img src="'.$firm1.'" alt="test alt attribute" width="200" height="100" border="0" />
//</div>';

// output the HTML content
//$pdf->writeHTML($html, true, false, true, false, '');     

	$pdf->lastPage();


	$pdf->output('ANEXO A.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+