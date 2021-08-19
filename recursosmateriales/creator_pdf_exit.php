<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../lib/tcpdf/config/lang/spa.php');
require_once('../lib/tcpdf/tcpdf.php');
//require_once('conexion2.php');	
include('../includes/config.php');
$folio = intval($_GET['folio']);
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        //background
        $img_file2 = K_PATH_IMAGES . 'logof.png';
        $this->Image($img_file2, 80, 40, 125, 148.5, '', '', 'C', false, 100, '', false, false, 0);

        // Logo
        $image_file = K_PATH_IMAGES . 'logo.png';
        $this->Image($image_file, 10, 10, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'b', 18);
        // Title
        $this->Cell(0, 10, 'SALIDAS', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 8, 'CHECKLIST EQUIPAMIENTO DE SEDES', 0, false, 'C', 0, '', 0, false, 'M', 'M');
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
$sql = "SELECT * FROM tblinventoryfol where folio='$folio' ";
$query = $dbh->prepare($sql);
$dbh->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($query as $result) {
        $folio = $result['folio'];
        $servicio = $result['servicio'];
        $fecha = $result['fecha'];
        $user = $_SESSION['recursos'];


        $content = '';

        $content .= '<body>';

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('JJSH');
        $pdf->SetTitle('INVENTARIO SALIDAS');
        $pdf->SetSubject('INVENTARIO SALIDAS');
        $pdf->SetKeywords('TCPDF, PDF, INVENTARIO SALIDAS');

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
        $pdf->SetFont('helvetica', '', 12);

        // add a page
        $pdf->AddPage('L', 'A4');

        // set some text to print

        $content .= '<section >';

        $content .= '<div align="left">';



        $content .= '<table border="1" CELLPADDING="2">';

        $content .= '<tr>';
        $sql4 = "SELECT * FROM tblusers where user='$user' ";
        $query4 = $dbh->prepare($sql4);
        $dbh->exec('SET CHARACTER SET utf8');
        $query4->execute();
        $cnt = 1;
        if ($query4->rowCount() > 0) {
            foreach ($query4 as $result) {
                $nombre = $result['name'];
                $apellidop = $result['firstname'];
                $apellidom = $result['lastname'];

                $content .= '<td colspan="3"align="left"><b>REALIZADO POR:</b> ' . $apellidop . ' ' . $apellidom . ' ' . $nombre . ' </td>';
                $query4 = null;
            }
        }
        $content .= '<td colspan="2"align="left"><b>SERVICIO:</b> ' . $servicio . '</td>';
        $content .= '<td colspan="2"align="left"><b>FOLIO:<font color="red"> ' . $folio . '</font></b></td>';
        $content .= '</tr>';

        $content .= '</table>';
        $content .= '</div>';
        $content .= '</section>';



        $sql2 = "SELECT * FROM tblinventoryexit where folio='$folio' ";
        $query2 = $dbh->prepare($sql2);
        $dbh->exec('SET CHARACTER SET utf8');
        $query2->execute();
        $cnt2 = 1;
        if ($query2->rowCount() > 0) {
            foreach ($query2 as $result2) {
                $descripcion = $result2['descripcion'];
                $respuesta = $result2['respuesta'];
                $cantidad = $result2['cantidad'];
                $fecha = $result2['fecha'];
                $serie = $result2['serie'];
                $tecnico = $result2['tecnico'];
                $comentario = $result2['comentario'];


                $content .= '<section >';
                $content .= '<div align="left">';
                $content .= '<table  border="1" CELLPADDING="2">';



                $content .= '<tr>';
                $content .= '<td colspan="3"align="center"><b>EQUIPO</b></td>';
                $content .= '<td colspan="2"align="center"><b>ENTREGA</b></td>';
                $content .= '<td colspan="2"align="center"><b>CANTIDAD</b></td>';
                $content .= '<td colspan="3"align="center"><b>FECHA</b></td>';
                $content .= '<td colspan="3"align="center"><b>SERIE</b></td>';
                $content .= '<td colspan="3"align="center"><b>QUIEN SOLICITA</b></td>';
                $content .= '<td colspan="3"align="center"><b>COMENTARIO</b></td>';
                $content .= '</tr>';

                $content .= '<tr>';
                $content .= '<td colspan="3"align="center">' . $descripcion . ' </td>';
                $content .= '<td colspan="2"align="center">' . $respuesta . ' </td>';
                $content .= '<td colspan="2"align="center">' . $cantidad . '</td>';
                $content .= '<td colspan="3"align="center">' . $fecha . '</td>';
                $content .= '<td colspan="3"align="center">' . $serie . '</td>';
                $content .= '<td colspan="3"align="center">' . $tecnico . '</td>';
                $content .= '<td colspan="3"align="center">' . $comentario . '</td>';
                $content .= '</tr>';




                $content .= '</table>';
                $content .= '</div>';
                $content .= '</section>';


                $query2 = null;
            }
            $cnt2++;
        }
        $query = null;
    }
    $cnt++;
}

$content .= '</body>'; // print a block of text using Write()

$pdf->writeHTML($content, true, 0, true, 0);

$pdf->lastPage();

$pdf->output('Salidas.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+