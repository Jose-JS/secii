<?php
 ob_start();
 error_reporting(E_ALL & ~E_NOTICE);
 ini_set('display_errors', 0);
 ini_set('log_errors', 1);

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once('../lib/tcpdf/config/lang/spa.php');
require_once('../lib/tcpdf/tcpdf.php');
//require_once('conexion2.php');	
include('../includes/config.php');
$ids = $_GET['idemp'];

if ($ids == 'OISME S.A. DE C.V.') {
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
            $this->Cell(0, 10, 'FICHA TECNICA', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
    // create new PDF document
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $eid = intval($_GET['empid']);
    $sql = "SELECT * FROM tblemployees where id='$eid' ";
    $query = $dbh->prepare($sql);
    $dbh->exec('SET CHARACTER SET utf8');
    $query->execute();
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($query as $result) {
            $image = $result['id'];
            $department = $result['Department'];
            $matricula = $result['EmpId'];
            $assignedservice = $result['assignedservice'];
            $fechini = $result['fechini'];

            $name = $result['name'];
            $firstname = $result['FirstName'];
            $lastname = $result['LastName'];
            $email = $result['EmailId'];
            $gender = $result['Gender'];

            $address = $result['Address'];
            $suburb = $result['suburb'];
            $city = $result['City'];
            $country = $result['Country'];
            $cp = $result['cp'];


            $placebirth = $result['placebirth'];
            $dob = $result['Dob'];
            $age = $result['age'];
            $marital = $result['marital'];
            $nationality = $result['nationality'];

            $phonenumber = $result['Phonenumber'];
            $phonelocal = $result['phonelocal'];
            $phonerecado = $result['phonerecado'];
            $ife = $result['ife'];
            $curp = $result['curp'];

            $rfc = $result['rfc'];
            $imss = $result['imss'];
            $typelicence = $result['typelicence'];
            $military = $result['military'];
            $dependent = $result['dependent'];

            $dependentname = $result['dependentname'];
            $dependentrelation = $result['dependentrelation'];
            $dependentage = $result['dependentage'];

            $dependentname2 = $result['dependentname2'];
            $dependentrelation2 = $result['dependentrelation2'];
            $dependentage2 = $result['dependentage2'];

            $dependentname3 = $result['dependentname3'];
            $dependentrelation3 = $result['dependentrelation3'];
            $dependentage3 = $result['dependentage3'];

            $dependentname4 = $result['dependentname4'];
            $dependentrelation4 = $result['dependentrelation4'];
            $dependentage4 = $result['dependentage4'];

            $dependentname5 = $result['dependentname5'];
            $dependentrelation5 = $result['dependentrelation5'];
            $dependentage5 = $result['dependentage5'];

            $primaryname = $result['primaryname'];
            $primaryadress = $result['primaryadress'];
            $primarydocument = $result['primarydocument'];

            $highschoolname = $result['highschoolname'];
            $highschooladress = $result['highschooladress'];
            $highschooldocument = $result['highschooldocument'];

            $schoolname = $result['schoolname'];
            $schooladress = $result['schooladress'];
            $schooldocument = $result['schooldocument'];

            $universityname = $result['universityname'];
            $universityadress = $result['universityadress'];
            $universitydocument = $result['universitydocument'];

            $companyname = $result['companyname'];
            $companyadress = $result['companyadress'];
            $companyphone = $result['companyphone'];

            $companyjob = $result['companyjob'];
            $timework = $result['timework'];
            $reasonexit = $result['reasonexit'];

            $companyname2 = $result['companyname2'];
            $companyadress2 = $result['companyadress2'];
            $companyphone2 = $result['companyphone2'];

            $companyjob2 = $result['companyjob2'];
            $timework2 = $result['timework2'];
            $reasonexit2 = $result['reasonexit2'];

            $companyname3 = $result['companyname3'];
            $companyadress3 = $result['companyadress3'];
            $companyphone3 = $result['companyphone3'];

            $companyjob3 = $result['companyjob3'];
            $timework3 = $result['timework3'];
            $reasonexit3 = $result['reasonexit3'];

            $familyname = $result['familyname'];
            $relationship = $result['relationship'];
            $yearshim = $result['yearshim'];
            $familyphone = $result['familyphone'];

            $familyname2 = $result['familyname2'];
            $relationship2 = $result['relationship2'];
            $yearshim2 = $result['yearshim2'];
            $familyphone2 = $result['familyphone2'];

            $personalname = $result['personalname'];
            $personalyears = $result['personalyears'];
            $personalphone = $result['personalphone'];
            $personaladress = $result['personaladress'];

            $personalname2 = $result['personalname2'];
            $personalyears2 = $result['personalyears2'];
            $personalphone2 = $result['personalphone2'];
            $personaladress2 = $result['personaladress2'];

            $previous = $result['previous'];
            $required = $result['required'];
            $offered = $result['offered'];
            $homex1 = $result['homex1'];
            $homex2 = $result['homex2'];

            $incomeextra = $result['incomeextra'];
            $incomedesc = $result['incomedesc'];
            $yearsliving = $result['yearsliving'];

            $debts = $result['debts'];
            $debtscell = $result['debtscell'];
            $pantry = $result['pantry'];
            $transport = $result['transport'];
            $maintenance = $result['maintenance'];

            $paymentschool = $result['paymentschool'];
            $medicalservices = $result['medicalservices'];
            $clothes = $result['clothes'];
            $otherexpenses = $result['otherexpenses'];
            $overall = $result['overall'];

            $articulo = $result['articulo'];
            $glasses = $result['glasses'];
            $glasses2 = $result['glasses2'];
            $chronic = $result['chronic'];
            $chronic2 = $result['chronic2'];

            $operation = $result['operation'];
            $operation2 = $result['operation2'];
            $enervants = $result['enervants'];
            $enervants2 = $result['enervants2'];

            $activities = $result['activities'];
            $people = $result['people'];
            $valueperson = $result['valueperson'];
            $defect = $result['defect'];

            $sport = $result['sport'];
            $sport2 = $result['sport2'];
            $politic = $result['politic'];
            $politic2 = $result['politic2'];

            $syndicate = $result['syndicate'];
            $syndicate2 = $result['syndicate2'];
            $conciliation = $result['conciliation'];
            $conciliation2 = $result['conciliation2'];

            $face = $result['face'];
            $skincolor = $result['skincolor'];
            $eyecolor = $result['eyecolor'];
            $kindeyes = $result['kindeyes'];

            $haircolor = $result['haircolor'];
            $complexion = $result['complexion'];
            $tattoo = $result['tattoo'];
            $tattoo2 = $result['tattoo2'];
            $tattoo3 = $result['tattoo3'];

            $piercing = $result['piercing'];
            $piercing2 = $result['piercing2'];
            $piercing3 = $result['piercing3'];
            $observations = $result['observations'];

            $weight = $result['weight'];
            $stature = $result['stature'];
            $typeblood = $result['typeblood'];
            $company = $result['company'];
            $banco = $result['banco'];
            $nocuenta = $result['nocuenta'];
            $clabeint = $result['clabeint'];
            $sueldonet = $result['sueldonet'];
            $ingresomensual=$result['ingresomensual'];
            $ingresomensual2=$result['ingresomensual2'];
            $ingresomensual3=$result['ingresomensual3'];
            $incapacitado=$result['incapacitado'];
            $incapacitado2=$result['incapacitado2'];
            $content = '';

            $content .= '<body>';

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('JJSH');
            $pdf->SetTitle('FICHA TECNICA');
            $pdf->SetSubject('FICHA TECNICA');
            $pdf->SetKeywords('TCPDF, PDF, FICHA TECNICA');

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

            // set some text to print

            $content .= '<section >';

            $content .= '<div align="left">';



            $content .= '<br><table CELLPADDING="15">';


            $content .= '<tr>';
            $content .= '<td colspan="2" align="LEFT"> <b>PUESTO:</b> ' . $department . '</td>';
            $content .= '<td colspan="2" align="LEFT"> <b>SERVICIO ASIGNADO:</b>' . $assignedservice . '</td>';



            $sql22 = "SELECT * from  tbldocument where idemp='$eid' and name='MEDIO CUERPO'";
            $query22 = $dbh->prepare($sql22);
            $dbh->exec('SET CHARACTER SET utf8');
            $query22->execute();



            if ($query22->rowCount() > 0) {
                foreach ($query22 as $result22) {
                    $namedoc = $result22['namedoc'];

                    $content .= '<td rowspan="2" align="RIGHT"><img src="' . $namedoc . '" align="left" width="100" height="120"></td>';

                    $content .= '</tr>';
                }
            }
            $content .= '<tr>';
            $content .= '<td colspan="2" align="LEFT"> <b>MATRICULA:</b> ' . $matricula . '</td>';
            $content .= '<td colspan="2" align="LEFT"> <b>FECHA:</b>' . $fechini . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';

            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<br><table  border="1" >';
            $content .= '<tr>';
            $content .= '<td colspan="10" align="RIGHT"><b><FONT SIZE=5>1. DATOS GENERALES</FONT></b></td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>NOMBRE COMPLETO:</b>' . $name . ' ' . $firstname . ' ' . $lastname . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>FECHA DE NACIMIENTO</b><br>' . $dob . '</td>';
            $content .= '<td colspan="4"align="center"> <b>LUGAR DE NACIMIENTO</b><br>' . $placebirth . '</td>';
            $content .= '<td colspan="3"align="center"> <b>NACIONALIDAD</b><br>' . $nationality . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3" align="center"> <b>EDAD</b><br>' . $age . '</td>';
            $content .= '<td colspan="4" align="center"> <b>GENERO</b><br>' . $gender . '</td>';
            $content .= '<td colspan="3" align="center"> <b>ESTADO CIVIL</b><br>' . $marital . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>IFE O INE</b><br>' . $ife . '</td>';
            $content .= '<td colspan="4"align="center"> <b>CURP</b><br>' . $curp . '</td>';
            $content .= '<td colspan="3"align="center"> <b>RFC</b><br>' . $rfc . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>IMSS</b><br>' . $imss . '</td>';
            $content .= '<td colspan="4"align="center"> <b>TIPO DE LICENCIA</b><br>' . $typelicence . '</td>';
            $content .= '<td colspan="3"align="center"> <b>CARTILLA MILITAR</b><br>' . $military . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NUMERO LOCAL</b><br>' .$phonelocal. '</td>';
            $content .= '<td colspan="4"align="center"> <b>NUMERO CELULAR</b><br>' . $phonenumber . '</td>';
            $content .= '<td colspan="3"align="center"> <b>NUMERO DE RECADOS</b><br>' . $phonerecado . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>DEPENDIENTES</b><br>' . $dependent . '</td>';
            $content .= '<td colspan="7"align="center"> <b>HIJOS Y EDADES</b>
	<br>' . $dependentname . ' ' . $dependentage . '
	<br>' . $dependentname2 . ' ' . $dependentage2 . '
	<br>' . $dependentname3 . ' ' . $dependentage3 . '
	<br>' . $dependentname4 . ' ' . $dependentage4 . '
	<br>' . $dependentname5 . ' ' . $dependentage5 . '
	
	</td>';

            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<br><table  border="1" CELLPADDING="5">';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"><b>DIRECCION</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>DIRECCION</b><BR>' . $address . '</td>';
            $content .= '<td colspan="3"align="center"> <b>COLONIA</b><BR> ' . $suburb . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MUNICIPIO</b><BR> ' . $city . '</td>';

            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>ESTADO</b><BR>' . $country . '</td>';
            $content .= '<td colspan="5"align="center"> <b>CODIGO POSTAL</b><BR>' . $cp . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';




            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<br><table  border="1" CELLPADDING=".5">';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>ESCOLARIDAD</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="center"> <b>NIVEL ACADEMICO</b></td>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE DE LA ESCUELA</b></td>';
            $content .= '<td colspan="3"align="center"> <b>DELEGACION O MUNICIPIO</b></td>';
            $content .= '<td colspan="2"align="center"> <b>DOCUMENTO</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>PRIMARIA</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $primaryname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $primaryadress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $primarydocument . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>SECUNDARIA</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $highschoolname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $highschooladress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $highschooldocument . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>PREPARATORIA</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $schoolname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $schooladress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $schooldocument . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>UNIVERSIDAD</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $universityname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $universityadress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $universitydocument . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<BR><br pagebreak="true"/>';
            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<br><table  border="1" CELLPADDING=".5"  >';


            $content .= '<tr>';
            $content .= '<td colspan="10"align="right"> <b>2.REFERENCIAS</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="left"> <b>EMPLEOS ANTERIORES</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>PRIMERA REFERENCIA</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>NOMBRE DE LA EMPRESA</b><BR> ' . $companyname . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR> ' . $companyadress . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TELEFONO</b><BR> ' . $companyphone . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PUESTO</b><BR> ' . $companyjob . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TIEMPO QUE LABORO</b><BR>' . $timework . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MOTIVO DE SALIDA</b><BR>' . $reasonexit . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO MENSUAL</b><BR>' . $ingresomensual . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>SEGUNDA REFERENCIA</b></td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>NOMBRE</b><BR>' . $companyname2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $companyadress2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TELEFONO</b><BR> ' . $companyphone2 . '</td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PUESTO</b><BR>' . $companyjob2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TIEMPO QUE LABORO</b><BR>' . $timework2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MOTIVO DE SALIDA</b><BR>' . $reasonexit2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO MENSUAL</b><BR>' . $ingresomensual2 . '</td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT" > <b>TERCERA REFERENCIA </b></td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>NOMBRE</b><BR>' . $companyname3 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $companyadress3 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TELEFONO</b><BR>' . $companyphone3 . '</td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PUESTO</b><BR>' . $companyjob3 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TIEMPO QUE LABORO</b><BR>' . $timework3 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MOTIVO DE SALIDA</b><BR>' . $reasonexit3 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO MENSUAL</b><BR>' . $ingresomensual3 . '</td>';
            $content .= '</tr>';


            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<br><table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>REFERENCIAS FAMILIARES</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>PRIMER REFERENCIA</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $familyname . '</td>';
            $content .= '<td colspan="3"align="center"> <b>PARENTESCO</b><BR>' . $relationship . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $yearshim . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $familyphone . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>SEGUNDA REFERENCIA </b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $familyname2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>PARENTESCO</b><BR>' . $relationship2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $yearshim2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $familyphone2 . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';




            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>REFERENCIAS PERSONALES</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>PRIMER REFERENCIA</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $personalname . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $personaladress . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $personalphone . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $personalyears . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>SEGUNDA REFERENCIA PERSONAL</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $personalname2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $personaladress2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $personalphone2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $personalyears2 . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';

            $content .= '<br pagebreak="true"/>';

            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>3.ESTUDIO SOCIOECONOMICO</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>INGRESOS Y EGRESOS</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO ANTERIOR</b><BR>' . $previous . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO REQUERIDO</b><BR>' . $required . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO OFERTADO</b><BR>' . $offered . '</td>';
            $content .= '<td colspan="2"align="center"> <b>INGRESOS EXTRA</b><BR> ' . $incomeextra . '</td>';
            $content .= '<td colspan="2"align="center"> <b>DESCRIPCION </b><BR>' . $incomedesc . '</td>';

            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>EL TIPO DE HOGAR ES: </b>' . $homex2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>EL HOGAR DONDE HABITA ES: </b>' . $homex1 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>TIEMPO DE RESIDIR EN SU DOMICILIO: </b> ' . $yearsliving . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>CONCEPTO DE GASTOS Y/O APORTACION A LA FAMILIA</b></td>';
            $content .= '<td colspan="5"align="center"> <b>CANDIDATO Y FAMILIA</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>DEUDAS</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $debts . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>CELULAR</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $debtscell . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>DESPENSA</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $pantry . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>TRANSPORTE</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $transport . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>MANTENIMIENTO AL HOGAR</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $maintenance . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>PAGO DE ESCUELA</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $paymentschool . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>SERVICIOS MEDICOS</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $medicalservices . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>ROPA Y CALZADO</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $clothes . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>OTROS GASTOS</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $otherexpenses . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>TOTAL</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $overall . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="center"> <b>CARACTERISTICAS Y SERVICIOS</b><BR>' . $articulo . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="center"> <b>4.INFORME MEDICO</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center" > <b>USA ANTEOJOS</b><BR>' . $glasses . '</td>';
            $content .= '<td colspan="5"align="center" > <b>DIAGNOSTICO</b><BR>' . $glasses2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="CENTER"> <b>ENFERMEDAD CRONICA</b><BR>' . $chronic . '</td>';
            $content .= '<td colspan="5"align="CENTER"> <b>CUAL</b><BR>' . $chronic2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>OPERACIONES PRACTICADAS</b><BR>' . $operation . '</td>';
            $content .= '<td colspan="5"align="center"> <b>CUAL</b><BR>' . $operation2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>CONSUME ENERVANTES</b><BR>' . $enervants . '</td>';
            $content .= '<td colspan="5"align="center"> <b>CUAL</b><BR>' . $enervants2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿EN LOS ULTIMOS 5 AÑOS SE HA INCAPACITADO?</b><BR>' . $incapacitado . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿ POR QUE?</b><BR>' . $incapacitado2 . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<br pagebreak="true"/>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>5.INFORMACION ADICIONAL</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>ACTIVIDAD EN TIEMPO LIBRE</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $activities . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>PERSONAS QUE CONVIVE</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $people . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>VALORES</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $valueperson . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>DEFECTOS</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $defect . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿PRACTICA ALGUN DEPORTE?</b><BR>' . $sport . '</td>';
            $content .= '<td colspan="5"align="center" > <b>¿CUAL?</b><BR>' . $sport2 . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿PERTENECE O HA PERTENECIDO A ALGUN PARTIDO POLITICO?</b><BR>' . $politic . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿CUAL?</b><BR>' . $politic2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>PERTENECE O HA PERTENECIDO A ALGUN SINDICATO?</b><BR>' . $syndicate . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿CUAL?</b><BR>' . $syndicate2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿TUVO ALGUN TRABAJO DONDE HAYA TENIDO QUE ACUDIR A CONCILIACION Y ARBITRAJE?</b><BR>' . $conciliation . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿CUAL?</b><BR>' . $conciliation2 . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';

            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>CARACTERISTICAS FISICAS</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>CARA</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $face . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COLOR DE PIEL</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $skincolor . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COLOR DE OJOS</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $eyecolor . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>TIPO DE OJOS</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $kindeyes . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COLOR DE CABELLO</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $haircolor . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COMPLEXION</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $complexion . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>TATUAJE</b><BR>' . $tattoo . '</td>';
            $content .= '<td colspan="4"align="center"> <b>DONDE</b><BR>' . $tattoo2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TAMAÑO</b><BR>' . $tattoo3 . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PERFORACIONES</b><BR>' . $piercing . '</td>';
            $content .= '<td colspan="4"align="center"> <b>DONDE</b><BR>' . $piercing2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>CUANTAS</b><BR>' . $piercing3 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>OBSERVACIONES</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT">' . $observations . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>PESO: </b>' . $weight . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>ESTATURA: </b>' . $stature . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>TIPO DE SANGRE: </b>' . $typeblood . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>BANCO: </b>' . $banco . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>NO. DE CUENTA: </b>' . $nocuenta . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>CLABE INTERBANCARIA: </b>' . $clabeint . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>SUELDO NETO: </b>' . $sueldonet . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';
        }
        $cnt++;
    }

    $content .= '<br pagebreak="true"/>';
    $content .= '<section>';
    $content .= '<div align="center">';
    $content .= '<table>';
    $content .= '<tr>';
    $content .= '<td>';
    $content .= '</td>';
    $content .= '</tr>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='PERFIL DERECHO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];
            $content .= '<td align="center"><img src="' . $namedoc . '" align="center" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';

    
    $content .= '<section>';
    $content .= '<div align="CENTER">';
    $content .= '<table>';
    $content .= '<tr>';
    $content .= '<td>';
    $content .= '</td>';
    $content .= '</tr>';
    $content .= '<tr>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='PERFIL IZQUIERDO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];

            $content .= '<td align="center"><img src="' . $namedoc . '" align="CENTER" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';

    $content .= '<br pagebreak="true"/>';
    
    $content .= '<section>';
    $content .= '<div align="CENTER">';
    $content .= '<table>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='CUERPO COMPLETO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];

            $content .= '<td align="center"><img src="' . $namedoc . '" align="CENTER" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';

    $content .= '<br pagebreak="true"/>';
    
    $content .= '<section>';
    $content .= '<div align="CENTER">';
    $content .= '<table>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='TOXICOLOGICO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];

            $content .= '<td align="center"><img src="' . $namedoc . '" align="CENTER" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';
    $content .= '<br pagebreak="true"/>';
    
    $content .= '<section>';
    $content .= '<div align="CENTER">';
    $content .= '<table>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='HUELLAS DACTILARES'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];
            $content .= '<td align="center"><img src="' . $namedoc . '" align="CENTER" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';



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


    $pdf->output('FICHA TECNICA.pdf', 'I');
    //============================================================+
    // END OF FILE
    //============================================================+    
}

