<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    require_once('../lib/tcpdf/config/lang/spa.php');
	require_once('../lib/tcpdf/tcpdf.php');
	//require_once('conexion2.php');	
include('../includes/config.php');
    $eid=intval($_GET['i']);
    $id=intval($_GET['d']);
// Extend the TCPDF class to create custom Header and Footer
if($eid==$eid){
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        //background
        $img_file2 = K_PATH_IMAGES.'logof.png';
        $this->Image($img_file2, 85, 40,125, 148.5, '', '', '', false, 300, '', false, false, 0);
        
        // Logo
        $image_file = K_PATH_IMAGES.'logo.png';
        $this->Image($image_file, 10, 3, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	
        // Set font
        $this->SetFont('helvetica', 'b',15);
        // Title
        //$this->Cell(0, 10, 'FORMATO FAR', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        //$this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        // $this->Cell(0, 8, 'DOBLETES GRUPO DE REACCION', 0, false, 'C', 0, '', 0, false, 'M', 'M');
		$image_file3 = K_PATH_IMAGES.'logo.png';
        $this->Image($image_file3, 250, 3, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', '',8);
        // Page number
        //$this->Cell(0, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		//$hoy = date("d-m-Y H:i, time()");
		

		//$this->Cell(0, 10, ' '.$hoy, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        
        
    }
}

// create new PDF document
$pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('JJSH');
$pdf->SetTitle('FORMATO FAR Y FBR');
$pdf->SetSubject('FORMATO FAR');
$pdf->SetKeywords('TCPDF, PDF, FORMATO FAR');

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
	$content='<meta http-equiv="Content-type" content="text/html; charset=utf-8" />';
$content .= '<body>';
$sql = "SELECT * from tblformatab where folio='$eid'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{              
$fecha=$result->regdate;
$fechaEntera = strtotime($fecha);
$anio = date("Y", $fechaEntera);
$mes = date("m", $fechaEntera);
$dia = date("d", $fechaEntera);										
										
										
$folio=$result->folio;

		
	$content .='<h2 align="center">FORMATO FAR</H2>';	
    $content .='<section >';
    $content .='<div align="left">';
    $content .='<table CELLPADDING="2">';	
    $content .='<tr>';
    $content .='<td colspan="5"align="left"></td>';    
    $content .='<td colspan="2" border="1"align="left"><b>FECHA:</b> '.$dia.'-'.$mes.'-'.$anio.'</td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="5"align="left"></td>';
    $content .='<td colspan="2" border="1"align="left"><b>FOLIO:<font color="red"> '.$folio.'</font></b></td>';
    $content .='</tr>';    
            
    $content .= '</table>';
    $content .='</div>';
    $content .='</section>';

    }
$cnt++;}
$content .='<table border="1">';	
	
	$content .='<tr>';
    $content .='<td border="1"align="center"><b>SEDE ORIGEN</b></td>';
	$content .='<td border="1"align="center"colspan="2"><b>TESI REACCION</b></td>';
	$content .='<td border="1"align="center"><b>TURNO</b></td>';
	$content .='<td border="1"align="center"><b>SEDE POR CUBRIR</b></td>';
	$content .='<td border="1"align="center"><b>TURNO</b></td>';
	$content .='<td border="1"align="center"colspan="2"><b>TESI</b></td>';  
    $content .='<td border="1"align="center"><b>MOTIVO</b></td>';
	$content .='<td border="1"align="center"><b>GEN. DOBLETE</b></td>';
    $content .='</tr>'; 
 
	$content .= '</table>';	 



