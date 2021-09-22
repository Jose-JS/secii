<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../lib/tcpdf/config/lang/spa.php');
require_once('../lib/tcpdf/tcpdf.php');
//require_once('conexion2.php');	
include('../includes/config.php');
$f = $_GET['f'];
$ids = $_GET['empid'];
$id = $_GET['id'];
$sql = "SELECT EmpId,company from  tblemployees where EmpId='$ids'";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        $empresa = $result->company;



        if ($empresa == 'OISME S.A. DE C.V.') {
            // Extend the TCPDF class to create custom Header and Footer
            class MYPDF extends TCPDF
            {

                //Page header
                public function Header()
                {
                    //background
                    $img_file2 = K_PATH_IMAGES . 'LOGO OME2.jpg';
                    $this->Image($img_file2, 40, 80, 125, 148.5, '', '', '', false, 300, '', false, false, 0);

                    // Logo
                    $image_file = K_PATH_IMAGES . 'LOGO OME.jpg';
                    $this->Image($image_file, 10, 5, 20, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
                    // Set font
                    $this->SetFont('helvetica', 'b', 18);
                    // Title
                    $this->Cell(0, 10, 'RESGUARDO DE EQUIPO', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
                    $this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
        } //  
    }

    if ($empresa == 'OIFSI S.A. DE C.V.') {
        // Extend the TCPDF class to create custom Header and Footer
        class MYPDF extends TCPDF
        {

            //Page header
            public function Header()
            {
                //background
                $img_file2 = K_PATH_IMAGES . 'LOGO OIFSI2.PNG';
                $this->Image($img_file2, 25, 80, 160, 148.5, '', '', '', false, 200, '', false, false, 0);

                // Logo
                $image_file = K_PATH_IMAGES . 'LOGO OIFSI.PNG';
                $this->Image($image_file, 10, 5, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
                // Set font
                $this->SetFont('helvetica', 'b', 18);
                // Title
                $this->Cell(0, 10, 'RESGUARDO DE EQUIPO', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
                $this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
    }

    if ($empresa == 'ASLO SEGURIDAD PRIVADA S.A. DE C.V.') {
        // Extend the TCPDF class to create custom Header and Footer
        class MYPDF extends TCPDF
        {

            //Page header
            public function Header()
            {
                //background
                $img_file2 = K_PATH_IMAGES . 'logo aslo2.JPG';
                $this->Image($img_file2, 25, 80, 160, 148.5, '', '', '', false, 200, '', false, false, 0);

                // Logo
                $image_file = K_PATH_IMAGES . 'logo aslo.JPG';
                $this->Image($image_file, 10, 5, 20, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
                // Set font
                $this->SetFont('helvetica', 'b', 18);
                // Title
                $this->Cell(0, 10, 'RESGUARDO DE EQUIPO', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
                $this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
    }

    if ($empresa == 'APROSEMEX S.A. DE C.V.') {
        // Extend the TCPDF class to create custom Header and Footer
        class MYPDF extends TCPDF
        {

            //Page header
            public function Header()
            {
                //background
                $img_file2 = K_PATH_IMAGES . 'LOGO APROSEMEX2.JPG';
                $this->Image($img_file2, 60, 80, 100, 148.5, '', '', '', false, 200, '', false, false, 0);

                // Logo
                $image_file = K_PATH_IMAGES . 'LOGO APROSEMEX .JPG';
                $this->Image($image_file, 10, 2, 20, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
                // Set font
                $this->SetFont('helvetica', 'b', 18);
                // Title
                $this->Cell(0, 20, 'RESGUARDO DE EQUIPO', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
                $this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
    }

    // create new PDF document
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $sql22 = "SELECT * from  tblinventoryexit where id='$id'";
    $query22 = $dbh->prepare($sql22);
    $dbh->exec('SET CHARACTER SET utf8');
    $query22->execute();



    if ($query22->rowCount() > 0) {
        foreach ($query22 as $result22) {
            $descripcion = $result22['descripcion'];
            $cantidad = $result22['cantidad'];
            $comentario = $result22['comentario'];
            $serie = $result22['serie'];
            $fecha = $result22['fecha'];
            $tecnicoasig = $result22['tecnicoasig'];
            $empid = $result22['empid'];

            $content = '';

            $content .= '<body>';

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('JJSH');
            $pdf->SetTitle('RESGUARDO DE EQUIPO');
            $pdf->SetSubject('RESGUARDO DE EQUIPO');
            $pdf->SetKeywords('TCPDF, PDF, RESGUARDO DE EQUIPO');

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
            $pdf->SetFont('helvetica', '', 10.5);

            // add a page
            $pdf->addPage();

            // set some text to print
            $content .= '<section >';

            $content .= '<div align="left">';
            $content .= '<table>';
            $content .= '<tr>';
            $fechaEntera = strtotime($fecha);
            $anio = date("Y", $fechaEntera);
            $mes = date("m", $fechaEntera);
            $dia = date("d", $fechaEntera);
            $content .= '<td colspan="2" align="RIGHT"> <b>FECHA DE SALIDA DE ALMACEN: </b>' . $dia . '-' . $mes . '-' . $anio . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<section>
                <div align="left">
                <p>Por medio de la presente yo <b>' . $tecnicoasig . '</b> con 
                número de matrícula <b>' . $empid . '</b> confirmo estar enterado que la dotación entregada es y será 
                de la empresa en todo momento y serán utilizados exclusivamente para desempeñar mi trabajo.</p></section>';

            $content .= '<section>
                <div align="left">
                <table border="1" align="center">
                <tr>
                <th>CANTIDAD</th>
                <th>DESCRIPCION</th>
                <th>MODELO</th>
                <th>NUMERO DE SERIE</th>
                </tr>
                <tr>
                <td>' . $cantidad . '</td>
                <td>' . $descripcion . '</td>
                <td>' . $comentario . '</td>
                <td>' . $serie . '</td>
                </tr>
                
                </table>
                </section>';

                $content .= '<section>
                <div align="left">
                <p>FECHA DE ASIGNACION:</p><BR>
                <p>NOMBRE DE PERSONA QUE ENTREGA:</p><BR>
                <p>SEDE DE ASIGNACION:</p><BR>
                </section>';
                $sql23 = "SELECT * from  tblinventoryfol where folio='$f'";
                $query23 = $dbh->prepare($sql23);
                $dbh->exec('SET CHARACTER SET utf8');
                $query23->execute();
            
            
            
                if ($query23->rowCount() > 0) {
                    foreach ($query23 as $result23) {
                        $firm1 = $result23['firm1'];
                        $firm2 = $result23['firm2'];
                        
                
            $content .= '<section>
            <div align="left">
            <table align="center">
            <tr>
            <th></th>
            <th></th>
            </tr>
            <tr>
            <td style="text-align: center; "><img width="100" height="60" src="'.$firm1.'" /></td>
            <td style="text-align: center; "><img width="100" height="60" src="'.$firm2.'" /></td>
            </tr>
            <tr>
            <td>NOMBRE Y FIRMA DE QUIEN RECIBE</td>
            <td>FIRMA DEL RESPONSABLE DE AREA</td>
            </tr>
                    
            </table>
            </section>';
                    }}
            $content .= '<section>
                <div align="left">
                <p>Queda prohibido, el bloqueo del celular con contraseñas, huella dactilar, instalación de aplicaciones y uso personal.<BR></p>

                <p>Los daños ocasionados por mal manejo o imprudencia, serán mi responsabilidad y asumo las consecuencias 
                que de esto deriven. Y mediante este documento autorizo descontar de salarios o liquidación, los montos 
                asignados ó bien pagar el monto del equipo dañado o extraviado, el cual tiene un valor de $3,000.00 (Tres Mil Pesos 00/100 M.N.).</p><BR>
                </section>';
        }

        //$content .= '
        //<div class="row padding">
        //	<div class="col-md-12" style="text-align:center;">
        //  	<span>Pdf Creator </span><a>By sistema sim</a>
        $content .= '</body>'; // print a block of text using Write()
    }

    $pdf->writeHTML($content, true, 0, true, 0);
    $pdf->lastPage();





    $pdf->output('RESGUARDO DE EQUIPO.pdf', 'I');
    //============================================================+
    // END OF FILE
    //============================================================+  



    $cnt++;
}