if ($ids == 'OIFSI S.A. DE C.V.') {
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
            $this->Cell(0, 10, 'FICHA TECNICA', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
    // create new PDF document
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $eid = intval($_GET['empid']);
    $sql = "SELECT * FROM tblemployees where id='$eid' ";
    $query = $dbh->prepare($sql);
    $dbh->exec('SET CHARACTER SET utf8');
    $query->execute();
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($query as $result) {
            $image = $result['id'];
            $department = $result['Department'];
            $matricula = $result['EmpId'];
            $assignedservice = $result['assignedservice'];
            $fechini = $result['fechini'];

            $name = $result['name'];
            $firstname = $result['FirstName'];
            $lastname = $result['LastName'];
            $email = $result['EmailId'];
            $gender = $result['Gender'];

            $address = $result['Address'];
            $suburb = $result['suburb'];
            $city = $result['City'];
            $country = $result['Country'];
            $cp = $result['cp'];


            $placebirth = $result['placebirth'];
            $dob = $result['Dob'];
            $age = $result['age'];
            $marital = $result['marital'];
            $nationality = $result['nationality'];

            $phonenumber = $result['Phonenumber'];
            $phonelocal = $result['phonelocal'];
            $phonerecado = $result['phonerecado'];
            $ife = $result['ife'];
            $curp = $result['curp'];

            $rfc = $result['rfc'];
            $imss = $result['imss'];
            $typelicence = $result['typelicence'];
            $military = $result['military'];
            $dependent = $result['dependent'];

            $dependentname = $result['dependentname'];
            $dependentrelation = $result['dependentrelation'];
            $dependentage = $result['dependentage'];

            $dependentname2 = $result['dependentname2'];
            $dependentrelation2 = $result['dependentrelation2'];
            $dependentage2 = $result['dependentage2'];

            $dependentname3 = $result['dependentname3'];
            $dependentrelation3 = $result['dependentrelation3'];
            $dependentage3 = $result['dependentage3'];

            $dependentname4 = $result['dependentname4'];
            $dependentrelation4 = $result['dependentrelation4'];
            $dependentage4 = $result['dependentage4'];

            $dependentname5 = $result['dependentname5'];
            $dependentrelation5 = $result['dependentrelation5'];
            $dependentage5 = $result['dependentage5'];

            $primaryname = $result['primaryname'];
            $primaryadress = $result['primaryadress'];
            $primarydocument = $result['primarydocument'];

            $highschoolname = $result['highschoolname'];
            $highschooladress = $result['highschooladress'];
            $highschooldocument = $result['highschooldocument'];

            $schoolname = $result['schoolname'];
            $schooladress = $result['schooladress'];
            $schooldocument = $result['schooldocument'];

            $universityname = $result['universityname'];
            $universityadress = $result['universityadress'];
            $universitydocument = $result['universitydocument'];

            $companyname = $result['companyname'];
            $companyadress = $result['companyadress'];
            $companyphone = $result['companyphone'];

            $companyjob = $result['companyjob'];
            $timework = $result['timework'];
            $reasonexit = $result['reasonexit'];

            $companyname2 = $result['companyname2'];
            $companyadress2 = $result['companyadress2'];
            $companyphone2 = $result['companyphone2'];

            $companyjob2 = $result['companyjob2'];
            $timework2 = $result['timework2'];
            $reasonexit2 = $result['reasonexit2'];

            $companyname3 = $result['companyname3'];
            $companyadress3 = $result['companyadress3'];
            $companyphone3 = $result['companyphone3'];

            $companyjob3 = $result['companyjob3'];
            $timework3 = $result['timework3'];
            $reasonexit3 = $result['reasonexit3'];

            $familyname = $result['familyname'];
            $relationship = $result['relationship'];
            $yearshim = $result['yearshim'];
            $familyphone = $result['familyphone'];

            $familyname2 = $result['familyname2'];
            $relationship2 = $result['relationship2'];
            $yearshim2 = $result['yearshim2'];
            $familyphone2 = $result['familyphone2'];

            $personalname = $result['personalname'];
            $personalyears = $result['personalyears'];
            $personalphone = $result['personalphone'];
            $personaladress = $result['personaladress'];

            $personalname2 = $result['personalname2'];
            $personalyears2 = $result['personalyears2'];
            $personalphone2 = $result['personalphone2'];
            $personaladress2 = $result['personaladress2'];

            $previous = $result['previous'];
            $required = $result['required'];
            $offered = $result['offered'];
            $homex1 = $result['homex1'];
            $homex2 = $result['homex2'];

            $incomeextra = $result['incomeextra'];
            $incomedesc = $result['incomedesc'];
            $yearsliving = $result['yearsliving'];

            $debts = $result['debts'];
            $debtscell = $result['debtscell'];
            $pantry = $result['pantry'];
            $transport = $result['transport'];
            $maintenance = $result['maintenance'];

            $paymentschool = $result['paymentschool'];
            $medicalservices = $result['medicalservices'];
            $clothes = $result['clothes'];
            $otherexpenses = $result['otherexpenses'];
            $overall = $result['overall'];

            $articulo = $result['articulo'];
            $glasses = $result['glasses'];
            $glasses2 = $result['glasses2'];
            $chronic = $result['chronic'];
            $chronic2 = $result['chronic2'];

            $operation = $result['operation'];
            $operation2 = $result['operation2'];
            $enervants = $result['enervants'];
            $enervants2 = $result['enervants2'];

            $activities = $result['activities'];
            $people = $result['people'];
            $valueperson = $result['valueperson'];
            $defect = $result['defect'];

            $sport = $result['sport'];
            $sport2 = $result['sport2'];
            $politic = $result['politic'];
            $politic2 = $result['politic2'];

            $syndicate = $result['syndicate'];
            $syndicate2 = $result['syndicate2'];
            $conciliation = $result['conciliation'];
            $conciliation2 = $result['conciliation2'];

            $face = $result['face'];
            $skincolor = $result['skincolor'];
            $eyecolor = $result['eyecolor'];
            $kindeyes = $result['kindeyes'];

            $haircolor = $result['haircolor'];
            $complexion = $result['complexion'];
            $tattoo = $result['tattoo'];
            $tattoo2 = $result['tattoo2'];
            $tattoo3 = $result['tattoo3'];

            $piercing = $result['piercing'];
            $piercing2 = $result['piercing2'];
            $piercing3 = $result['piercing3'];
            $observations = $result['observations'];

            $weight = $result['weight'];
            $stature = $result['stature'];
            $typeblood = $result['typeblood'];
            $company = $result['company'];
            $banco = $result['banco'];
            $nocuenta = $result['nocuenta'];
            $clabeint = $result['clabeint'];
            $sueldonet = $result['sueldonet'];
            $ingresomensual=$result['ingresomensual'];
            $ingresomensual2=$result['ingresomensual2'];
            $ingresomensual3=$result['ingresomensual3'];
            $incapacitado=$result['incapacitado'];
            $incapacitado2=$result['incapacitado2'];
            $content = '';

            $content .= '<body>';

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('JJSH');
            $pdf->SetTitle('FICHA TECNICA');
            $pdf->SetSubject('FICHA TECNICA');
            $pdf->SetKeywords('TCPDF, PDF, FICHA TECNICA');

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

            // set some text to print

            $content .= '<section >';

            $content .= '<div align="left">';



            $content .= '<table CELLPADDING="15">';


            $content .= '<tr>';
            $content .= '<td colspan="2" align="LEFT"> <b>PUESTO:</b> ' . $department . '</td>';
            $content .= '<td colspan="2" align="LEFT"> <b>SERVICIO ASIGNADO:</b>' . $assignedservice . '</td>';



            $sql22 = "SELECT * from  tbldocument where idemp='$eid' and name='MEDIO CUERPO'";
            $query22 = $dbh->prepare($sql22);
            $dbh->exec('SET CHARACTER SET utf8');
            $query22->execute();



            if ($query22->rowCount() > 0) {
                foreach ($query22 as $result22) {
                    $namedoc = $result22['namedoc'];

                    $content .= '<td rowspan="2" align="RIGHT"><img src="' . $namedoc . '" align="left" width="100" height="120"></td>';

                    
                }
            }
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="2" align="LEFT"> <b>MATRICULA:</b> ' . $matricula . '</td>';
            $content .= '<td colspan="2" align="LEFT"> <b>FECHA:</b>' . $fechini . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';

            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" >';
            $content .= '<tr>';
            $content .= '<td colspan="10" align="RIGHT"><b><FONT SIZE=5>1. DATOS GENERALES</FONT></b></td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>NOMBRE COMPLETO:</b>' . $name . ' ' . $firstname . ' ' . $lastname . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>FECHA DE NACIMIENTO</b><br>' . $dob . '</td>';
            $content .= '<td colspan="4"align="center"> <b>LUGAR DE NACIMIENTO</b><br>' . $placebirth . '</td>';
            $content .= '<td colspan="3"align="center"> <b>NACIONALIDAD</b><br>' . $nationality . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3" align="center"> <b>EDAD</b><br>' . $age . '</td>';
            $content .= '<td colspan="4" align="center"> <b>GENERO</b><br>' . $gender . '</td>';
            $content .= '<td colspan="3" align="center"> <b>ESTADO CIVIL</b><br>' . $marital . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>IFE O INE</b><br>' . $ife . '</td>';
            $content .= '<td colspan="4"align="center"> <b>CURP</b><br>' . $curp . '</td>';
            $content .= '<td colspan="3"align="center"> <b>RFC</b><br>' . $rfc . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>IMSS</b><br>' . $imss . '</td>';
            $content .= '<td colspan="4"align="center"> <b>TIPO DE LICENCIA</b><br>' . $typelicence . '</td>';
            $content .= '<td colspan="3"align="center"> <b>CARTILLA MILITAR</b><br>' . $military . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NUMERO LOCAL</b><br>' .$phonelocal. '</td>';
            $content .= '<td colspan="4"align="center"> <b>NUMERO CELULAR</b><br>' .$phonenumber. '</td>';
            $content .= '<td colspan="3"align="center"> <b>NUMERO DE RECADOS</b><br>' . $phonerecado . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>DEPENDIENTES</b><br>' . $dependent . '</td>';
            $content .= '<td colspan="7"align="center"> <b>HIJOS Y EDADES</b>
	<br>' . $dependentname . ' ' . $dependentage . '
	<br>' . $dependentname2 . ' ' . $dependentage2 . '
	<br>' . $dependentname3 . ' ' . $dependentage3 . '
	<br>' . $dependentname4 . ' ' . $dependentage4 . '
	<br>' . $dependentname5 . ' ' . $dependentage5 . '
	
	</td>';

            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING="5">';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"><b>DIRECCION</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>DIRECCION</b><BR>' . $address . '</td>';
            $content .= '<td colspan="3"align="center"> <b>COLONIA</b><BR> ' . $suburb . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MUNICIPIO</b><BR> ' . $city . '</td>';

            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>ESTADO</b><BR>' . $country . '</td>';
            $content .= '<td colspan="5"align="center"> <b>CODIGO POSTAL</b><BR>' . $cp . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';




            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5">';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>ESCOLARIDAD</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="center"> <b>NIVEL ACADEMICO</b></td>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE DE LA ESCUELA</b></td>';
            $content .= '<td colspan="3"align="center"> <b>DELEGACION O MUNICIPIO</b></td>';
            $content .= '<td colspan="2"align="center"> <b>DOCUMENTO</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>PRIMARIA</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $primaryname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $primaryadress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $primarydocument . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>SECUNDARIA</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $highschoolname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $highschooladress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $highschooldocument . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>PREPARATORIA</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $schoolname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $schooladress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $schooldocument . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>UNIVERSIDAD</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $universityname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $universityadress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $universitydocument . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<BR><br pagebreak="true"/>';
            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';


            $content .= '<tr>';
            $content .= '<td colspan="10"align="right"> <b>2.REFERENCIAS</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="left"> <b>EMPLEOS ANTERIORES</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>PRIMERA REFERENCIA</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>NOMBRE DE LA EMPRESA</b><BR> ' . $companyname . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR> ' . $companyadress . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TELEFONO</b><BR> ' . $companyphone . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PUESTO</b><BR> ' . $companyjob . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TIEMPO QUE LABORO</b><BR>' . $timework . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MOTIVO DE SALIDA</b><BR>' . $reasonexit . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO MENSUAL</b><BR>' . $ingresomensual . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>SEGUNDA REFERENCIA</b></td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>NOMBRE</b><BR>' . $companyname2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $companyadress2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TELEFONO</b><BR> ' . $companyphone2 . '</td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PUESTO</b><BR>' . $companyjob2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TIEMPO QUE LABORO</b><BR>' . $timework2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MOTIVO DE SALIDA</b><BR>' . $reasonexit2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO MENSUAL</b><BR>' . $ingresomensual2 . '</td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT" > <b>TERCERA REFERENCIA </b></td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>NOMBRE</b><BR>' . $companyname3 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $companyadress3 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TELEFONO</b><BR>' . $companyphone3 . '</td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PUESTO</b><BR>' . $companyjob3 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TIEMPO QUE LABORO</b><BR>' . $timework3 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MOTIVO DE SALIDA</b><BR>' . $reasonexit3 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO MENSUAL</b><BR>' . $ingresomensual3 . '</td>';
            $content .= '</tr>';


            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>REFERENCIAS FAMILIARES</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>PRIMER REFERENCIA</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $familyname . '</td>';
            $content .= '<td colspan="3"align="center"> <b>PARENTESCO</b><BR>' . $relationship . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $yearshim . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $familyphone . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>SEGUNDA REFERENCIA </b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $familyname2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>PARENTESCO</b><BR>' . $relationship2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $yearshim2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $familyphone2 . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';




            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>REFERENCIAS PERSONALES</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>PRIMER REFERENCIA</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $personalname . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $personaladress . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $personalphone . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $personalyears . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>SEGUNDA REFERENCIA PERSONAL</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $personalname2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $personaladress2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $personalphone2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $personalyears2 . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';

            $content .= '<br pagebreak="true"/>';

            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>3.ESTUDIO SOCIOECONOMICO</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>INGRESOS Y EGRESOS</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO ANTERIOR</b><BR>' . $previous . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO REQUERIDO</b><BR>' . $required . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO OFERTADO</b><BR>' . $offered . '</td>';
            $content .= '<td colspan="2"align="center"> <b>INGRESOS EXTRA</b><BR> ' . $incomeextra . '</td>';
            $content .= '<td colspan="2"align="center"> <b>DESCRIPCION </b><BR>' . $incomedesc . '</td>';

            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>EL TIPO DE HOGAR ES: </b>' . $homex2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>EL HOGAR DONDE HABITA ES: </b>' . $homex1 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>TIEMPO DE RESIDIR EN SU DOMICILIO: </b> ' . $yearsliving . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>CONCEPTO DE GASTOS Y/O APORTACION A LA FAMILIA</b></td>';
            $content .= '<td colspan="5"align="center"> <b>CANDIDATO Y FAMILIA</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>DEUDAS</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $debts . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>CELULAR</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $debtscell . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>DESPENSA</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $pantry . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>TRANSPORTE</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $transport . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>MANTENIMIENTO AL HOGAR</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $maintenance . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>PAGO DE ESCUELA</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $paymentschool . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>SERVICIOS MEDICOS</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $medicalservices . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>ROPA Y CALZADO</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $clothes . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>OTROS GASTOS</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $otherexpenses . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>TOTAL</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $overall . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="center"> <b>CARACTERISTICAS Y SERVICIOS</b><BR>' . $articulo . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="center"> <b>4.INFORME MEDICO</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center" > <b>USA ANTEOJOS</b><BR>' . $glasses . '</td>';
            $content .= '<td colspan="5"align="center" > <b>DIAGNOSTICO</b><BR>' . $glasses2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="CENTER"> <b>ENFERMEDAD CRONICA</b><BR>' . $chronic . '</td>';
            $content .= '<td colspan="5"align="CENTER"> <b>CUAL</b><BR>' . $chronic2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>OPERACIONES PRACTICADAS</b><BR>' . $operation . '</td>';
            $content .= '<td colspan="5"align="center"> <b>CUAL</b><BR>' . $operation2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>CONSUME ENERVANTES</b><BR>' . $enervants . '</td>';
            $content .= '<td colspan="5"align="center"> <b>CUAL</b><BR>' . $enervants2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿EN LOS ULTIMOS 5 AÑOS SE HA INCAPACITADO?</b><BR>' . $incapacitado . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿ POR QUE?</b><BR>' . $incapacitado2 . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<br pagebreak="true"/>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>5.INFORMACION ADICIONAL</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>ACTIVIDAD EN TIEMPO LIBRE</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $activities . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>PERSONAS QUE CONVIVE</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $people . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>VALORES</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $valueperson . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>DEFECTOS</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $defect . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿PRACTICA ALGUN DEPORTE?</b><BR>' . $sport . '</td>';
            $content .= '<td colspan="5"align="center" > <b>¿CUAL?</b><BR>' . $sport2 . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿PERTENECE O HA PERTENECIDO A ALGUN PARTIDO POLITICO?</b><BR>' . $politic . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿CUAL?</b><BR>' . $politic2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>PERTENECE O HA PERTENECIDO A ALGUN SINDICATO?</b><BR>' . $syndicate . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿CUAL?</b><BR>' . $syndicate2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿TUVO ALGUN TRABAJO DONDE HAYA TENIDO QUE ACUDIR A CONCILIACION Y ARBITRAJE?</b><BR>' . $conciliation . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿CUAL?</b><BR>' . $conciliation2 . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';

            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>CARACTERISTICAS FISICAS</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>CARA</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $face . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COLOR DE PIEL</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $skincolor . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COLOR DE OJOS</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $eyecolor . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>TIPO DE OJOS</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $kindeyes . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COLOR DE CABELLO</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $haircolor . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COMPLEXION</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $complexion . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>TATUAJE</b><BR>' . $tattoo . '</td>';
            $content .= '<td colspan="4"align="center"> <b>DONDE</b><BR>' . $tattoo2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TAMAÑO</b><BR>' . $tattoo3 . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PERFORACIONES</b><BR>' . $piercing . '</td>';
            $content .= '<td colspan="4"align="center"> <b>DONDE</b><BR>' . $piercing2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>CUANTAS</b><BR>' . $piercing3 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>OBSERVACIONES</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT">' . $observations . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>PESO: </b>' . $weight . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>ESTATURA: </b>' . $stature . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>TIPO DE SANGRE: </b>' . $typeblood . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>BANCO: </b>' . $banco . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>NO. DE CUENTA: </b>' . $nocuenta . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>CLABE INTERBANCARIA: </b>' . $clabeint . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>SUELDO NETO: </b>' . $sueldonet . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';
        }
        $cnt++;
    }

    
    $content .= '<br pagebreak="true"/>';
    $content .= '<section>';
    $content .= '<div align="center">';
    $content .= '<table>';
    $content .= '<tr>';
    $content .= '<td>';
    $content .= '</td>';
    $content .= '</tr>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='PERFIL DERECHO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];
            $content .= '<td align="center"><img src="' . $namedoc . '" align="center" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';

    
    $content .= '<section>';
    $content .= '<div align="CENTER">';
    $content .= '<table>';
    $content .= '<tr>';
    $content .= '<td>';
    $content .= '</td>';
    $content .= '</tr>';
    $content .= '<tr>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='PERFIL IZQUIERDO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];

            $content .= '<td align="center"><img src="' . $namedoc . '" align="CENTER" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';

    $content .= '<br pagebreak="true"/>';
    
    $content .= '<section>';
    $content .= '<div align="CENTER">';
    $content .= '<table>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='CUERPO COMPLETO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];

            $content .= '<td align="center"><img src="' . $namedoc . '" align="CENTER" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';

    $content .= '<br pagebreak="true"/>';
    
    $content .= '<section>';
    $content .= '<div align="CENTER">';
    $content .= '<table>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='TOXICOLOGICO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];

            $content .= '<td align="center"><img src="' . $namedoc . '" align="CENTER" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';


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


    $pdf->output('FICHA TECNICA.pdf', 'I');
    //============================================================+
    // END OF FILE
    //============================================================+    
}

