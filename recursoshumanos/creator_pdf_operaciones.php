<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    require_once('../lib/tcpdf/config/lang/spa.php');
	require_once('../lib/tcpdf/tcpdf.php');
	//require_once('conexion2.php');	
include('../includes/config.php');
    $eid=intval($_GET['empid']);
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        //background
        $img_file2 = K_PATH_IMAGES.'logof.png';
        $this->Image($img_file2, 40, 80,125, 148.5, '', '', '', false, 300, '', false, false, 0);
        
        // Logo
        $image_file = K_PATH_IMAGES.'logo.png';
        $this->Image($image_file, 10, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'b',18);
        // Title
        $this->Cell(0, 10, 'BOLETA DE OPERATIVA', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        //$this->Cell(0, 8, 'INFORMACION PERSONAL', 0, false, 'C', 0, '', 0, false, 'M', 'M');
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
$sql = "SELECT * FROM tblemployees where id='$eid' ";	
	$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($query as $result)
{ 
$matricula=$result['EmpId'];         
$puesto=$result['Department'];
$nombre=$result['name'];
$apellidopa=$result['FirstName'];
$apellidoma=$result['LastName'];
$edad=$result['age'];
$rfc=$result['rfc'];
$curp=$result['curp'];
$imss=$result['imss'];			
$calle=$result['Address'];		
$colonia=$result['suburb'];		
$municipio=$result['City'];		
$estado=$result['Country'];		
$cp=$result['cp'];
$sede=$result['assignedservice'];	
$fechaingreso=$result['fechaingreso'];
$fechacapacitacion=$result['fechacapacitacion'];
$phonelocal=$result['phonelocal'];
$phonerecado=$result['phonerecado'];   
$mobileno=$result['Phonenumber']; 
$content = '';
	
$content .= '<body>';

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('JJSH');
$pdf->SetTitle('BOLETA DE OPERATIVA');
$pdf->SetSubject('BOLETA DE OPERATIVA');
$pdf->SetKeywords('TCPDF, PDF, BOLETA DE OPERATIVA');

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
$pdf->SetFont('helvetica', '',11);

// add a page
$pdf->addPage(); 

// set some text to print
	$content .='<br>';
	$content .='<br>';
$sql2 = "SELECT * FROM tbldocument where idemp='$eid' and name='MEDIO CUERPO'";	
$query2 = $dbh -> prepare($sql2);
$dbh ->exec('SET CHARACTER SET utf8');
$query2->execute();
$cnt2=1;
if($query2->rowCount() > 0)
{
    foreach($query2 as $result2)
{ 
$imagen=$result2['namedoc'];       
    
		

		
    $content .='<section >';
    $content .='<div align="left">';
    $content .='<table  CELLPADDING="2">';	
	$content .='<tr>';
    $content .='<td colspan="4"align="LEFT"></td>';     
    $content .='</tr>'; 
	$content .='<tr>';
    $content .='<td colspan="4"align="LEFT"></td>';     
    $content .='</tr>'; 	
    $content .='<tr>';
    $content .='<td colspan="4"align="LEFT"><b>FECHA DE CAPACITACION:</b>'.$fechacapacitacion.'<br><b>ENTREGA DE SERVICIO:</b>'.$fechaingreso.'</td>'; 
    $content .='</tr>';      
    $content .='<tr>';    
    $content .='<td colspan="4"align="right"><img src="'.$imagen.'" align="left" width="100" height="120"></td>';         
    $content .='</tr>';   
	 
        
    $content .= '</table>';
    $content .='</div>';
    $content .='</section>';        
        
   
        
    }
$cnt2++;} 
   
        
        
		
		
    $content .='<section >';
    $content .='<div align="left">';    
    $content .='<table border="0">';	    
    
    $content .='<tr>';
    $content .='<td colspan="2"align="left"> <b>MATRICULA:</b>'.$matricula.'</td>';  	
	$content .='<td colspan="2"align="left"> <b>NO.IMSS:</b>'.$imss.'</td>'; 
	$content .='<td colspan="2"align="left"> <b>EDAD:</b>'.$edad.'</td>';
	$content .='</tr>';    
		
	$content .='<tr>';	
	$content .='<td colspan="2"align="left"> <b>PUESTO:</b>'.$puesto.'</td>';
	$content .='<td colspan="2"align="left"> <b>RFC:</b>'.$rfc.'</td>'; 
	$content .='<td colspan="2"align="left"> <b>CURP:</b>'.$curp.'</td>'; 	
	$content .='</tr>';    	
	$content .= '</table>';
    $content .='</div>';
    $content .='</section>';	
		
	$content .='<section >';
    $content .='<div align="left">';    
    $content .='<table border="0">';	    	
	$content .='<tr>';	
	$content .='<td colspan="2"align="left"> <b>NOMBRE DEL TESI:</b>'.$nombre.' '.$apellidopa.' '.$apellidoma.'</td>'; 			
	$content .='<br>'; 		
	$content .='</tr>';    	
			
			
  	
	$content .='<tr>';	
    $content .='<br>'; 		
	$content .='<td colspan="2"align="left"> <b>DIRECCION:</b>'.$calle.' '.$colonia.' '.$municipio.' '.$estado.' '.$cp.'</td>';
   	$content .='</tr>';
		$content .= '</table>';
    $content .='</div>';
    $content .='</section>';
		
	$content .='<section >';
    $content .='<div align="left">';    
    $content .='<table border="0">';	    		
	$content .='<tr>';	
	$content .='<td colspan="2"align="left"> <b>NUMEROS TELEFONICOS</b></td>'; 
	$content .='</tr>'; 
	$content .='<tr>';		
	$content .='<td colspan="2"align="left"> <b>CELULAR:</b>&nbsp;&nbsp;&nbsp;&nbsp;'.$mobileno.'</td>';
	$content .='</tr>'; 	
	$content .='<tr>';		
	$content .='<td colspan="2"align="left"> <b>TELEFONO LOCAL:</b>&nbsp;&nbsp;&nbsp;&nbsp;'.$phonelocal.'</td>';	
	$content .='</tr>'; 	
	$content .='<tr>';		
	$content .='<td colspan="2"align="left"> <b>TELEFONO DE RECADOS:</b>&nbsp;&nbsp;&nbsp;&nbsp;'.$phonerecado.'</td>';	
	$content .='</tr>';  
	$content .= '</table>';
    $content .='</div>';
    $content .='</section>';
		
	$content .='<section >';
    $content .='<div align="left">';
    $content .='<table  CELLPADDING="2">';		
	$content .='<tr>';	
	$content .='<td colspan="2"align="center"> <b>SEDE DE ASIGNACION:</b></td>';
	$content .='</tr>';	
	$content .='<tr>';	
	$content .='<td colspan="2"align="center"> '.$sede.'</td>';	
	$content .='</tr>';	
    $content .= '</table>';
    $content .='</div>';
    $content .='</section>';
	$content .='<BR>';	
	$content .='<BR>';	
	$content .='<BR>';	
	$content .='<BR>';	
	$content .='<BR>';	
	$content .='<BR>';	
	$content .='<BR>';	
	$content .='<BR>';
    
	$content .='<section >';
    $content .='<table  CELLPADDING="2">';		
	$content .='<tr>';	
	$content .='<td colspan="2"align="LEFT"> <b>LIC. SILVIA LETICIA ZEPEDA OSORIO</b></td>';
	$content .='<td colspan="2"align="RIGHT"> <b>DIRECCION DE OPERACIONES</b></td>';
	$content .='</tr>';	
	$content .='<tr>';	
	$content .='<td colspan="4"align="LEFT">DIRECCION DE RECURSOS HUMANOS</td>';	
	$content .='</tr>';	
    $content .= '</table>';
    $content .='</section>';
    
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



	
	
//---------c??digo HTML--------------    
//$html = '<h1>HTML Example</h1>
//<div style="text-align:left">FIRMA J.T. O J.S.<br />
//<img src="'.$firm1.'" alt="test alt attribute" width="200" height="100" border="0" />
//</div>';

// output the HTML content
//$pdf->writeHTML($html, true, false, true, false, '');     

	$pdf->lastPage();


	$pdf->output('BOLETA DE OPERATIVA.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+