$sql3 = "SELECT * FROM tbldoubletsa where folio='$eid' ";	
$query3 = $dbh -> prepare($sql3);
$dbh ->exec('SET CHARACTER SET utf8');
$query3->execute();
$cnt3=1;
if($query3->rowCount() > 0)
{
    foreach($query3 as $result3)
{ 

$folio=$result3['folio'];
$fecha=$result3['fecha']; 
$sedeorig=$result3['sedeorig']; 		
$tesireac=$result3['tesireac'];
$turnoreac=$result3['turnoreac'];
$sedecubre=$result3['sedecubre'];
$turnocubre=$result3['turnocubre'];
$tesi=$result3['tesi'];
$motivo=$result3['motivo'];
$gen=$result3['gen'];		
$nota=$result3['nota'];
$notasup=$result3['notasup'];	
$action2=$result3['action2'];			
		
   if($gen=='SI'){
	$content .='<table border="1" BGCOLOR="#E74C3C">';		 
    $content .='<tr border="1">';
    $content .='<td align="center"><br> '.$sedeorig.'</td>';
	$content .='<td align="center" colspan="2"><br> '.$tesireac.'</td>';	 
	$content .='<td align="center"><br> '.$turnoreac.'</td>';	 
	$content .='<td align="center"><br> '.$sedecubre.'</td>';
	$content .='<td align="center"><br> '.$turnocubre.'</td>';	 
	$content .='<td align="center"colspan="2"><br> '.$tesi.'</td>';	 
    $content .='<td align="center"><br> '.$motivo.'</td>';
	$content .='<td align="center"><br> '.$gen.'</td>';   
    $content .='</tr>';   
	   
	if($action2=='cimo'){
	$content .='<tr border="1">';  
	$content .='<td border="1"align="center"BGCOLOR="#639DD1"><b>NOTA C.I.M.O.</b></td>';   
	$content .='<td align="center" COLSPAN="9"><br> '.$nota.'</td>';	    
    $content .='</tr>'; 
	}
	else{
	$content .='<tr border="1">';  
	$content .='<td border="1"align="center"><b>NOTA C.I.M.O.</b></td>';   
	$content .='<td align="center" COLSPAN="9"><br> '.$nota.'</td>';	    
    $content .='</tr>'; 
	}   
	   
	$content .='<tr border="1">';  
	$content .='<td border="1"align="center"><b>NOTA OPERACION</b></td>';   
	$content .='<td align="center" COLSPAN="9"><br> '.$notasup.'</td>';	    
    $content .='</tr>';    
    $content .= '</table>';
	   
	   
   }

     else{		 
    $content .='<table border="1">';		 
    $content .='<tr border="1">';
    $content .='<td align="center"><br> '.$sedeorig.'</td>';
	$content .='<td align="center" colspan="2"><br> '.$tesireac.'</td>';	 
	$content .='<td align="center"><br> '.$turnoreac.'</td>';	 
	$content .='<td align="center"><br> '.$sedecubre.'</td>';
	$content .='<td align="center"><br> '.$turnocubre.'</td>';	 
	$content .='<td align="center"colspan="2"><br> '.$tesi.'</td>';	 
    $content .='<td align="center"><br> '.$motivo.'</td>';	 
	$content .='<td align="center"><br> '.$gen.'</td>';	 	 
    $content .='</tr>';    
	if($action2=='cimo'){
	$content .='<tr border="1">';  
	$content .='<td border="1"align="center"BGCOLOR="#639DD1"><b>NOTA C.I.M.O.</b></td>';   
	$content .='<td align="center" COLSPAN="9"><br> '.$nota.'</td>';	    
    $content .='</tr>'; 
	}
	else{
	$content .='<tr border="1">';  
	$content .='<td border="1"align="center"><b>NOTA C.I.M.O.</b></td>';   
	$content .='<td align="center" COLSPAN="9"><br> '.$nota.'</td>';	    
    $content .='</tr>'; 
	}  
	$content .='<tr border="1">';  
	$content .='<td border="1"align="center"><b>NOTA OPERACION</b></td>';   
	$content .='<td align="center" COLSPAN="9"><br> '.$notasup.'</td>';	    
    $content .='</tr>';	      	 
    $content .= '</table>';
     }
    }
$cnt3++;}


