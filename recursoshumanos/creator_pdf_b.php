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
        $this->Cell(0, 10, 'ANEXO B', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 8, 'ACTA ADMINISTRATIVA', 0, false, 'C', 0, '', 0, false, 'M', 'M');
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
$sql = "SELECT * FROM tblactadmin where id='$eid' ";	
	$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($query as $result)
{ 
$invoice=$result['invoice'];         
$date=$result['date'];
$reason=$result['reason'];
$technical=$result['technical'];
$turn=$result['turn'];
$service=$result['service'];
$description=$result['description'];
$firm11=$result['firm1'];
$firm22=$result['firm2'];
$empid=$result['empid'];
$content = '';
	
$content .= '<body>';

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

// add a page
$pdf->addPage(); 

// set some text to print

    $content .='<section >';
       
    $content .='<div align="left">';

        
       
    $content .='<table border="1" CELLPADDING="2">';	
            
    $content .='<tr>';
    $content .='<td colspan="3"align="left"><b>MOTIVO:</b> '.$reason.'</td>';
    $content .='<td colspan="2"align="left"><b>FECHA:</b> '.$date.'</td>';
    $content .='<td colspan="2"align="left"><b>FOLIO:<font color="red"> '.$invoice.'</font></b></td>';    
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="3"align="left"> <b>TECNICO:</b> '.$technical.'</td>';    
    $content .='<td colspan="2"align="left"> <b>TURNO:</b> '.$turn.'</td>';
    $content .='<td colspan="2"align="left"> <b>SEDE:</b> '.$service.'</td>';    
    $content .='</tr>';    
            
    $content .= '</table>';
    $content .='</div>';
    $content .='</section>';    
        
        
    $content .='<section >';
    $content .='<div align="left">';    
    $content .='<table border="1">';	    
    
    $content .='<tr>';
    $content .='<td colspan="5"align="center"> <b>DESCRIPCION</b></td>';
    $content .='</tr>';    
    $content .='<tr>';
    $content .='<td colspan="5"align="center"> '.$description.'</td>';
    $content .='</tr>';    
        
        

	
	$content .= '</table>';
    $content .='</div>';
    $content .='</section>';
    
    $content .='<section >';
       
    $content .='<div align="left">';

        
       
    $content .='<table border="0" CELLPADDING="0" CELLSPACING="0" >';	
            
    $content .='<tr>';
    
    $content .='<td colspan="3"align="center"><img src="'.$firm11.'" align="left" width="100" height="120"></td>';
    $content .='<td colspan="3" align="center"><img src="'.$firm22.'" align="left" width="100" height="120"></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="3"align="center" > <b>FIRMA J.T. O J.S</b></td>';
    $content .='<td colspan="3"align="center" > <b>FIRMA TECNICO</b></td>';
    $content .='</tr>';
  
        

    
    $content .= '</table>';
    $content .='</div>';
    $content .='</section>';   
    
$r=$invoice;  
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
$firm3=$result2['firm3'];                
        
        
    $content .='<section >';
    $content .='<div align="left">';
    $content .='<table  CELLPADDING="2">';	

    
    
    $content .='<tr>';
    $content .='<td colspan="2"align="center"><img src="'.$firm1.'" align="left" width="120" height="100"></td>'; 
    $content .='<td colspan="2"align="center"><img src="'.$firm2.'" align="left" width="120" height="100"></td>';
    $content .='<td colspan="2"align="center"><img src="'.$firm3.'" align="left" width="120" height="100"></td>';     
    $content .='</tr>';   
        
    $content .='<tr>';
    $content .='<td colspan="2"align="CENTER"><b>FIRMA DEL SUPERVISOR QUE ENTREGA</b></td>';
    $content .='<td colspan="2"align="CENTER"><b>FIRMA DEL SUPERVISOR QUE RECIBE</b></td>';
     $content .='<td colspan="2"align="CENTER"><b>FIRMA DIRECTOR DE OPERACIONES</b></td>';    
    $content .='</tr>';    
        
    $content .= '</table>';
    $content .='</div>';
    $content .='</section>';        
        
   
        
    }
$cnt2++;} 
       }
    $cnt++;} 

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


	$pdf->output('ANEXO B.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+