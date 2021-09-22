<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../lib/tcpdf/config/lang/spa.php');
require_once('../lib/tcpdf/tcpdf.php');
//require_once('conexion2.php');	
include('../includes/config.php');
$ids = $_GET['empid'];
$f = $_GET['f'];
$id = $_GET['id'];
$responsiva = $_GET['responsiva'];
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
                    $this->Cell(0, 10, 'CARTA RESPONSIVA', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
                $this->Cell(0, 10, 'CARTA RESPONSIVA', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
                $this->Cell(0, 10, 'CARTA RESPONSIVA', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
                $this->Cell(0, 20, 'CARTA RESPONSIVA', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
            $fecha = $result22['fecha'];
            $tecnicoasig = $result22['tecnicoasig'];
            $empid = $result22['empid'];

            $content = '';

            $content .= '<body>';

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('JJSH');
            $pdf->SetTitle('CARTA RESPONSIVA');
            $pdf->SetSubject('CARTA RESPONSIVA');
            $pdf->SetKeywords('TCPDF, PDF, CARTA RESPONSIVA');

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




            if ($responsiva == 'uniforme de gala') {
                // set font
                $pdf->SetFont('helvetica', '', 10);

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
                $content .= '<td colspan="2" align="RIGHT"> <b>FECHA:</b>' . $dia . '-' . $mes . '-' . $anio . '</td>';
                $content .= '</tr>';

                $content .= '</table>';
                $content .= '</div>';
                $content .= '</section>';

                $content .= '<section>
                <p>Por medio de la presente yo <B>' . $tecnicoasig . '</B> con número de matrícula <b>' . $empid . '</b> confirmo estar enterado que la dotación entregada es y será de la empresa en
                todo momento y serán utilizados exclusivamente para desempeñar mi trabajo.<br></p>
    
                <p><b>El trabajador manifiesta que:<br></b></p>
    
                <p>A) En el caso de <b>robo o extravío</b> de uniforme, se compromete a pagar dicha prenda y mediante este documento autoriza le sea descontado de salario el monto total de la prenda.<br></p>
    
                <p>B) En caso de <b>daño</b> de la o las prendas, una vez entregada mi nueva dotación me comprometo a realizar la devolución de dichas prendas de manera inmediata en las condiciones en que se encuentren.<br></p>
    
                <p>C) En caso de <b>termino laboral</b> me comprometo a realizar la devolución de la totalidad de las prendas e instrumentos de trabajo asignados por la empresa al inicio de mi contratación y mediante este documento autorizo descontar de salarios o liquidación, los montos asignados ó bien pagar el monto de la prenda extraviada ó robada en efectivo para proceder con la devolución de mis documentos.<br></p>
                <p>D)<b>TABULADOR</b></p>';
                $content .= '
            <table WIDTH="45%" align="center">

<tr>
<th border="1"><b>ELEMENTO</b></th>
<th border="1"><b>MONTO</b></th>
</tr>
 
<tr>
<td border="1">CAMISOLA GALA</td> 
<td border="1">$ 500.00</td>
</tr>

<tr>
<td border="1">PANTALON GALA</td>
<td border="1">$ 350.00</td>
</tr>

<tr>
<td border="1">CHAMARRA</td>
<td border="1">$ 600.00</td>
</tr>

<tr>
<td border="1">CORBATA GALA</td>
<td border="1">$ 100.00</td>
</tr>

<tr>
<td border="1">FORNITURA</td>
<td border="1">$ 130.00</td>
</tr>

<tr>
<td border="1">BASTON RETRACTIL</td>
<td border="1">$ 320.00</td>
</tr>

<tr>
<td border="1">GAS LACRIMOGENO</td>
<td border="1">$ 60.00</td>
</tr>

<tr>
<td border="1">CREDENCIAL</td> 
<td border="1">$ 100.00</td>
</tr>

<tr>
<td border="1">P. CREDENCIAL</td>
<td border="1">$ 60.00</td>
</tr>

</table>';
                $sql23 = "SELECT * from  tblinventoryfol where folio='$f'";
                $query23 = $dbh->prepare($sql23);
                $dbh->exec('SET CHARACTER SET utf8');
                $query23->execute();
                if ($query23->rowCount() > 0) {
                    foreach ($query23 as $result23) {
                        $firm1 = $result23['firm1'];
                        $content .= '<br><br><br><br>
                <div align="center"><img width="110" height="70" src="' . $firm1 . '" /></div>
<p align="center"><b>' . $tecnicoasig . '</b><br>
NOMBRE Y FRIMA DEL TRABAJADOR</p>
            
            </section>';
                    }
                }
            }

            if ($responsiva == 'uniforme comando') {

                // set font
                $pdf->SetFont('helvetica', '', 10);

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
                $content .= '<td colspan="2" align="RIGHT"> <b>FECHA:</b>' . $dia . '-' . $mes . '-' . $anio . '</td>';
                $content .= '</tr>';

                $content .= '</table>';
                $content .= '</div>';
                $content .= '</section>';

                $content .= '<section>
                <p>Por medio de la presente yo <B>' . $tecnicoasig . '</B> con número de matrícula <b>' . $empid . '</b> confirmo estar enterado que la dotación entregada es y será de la empresa en
                todo momento y serán utilizados exclusivamente para desempeñar mi trabajo.<br></p>
    
                <p><b>El trabajador manifiesta que:<br></b></p>
    
                <p>A) En el caso de <b>robo o extravío</b> de uniforme, se compromete a pagar dicha prenda y mediante este documento autoriza le sea descontado de salario el monto total de la prenda.<br></p>
    
                <p>B) En caso de <b>daño</b> de la o las prendas, una vez entregada mi nueva dotación me comprometo a realizar la devolución de dichas prendas de manera inmediata en las condiciones en que se encuentren.<br></p>
    
                <p>C) En caso de <b>termino laboral</b> me comprometo a realizar la devolución de la totalidad de las prendas e instrumentos de trabajo asignados por la empresa al inicio de mi contratación y mediante este documento autorizo descontar de salarios o liquidación, los montos asignados ó bien pagar el monto de la prenda extraviada ó robada en efectivo para proceder con la devolución de mis documentos.<br></p>
                <p>D)<b>TABULADOR</b></p>';
                $content .= '
    <table WIDTH="45%" align="center">
    
    <tr>
    <th border="1"><b>ELEMENTO</b></th>
    <th border="1"><b>MONTO</b></th>
    </tr>
     
    <tr>
    <td border="1">CAMISOLA COMANDO</td> 
    <td border="1">$ 600.00</td>
    </tr>
    
    <tr>
    <td border="1">PANTALON COMANDO</td>
    <td border="1">$ 500.00</td>
    </tr>
    
    <tr>
    <td border="1">CHAMARRA</td>
    <td border="1">$ 800.00</td>
    </tr>
    
    <tr>
    <td border="1">BOINA</td>
    <td border="1">$ 100.00</td>
    </tr>
    
    <tr>
    <td border="1">FORNITURA</td>
    <td border="1">$ 130.00</td>
    </tr>
    
    <tr>
    <td border="1">GAS LACRIMOGENO</td>
    <td border="1">$ 60.00</td>
    </tr>
    
    <tr>
    <td border="1">CREDENCIAL</td> 
    <td border="1">$ 100.00</td>
    </tr>
    
    <tr>
    <td border="1">P. CREDENCIAL</td>
    <td border="1">$ 60.00</td>
    </tr>
    
    <tr>
    <td border="1">LAVANDERIA</td>
    <td border="1">$ 100.00</td>
    </tr>
    
    
    
    </table>';
                $sql23 = "SELECT * from  tblinventoryfol where folio='$f'";
                $query23 = $dbh->prepare($sql23);
                $dbh->exec('SET CHARACTER SET utf8');
                $query23->execute();
                if ($query23->rowCount() > 0) {
                    foreach ($query23 as $result23) {
                        $firm1 = $result23['firm1'];
                        $content .= '<br><br><br><br>
                <div align="center"><img width="110" height="70" src="' . $firm1 . '" /></div>
    <p align="center"><b>' . $tecnicoasig . '</b><br>
    NOMBRE Y FRIMA DEL TRABAJADOR</p>
                
                </section>';
                    }
                }
            }

            if ($responsiva == 'uniforme traje') {

                // set font
                $pdf->SetFont('helvetica', '', 10);

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
                $content .= '<td colspan="2" align="RIGHT"> <b>FECHA:</b>' . $dia . '-' . $mes . '-' . $anio . '</td>';
                $content .= '</tr>';

                $content .= '</table>';
                $content .= '</div>';
                $content .= '</section>';

                $content .= '<section>
                <p>Por medio de la presente yo <B>' . $tecnicoasig . '</B> con número de matrícula <b>' . $empid . '</b> confirmo estar enterado que la dotación entregada es y será de la empresa en
                todo momento y serán utilizados exclusivamente para desempeñar mi trabajo.<br></p>
    
                <p><b>El trabajador manifiesta que:<br></b></p>
    
                <p>A) En el caso de <b>robo o extravío</b> de uniforme, se compromete a pagar dicha prenda y mediante este documento autoriza le sea descontado de salario el monto total de la prenda.<br></p>
    
                <p>B) En caso de <b>daño</b> de la o las prendas, una vez entregada mi nueva dotación me comprometo a realizar la devolución de dichas prendas de manera inmediata en las condiciones en que se encuentren.<br></p>
    
                <p>C) En caso de <b>termino laboral</b> me comprometo a realizar la devolución de la totalidad de las prendas e instrumentos de trabajo asignados por la empresa al inicio de mi contratación y mediante este documento autorizo descontar de salarios o liquidación, los montos asignados ó bien pagar el monto de la prenda extraviada ó robada en efectivo para proceder con la devolución de mis documentos.<br></p>
                <p>D)<b>TABULADOR</b></p>';
                $content .= '
        <table WIDTH="45%" align="center">
        
        <tr>
        <th border="1"><b>ELEMENTO</b></th>
        <th border="1"><b>MONTO</b></th>
        </tr>
         
        <tr>
        <td border="1">SACO</td> 
        <td border="1">$ 800.00</td>
        </tr>
        
        <tr>
        <td border="1">PANTALON</td>
        <td border="1">$ 600.00</td>
        </tr>
        
        <tr>
        <td border="1">CAMISA</td>
        <td border="1">$ 450.00</td>
        </tr>
        
        <tr>
        <td border="1">CORBATA</td>
        <td border="1">$ 250.00</td>
        </tr>
        
        <tr>
        <td border="1">CREDENCIAL</td>
        <td border="1">$ 100.00</td>
        </tr>
        
        <tr>
        <td border="1">P. CREDENCIAL</td>
        <td border="1">$ 60.00</td>
        </tr>
        
        <tr>
        <td border="1">LAVANDERIA</td>
        <td border="1">$ 100.00</td>
        </tr>
        
        
        
        </table>';
                $sql23 = "SELECT * from  tblinventoryfol where folio='$f'";
                $query23 = $dbh->prepare($sql23);
                $dbh->exec('SET CHARACTER SET utf8');
                $query23->execute();
                if ($query23->rowCount() > 0) {
                    foreach ($query23 as $result23) {
                        $firm1 = $result23['firm1'];
                        $content .= '<br><br><br><br><br><br>
                <div align="center"><img width="110" height="70" src="' . $firm1 . '" /></div>
        <p align="center"><b>' . $tecnicoasig . '</b><br>
        NOMBRE Y FRIMA DEL TRABAJADOR</p>
                    
                    </section>';
                    }
                }
            }

            if ($responsiva == 'resguardo de equipo') {

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
                $content .= '<td colspan="2" align="RIGHT"> <b>Tepotzotlán Estado de México a: </b>' . $dia . '-' . $mes . '-' . $anio . '</td>';
                $content .= '</tr>';

                $content .= '</table>';
                $content .= '</div>';
                $content .= '</section>';

                $content .= '<section >
                <div align="left">
                <p><b>
                CAP.1°/ ART. LIC.LUIS GUTIERREZ ZAMORA<br>

                REPRESENTANTE LEGAL DE SEGURIDAD PRIVADA OISME S.A. DE C.V.<br>
                
                P R E S E N T E:</b><br></div></p>
                
                ';

                $content .= '</section>';

                $content .= '<section>
                <div align="left">
                <p>Por medio de la presente se hace de su conocimiento al TSI identificado 
                como <b>' . $tecnicoasig . '</b> , con matrícula <b>' . $empid . '</b>, que a partir 
                de este momento se hace responsable en su totalidad del uniforme proporcionado por la Empresa 
                <b>' . $empresa . '</b>, el cual a partir de este momento quedará registrado a su 
                nombre ante la Secretaría de Gobernación, por tal motivo se compromete a entregarlo en las 
                condiciones en que se encuentre al finalizar la relación laboral en un lapso no mayor a 5 días
                naturales contados a partir del último día laborado.<br></p>
              
                <p>En caso de que esto no ocurra en el tiempo especificado se procederá a levantar el Acta
                 correspondiente de Robo por parte de la Empresa antes citada ente el Ministerio Publico y se 
                 solicitara que Seguridad Publica intervenga para la recuperación.<br></p>
                
                 <p>Cabe mencionar que esto puede perjudicar en su persona, ya que genera un antecedente laboral a
                 nivel Federal negando su ingreso a otra empresa.</p></section>';

                $sql23 = "SELECT * from  tblinventoryfol where folio='$f'";
                $query23 = $dbh->prepare($sql23);
                $dbh->exec('SET CHARACTER SET utf8');
                $query23->execute();
                if ($query23->rowCount() > 0) {
                    foreach ($query23 as $result23) {
                        $firm1 = $result23['firm1'];
                        $content .= '<section><div><br><br><br><br><br><br><br><br><br>
                <div align="center"><img width="110" height="70" src="' . $firm1 . '" /></div>
                 <p align="center"><b>' . $tecnicoasig . '</b><br>
                 NOMBRE Y FRIMA DEL TRABAJADOR</p>
                 </div></section>        
                             ';
                    }
                }
            }

            if ($responsiva == 'uniforme') {

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
                $content .= '<td colspan="2" align="RIGHT"> <b>Tepotzotlán Estado de México a: </b>' . $dia . '-' . $mes . '-' . $anio . '</td>';
                $content .= '</tr>';

                $content .= '</table>';
                $content .= '</div>';
                $content .= '</section>';

                $content .= '<section >
               <div align="left">
               <p><b>
               CAP.1°/ ART. LIC.LUIS GUTIERREZ ZAMORA<br>

               REPRESENTANTE LEGAL DE SEGURIDAD PRIVADA OISME S.A. DE C.V.<br>
               
               P R E S E N T E:</b><br></div></p>
               
               ';

                $content .= '</section>';

                $content .= '<section>
               <div align="left">
               <p>Por medio de la presente se hace de su conocimiento al TSI identificado 
               como <b>' . $tecnicoasig . '</b> , con matrícula <b>' . $empid . '</b>, que a partir 
               de este momento se hace responsable en su totalidad del uniforme proporcionado por la Empresa 
               <b>' . $empresa . '</b>, el cual a partir de este momento quedará registrado a su 
               nombre ante la Secretaría de Gobernación, por tal motivo se compromete a entregarlo en las 
               condiciones en que se encuentre al finalizar la relación laboral en un lapso no mayor a 5 días
               naturales contados a partir del último día laborado.<br></p>
             
               <p>En caso de que esto no ocurra en el tiempo especificado se procederá a levantar el Acta
                correspondiente de Robo por parte de la Empresa antes citada ente el Ministerio Publico y se 
                solicitara que Seguridad Publica intervenga para la recuperación.<br></p>
               
                <p>Cabe mencionar que esto puede perjudicar en su persona, ya que genera un antecedente laboral a
                nivel Federal negando su ingreso a otra empresa.</p></section>';

                $sql23 = "SELECT * from  tblinventoryfol where folio='$f'";
                $query23 = $dbh->prepare($sql23);
                $dbh->exec('SET CHARACTER SET utf8');
                $query23->execute();
                if ($query23->rowCount() > 0) {
                    foreach ($query23 as $result23) {
                        $firm1 = $result23['firm1'];

                        $content .= '<section align="center"><div><br><br><br><br><br><br><br><br><br>
                <div align="center"><img width="110" height="70" src="' . $firm1 . '" /></div>
                <p align="center"><b>' . $tecnicoasig . '</b><br>
                NOMBRE Y FRIMA DEL TRABAJADOR</p>
                </div></section>        
                            ';
                    }
                }
            }



            //$content .= '
            //<div class="row padding">
            //	<div class="col-md-12" style="text-align:center;">
            //  	<span>Pdf Creator </span><a>By sistema sim</a>
            $content .= '</body>'; // print a block of text using Write()
        }
    }
    $pdf->writeHTML($content, true, 0, true, 0);
    $pdf->lastPage();





    $pdf->output('CARTA RESPONSIVA.pdf', 'I');
    //============================================================+
    // END OF FILE
    //============================================================+  



    $cnt++;
}
