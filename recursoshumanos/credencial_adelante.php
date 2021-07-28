<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    require_once('../lib/tcpdf/config/lang/spa.php');
	require_once('../lib/tcpdf/tcpdf.php');
	//require_once('conexion2.php');	
include('../includes/config.php');
  $ids=$_GET['idemp']; 

if($ids=='ASLO SEGURIDAD PRIVADA S.A. DE C.V.'){
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        //background
       // $img_file2 = K_PATH_IMAGES.'fondocredencialOme.jpg';
		//$this->Image($img_file2, 0, 0, 210, 125, '', '', '', false, 300, '', false, false, 0);
       // $this->Image($img_file2,10,8,22);
        
        // Logo
        //$image_file = K_PATH_IMAGES.'LOGO OME.jpg';
        //$this->Image($image_file, 10, 5, 20, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        //$this->SetFont('helvetica', 'b',18);
        // Title
        //$this->Cell(0, 10, 'CREDENCIAL FRENTE', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        //$this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', '',2);
        // Page number
       // $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        
        
    }
}
}

// create new PDF document
//$pdf = new MYPDF('P', 'cm', array(51.5,83));
//Ocultar Cabecera y Pie
//$pdf->setPrintHeader(false);
//$pdf->setPrintFooter(false);
//Generar Pagina
//$pdf->AddPage();
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$eid=intval($_GET['empid']);
	$sql = "SELECT * FROM tblemployees where id='$eid' ";	
	$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{
    foreach($query as $result)
{ 
$image=$result['id'];
$department=$result['Department'];
        
$name=$result['name'];
$firstname=$result['FirstName'];
$lastname=$result['LastName'];
$curp=$result['curp'];
$rfc=$result['rfc'];
$typeblood=$result['typeblood']; 		
$content = '';


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('JJSH');
$pdf->SetTitle('CREDENCIAL FRENTE');
$pdf->SetSubject('CREDENCIAL FRENTE');
$pdf->SetKeywords('TCPDF, PDF, CREDENCIAL FRENTE');

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
$pdf->SetFont('helvetica', '',5);

// add a page
$pdf->addPage(); 
$content .='
$html = 
<head>
<link href="styles/style.css" rel="stylesheet" type="text/css">
<style>
		.contenedor{
        position: relative;
    display: inline-block;
    text-align: center;
                   }
    .texto-encima{
    position: absolute;
    top: 10px;
    left: 10px;
	background:#080;
     }

</style>
</head>
<body >';
// set some text to print
        $content .='<div class="contenedor">'; 
		
		$content .='<img src="../lib/reportes/fondocredencialOme.jpg">'; 
		$content .=' <p>DEPARTAMENTO:'.$department.'</p>';
		
		$sql22 = "SELECT * from  tbldocument where idemp='$eid' and name='MEDIO CUERPO'";
        $query22 = $dbh -> prepare($sql22);
        $dbh ->exec('SET CHARACTER SET utf8');
        $query22->execute();
        if($query22->rowCount() > 0)
        {
        foreach($query22 as $result22)
        {   
	    $namedoc=$result22['namedoc']; 
	
	    $content .='<div ><img src="'.$namedoc.'" class="img" width="100" height="120"></div>'; 	
		}
		}
		$content .='</div>';
		
	
		
	
	$content .='<p style="color:white; right:1%; position:absolute;">'.$department.'</p>';	
	
		
	
	$content .='<p style="color:white; right:10%; position:absolute;">'.$name.' '.$firstname.' '.$lastname.'</p>';	
	
		
	 	
	$content .='<b>CURP</b><br>'.$curp.'';	
	$content .='<b>RFC</b><br>'.$rfc.'';	
	

	
    $content .=' <b>TIPO DE SANGRE: </b>'.$typeblood.'';
    

		

       }
    $cnt++;} 

	//$content .= '
		//<div class="row padding">
        //	<div class="col-md-12" style="text-align:center;">
          //  	<span>Pdf Creator </span><a>By sistema sim</a>
            $content .= '</body>';// print a block of text using Write()
	    $css=file_get_contents('../style.css');
        $pdf->writeHTML($css,true, 0, true, 0);
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


	$pdf->output('FICHA TECNICA.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+
