<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../../lib/tcpdf/config/lang/spa.php');
require_once('../../lib/tcpdf/tcpdf.php');
//require_once('conexion2.php');	
include('../includes/config.php');
$folio = $_GET['f'];
$id = $_GET['id'];

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
        $this->Image($image_file, 10, 10, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'b', 18);
        // Title
        $this->Cell(0, 10, 'ENTREGA DE SERVICIO', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        //$this->Cell(0, 8, 'DOBLETES GRUPO DE REACCION', 0, false, 'C', 0, '', 0, false, 'M', 'M');
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
        //$this->Cell(0, 8, "Report generated with Open-LIMS (" . date("d-m-Y h:i:s", time("now")) . ")", 0, 1, 'L', 0, '', 0, false, 'M', 'M');


    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('JJSH');
$pdf->SetTitle('ENTREGA DE SERVICIO');
$pdf->SetSubject('ENTREGA DE SERVICIO');
$pdf->SetKeywords('TCPDF, PDF, ENTREGA DE SERVICIO');

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
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->addPage();

$content = '';
$content .= '<body>';

$sql3 = "SELECT * FROM tblentregaservtesi where folio='$folio' ";
$query3 = $dbh->prepare($sql3);
$dbh->exec('SET CHARACTER SET utf8');
$query3->execute();
$cnt3 = 1;
if ($query3->rowCount() > 0) {
    foreach ($query3 as $result3) {

        $folio = $result3['folio'];
        $tesientrega = $result3['tesientrega'];
        $tesirecibe = $result3['tesirecibe'];
        $fecha = $result3['fecha'];
        $hora = $result3['hora'];
        $lampara = $result3['lampara'];
        $fornitura = $result3['fornitura'];
        $pr24 = $result3['pr24'];
        $baston = $result3['baston'];
        $gas = $result3['gas'];
        $taser = $result3['taser'];
        $chamarra = $result3['chamarra'];
        $abrigo = $result3['abrigo'];
        $botas = $result3['botas'];
        $sombrilla = $result3['sombrilla'];
        $chaleco = $result3['chaleco'];
        $impermeable = $result3['impermeable'];
        $armacorta = $result3['armacorta'];
        $armalarga = $result3['armalarga'];
        $celular = $result3['celular'];
        $cargador1 = $result3['cargador1'];
        $garrafones = $result3['garrafones'];
        $trastes = $result3['trastes'];
        $servibar = $result3['servibar'];
        $parrilla = $result3['parrilla'];
        $microondas = $result3['microondas'];
        $radio = $result3['radio'];
        $cargador2 = $result3['cargador2'];
        $focos = $result3['focos'];
        $extintores = $result3['extintores'];
        $camaras = $result3['camaras'];
        $vidrios = $result3['vidrios'];
        $puertas = $result3['puertas'];
        $agua = $result3['agua'];
        $luz = $result3['luz'];
        $sede = $result3['sede'];
        $firmrecibe = $result3['firmrecibe'];
        $firmentrega = $result3['firmentrega'];

        $content .= '<section>';
        $content .= '<div align="left">';
        $content .= '<table CELLPADDING="2">';

        $content .= '<tr>';
        $content .= '<td colspan="5"align="left"><B>SEDE:</B>'.$sede.'</td>';
        $content .= '<td colspan="2" align="left"><b>FECHA:</b> ' . $fecha . '</td>';
        $content .= '<td colspan="2" align="left"><b>FOLIO:<font color="red"> ' . $folio . '</font></b></td>';
        $content .= '</tr>';

        $content .= '<tr>';
        $content .= '<td colspan="5"align="left"><b>TESI QUE ENTREGA:</b>'.$tesientrega.'</td>';
        $content .= '<td colspan="4" align="left"><b>HORA:</b>' . $hora . '</td>';
        $content .= '</tr>';
        
        $content .= '<tr>';
        $content .= '<td colspan="5"align="left"><b>TESI QUE RECIBE:</b>'.$tesirecibe.'</td>';
        $content .= '<td colspan="2"align="left"></td>';
        $content .= '</tr>';

        $content .= '</table>';
        $content .= '</div>';
        $content .= '</section>';

        $content .= '<table border="1">';
        $content .= '<tr>';
        $content .= '<td align="center"><b>INVENTARIO EQUIPO ORGANIZACION</b></td>';
        $content .= '</tr>';
        $content .= '</table>';

        // set some text to print
        $content .= '<table border="1">';

        $content .= '<tr border="1">';
        $content .= '<td align="left"><b>LAMPARA: </b>'. $lampara .'</td>';
        $content .= '<td align="left" colspan="2"><b>BOTAS HULE: </b> ' . $botas . '</td>';
        $content .= '<td align="left"><b>GARRAFONES: </b>'. $garrafones. '</td>';
        $content .= '</tr>';

        $content .= '<tr>';
        $content .= '<td align="left"><b>FORNITURA: </b>'. $fornitura .'</td>';
        $content .= '<td align="left" colspan="2"><b>SOMBRILLA: </b> ' . $sombrilla . '</td>';
        $content .= '<td align="left"><b>TRASTES COCINA: </b>'. $trastes. '</td>';
        $content .= '</tr>';

        $content .= '<tr>';
        $content .= '<td align="left"><b>PR-24: </b>'. $pr24 .'</td>';
        $content .= '<td align="left" colspan="2"><b>CHALECO: </b> ' . $chaleco . '</td>';
        $content .= '<td align="left"><b>SERVIBAR: </b>'. $servibar. '</td>';
        $content .= '</tr>';

        $content .= '<tr>';
        $content .= '<td align="left"><b>BASTON RETRACTIL: </b>'. $baston .'</td>';
        $content .= '<td align="left" colspan="2"><b>IMPERMEABLE: </b> ' . $impermeable . '</td>';
        $content .= '<td align="left"><b>PARRILLA: </b>'. $parrilla. '</td>';
        $content .= '</tr>';

        $content .= '<tr>';
        $content .= '<td align="left"><b>GAS PIMIENTA: </b>'. $gas .'</td>';
        $content .= '<td align="left" colspan="2"><b>ARMA CORTA D.C/CARGADOR: </b> ' . $armacorta . '</td>';
        $content .= '<td align="left"><b>HORNO MICROONDAS: </b>'. $microondas. '</td>';
        $content .= '</tr>';

        $content .= '<tr>';
        $content .= '<td align="left"><b>TASER: </b>'. $taser .'</td>';
        $content .= '<td align="left" colspan="2"><b>ARMA LARGA D.C/CARGADOR: </b> ' . $armalarga . '</td>';
        $content .= '<td align="left"><b>RADIO TRONCAL: </b>'. $radio. '</td>';
        $content .= '</tr>';

        $content .= '<tr>';
        $content .= '<td align="left"><b>CHAMARRA: </b>'. $chamarra .'</td>';
        $content .= '<td align="left" colspan="2"><b>CELULAR: </b> ' . $celular . '</td>';
        $content .= '<td align="left"><b>CARGADOR: </b>'. $cargador2. '</td>';
        $content .= '</tr>';

        $content .= '<tr>';
        $content .= '<td align="left"><b>ABRIGO: </b>'. $abrigo .'</td>';
        $content .= '<td align="left" colspan="2"><b>CARGADOR: </b> ' . $cargador1 . '</td>';
        $content .= '<td align="left"></td>';
        $content .= '</tr>';

        $content .= '</table>';

        $content .= '<table border="1">';
        $content .= '<tr>';
        $content .= '<td align="center"><b>INVENTARIO EQUIPO DE LA SEDE</b></td>';
        $content .= '</tr>';
        $content .= '</table>';

        $content .= '<table border="1">';

        $content .= '<tr border="1">';
        $content .= '<td align="left"><b>FOCOS: </b>'. $focos .'</td>';
        $content .= '<td align="left" colspan="2"><b>CAMARAS: </b> ' . $camaras . '</td>';
        $content .= '<td align="left"><b>PUERTAS: </b>'. $puertas. '</td>';
        $content .= '</tr>';

        $content .= '<tr border="1">';
        $content .= '<td align="left"><b>EXTINTORES: </b>'. $extintores .'</td>';
        $content .= '<td align="left" colspan="2"><b>VIDRIOS: </b> ' . $vidrios . '</td>';
        $content .= '<td align="left"><b>AGUA: </b>'. $agua. '</td>';
        $content .= '</tr>';

        $content .= '<tr border="1">';
        $content .= '<td align="left"><b>LUZ: </b>'. $luz .'</td>';
        $content .= '<td align="left" colspan="2"></td>';
        $content .= '<td align="left"></td>';
        $content .= '</tr>';

        $content .= '</table>';
        $content .= '<br>';
        $content .= '<br>';
        $content .= '<br>';

        $content .= '<table>';

        $content .= '<tr>';
        $content .='<td align="center"><img src="'.$firmentrega.'" align="center" width="120" height="100"></td>'; 
        $content .='<td align="center"><img src="'.$firmrecibe.'" align="center" width="120" height="100"></td>'; 
        $content .= '</tr>';

        $content .= '<tr>';
        $content .= '<td align="center"><b>TESI QUE ENTREGA</b></td>';
        $content .= '<td align="center"><b>TESI QUE RECIBE</b></td>';
        $content .= '</tr>';

        $content .= '</table>';
    }
    $cnt3++;
}

$content .= '</body>'; // print a block of text using Write()

$pdf->writeHTML($content, true, 0, true, 0);

$pdf->lastPage();
$pdf->lastPage();


$pdf->output('ENTREGA DE SERVICIO.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+