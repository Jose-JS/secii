<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    require_once('../lib/tcpdf/config/lang/spa.php');
	require_once('../lib/tcpdf/tcpdf.php');
	//require_once('conexion2.php');	
include('includes/config.php');
  $ids=$_GET['c']; 

if($ids=='OISME S.A. DE C.V.'){
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        //background
        $img_file2 = K_PATH_IMAGES.'LOGO OME2.jpg';
        $this->Image($img_file2, 40, 80,125, 148.5, '', '', '', false, 300, '', false, false, 0);
        
        // Logo
        $image_file = K_PATH_IMAGES.'LOGO OME.jpg';
        $this->Image($image_file, 10, 5, 20, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'b',18);
        // Title
        $this->Cell(0, 10, 'BAJA DE EMPLEADO', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
}

if($ids=='OIFSI S.A. DE C.V.'){
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        //background
        $img_file2 = K_PATH_IMAGES.'LOGO OIFSI2.PNG';
        $this->Image($img_file2, 25, 80,160, 148.5, '', '', '', false, 200, '', false, false, 0);
        
        // Logo
        $image_file = K_PATH_IMAGES.'LOGO OIFSI.PNG';
        $this->Image($image_file, 10, 5, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'b',18);
        // Title
        $this->Cell(0, 10, 'BAJA DE EMPLEADO', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
}

if($ids=='ASLO SEGURIDAD PRIVADA S.A. DE C.V.'){
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        //background
        $img_file2 = K_PATH_IMAGES.'logo aslo2.JPG';
        $this->Image($img_file2, 25, 80,160, 148.5, '', '', '', false, 200, '', false, false, 0);
        
        // Logo
        $image_file = K_PATH_IMAGES.'logo aslo.JPG';
        $this->Image($image_file, 10, 5, 20, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'b',18);
        // Title
        $this->Cell(0, 10, 'BAJA DE EMPLEADO', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
}

if($ids=='APROSEMEX S.A. DE C.V.'){
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        //background
        $img_file2 = K_PATH_IMAGES.'LOGO APROSEMEX2.JPG';
        $this->Image($img_file2, 60, 80,100, 148.5, '', '', '', false, 200, '', false, false, 0);
        
        // Logo
        $image_file = K_PATH_IMAGES.'LOGO APROSEMEX .JPG';
        $this->Image($image_file, 10, 2, 20, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'b',18);
        // Title
        $this->Cell(0, 10, 'BAJA DE EMPLEADO', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', '',12);
        // Page number
       // $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        
        
    }
}
}


else{
	
}
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$eid=intval($_GET['id']);
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
$matricula=$result['EmpId'];
$assignedservice=$result['assignedservice'];
 $fechini=$result['fechini'];
        
$name=$result['name'];
$firstname=$result['FirstName'];
$lastname=$result['LastName'];
$email=$result['EmailId'];
$gender=$result['Gender'];
        
$address=$result['Address'];
$suburb=$result['suburb'];
$city=$result['City'];
$country=$result['Country'];
$cp=$result['cp'];
        
        
$placebirth=$result['placebirth'];
$dob=$result['Dob'];
$age=$result['age'];
$marital=$result['marital'];
$nationality=$result['nationality'];

$phonenumber=$result['Phonenumber'];
$phonelocal=$result['phonelocal'];
$phonerecado=$result['phonerecado'];
$ife=$result['ife'];
$curp=$result['curp'];
$infonavit=$result['infonavit'];		

$rfc=$result['rfc'];
$imss=$result['imss'];
$typelicence=$result['typelicence'];
$military=$result['military'];

$observations=$result['observations'];

$weight=$result['weight'];
$stature=$result['stature'];
$typeblood=$result['typeblood'];
$company=$result['company'];  
$banco=$result['banco'];  		
$nocuenta=$result['nocuenta'];  		
$clabeint=$result['clabeint'];
$sueldonet=$result['sueldonet'];  		
$content = '';
	
$content .= '<body>';

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('JJSH');
$pdf->SetTitle('BAJA DE EMPLEADO INFORMATIVA');
$pdf->SetSubject('BAJA DE EMPLEADO INFORMATIVA');
$pdf->SetKeywords('TCPDF, PDF, BAJA DE EMPLEADO INFORMATIVA');

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

// set some text to print

	
		
    
    
$sql25 = "SELECT * from  tblboletbaja where idempleado='$eid'";
$query25= $dbh -> prepare($sql25);
$dbh ->exec('SET CHARACTER SET utf8');
$query25->execute();


		
if($query25->rowCount() > 0)
{
foreach($query25 as $result25)
{   
	$idmatricula=$result25['idmatricula']; 
	$fechabaja=$result25['fechabaja']; 
	$ultimodia=$result25['ultimodia']; 
	$motivo=$result25['motivo']; 
	$ultimosueldo=$result25['ultimosueldo']; 
	$vacaciones=$result25['vacaciones']; 
	$finiquito=$result25['finiquito']; 
	$observaciones=$result25['observaciones']; 
	


$sql22 = "SELECT * from  tbldocument where idemp='$eid' and name='MEDIO CUERPO'";
$query22 = $dbh -> prepare($sql22);
$dbh ->exec('SET CHARACTER SET utf8');
$query22->execute();
if($query22->rowCount() > 0)
{
foreach($query22 as $result22)
{   
	$namedoc=$result22['namedoc']; 
	
	$content .='<BR>';
	$content .='<BR>';
	$content .='<BR>';
	$content .='<section >';
    $content .='<div align="left">';
    $content .='<table BORDER="1 ">';
	$content .='<tr>';
	$content .='<td><b>FECHA BAJA:</b> </td>'; 
	$content .='<td>'.$fechabaja.'</td>'; 
	$content .='</tr>';
	$content .='<tr>';
	$content .='<td ><b>PUESTO:</b> </tD>'; 
	$content .='<td>'.$department.' </tD>'; 
	$content .='</tr>';
	$content .='<tr>';
	$content .='<td><b>NOMBRE:</b> </td>';
	$content .='<td>'.$name.'</td> ';
	$content .='</tr>';
	$content .='<tr>';
	$content .='<td><b>APELLIDOS: </b></td>  ';
	$content .='<td>'.$firstname.' '.$lastname.'</td>  ';
	$content .='</tr>';
	$content .='<tr>';
	$content .='<td><b>RFC: </b></td>  ';
	$content .='<td>'.$rfc.'</td>  ';
	$content .='</tr>';
	$content .='<tr>';
	$content .='<td><b>CURP: </b></td>  ';
	$content .='<td>'.$curp.'</td>  ';
	$content .='</tr>';
	$content .='<tr>';
	$content .='<td><b>NO. IMSS: </b></td>  ';
	$content .='<td>'.$imss.'</td>  ';
	$content .='</tr>';
	$content .='<tr>';
	$content .='<td><b>CREDITO INFONAVIT NUMERO: </b></td>  ';
	$content .='<td>'.$infonavit.' </td>  ';
	$content .='</tr>';
	$content .='<tr>';
	$content .='<td><b>FECHA DE INGRESO: </b></td>  ';
	$content .='<td>'.$fechini.' </td>  ';
	$content .='</tr>';
	$content .='<tr>';
	$content .='<td><b>ULTIMO SUELDO PERCIBIDO: </b>  </td>  ';
	$content .='<td>'.$ultimosueldo.'</td>  ';
	$content .='</tr>';
	$content .='<tr>';
	$content .='<td><b>VACACIONES PENDIENTES: </b> </td>  ';
	$content .='<td>'.$vacaciones.'</td>  ';
	$content .='</tr>';
	$content .='<tr>';
	$content .='<td><b>SOLICITUD DE FINIQUITO: </b>  </td>  ';
	$content .='<td>'.$finiquito.'</td>  ';
	$content .='</tr>';
	$content .='<tr>';
	$content .='<td><b>SERVICIO ASIGNADO: </b></td>  ';
	$content .='<td>'.$assignedservice.' </td>  ';
	$content .='</tr>';
	$content .='<tr>';
	$content .='<td><b>COMENTARIOS: </b>  </td>  ';
	$content .='<td>'.$observaciones.'</td>  ';
	
		} }
	$content .='</tr>';
	$content .='</table>';
    $content .='</div>';
    $content .='</section>'; 


} }	
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


	$pdf->output('BAJA DE EMPLEADO.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+