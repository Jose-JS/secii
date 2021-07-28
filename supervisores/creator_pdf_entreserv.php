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
        $this->Image($image_file, 3, 5, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
         $this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        // Set font
        $this->SetFont('helvetica', 'b',25);
        // Title
        $this->Cell(0, 10, 'ENTREGA DE SERVICIO', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 8, 'SUPERVISION', 0, false, 'C', 0, '', 0, false, 'M', 'M');
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
$sql2 = "SELECT * FROM tblservicedelivery where id='$eid' ";	
$query2 = $dbh -> prepare($sql2);
$dbh ->exec('SET CHARACTER SET utf8');
$query2->execute();
$cnt=1;
if($query2->rowCount() > 0)
{
    foreach($query2 as $result2)
{ 
$invoice=$result2['invoice'];
$date=$result2['date'];
$deliverytime=$result2['deliverytime'];
$supervisordelivers=$result2['supervisordelivers'];
$supervisorreceiving=$result2['supervisorreceiving'];
$mountedservice=$result2['mountedservice'];
$news=$result2['news'];
$annexed=$result2['annexed'];
$mountedservice2=$result2['mountedservice2'];
$news2=$result2['news2'];
$annexed2=$result2['annexed2'];
$mountedservice3=$result2['mountedservice3'];
$news3=$result2['news3'];
$annexed3=$result2['annexed3'];
$mountedservice4=$result2['mountedservice4'];
$news4=$result2['news4'];
$annexed4=$result2['annexed4'];        
$departuretime=$result2['departuretime'];        
$firm1=$result2['firm1'];
$firm2=$result2['firm2'];
$firm3=$result2['firm3'];
$zone=$result2['zone'];        
$zone2=$result2['zone2'];        
$zone3=$result2['zone3'];
$zone4=$result2['zone4'];        
$turn=$result2['turn'];                        
$turn2=$result2['turn2'];    
$content = '';        

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
$pdf->SetFont('helvetica', '',13);
$pdf->addPage();         

// set some text to print

    $html = '
<br/>    <br/>    <br/>    <br/>    
<table border="0" CELLPADDING="2" style="border:.3px solid black; border-collapse: collapse;">
<tr>
<td colspan="8"align="right"></td>
<td colspan="3" border="1" align="left"><b>FOLIO:<font color="red"> '.$invoice.'</font></b></td>
</tr>
<tr>
<td colspan="8"align="right"></td>
<td colspan="3" border="1"align="left"><b>FECHA:</b> '.$date.'</td>
</tr>

<tr>
<td colspan="7"align="left"><b>NOMBRE DEL SUPERVISOR QUE ENTREGA:</b><br> '.$supervisordelivers.'</td>
<td colspan="4"align="center"><b>TURNO:</b> '.$turn.'</td>
</tr>

<tr>
<td colspan="7"align="left"><b>NOMBRE DEL SUPERVISOR QUE RECIBE:</b><br> '.$supervisorreceiving.'</td>
<td colspan="4"align="center"><b>TURNO:</b> '.$turn2.'</td>
</tr>

<tr>
<td colspan="7"align="right"></td>
<td colspan="4"align="right" border="1"><b>HORA DE ENTREGA:</b> '.$deliverytime.'</td>
</tr>
</table>

<table CELLPADDING="2" style="border:.3px solid black; border-collapse: collapse;">
<tr>
<td colspan="11"align="center">SERVICIOS POR ZONAS</td>
</tr>
</table>



<table CELLPADDING="2" style="border:.3px solid black; border-collapse: collapse;">
<tr border="1">
<td colspan="6"align="center" style="border-right:.3px solid black;" ><b>SERVICIO VENUS</b> '.$zone.'</td>
<td colspan="6"align="center" ><b>SERVICIO SATURNO '.$zone2.' </b></td>
</tr>
<tr>
<td colspan="6"align="center" style="border-right:.3px solid black;" >SERVICIOS MONTADOS SIN NOVEDAD EN TIEMPO Y FORMA: '.$mountedservice.'</td>
<td colspan="6"align="center">SERVICIOS MONTADOS SIN NOVEDAD EN TIEMPO Y FORMA: '.$mountedservice2.'</td>
</tr>
<tr>
<td colspan="6"align="center" style="border-right:.3px solid black;" ><b>Novedades</b> '.$news.'</td>
<td colspan="6"align="center"><b>Novedades</b> '.$news2.'</td>
</tr>
<tr>
<td colspan="6"align="center" style="border-right:.3px solid black;" ><b>Anexo</b> '.$annexed.'</td>
<td colspan="6"align="center"><b>Anexo</b> '.$annexed2.'</td>
</tr>
</table>



<table CELLPADDING="2" style="border:.3px solid black; border-collapse: collapse;">

<tr>
<td colspan="6"align="center" style="border-right:.3px solid black;" ><b>SERVICIO MARTE '.$zone3.'</b></td>
<td colspan="6"align="center"><b>SERVICIO JUPITER '.$zone4.'</b></td>
</tr>
<tr>
<td colspan="6"align="center" style="border-right:.3px solid black;" >SERVICIOS MONTADOS SIN NOVEDAD EN TIEMPO Y FORMA: '.$mountedservice3.'</td>
<td colspan="6"align="center">SERVICIOS MONTADOS SIN NOVEDAD EN TIEMPO Y FORMA: '.$mountedservice4.'</td>
</tr>
<tr>
<td colspan="6"align="center" style="border-right:.3px solid black;" ><b>Novedades</b> '.$news3.'</td>
<td colspan="6"align="center"><b>Novedades</b> '.$news4.'</td>
</tr>
<tr>
<td colspan="6"align="center" style="border-right:.3px solid black;" ><b>Anexo</b> '.$annexed3.'</td>
<td colspan="6"align="center"><b>Anexo</b> '.$annexed4.'</td>
</tr>
</table>

<table CELLPADDING="2">
<tr>
<td colspan="6"align="right"></td>
<td colspan="6" border="1" align="right"  style="font-size:70%;">HORA DE SALIDA DE SUPERVISOR QUE ENTREGA: '.$departuretime.'</td>
</tr>
</table>

<br/>    <br/> <br/>    <br/> <br/>    <br/>    

';
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

 //output the HTML content
 
$pdf->writeHTML($html, true, false, true, false, '');  
$pdf->writeHTML($content, true, false, true, false, ''); 
   
$pdf->lastPage();

//---------código HTML--------------    
//$html = '<h1>HTML Example</h1>
//<div style="text-align:left">FIRMA J.T. O J.S.<br />
//<img src="'.$firm1.'" alt="test alt attribute" width="200" height="100" border="0" />
//</div>';

// output the HTML content
//$pdf->writeHTML($html, true, false, true, false, '');     

	$pdf->lastPage();


	$pdf->output('ENTREGA DE SERVICO.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+