$sql2 = "SELECT * FROM tblformatab where folio='$eid' ";	
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
	$content .='<td colspan="2"align="center"><img src="'.$firm3.'" align="left" width="120" height="100"></td>';	
    $content .='<td colspan="2"align="center"><img src="'.$firm2.'" align="left" width="120" height="100"></td>'; 
    $content .='</tr>';   
        
    $content .='<tr>';
    $content .='<td colspan="2"align="CENTER"><b>FIRMA Y NOMBRE DE COORDINACION</b></td>';
	$content .='<td colspan="2"align="CENTER"><b>FIRMA Y NOMBRE DE C.I.M.O</b></td>';	
    $content .='<td colspan="2"align="CENTER"><b>FIRMA Y NOMBRE DIRECCION DE OPERACIONES</b></td>';
    $content .='</tr>';    
            
    $content .= '</table>';
    $content .='</div>';
    $content .='</section>';        
        
   
        
    }
$cnt2++;} 
	
	
    $content .='<br pagebreak="true"/>';
	
	$content .='<h2 align="center">FORMATO FBR</H2>';
	

$$sql = "SELECT * from tblformatab where folio='$eid'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{              
$fecha=$result->regdate;
$fechaEntera = strtotime($fecha);
$anio = date("Y", $fechaEntera);
$mes = date("m", $fechaEntera);
$dia = date("d", $fechaEntera);										
										
										
$folio=$result->folio;
    $content .='<section >';
    $content .='<div align="left">';
    $content .='<table CELLPADDING="2">';	
    $content .='<tr>';
    $content .='<td colspan="5"align="left"></td>';    
    $content .='<td colspan="2" border="1"align="left"><b>FECHA:</b> '.$dia.'-'.$mes.'-'.$anio.'</td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="5"align="left"></td>';
    $content .='<td colspan="2" border="1"align="left"><b>FOLIO:<font color="red"> '.$folio.'</font></b></td>';
    $content .='</tr>';    
            
    $content .= '</table>';
    $content .='</div>';
    $content .='</section>';

    }
$cnt++;}
$content .='<table border="1">';	
	
	$content .='<tr>';
    $content .='<td border="1"align="center"><b>SEDE ORIGEN</b></td>';
	$content .='<td border="1"align="center" colspan="2"><b>TESI REACCION</b></td>';
	$content .='<td border="1"align="center"><b>TURNO</b></td>';
	$content .='<td border="1"align="center"><b>SEDE POR CUBRIR</b></td>';
	$content .='<td border="1"align="center"><b>TURNO</b></td>';
	$content .='<td border="1"align="center"colspan="2"><b>TESI</b></td>';  
    $content .='<td border="1"align="center"><b>MOTIVO</b></td>';
	$content .='<td border="1"align="center"><b>GEN. DOBLETE</b></td>';
    $content .='</tr>'; 
	$content .= '</table>';	 