if ($ids == 'ASLO SEGURIDAD PRIVADA S.A. DE C.V.') {
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
            $this->Cell(0, 10, 'FICHA TECNICA', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
    // create new PDF document
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $eid = intval($_GET['empid']);
    $sql = "SELECT * FROM tblemployees where id='$eid' ";
    $query = $dbh->prepare($sql);
    $dbh->exec('SET CHARACTER SET utf8');
    $query->execute();
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($query as $result) {
            $image = $result['id'];
            $department = $result['Department'];
            $matricula = $result['EmpId'];
            $assignedservice = $result['assignedservice'];
            $fechini = $result['fechini'];

            $name = $result['name'];
            $firstname = $result['FirstName'];
            $lastname = $result['LastName'];
            $email = $result['EmailId'];
            $gender = $result['Gender'];

            $address = $result['Address'];
            $suburb = $result['suburb'];
            $city = $result['City'];
            $country = $result['Country'];
            $cp = $result['cp'];


            $placebirth = $result['placebirth'];
            $dob = $result['Dob'];
            $age = $result['age'];
            $marital = $result['marital'];
            $nationality = $result['nationality'];

            $phonenumber = $result['Phonenumber'];
            $phonelocal = $result['phonelocal'];
            $phonerecado = $result['phonerecado'];
            $ife = $result['ife'];
            $curp = $result['curp'];

            $rfc = $result['rfc'];
            $imss = $result['imss'];
            $typelicence = $result['typelicence'];
            $military = $result['military'];
            $dependent = $result['dependent'];

            $dependentname = $result['dependentname'];
            $dependentrelation = $result['dependentrelation'];
            $dependentage = $result['dependentage'];

            $dependentname2 = $result['dependentname2'];
            $dependentrelation2 = $result['dependentrelation2'];
            $dependentage2 = $result['dependentage2'];

            $dependentname3 = $result['dependentname3'];
            $dependentrelation3 = $result['dependentrelation3'];
            $dependentage3 = $result['dependentage3'];

            $dependentname4 = $result['dependentname4'];
            $dependentrelation4 = $result['dependentrelation4'];
            $dependentage4 = $result['dependentage4'];

            $dependentname5 = $result['dependentname5'];
            $dependentrelation5 = $result['dependentrelation5'];
            $dependentage5 = $result['dependentage5'];

            $primaryname = $result['primaryname'];
            $primaryadress = $result['primaryadress'];
            $primarydocument = $result['primarydocument'];

            $highschoolname = $result['highschoolname'];
            $highschooladress = $result['highschooladress'];
            $highschooldocument = $result['highschooldocument'];

            $schoolname = $result['schoolname'];
            $schooladress = $result['schooladress'];
            $schooldocument = $result['schooldocument'];

            $universityname = $result['universityname'];
            $universityadress = $result['universityadress'];
            $universitydocument = $result['universitydocument'];

            $companyname = $result['companyname'];
            $companyadress = $result['companyadress'];
            $companyphone = $result['companyphone'];

            $companyjob = $result['companyjob'];
            $timework = $result['timework'];
            $reasonexit = $result['reasonexit'];

            $companyname2 = $result['companyname2'];
            $companyadress2 = $result['companyadress2'];
            $companyphone2 = $result['companyphone2'];

            $companyjob2 = $result['companyjob2'];
            $timework2 = $result['timework2'];
            $reasonexit2 = $result['reasonexit2'];

            $companyname3 = $result['companyname3'];
            $companyadress3 = $result['companyadress3'];
            $companyphone3 = $result['companyphone3'];

            $companyjob3 = $result['companyjob3'];
            $timework3 = $result['timework3'];
            $reasonexit3 = $result['reasonexit3'];

            $familyname = $result['familyname'];
            $relationship = $result['relationship'];
            $yearshim = $result['yearshim'];
            $familyphone = $result['familyphone'];

            $familyname2 = $result['familyname2'];
            $relationship2 = $result['relationship2'];
            $yearshim2 = $result['yearshim2'];
            $familyphone2 = $result['familyphone2'];

            $personalname = $result['personalname'];
            $personalyears = $result['personalyears'];
            $personalphone = $result['personalphone'];
            $personaladress = $result['personaladress'];

            $personalname2 = $result['personalname2'];
            $personalyears2 = $result['personalyears2'];
            $personalphone2 = $result['personalphone2'];
            $personaladress2 = $result['personaladress2'];

            $previous = $result['previous'];
            $required = $result['required'];
            $offered = $result['offered'];
            $homex1 = $result['homex1'];
            $homex2 = $result['homex2'];

            $incomeextra = $result['incomeextra'];
            $incomedesc = $result['incomedesc'];
            $yearsliving = $result['yearsliving'];

            $debts = $result['debts'];
            $debtscell = $result['debtscell'];
            $pantry = $result['pantry'];
            $transport = $result['transport'];
            $maintenance = $result['maintenance'];

            $paymentschool = $result['paymentschool'];
            $medicalservices = $result['medicalservices'];
            $clothes = $result['clothes'];
            $otherexpenses = $result['otherexpenses'];
            $overall = $result['overall'];

            $articulo = $result['articulo'];
            $glasses = $result['glasses'];
            $glasses2 = $result['glasses2'];
            $chronic = $result['chronic'];
            $chronic2 = $result['chronic2'];

            $operation = $result['operation'];
            $operation2 = $result['operation2'];
            $enervants = $result['enervants'];
            $enervants2 = $result['enervants2'];

            $activities = $result['activities'];
            $people = $result['people'];
            $valueperson = $result['valueperson'];
            $defect = $result['defect'];

            $sport = $result['sport'];
            $sport2 = $result['sport2'];
            $politic = $result['politic'];
            $politic2 = $result['politic2'];

            $syndicate = $result['syndicate'];
            $syndicate2 = $result['syndicate2'];
            $conciliation = $result['conciliation'];
            $conciliation2 = $result['conciliation2'];

            $face = $result['face'];
            $skincolor = $result['skincolor'];
            $eyecolor = $result['eyecolor'];
            $kindeyes = $result['kindeyes'];

            $haircolor = $result['haircolor'];
            $complexion = $result['complexion'];
            $tattoo = $result['tattoo'];
            $tattoo2 = $result['tattoo2'];
            $tattoo3 = $result['tattoo3'];

            $piercing = $result['piercing'];
            $piercing2 = $result['piercing2'];
            $piercing3 = $result['piercing3'];
            $observations = $result['observations'];

            $weight = $result['weight'];
            $stature = $result['stature'];
            $typeblood = $result['typeblood'];
            $company = $result['company'];
            $banco = $result['banco'];
            $nocuenta = $result['nocuenta'];
            $clabeint = $result['clabeint'];
            $sueldonet = $result['sueldonet'];
            $ingresomensual=$result['ingresomensual'];
            $ingresomensual2=$result['ingresomensual2'];
            $ingresomensual3=$result['ingresomensual3'];
            $incapacitado=$result['incapacitado'];
            $incapacitado2=$result['incapacitado2'];
            $content = '';

            $content .= '<body>';

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('JJSH');
            $pdf->SetTitle('FICHA TECNICA');
            $pdf->SetSubject('FICHA TECNICA');
            $pdf->SetKeywords('TCPDF, PDF, FICHA TECNICA');

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

            // set some text to print

            $content .= '<section >';

            $content .= '<div align="left">';



            $content .= '<table CELLPADDING="15">';


            $content .= '<tr>';
            $content .= '<td colspan="2" align="LEFT"> <b>PUESTO:</b> ' . $department . '</td>';
            $content .= '<td colspan="2" align="LEFT"> <b>SERVICIO ASIGNADO:</b>' . $assignedservice . '</td>';



            $sql22 = "SELECT * from  tbldocument where idemp='$eid' and name='MEDIO CUERPO'";
            $query22 = $dbh->prepare($sql22);
            $dbh->exec('SET CHARACTER SET utf8');
            $query22->execute();
            if ($query22->rowCount() > 0) {
                foreach ($query22 as $result22) {
                    $namedoc = $result22['namedoc'];

                    $content .= '<td rowspan="2" align="RIGHT"><img src="' . $namedoc . '" align="left" width="100" height="120"></td>';

                    $content .= '</tr>';
                }
            }
            $content .= '<tr>';
            $content .= '<td colspan="2" align="LEFT"> <b>MATRICULA:</b> ' . $matricula . '</td>';
            $content .= '<td colspan="2" align="LEFT"> <b>FECHA:</b>' . $fechini . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';

            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" >';
            $content .= '<tr>';
            $content .= '<td colspan="10" align="RIGHT"><b><FONT SIZE=5>1. DATOS GENERALES</FONT></b></td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>NOMBRE COMPLETO:</b>' . $name . ' ' . $firstname . ' ' . $lastname . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>FECHA DE NACIMIENTO</b><br>' . $dob . '</td>';
            $content .= '<td colspan="4"align="center"> <b>LUGAR DE NACIMIENTO</b><br>' . $placebirth . '</td>';
            $content .= '<td colspan="3"align="center"> <b>NACIONALIDAD</b><br>' . $nationality . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3" align="center"> <b>EDAD</b><br>' . $age . '</td>';
            $content .= '<td colspan="4" align="center"> <b>GENERO</b><br>' . $gender . '</td>';
            $content .= '<td colspan="3" align="center"> <b>ESTADO CIVIL</b><br>' . $marital . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>IFE O INE</b><br>' . $ife . '</td>';
            $content .= '<td colspan="4"align="center"> <b>CURP</b><br>' . $curp . '</td>';
            $content .= '<td colspan="3"align="center"> <b>RFC</b><br>' . $rfc . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>IMSS</b><br>' . $imss . '</td>';
            $content .= '<td colspan="4"align="center"> <b>TIPO DE LICENCIA</b><br>' . $typelicence . '</td>';
            $content .= '<td colspan="3"align="center"> <b>CARTILLA MILITAR</b><br>' . $military . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NUMERO LOCAL</b><br>' . $phonelocal. '</td>';
            $content .= '<td colspan="4"align="center"> <b>NUMERO CELULAR</b><br>' .$phonenumber. '</td>';
            $content .= '<td colspan="3"align="center"> <b>NUMERO DE RECADOS</b><br>' . $phonerecado . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>DEPENDIENTES</b><br>' . $dependent . '</td>';
            $content .= '<td colspan="7"align="center"> <b>HIJOS Y EDADES</b>
	<br>' . $dependentname . ' ' . $dependentage . '
	<br>' . $dependentname2 . ' ' . $dependentage2 . '
	<br>' . $dependentname3 . ' ' . $dependentage3 . '
	<br>' . $dependentname4 . ' ' . $dependentage4 . '
	<br>' . $dependentname5 . ' ' . $dependentage5 . '
	
	</td>';

            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING="5">';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"><b>DIRECCION</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>DIRECCION</b><BR>' . $address . '</td>';
            $content .= '<td colspan="3"align="center"> <b>COLONIA</b><BR> ' . $suburb . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MUNICIPIO</b><BR> ' . $city . '</td>';

            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>ESTADO</b><BR>' . $country . '</td>';
            $content .= '<td colspan="5"align="center"> <b>CODIGO POSTAL</b><BR>' . $cp . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';




            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5">';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>ESCOLARIDAD</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="center"> <b>NIVEL ACADEMICO</b></td>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE DE LA ESCUELA</b></td>';
            $content .= '<td colspan="3"align="center"> <b>DELEGACION O MUNICIPIO</b></td>';
            $content .= '<td colspan="2"align="center"> <b>DOCUMENTO</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>PRIMARIA</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $primaryname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $primaryadress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $primarydocument . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>SECUNDARIA</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $highschoolname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $highschooladress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $highschooldocument . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>PREPARATORIA</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $schoolname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $schooladress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $schooldocument . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>UNIVERSIDAD</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $universityname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $universityadress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $universitydocument . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<BR><br pagebreak="true"/>';
            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';


            $content .= '<tr>';
            $content .= '<td colspan="10"align="right"> <b>2.REFERENCIAS</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="left"> <b>EMPLEOS ANTERIORES</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>PRIMERA REFERENCIA</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>NOMBRE DE LA EMPRESA</b><BR> ' . $companyname . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR> ' . $companyadress . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TELEFONO</b><BR> ' . $companyphone . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PUESTO</b><BR> ' . $companyjob . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TIEMPO QUE LABORO</b><BR>' . $timework . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MOTIVO DE SALIDA</b><BR>' . $reasonexit . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO MENSUAL</b><BR>' . $ingresomensual . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>SEGUNDA REFERENCIA</b></td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>NOMBRE</b><BR>' . $companyname2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $companyadress2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TELEFONO</b><BR> ' . $companyphone2 . '</td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PUESTO</b><BR>' . $companyjob2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TIEMPO QUE LABORO</b><BR>' . $timework2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MOTIVO DE SALIDA</b><BR>' . $reasonexit2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO MENSUAL</b><BR>' . $ingresomensual2 . '</td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT" > <b>TERCERA REFERENCIA </b></td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>NOMBRE</b><BR>' . $companyname3 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $companyadress3 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TELEFONO</b><BR>' . $companyphone3 . '</td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PUESTO</b><BR>' . $companyjob3 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TIEMPO QUE LABORO</b><BR>' . $timework3 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MOTIVO DE SALIDA</b><BR>' . $reasonexit3 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO MENSUAL</b><BR>' . $ingresomensual3 . '</td>';
            $content .= '</tr>';


            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>REFERENCIAS FAMILIARES</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>PRIMER REFERENCIA</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $familyname . '</td>';
            $content .= '<td colspan="3"align="center"> <b>PARENTESCO</b><BR>' . $relationship . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $yearshim . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $familyphone . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>SEGUNDA REFERENCIA </b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $familyname2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>PARENTESCO</b><BR>' . $relationship2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $yearshim2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $familyphone2 . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';




            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>REFERENCIAS PERSONALES</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>PRIMER REFERENCIA</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $personalname . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $personaladress . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $personalphone . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $personalyears . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>SEGUNDA REFERENCIA PERSONAL</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $personalname2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $personaladress2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $personalphone2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $personalyears2 . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';

            $content .= '<br pagebreak="true"/>';

            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>3.ESTUDIO SOCIOECONOMICO</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>INGRESOS Y EGRESOS</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO ANTERIOR</b><BR>' . $previous . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO REQUERIDO</b><BR>' . $required . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO OFERTADO</b><BR>' . $offered . '</td>';
            $content .= '<td colspan="2"align="center"> <b>INGRESOS EXTRA</b><BR> ' . $incomeextra . '</td>';
            $content .= '<td colspan="2"align="center"> <b>DESCRIPCION </b><BR>' . $incomedesc . '</td>';

            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>EL TIPO DE HOGAR ES: </b>' . $homex2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>EL HOGAR DONDE HABITA ES: </b>' . $homex1 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>TIEMPO DE RESIDIR EN SU DOMICILIO: </b> ' . $yearsliving . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>CONCEPTO DE GASTOS Y/O APORTACION A LA FAMILIA</b></td>';
            $content .= '<td colspan="5"align="center"> <b>CANDIDATO Y FAMILIA</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>DEUDAS</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $debts . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>CELULAR</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $debtscell . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>DESPENSA</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $pantry . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>TRANSPORTE</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $transport . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>MANTENIMIENTO AL HOGAR</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $maintenance . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>PAGO DE ESCUELA</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $paymentschool . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>SERVICIOS MEDICOS</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $medicalservices . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>ROPA Y CALZADO</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $clothes . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>OTROS GASTOS</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $otherexpenses . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>TOTAL</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $overall . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="center"> <b>CARACTERISTICAS Y SERVICIOS</b><BR>' . $articulo . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="center"> <b>4.INFORME MEDICO</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center" > <b>USA ANTEOJOS</b><BR>' . $glasses . '</td>';
            $content .= '<td colspan="5"align="center" > <b>DIAGNOSTICO</b><BR>' . $glasses2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="CENTER"> <b>ENFERMEDAD CRONICA</b><BR>' . $chronic . '</td>';
            $content .= '<td colspan="5"align="CENTER"> <b>CUAL</b><BR>' . $chronic2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>OPERACIONES PRACTICADAS</b><BR>' . $operation . '</td>';
            $content .= '<td colspan="5"align="center"> <b>CUAL</b><BR>' . $operation2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>CONSUME ENERVANTES</b><BR>' . $enervants . '</td>';
            $content .= '<td colspan="5"align="center"> <b>CUAL</b><BR>' . $enervants2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿EN LOS ULTIMOS 5 AÑOS SE HA INCAPACITADO?</b><BR>' . $incapacitado . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿ POR QUE?</b><BR>' . $incapacitado2 . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<br pagebreak="true"/>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>5.INFORMACION ADICIONAL</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>ACTIVIDAD EN TIEMPO LIBRE</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $activities . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>PERSONAS QUE CONVIVE</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $people . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>VALORES</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $valueperson . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>DEFECTOS</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $defect . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿PRACTICA ALGUN DEPORTE?</b><BR>' . $sport . '</td>';
            $content .= '<td colspan="5"align="center" > <b>¿CUAL?</b><BR>' . $sport2 . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿PERTENECE O HA PERTENECIDO A ALGUN PARTIDO POLITICO?</b><BR>' . $politic . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿CUAL?</b><BR>' . $politic2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>PERTENECE O HA PERTENECIDO A ALGUN SINDICATO?</b><BR>' . $syndicate . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿CUAL?</b><BR>' . $syndicate2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿TUVO ALGUN TRABAJO DONDE HAYA TENIDO QUE ACUDIR A CONCILIACION Y ARBITRAJE?</b><BR>' . $conciliation . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿CUAL?</b><BR>' . $conciliation2 . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';

            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>CARACTERISTICAS FISICAS</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>CARA</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $face . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COLOR DE PIEL</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $skincolor . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COLOR DE OJOS</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $eyecolor . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>TIPO DE OJOS</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $kindeyes . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COLOR DE CABELLO</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $haircolor . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COMPLEXION</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $complexion . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>TATUAJE</b><BR>' . $tattoo . '</td>';
            $content .= '<td colspan="4"align="center"> <b>DONDE</b><BR>' . $tattoo2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TAMAÑO</b><BR>' . $tattoo3 . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PERFORACIONES</b><BR>' . $piercing . '</td>';
            $content .= '<td colspan="4"align="center"> <b>DONDE</b><BR>' . $piercing2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>CUANTAS</b><BR>' . $piercing3 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>OBSERVACIONES</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT">' . $observations . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>PESO: </b>' . $weight . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>ESTATURA: </b>' . $stature . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>TIPO DE SANGRE: </b>' . $typeblood . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>BANCO: </b>' . $banco . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>NO. DE CUENTA: </b>' . $nocuenta . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>CLABE INTERBANCARIA: </b>' . $clabeint . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>SUELDO NETO: </b>' . $sueldonet . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';
        }
        $cnt++;
    }

    
    $content .= '<br pagebreak="true"/>';
    $content .= '<section>';
    $content .= '<div align="center">';
    $content .= '<table>';
    $content .= '<tr>';
    $content .= '<td>';
    $content .= '</td>';
    $content .= '</tr>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='PERFIL DERECHO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];
            $content .= '<td align="center"><img src="' . $namedoc . '" align="center" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';

    
    $content .= '<section>';
    $content .= '<div align="CENTER">';
    $content .= '<table>';
    $content .= '<tr>';
    $content .= '<td>';
    $content .= '</td>';
    $content .= '</tr>';
    $content .= '<tr>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='PERFIL IZQUIERDO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];

            $content .= '<td align="center"><img src="' . $namedoc . '" align="CENTER" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';

    $content .= '<br pagebreak="true"/>';
    
    $content .= '<section>';
    $content .= '<div align="CENTER">';
    $content .= '<table>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='CUERPO COMPLETO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];

            $content .= '<td align="center"><img src="' . $namedoc . '" align="CENTER" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';

    $content .= '<br pagebreak="true"/>';
    
    $content .= '<section>';
    $content .= '<div align="CENTER">';
    $content .= '<table>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='TOXICOLOGICO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];

            $content .= '<td align="center"><img src="' . $namedoc . '" align="CENTER" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';


    
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


    $pdf->output('FICHA TECNICA.pdf', 'I');
    //============================================================+
    // END OF FILE
    //============================================================+    
}

