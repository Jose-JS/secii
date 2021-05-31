<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../lib/tcpdf/config/lang/spa.php');
require_once('../lib/tcpdf/tcpdf.php');
//require_once('conexion2.php');	
include('includes/config.php');
$eid = intval($_GET['empid']);
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

	//Page header
	public function Header()
	{
		//background
		$img_file2 = K_PATH_IMAGES . 'logof.png';
		$this->Image($img_file2, 40, 80, 125, 148.5, '', '', '', false, 300, '', false, false, 0);

		// Logo
		$image_file = K_PATH_IMAGES . 'logo.png';
		$this->Image($image_file, 10, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'b', 18);
		// Title
		$this->Cell(0, 10, 'ALTA DE EMPLEADO', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 8, 'INFORMACION PERSONAL', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer()
	{
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', '', 8);
		// Page number
		// $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');


	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$sql = "SELECT * FROM tblemployees where id='$eid' ";
$query = $dbh->prepare($sql);
$dbh->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt = 1;
if ($query->rowCount() > 0) {
	foreach ($query as $result) {
		$fechadealta = $result['fechini'];
		$company = $result['company'];
		$puesto = $result['Department'];
		$nombre = $result['name'];
		$apellidopa = $result['FirstName'];
		$apellidoma = $result['LastName'];
		$lugarnacimiento = $result['placebirth'];
		$edad = $result['age'];
		$fechanacimiento = $result['Dob'];
		$rfc = $result['rfc'];
		$curp = $result['curp'];
		$imss = $result['imss'];
		$infonavit = $result['infonavit'];
		$infonavitmon = $result['infonavitmon'];
		$fonacot = $result['fonacot'];
		$fonacotmon = $result['fonacotmon'];
		$sexo = $result['Gender'];
		$estadocivil = $result['marital'];
		$calle = $result['Address'];
		$colonia = $result['suburb'];
		$municipio = $result['City'];
		$estado = $result['Country'];
		$cp = $result['cp'];
		$email = $result['EmailId'];
		$telefono = $result['Phonenumber'];
		$banco = $result['banco'];
		$nocuenta = $result['nocuenta'];
		$clabeint = $result['clabeint'];
		$sueldonet = $result['sueldonet'];
		$services = $result['assignedservice'];
		$content = '';

		$content .= '<body>';

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('JJSH');
		$pdf->SetTitle('ALTA DE EMPLEADO');
		$pdf->SetSubject('ALTA DE EMPLEADO');
		$pdf->SetKeywords('TCPDF, PDF, ALTA DE EMPLEADO');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('helvetica', '', 11);

		// add a page
		$pdf->addPage();

		// set some text to print

		$sql2 = "SELECT * FROM tbldocument where idemp='$eid' and name='MEDIO CUERPO'";
		$query2 = $dbh->prepare($sql2);
		$dbh->exec('SET CHARACTER SET utf8');
		$query2->execute();
		$cnt2 = 1;
		if ($query2->rowCount() > 0) {
			foreach ($query2 as $result2) {
				$imagen = $result2['namedoc'];

				$content .= '<section >';
				$content .= '<div align="left">';
				$content .= '<table  CELLPADDING="2">';

				$content .= '<tr>';
				$content .= '<td colspan="1" align="right"><b>' . $company . '</b></td>';
				$content .= '</tr>';

				$content .= '<tr>';
				$content .= '<td colspan="1"align="right"><img src="' . $imagen . '" align="left" width="100" height="120"></td>';
				$content .= '</tr>';

				$content .= '</table>';
				$content .= '</div>';
				$content .= '</section>';
			}
			$cnt2++;
		}




		$content .= '<br>';
		$content .= '<br>';
		$content .= '<section >';
		$content .= '<div align="left">';
		$content .= '<table border="1">';

		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>FECHA DE ALTA:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $fechadealta . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>PUESTO:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $puesto . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>NOMBRE:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $nombre . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>APELLIDOS:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $apellidopa . ' ' . $apellidoma . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>FECHA DE NACIMIENTO:</b> ' . $fechanacimiento . '</td>';
		$content .= '<td colspan="3"align="left"> <b>EDAD:</b> ' . $edad . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>LUGAR DE NACIMIENTO:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $lugarnacimiento . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>RFC:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $rfc . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>CURP:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $curp . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>NO. DE IMSS:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $imss . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>CREDITO INFONAVIT NUMERO:</b>' . $infonavit . ' </td>';
		$content .= '<td colspan="3"align="left"> <b>DESCUENTO INFONAVIT:</b>' . $infonavitmon . ' </td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>CREDITO FONACOT NUMERO:</b>' . $fonacot . ' </td>';
		$content .= '<td colspan="3"align="left"> <b>DESCUENTO FONACOT:</b>' . $fonacotmon . ' </td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>SEXO:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $sexo . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>ESTADO CIVIL:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $estadocivil . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>CALLE Y NUMERO:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $calle . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>COLONIA:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $colonia . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>DELEGACION/MUNICIPIO:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $municipio . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>ESTADO:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $estado . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>CODIGO POSTAL:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $cp . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>EMAIL:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $email . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"> <b>TELEFONO:</b></td>';
		$content .= '<td colspan="3"align="left"> ' . $telefono . '</td>';
		$content .= '</tr>';
		$content .= '</table>';
		$content .= '</div>';
		$content .= '</section>';

		$content .= '<section >';
		$content .= '<div align="left">';
		$content .= '<table border="1">';
		$content .= '<tr>';
		$content .= '<td colspan="6"align="CENTER"><b>DATOS FINANCIEROS</b></td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"><b>BANCO:</b></td>';
		$content .= '<td colspan="3"align="left">' . $banco . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"><b>NO. DE CUENTA:</b></td>';
		$content .= '<td colspan="3"align="left">' . $nocuenta . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"><b>CLABE INTERBANCARIA:</b></td>';
		$content .= '<td colspan="3"align="left">' . $clabeint . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"><b>SERVICIO ASIGNADO:</b></td>';
		$content .= '<td colspan="3"align="left">' . $services . '</td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td colspan="3"align="left"><b>SUELDO NETO MENSUAL:</b></td>';
		$content .= '<td colspan="3"align="left">' . $sueldonet . '</td>';
		$content .= '</tr>';

		$content .= '</table>';
		$content .= '</div>';
		$content .= '</section>';
	}
	$cnt++;
}

//$content .= '
//<div class="row padding">
//	<div class="col-md-12" style="text-align:center;">
//  	<span>Pdf Creator </span><a>By sistema sim</a>
$content .= '</body>'; // print a block of text using Write()

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


$pdf->output('ALTA DE EMPLEADO.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+