$sql3 = "SELECT * FROM tbldoubletsb where folio='$eid' ";	
$query3 = $dbh -> prepare($sql3);
$dbh ->exec('SET CHARACTER SET utf8');
$query3->execute();
$cnt3=1;
if($query3->rowCount() > 0)
{
    foreach($query3 as $result3)
{ 

$folio=$result3['folio'];
$fecha=$result3['fecha']; 
$sedeorig=$result3['sedeorig']; 		
$tesireac=$result3['tesireac'];
$turnoreac=$result3['turnoreac'];
$sedecubre=$result3['sedecubre'];
$turnocubre=$result3['turnocubre'];
$tesi=$result3['tesi'];
$motivo=$result3['motivo'];	
$nota=$result3['nota'];
$notasup=$result3['notasup'];		
$gen=$result3['gen'];
$action2=$result3['action2'];		
		
   

		 if($gen=='SI'){
    $content .='<table border="1" BGCOLOR="#E74C3C">';		 
    $content .='<tr border="1">';
    $content .='<td align="center"><br> '.$sedeorig.'</td>';
	$content .='<td align="center" colspan="2"><br> '.$tesireac.'</td>';	 
	$content .='<td align="center"><br> '.$turnoreac.'</td>';	 
	$content .='<td align="center"><br> '.$sedecubre.'</td>';
	$content .='<td align="center"><br> '.$turnocubre.'</td>';	 
	$content .='<td align="center"colspan="2"><br> '.$tesi.'</td>';	 
    $content .='<td align="center"><br> '.$motivo.'</td>';	 
	$content .='<td align="center"><br> '.$gen.'</td>';	 		 
    $content .='</tr>';  
	if($action2=='cimo'){
	$content .='<tr border="1">';  
	$content .='<td border="1"align="center"BGCOLOR="#639DD1"><b>NOTA C.I.M.O.</b></td>';   
	$content .='<td align="center" COLSPAN="9"><br> '.$nota.'</td>';	    
    $content .='</tr>'; 
	}
	else{
	$content .='<tr border="1">';  
	$content .='<td border="1"align="center"><b>NOTA C.I.M.O.</b></td>';   
	$content .='<td align="center" COLSPAN="9"><br> '.$nota.'</td>';	    
    $content .='</tr>'; 
	}
	$content .='<tr border="1">';  
	$content .='<td border="1"align="center"><b>NOTA OPERACION</b></td>';   
	$content .='<td align="center" COLSPAN="9"><br> '.$notasup.'</td>';	    
    $content .='</tr>'; 		 
    $content .= '</table>';
		 }
		else{
			$content .='<table border="1">';		 
    $content .='<tr border="1">';
    $content .='<td align="center"><br> '.$sedeorig.'</td>';
	$content .='<td align="center" colspan="2"><br> '.$tesireac.'</td>';	 
	$content .='<td align="center"><br> '.$turnoreac.'</td>';	 
	$content .='<td align="center"><br> '.$sedecubre.'</td>';
	$content .='<td align="center"><br> '.$turnocubre.'</td>';	 
	$content .='<td align="center"colspan="2"><br> '.$tesi.'</td>';	 
    $content .='<td align="center"><br> '.$motivo.'</td>';	 
	$content .='<td align="center"><br> '.$gen.'</td>';	 		
    $content .='</tr>'; 
    if($action2=='cimo'){
	$content .='<tr border="1">';  
	$content .='<td border="1"align="center"BGCOLOR="#639DD1"><b>NOTA C.I.M.O.</b></td>';   
	$content .='<td align="center" COLSPAN="9"><br> '.$nota.'</td>';	    
    $content .='</tr>'; 
	}
	else{
	$content .='<tr border="1">';  
	$content .='<td border="1"align="center"><b>NOTA C.I.M.O.</b></td>';   
	$content .='<td align="center" COLSPAN="9"><br> '.$nota.'</td>';	    
    $content .='</tr>'; 
	} 
	$content .='<tr border="1">';  
	$content .='<td border="1"align="center"><b>NOTA OPERACION</b></td>';   
	$content .='<td align="center" COLSPAN="9"><br> '.$notasup.'</td>';	    
    $content .='</tr>';		
    $content .= '</table>';
			
			
			
		}
    }
$cnt3++;}


$sql2 = "SELECT * FROM tblformatab where folio='$eid' ";	
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
	$content .='<td colspan="2"align="center"><img src="'.$firm3.'" align="left" width="120" height="100"></td>';	
    $content .='<td colspan="2"align="center"><img src="'.$firm2.'" align="left" width="120" height="100"></td>'; 
    $content .='</tr>';   
        
    $content .='<tr>';
    $content .='<td colspan="2"align="CENTER"><b>FIRMA Y NOMBRE DE COORDINACION</b></td>';
	$content .='<td colspan="2"align="CENTER"><b>FIRMA Y NOMBRE DE C.I.M.O.</b></td>';	
    $content .='<td colspan="2"align="CENTER"><b>FIRMA Y NOMBRE DIRECCION DE OPERACIONES</b></td>';
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
	


	$pdf->output('FORMATO FAR.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+
	
	
}