if ($ids == 'APROSEMEX S.A. DE C.V.') {
    // Extend the TCPDF class to create custom Header and Footer
    class MYPDF extends TCPDF
    {

        //Page header
        public function Header()
        {
            //background
            $img_file2 = K_PATH_IMAGES . 'LOGO APROSEMEX2.PNG';
            $this->Image($img_file2, 60, 80, 100, 148.5, '', '', '', false, 200, '', false, false, 0);

            // Logo
            $image_file = K_PATH_IMAGES . 'LOGO APROSEMEX .PNG';
            $this->Image($image_file, 10, 2, 20, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
            // Set font
            $this->SetFont('helvetica', 'b', 18);
            // Title
            $this->Cell(0, 20, 'FICHA TECNICA', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
    // create new PDF document
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $eid = intval($_GET['empid']);
    $sql = "SELECT * FROM tblemployees where id='$eid' ";
    $query = $dbh->prepare($sql);
    $dbh->exec('SET CHARACTER SET utf8');
    $query->execute();
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($query as $result) {
            $image = $result['id'];
            $department = $result['Department'];
            $matricula = $result['EmpId'];
            $assignedservice = $result['assignedservice'];
            $fechini = $result['fechini'];

            $name = $result['name'];
            $firstname = $result['FirstName'];
            $lastname = $result['LastName'];
            $email = $result['EmailId'];
            $gender = $result['Gender'];

            $address = $result['Address'];
            $suburb = $result['suburb'];
            $city = $result['City'];
            $country = $result['Country'];
            $cp = $result['cp'];


            $placebirth = $result['placebirth'];
            $dob = $result['Dob'];
            $age = $result['age'];
            $marital = $result['marital'];
            $nationality = $result['nationality'];

            $phonenumber = $result['Phonenumber'];
            $phonelocal = $result['phonelocal'];
            $phonerecado = $result['phonerecado'];
            $ife = $result['ife'];
            $curp = $result['curp'];

            $rfc = $result['rfc'];
            $imss = $result['imss'];
            $typelicence = $result['typelicence'];
            $military = $result['military'];
            $dependent = $result['dependent'];

            $dependentname = $result['dependentname'];
            $dependentrelation = $result['dependentrelation'];
            $dependentage = $result['dependentage'];

            $dependentname2 = $result['dependentname2'];
            $dependentrelation2 = $result['dependentrelation2'];
            $dependentage2 = $result['dependentage2'];

            $dependentname3 = $result['dependentname3'];
            $dependentrelation3 = $result['dependentrelation3'];
            $dependentage3 = $result['dependentage3'];

            $dependentname4 = $result['dependentname4'];
            $dependentrelation4 = $result['dependentrelation4'];
            $dependentage4 = $result['dependentage4'];

            $dependentname5 = $result['dependentname5'];
            $dependentrelation5 = $result['dependentrelation5'];
            $dependentage5 = $result['dependentage5'];

            $primaryname = $result['primaryname'];
            $primaryadress = $result['primaryadress'];
            $primarydocument = $result['primarydocument'];

            $highschoolname = $result['highschoolname'];
            $highschooladress = $result['highschooladress'];
            $highschooldocument = $result['highschooldocument'];

            $schoolname = $result['schoolname'];
            $schooladress = $result['schooladress'];
            $schooldocument = $result['schooldocument'];

            $universityname = $result['universityname'];
            $universityadress = $result['universityadress'];
            $universitydocument = $result['universitydocument'];

            $companyname = $result['companyname'];
            $companyadress = $result['companyadress'];
            $companyphone = $result['companyphone'];

            $companyjob = $result['companyjob'];
            $timework = $result['timework'];
            $reasonexit = $result['reasonexit'];

            $companyname2 = $result['companyname2'];
            $companyadress2 = $result['companyadress2'];
            $companyphone2 = $result['companyphone2'];

            $companyjob2 = $result['companyjob2'];
            $timework2 = $result['timework2'];
            $reasonexit2 = $result['reasonexit2'];

            $companyname3 = $result['companyname3'];
            $companyadress3 = $result['companyadress3'];
            $companyphone3 = $result['companyphone3'];

            $companyjob3 = $result['companyjob3'];
            $timework3 = $result['timework3'];
            $reasonexit3 = $result['reasonexit3'];

            $familyname = $result['familyname'];
            $relationship = $result['relationship'];
            $yearshim = $result['yearshim'];
            $familyphone = $result['familyphone'];

            $familyname2 = $result['familyname2'];
            $relationship2 = $result['relationship2'];
            $yearshim2 = $result['yearshim2'];
            $familyphone2 = $result['familyphone2'];

            $personalname = $result['personalname'];
            $personalyears = $result['personalyears'];
            $personalphone = $result['personalphone'];
            $personaladress = $result['personaladress'];

            $personalname2 = $result['personalname2'];
            $personalyears2 = $result['personalyears2'];
            $personalphone2 = $result['personalphone2'];
            $personaladress2 = $result['personaladress2'];

            $previous = $result['previous'];
            $required = $result['required'];
            $offered = $result['offered'];
            $homex1 = $result['homex1'];
            $homex2 = $result['homex2'];

            $incomeextra = $result['incomeextra'];
            $incomedesc = $result['incomedesc'];
            $yearsliving = $result['yearsliving'];

            $debts = $result['debts'];
            $debtscell = $result['debtscell'];
            $pantry = $result['pantry'];
            $transport = $result['transport'];
            $maintenance = $result['maintenance'];

            $paymentschool = $result['paymentschool'];
            $medicalservices = $result['medicalservices'];
            $clothes = $result['clothes'];
            $otherexpenses = $result['otherexpenses'];
            $overall = $result['overall'];

            $articulo = $result['articulo'];
            $glasses = $result['glasses'];
            $glasses2 = $result['glasses2'];
            $chronic = $result['chronic'];
            $chronic2 = $result['chronic2'];

            $operation = $result['operation'];
            $operation2 = $result['operation2'];
            $enervants = $result['enervants'];
            $enervants2 = $result['enervants2'];

            $activities = $result['activities'];
            $people = $result['people'];
            $valueperson = $result['valueperson'];
            $defect = $result['defect'];

            $sport = $result['sport'];
            $sport2 = $result['sport2'];
            $politic = $result['politic'];
            $politic2 = $result['politic2'];

            $syndicate = $result['syndicate'];
            $syndicate2 = $result['syndicate2'];
            $conciliation = $result['conciliation'];
            $conciliation2 = $result['conciliation2'];

            $face = $result['face'];
            $skincolor = $result['skincolor'];
            $eyecolor = $result['eyecolor'];
            $kindeyes = $result['kindeyes'];

            $haircolor = $result['haircolor'];
            $complexion = $result['complexion'];
            $tattoo = $result['tattoo'];
            $tattoo2 = $result['tattoo2'];
            $tattoo3 = $result['tattoo3'];

            $piercing = $result['piercing'];
            $piercing2 = $result['piercing2'];
            $piercing3 = $result['piercing3'];
            $observations = $result['observations'];

            $weight = $result['weight'];
            $stature = $result['stature'];
            $typeblood = $result['typeblood'];
            $company = $result['company'];
            $banco = $result['banco'];
            $nocuenta = $result['nocuenta'];
            $clabeint = $result['clabeint'];
            $sueldonet = $result['sueldonet'];
            $ingresomensual=$result['ingresomensual'];
            $ingresomensual2=$result['ingresomensual2'];
            $ingresomensual3=$result['ingresomensual3'];
            $incapacitado=$result['incapacitado'];
            $incapacitado2=$result['incapacitado2'];
            $content = '';

            $content .= '<body>';

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('JJSH');
            $pdf->SetTitle('FICHA TECNICA');
            $pdf->SetSubject('FICHA TECNICA');
            $pdf->SetKeywords('TCPDF, PDF, FICHA TECNICA');

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

            // set some text to print

            $content .= '<section >';

            $content .= '<div align="left">';



            $content .= '<table CELLPADDING="15">';


            $content .= '<tr>';
            $content .= '<td colspan="2" align="LEFT"> <b>PUESTO:</b> ' . $department . '</td>';
            $content .= '<td colspan="2" align="LEFT"> <b>SERVICIO ASIGNADO:</b>' . $assignedservice . '</td>';



            $sql22 = "SELECT * from  tbldocument where idemp='$eid' and name='MEDIO CUERPO'";
            $query22 = $dbh->prepare($sql22);
            $dbh->exec('SET CHARACTER SET utf8');
            $query22->execute();



            if ($query22->rowCount() > 0) {
                foreach ($query22 as $result22) {
                    $namedoc = $result22['namedoc'];

                    $content .= '<td rowspan="2" align="RIGHT"><img src="' . $namedoc . '" align="left" width="100" height="120"></td>';

                    $content .= '</tr>';
                }
            }
            $content .= '<tr>';
            $content .= '<td colspan="2" align="LEFT"> <b>MATRICULA:</b> ' . $matricula . '</td>';
            $content .= '<td colspan="2" align="LEFT"> <b>FECHA:</b>' . $fechini . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';

            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" >';
            $content .= '<tr>';
            $content .= '<td colspan="10" align="RIGHT"><b><FONT SIZE=5>1. DATOS GENERALES</FONT></b></td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>NOMBRE COMPLETO:</b>' . $name . ' ' . $firstname . ' ' . $lastname . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>FECHA DE NACIMIENTO</b><br>' . $dob . '</td>';
            $content .= '<td colspan="4"align="center"> <b>LUGAR DE NACIMIENTO</b><br>' . $placebirth . '</td>';
            $content .= '<td colspan="3"align="center"> <b>NACIONALIDAD</b><br>' . $nationality . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3" align="center"> <b>EDAD</b><br>' . $age . '</td>';
            $content .= '<td colspan="4" align="center"> <b>GENERO</b><br>' . $gender . '</td>';
            $content .= '<td colspan="3" align="center"> <b>ESTADO CIVIL</b><br>' . $marital . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>IFE O INE</b><br>' . $ife . '</td>';
            $content .= '<td colspan="4"align="center"> <b>CURP</b><br>' . $curp . '</td>';
            $content .= '<td colspan="3"align="center"> <b>RFC</b><br>' . $rfc . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>IMSS</b><br>' . $imss . '</td>';
            $content .= '<td colspan="4"align="center"> <b>TIPO DE LICENCIA</b><br>' . $typelicence . '</td>';
            $content .= '<td colspan="3"align="center"> <b>CARTILLA MILITAR</b><br>' . $military . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NUMERO LOCAL</b><br>' . $phonelocal. '</td>';
            $content .= '<td colspan="4"align="center"> <b>NUMERO CELULAR</b><br>' .$phonenumber. '</td>';
            $content .= '<td colspan="3"align="center"> <b>NUMERO DE RECADOS</b><br>' . $phonerecado . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>DEPENDIENTES</b><br>' . $dependent . '</td>';
            $content .= '<td colspan="7"align="center"> <b>HIJOS Y EDADES</b>
	<br>' . $dependentname . ' ' . $dependentage . '
	<br>' . $dependentname2 . ' ' . $dependentage2 . '
	<br>' . $dependentname3 . ' ' . $dependentage3 . '
	<br>' . $dependentname4 . ' ' . $dependentage4 . '
	<br>' . $dependentname5 . ' ' . $dependentage5 . '
	
	</td>';

            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING="5">';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"><b>DIRECCION</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>DIRECCION</b><BR>' . $address . '</td>';
            $content .= '<td colspan="3"align="center"> <b>COLONIA</b><BR> ' . $suburb . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MUNICIPIO</b><BR> ' . $city . '</td>';

            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>ESTADO</b><BR>' . $country . '</td>';
            $content .= '<td colspan="5"align="center"> <b>CODIGO POSTAL</b><BR>' . $cp . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';




            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5">';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>ESCOLARIDAD</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="center"> <b>NIVEL ACADEMICO</b></td>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE DE LA ESCUELA</b></td>';
            $content .= '<td colspan="3"align="center"> <b>DELEGACION O MUNICIPIO</b></td>';
            $content .= '<td colspan="2"align="center"> <b>DOCUMENTO</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>PRIMARIA</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $primaryname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $primaryadress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $primarydocument . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>SECUNDARIA</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $highschoolname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $highschooladress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $highschooldocument . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>PREPARATORIA</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $schoolname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $schooladress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $schooldocument . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="LEFT"> <b>UNIVERSIDAD</b></td>';
            $content .= '<td colspan="3"align="center"> ' . $universityname . '</td>';
            $content .= '<td colspan="3"align="center"> ' . $universityadress . '</td>';
            $content .= '<td colspan="2"align="center"> ' . $universitydocument . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<BR><br pagebreak="true"/>';
            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';


            $content .= '<tr>';
            $content .= '<td colspan="10"align="right"> <b>2.REFERENCIAS</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="left"> <b>EMPLEOS ANTERIORES</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>PRIMERA REFERENCIA</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>NOMBRE DE LA EMPRESA</b><BR> ' . $companyname . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR> ' . $companyadress . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TELEFONO</b><BR> ' . $companyphone . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PUESTO</b><BR> ' . $companyjob . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TIEMPO QUE LABORO</b><BR>' . $timework . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MOTIVO DE SALIDA</b><BR>' . $reasonexit . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO MENSUAL</b><BR>' . $ingresomensual . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>SEGUNDA REFERENCIA</b></td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>NOMBRE</b><BR>' . $companyname2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $companyadress2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TELEFONO</b><BR> ' . $companyphone2 . '</td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PUESTO</b><BR>' . $companyjob2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TIEMPO QUE LABORO</b><BR>' . $timework2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MOTIVO DE SALIDA</b><BR>' . $reasonexit2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO MENSUAL</b><BR>' . $ingresomensual2 . '</td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT" > <b>TERCERA REFERENCIA </b></td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="4"align="center"> <b>NOMBRE</b><BR>' . $companyname3 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $companyadress3 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TELEFONO</b><BR>' . $companyphone3 . '</td>';
            $content .= '</tr>';


            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PUESTO</b><BR>' . $companyjob3 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TIEMPO QUE LABORO</b><BR>' . $timework3 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>MOTIVO DE SALIDA</b><BR>' . $reasonexit3 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO MENSUAL</b><BR>' . $ingresomensual3 . '</td>';
            $content .= '</tr>';


            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>REFERENCIAS FAMILIARES</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>PRIMER REFERENCIA</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $familyname . '</td>';
            $content .= '<td colspan="3"align="center"> <b>PARENTESCO</b><BR>' . $relationship . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $yearshim . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $familyphone . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>SEGUNDA REFERENCIA </b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $familyname2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>PARENTESCO</b><BR>' . $relationship2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $yearshim2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $familyphone2 . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';




            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>REFERENCIAS PERSONALES</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>PRIMER REFERENCIA</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $personalname . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $personaladress . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $personalphone . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $personalyears . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>SEGUNDA REFERENCIA PERSONAL</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>NOMBRE</b><BR>' . $personalname2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>DIRECCION</b><BR>' . $personaladress2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>TELEFONO</b><BR>' . $personalphone2 . '</td>';
            $content .= '<td colspan="2"align="center"> <b>AÑOS DE CONOCERLO</b><BR>' . $personalyears2 . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';

            $content .= '<br pagebreak="true"/>';

            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>3.ESTUDIO SOCIOECONOMICO</b></td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>INGRESOS Y EGRESOS</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO ANTERIOR</b><BR>' . $previous . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO REQUERIDO</b><BR>' . $required . '</td>';
            $content .= '<td colspan="2"align="center"> <b>SUELDO OFERTADO</b><BR>' . $offered . '</td>';
            $content .= '<td colspan="2"align="center"> <b>INGRESOS EXTRA</b><BR> ' . $incomeextra . '</td>';
            $content .= '<td colspan="2"align="center"> <b>DESCRIPCION </b><BR>' . $incomedesc . '</td>';

            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>EL TIPO DE HOGAR ES: </b>' . $homex2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>EL HOGAR DONDE HABITA ES: </b>' . $homex1 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>TIEMPO DE RESIDIR EN SU DOMICILIO: </b> ' . $yearsliving . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>CONCEPTO DE GASTOS Y/O APORTACION A LA FAMILIA</b></td>';
            $content .= '<td colspan="5"align="center"> <b>CANDIDATO Y FAMILIA</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>DEUDAS</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $debts . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>CELULAR</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $debtscell . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>DESPENSA</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $pantry . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>TRANSPORTE</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $transport . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>MANTENIMIENTO AL HOGAR</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $maintenance . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>PAGO DE ESCUELA</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $paymentschool . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>SERVICIOS MEDICOS</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $medicalservices . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>ROPA Y CALZADO</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $clothes . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>OTROS GASTOS</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $otherexpenses . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>TOTAL</b></td>';
            $content .= '<td colspan="5"align="LEFT">$' . $overall . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="center"> <b>CARACTERISTICAS Y SERVICIOS</b><BR>' . $articulo . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="center"> <b>4.INFORME MEDICO</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center" > <b>USA ANTEOJOS</b><BR>' . $glasses . '</td>';
            $content .= '<td colspan="5"align="center" > <b>DIAGNOSTICO</b><BR>' . $glasses2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="CENTER"> <b>ENFERMEDAD CRONICA</b><BR>' . $chronic . '</td>';
            $content .= '<td colspan="5"align="CENTER"> <b>CUAL</b><BR>' . $chronic2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>OPERACIONES PRACTICADAS</b><BR>' . $operation . '</td>';
            $content .= '<td colspan="5"align="center"> <b>CUAL</b><BR>' . $operation2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>CONSUME ENERVANTES</b><BR>' . $enervants . '</td>';
            $content .= '<td colspan="5"align="center"> <b>CUAL</b><BR>' . $enervants2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿EN LOS ULTIMOS 5 AÑOS SE HA INCAPACITADO?</b><BR>' . $incapacitado . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿ POR QUE?</b><BR>' . $incapacitado2 . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';


            $content .= '<br pagebreak="true"/>';


            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>5.INFORMACION ADICIONAL</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>ACTIVIDAD EN TIEMPO LIBRE</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $activities . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>PERSONAS QUE CONVIVE</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $people . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>VALORES</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $valueperson . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>DEFECTOS</b></td>';
            $content .= '<td colspan="5"align="center"> ' . $defect . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿PRACTICA ALGUN DEPORTE?</b><BR>' . $sport . '</td>';
            $content .= '<td colspan="5"align="center" > <b>¿CUAL?</b><BR>' . $sport2 . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿PERTENECE O HA PERTENECIDO A ALGUN PARTIDO POLITICO?</b><BR>' . $politic . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿CUAL?</b><BR>' . $politic2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>PERTENECE O HA PERTENECIDO A ALGUN SINDICATO?</b><BR>' . $syndicate . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿CUAL?</b><BR>' . $syndicate2 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="center"> <b>¿TUVO ALGUN TRABAJO DONDE HAYA TENIDO QUE ACUDIR A CONCILIACION Y ARBITRAJE?</b><BR>' . $conciliation . '</td>';
            $content .= '<td colspan="5"align="center"> <b>¿CUAL?</b><BR>' . $conciliation2 . '</td>';
            $content .= '</tr>';
            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';

            $content .= '<section >';
            $content .= '<div align="left">';
            $content .= '<table  border="1" CELLPADDING=".5"  >';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="RIGHT"> <b>CARACTERISTICAS FISICAS</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>CARA</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $face . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COLOR DE PIEL</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $skincolor . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COLOR DE OJOS</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $eyecolor . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>TIPO DE OJOS</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $kindeyes . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COLOR DE CABELLO</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $haircolor . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="5"align="LEFT"> <b>COMPLEXION</b></td>';
            $content .= '<td colspan="5"align="LEFT"> ' . $complexion . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>TATUAJE</b><BR>' . $tattoo . '</td>';
            $content .= '<td colspan="4"align="center"> <b>DONDE</b><BR>' . $tattoo2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>TAMAÑO</b><BR>' . $tattoo3 . '</td>';
            $content .= '</tr>';



            $content .= '<tr>';
            $content .= '<td colspan="3"align="center"> <b>PERFORACIONES</b><BR>' . $piercing . '</td>';
            $content .= '<td colspan="4"align="center"> <b>DONDE</b><BR>' . $piercing2 . '</td>';
            $content .= '<td colspan="3"align="center"> <b>CUANTAS</b><BR>' . $piercing3 . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>OBSERVACIONES</b></td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT">' . $observations . '</td>';
            $content .= '</tr>';

            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>PESO: </b>' . $weight . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>ESTATURA: </b>' . $stature . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>TIPO DE SANGRE: </b>' . $typeblood . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>BANCO: </b>' . $banco . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>NO. DE CUENTA: </b>' . $nocuenta . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>CLABE INTERBANCARIA: </b>' . $clabeint . '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
            $content .= '<td colspan="10"align="LEFT"> <b>SUELDO NETO: </b>' . $sueldonet . '</td>';
            $content .= '</tr>';

            $content .= '</table>';
            $content .= '</div>';
            $content .= '</section>';
        }
        $cnt++;
    }  

   
    $content .= '<br pagebreak="true"/>';
    $content .= '<section>';
    $content .= '<div align="center">';
    $content .= '<table>';
    $content .= '<tr>';
    $content .= '<td>';
    $content .= '</td>';
    $content .= '</tr>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='PERFIL DERECHO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];
            $content .= '<td align="center"><img src="' . $namedoc . '" align="center" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';

    
    $content .= '<section>';
    $content .= '<div align="CENTER">';
    $content .= '<table>';
    $content .= '<tr>';
    $content .= '<td>';
    $content .= '</td>';
    $content .= '</tr>';
    $content .= '<tr>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='PERFIL IZQUIERDO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];

            $content .= '<td align="center"><img src="' . $namedoc . '" align="CENTER" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';

    $content .= '<br pagebreak="true"/>';
    
    $content .= '<section>';
    $content .= '<div align="CENTER">';
    $content .= '<table>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='CUERPO COMPLETO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];

            $content .= '<td align="center"><img src="' . $namedoc . '" align="CENTER" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';

    $content .= '<br pagebreak="true"/>';
    
    $content .= '<section>';
    $content .= '<div align="CENTER">';
    $content .= '<table>';
    $content .= '<tr>';

    $sql33 = "SELECT * from  tbldocument where idemp='$eid' and name='TOXICOLOGICO'";
    $query33 = $dbh->prepare($sql33);
    $dbh->exec('SET CHARACTER SET utf8');
    $query33->execute();
    if ($query33->rowCount() > 0) {
        foreach ($query33 as $result33) {
            $namedoc = $result33['namedoc'];

            $content .= '<td align="center"><img src="' . $namedoc . '" align="CENTER" width="300" height="450"></td>';

            $content .= '</tr>';
        }
    }

    $content .= '</table>';
    $content .= '</div>';
    $content .= '</section>';

    
    

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


    $pdf->output('FICHA TECNICA.pdf', 'I');
    //============================================================+
    // END OF FILE
    //============================================================+
}


if ($ids == '') {
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
            $this->Image($image_file, 10, 5, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            // Set font
            $this->SetFont('helvetica', 'b', 18);
            // Title
            $this->Cell(0, 10, 'EJEMPLO', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
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
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // configurar algo de texto para imprimir
    $txt = <<<EOD
NO SE PUEDE GENERAR LA FICHA TECNICA
EOD;

    // Agregar la primera página del PDF
    $pdf->AddPage();

    // imprimir un bloque de texto usando Write ()
    $pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);

    // Cierre y envíe el documento PDF al navegador
    $pdf->Output('FICHA TECNICA.pdf', 'I');
}
