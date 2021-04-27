<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
    require_once('../lib/tcpdf/config/lang/spa.php');
	require_once('../lib/tcpdf/tcpdf.php');
	require_once('conexion2.php');	
include('includes/config.php');
    $eid=intval($_GET['empid']);
	$sql = "SELECT * FROM tblemployees where id='$eid' ";	
	$query = $dbh -> prepare($sql);
$dbh ->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt=1;
if($query->rowCount() > 0)
{

	


        

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('sistemas sim');
$pdf->SetTitle('FICHA TECNICA');
$pdf->SetSubject('FICHA TECNICA');
$pdf->SetKeywords('Reporte, usuario, ficha tecnica, mysql');
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
    $PDF_HEADER_LOGO="../lib/reportes/logopdf.png"; 

    
	$pdf->SetMargins(3, 5, 3, false); 
	$pdf->SetAutoPageBreak(true, 10); 
	$pdf->SetFont('helvetica', '',8.5);
// set fill color



	$content = '';
	
	//$content .= '<body background="../lib/reportes/logopdf.png">
      //      	<h2 style="text-align:center;">FICHA TECNICA</h2>	';
	
	
	foreach($query as $result)
{ 
$image=$result['imagehalfbody'];
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

$rfc=$result['rfc'];
$imss=$result['imss'];
$typelicence=$result['typelicence'];
$military=$result['military'];
$dependent=$result['dependent'];

$dependentname=$result['dependentname'];
$dependentrelation=$result['dependentrelation'];
$dependentage=$result['dependentage'];

$dependentname2=$result['dependentname2'];
$dependentrelation2=$result['dependentrelation2'];
$dependentage2=$result['dependentage2'];

$dependentname3=$result['dependentname3'];
$dependentrelation3=$result['dependentrelation3'];
$dependentage3=$result['dependentage3'];

$dependentname4=$result['dependentname4'];
$dependentrelation4=$result['dependentrelation4'];
$dependentage4=$result['dependentage4'];

$dependentname5=$result['dependentname5'];
$dependentrelation5=$result['dependentrelation5'];
$dependentage5=$result['dependentage5'];

$primaryname=$result['primaryname'];
$primaryadress=$result['primaryadress'];
$primarydocument=$result['primarydocument'];

$highschoolname=$result['highschoolname'];
$highschooladress=$result['highschooladress'];
$highschooldocument=$result['highschooldocument'];

$schoolname=$result['schoolname'];
$schooladress=$result['schooladress'];
$schooldocument=$result['schooldocument'];

$universityname=$result['universityname'];
$universityadress=$result['universityadress'];
$universitydocument=$result['universitydocument'];

$companyname=$result['companyname'];
$companyadress=$result['companyadress'];
$companyphone=$result['companyphone'];

$companyjob=$result['companyjob'];
$timework=$result['timework'];
$reasonexit=$result['reasonexit'];

$companyname2=$result['companyname2'];
$companyadress2=$result['companyadress2'];
$companyphone2=$result['companyphone2'];

$companyjob2=$result['companyjob2'];
$timework2=$result['timework2'];
$reasonexit2=$result['reasonexit2'];

$companyname3=$result['companyname3'];
$companyadress3=$result['companyadress3'];
$companyphone3=$result['companyphone3'];

$companyjob3=$result['companyjob3'];
$timework3=$result['timework3'];
$reasonexit3=$result['reasonexit3'];

$familyname=$result['familyname'];
$relationship=$result['relationship'];
$yearshim=$result['yearshim'];
$familyphone=$result['familyphone'];

$familyname2=$result['familyname2'];
$relationship2=$result['relationship2'];
$yearshim2=$result['yearshim2'];
$familyphone2=$result['familyphone2'];

$personalname=$result['personalname'];
$personalyears=$result['personalyears'];
$personalphone=$result['personalphone'];
$personaladress=$result['personaladress'];

$personalname2=$result['personalname2'];
$personalyears2=$result['personalyears2'];
$personalphone2=$result['personalphone2'];
$personaladress2=$result['personaladress2'];

$previous=$result['previous'];
$required=$result['required'];
$offered=$result['offered'];
$homex1=$result['homex1'];
$homex2=$result['homex2'];

$incomeextra=$result['incomeextra'];
$incomedesc=$result['incomedesc'];
$yearsliving=$result['yearsliving'];

$debts=$result['debts'];
$debtscell=$result['debtscell'];
$pantry=$result['pantry'];
$transport=$result['transport'];
$maintenance=$result['maintenance'];

$paymentschool=$result['paymentschool'];
$medicalservices=$result['medicalservices'];
$clothes=$result['clothes'];
$otherexpenses=$result['otherexpenses'];
$overall=$result['overall'];

$articulo=$result['articulo'];
$glasses=$result['glasses'];
$glasses2=$result['glasses2'];
$chronic=$result['chronic'];
$chronic2=$result['chronic2'];

$operation=$result['operation'];
$operation2=$result['operation2'];
$enervants=$result['enervants'];
$enervants2=$result['enervants2'];

$activities=$result['activities'];
$people=$result['people'];
$valueperson=$result['valueperson'];
$defect=$result['defect'];

$sport=$result['sport'];
$sport2=$result['sport2'];
$politic=$result['politic'];
$politic2=$result['politic2'];

$syndicate=$result['syndicate'];
$syndicate2=$result['syndicate2'];
$conciliation=$result['conciliation'];
$conciliation2=$result['conciliation2'];

$face=$result['face'];
$skincolor=$result['skincolor'];
$eyecolor=$result['eyecolor'];
$kindeyes=$result['kindeyes'];

$haircolor=$result['haircolor'];
$complexion=$result['complexion'];
$tattoo=$result['tattoo'];
$tattoo2=$result['tattoo2'];
$tattoo3=$result['tattoo3'];

$piercing=$result['piercing'];
$piercing2=$result['piercing2'];
$piercing3=$result['piercing3'];
$observations=$result['observations'];

$weight=$result['weight'];
$stature=$result['stature'];
$typeblood=$result['typeblood'];

    $content .='<section >';
       
    $content .='<div align="left">';

        
       
    $content .='<table border="1" CELLPADDING="1" CELLSPACING="3" >';	
    
    $content .='<tr>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>FICHA TECNICA</b></td>';
    $content .='</tr>';        
        
    $content .='<tr>';
    $content .='<td ROWSPAN="4" COLSPAN="1"align="center"><img src="'.$image.'" align="left" width="100" height="120"></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>MATRICULA</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>SERVICIO ASIGNADO</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$matricula.'</td>';
    $content .='<td colspan="2" align="center">'.$assignedservice.'</td>';
    $content .='</tr>';
        
       
    
    $content .='<tr>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>PUESTO</b></td>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>FECHA</b></td>';
    $content .='</tr>';    
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$department.'</td>';
    $content .='<td colspan="2" align="center">'.$fechini.'</td>';
    $content .='</tr>';
    $content .='</table>';
    $content .='</div>';
    $content .='</section>';    
    
        
    $content .='<section >';
    $content .='<div align="left">';    
    $content .= '<table  border="1" CELLPADDING=".5" CELLSPACING="3">';
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b> DATOS GENERALES</b></td>';
    $content .='</tr>';
    
    $content .='<tr>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>APELLIDO PATERNO</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>APELLIDO MATERNO</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>CORREO</b></td>';
    $content .='<td colspan="2"align="center"bgcolor="lightgrey"> <b>GENERO</b></td>';
    $content .='</tr>';
    
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$name.'</td>';
    $content .='<td colspan="2"align="center"> '.$firstname.'</td>';
    $content .='<td colspan="2"align="center"> '.$lastname.'</td>';
    $content .='<td colspan="2"align="center"> '.$email.'</td>';
    $content .='<td colspan="2"align="center"> '.$gender.'</td>';    
    $content .='</tr>';   
        
    $content .='<tr>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>LUGAR DE NACIMIENTO</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>FECHA DE NACIMIENTO</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>EDAD</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>ESTADO CIVIL</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>NACIONALIDAD</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$placebirth.'</td>';
    $content .='<td colspan="2"align="center"> '.$dob.'</td>';
    $content .='<td colspan="2"align="center"> '.$age.'</td>';
    $content .='<td colspan="2"align="center"> '.$marital.'</td>';
    $content .='<td colspan="2"align="center"> '.$nationality.'</td>';    
    $content .='</tr>';
        
     $content .='<tr>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>NUMERO CELULAR</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>NUMERO LOCAL</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>NUMERO DE RECADOS</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>IFE O INE</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>CURP</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center" > '.$phonenumber.'</td>';
    $content .='<td colspan="2"align="center" > '.$phonelocal.'</td>';
    $content .='<td colspan="2"align="center" > '.$phonerecado.'</td>';
    $content .='<td colspan="2"align="center" > '.$ife.'</td>';
    $content .='<td colspan="2"align="center" > '.$curp.'</td>';    
    $content .='</tr>';
        
     $content .='<tr>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>RFC</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>IMSS</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TIPO DE LICENCIA</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>CARTILLA MILITAR</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>DEPENDIENTES</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$rfc.'</td>';
    $content .='<td colspan="2"align="center"> '.$imss.'</td>';
    $content .='<td colspan="2"align="center"> '.$typelicence.'</td>';
    $content .='<td colspan="2"align="center"> '.$military.'</td>';
    $content .='<td colspan="2"align="center"> '.$dependent.'</td>';    
    $content .='</tr>';  
    $content .='</table>';      
    $content .='</div>';
    $content .='</section>';    
        
    
        
        
    $content .='<section >';
    $content .='<div align="left">';
    $content .= '<table  border="1" CELLPADDING=".5" CELLSPACING="3">';   
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>DIRECCION</b></td>';
    $content .='</tr>';    
    $content .='<tr>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>DIRECCION</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>COLONIA</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>MUNICIPIO</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>ESTADO</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>CODIGO POSTAL</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$address.'</td>';
    $content .='<td colspan="2"align="center"> '.$suburb.'</td>';
    $content .='<td colspan="2"align="center"> '.$city.'</td>';
    $content .='<td colspan="2"align="center"> '.$country.'</td>';
    $content .='<td colspan="2"align="center"> '.$cp.'</td>';    
    $content .='</tr>';    
    $content .='</table>';    
    $content .='</div>';
    $content .='</section>';          
        
        
    $content .='<section >';
    $content .='<div align="left">';
    $content .= '<table  border="1" CELLPADDING=".5" CELLSPACING="3">';   
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>DEPENDIENTES</b></td>';
    $content .='</tr>';
        
        
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>PARENTESCO</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>EDAD</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$dependentname.'</td>';
    $content .='<td colspan="3"align="center"> '.$dependentrelation.'</td>';
    $content .='<td colspan="3"align="center"> '.$dependentage.'</td>'; 
    $content .='</tr>';
    
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>PARENTESCO</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>EDAD</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$dependentname2.'</td>';
    $content .='<td colspan="3"align="center"> '.$dependentrelation2.'</td>';
    $content .='<td colspan="3"align="center"> '.$dependentage2.'</td>'; 
    $content .='</tr>';
        
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>PARENTESCO</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>EDAD</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$dependentname3.'</td>';
    $content .='<td colspan="3"align="center"> '.$dependentrelation3.'</td>';
    $content .='<td colspan="3"align="center"> '.$dependentage3.'</td>'; 
    $content .='</tr>';
        
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>PARENTESCO</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>EDAD</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$dependentname4.'</td>';
    $content .='<td colspan="3"align="center"> '.$dependentrelation4.'</td>';
    $content .='<td colspan="3"align="center"> '.$dependentage4.'</td>'; 
    $content .='</tr>';
        
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>PARENTESCO</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>EDAD</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$dependentname5.'</td>';
    $content .='<td colspan="3"align="center"> '.$dependentrelation5.'</td>';
    $content .='<td colspan="3"align="center"> '.$dependentage5.'</td>'; 
    $content .='</tr>';
    $content .='</table>';    
    $content .='</div>';
    $content .='</section>';      
        
    $content .='<section >';
    $content .='<div align="left">';  
    $content .= '<table  border="1" CELLPADDING=".5" CELLSPACING="3">';       
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>ESTUDIOS</b></td>';
    $content .='</tr>';    
    
     $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>PRIMARIA</b></td>';
    $content .='</tr>';    
        
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>DIRECCION</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>DOCUMENTO</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$primaryname.'</td>';
    $content .='<td colspan="3"align="center"> '.$primaryadress.'</td>';
    $content .='<td colspan="3"align="center"> '.$primarydocument.'</td>'; 
    $content .='</tr>';    
        
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>SECUNDARIA</b></td>';
    $content .='</tr>';    
        
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>DIRECCION</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>DOCUMENTO</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$highschoolname.'</td>';
    $content .='<td colspan="3"align="center"> '.$highschooladress.'</td>';
    $content .='<td colspan="3"align="center"> '.$highschooldocument.'</td>'; 
    $content .='</tr>';        
        
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>PREPARATORIA</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>DIRECCION</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>DOCUMENTO</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$schoolname.'</td>';
    $content .='<td colspan="3"align="center"> '.$schooladress.'</td>';
    $content .='<td colspan="3"align="center"> '.$schooldocument.'</td>'; 
    $content .='</tr>';        
	
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>UNIVERSIDAD</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>DIRECCION</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>DOCUMENTO</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$universityname.'</td>';
    $content .='<td colspan="3"align="center"> '.$universityadress.'</td>';
    $content .='<td colspan="3"align="center"> '.$universitydocument.'</td>'; 
    $content .='</tr>'; 
    $content .='</table>';    
    $content .='</div>';
    $content .='</section>';     
        
    
    $content .='<section >';
    $content .='<div align="left">';     
    $content .= '<table  border="1" CELLPADDING=".5" CELLSPACING="3">';      
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>REFERENCIAS LABORALES</b></td>';
    $content .='</tr>';
    
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>PRIMERA REFERENCIA LABORAL</b></td>';
    $content .='</tr>';    
        
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>DIRECCION</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>TELEFONO</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$companyname.'</td>';
    $content .='<td colspan="3"align="center"> '.$companyadress.'</td>';
    $content .='<td colspan="3"align="center"> '.$companyphone.'</td>'; 
    $content .='</tr>';    
          
    
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>PUESTO</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>TIEMPO QUE LABORO</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>MOTIVO DE SALIDA</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$companyjob.'</td>';
    $content .='<td colspan="3"align="center"> '.$timework.'</td>';
    $content .='<td colspan="3"align="center"> '.$reasonexit.'</td>'; 
    $content .='</tr>';
    
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>SEGUNDA REFERENCIA LABORAL</b></td>';
    $content .='</tr>';      

        
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>DIRECCION</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>TELEFONO</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$companyname2.'</td>';
    $content .='<td colspan="3"align="center"> '.$companyadress2.'</td>';
    $content .='<td colspan="3"align="center"> '.$companyphone2.'</td>'; 
    $content .='</tr>';    
    
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>PUESTO</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>TIEMPO QUE LABORO</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>MOTIVO DE SALIDA</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$companyjob2.'</td>';
    $content .='<td colspan="3"align="center"> '.$timework2.'</td>';
    $content .='<td colspan="3"align="center"> '.$reasonexit2.'</td>'; 
    $content .='</tr>';    
    
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>TERCERA REFERENCIA LABORAL</b></td>';
    $content .='</tr>';        
        
        
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>DIRECCION</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>TELEFONO</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$companyname3.'</td>';
    $content .='<td colspan="3"align="center"> '.$companyadress3.'</td>';
    $content .='<td colspan="3"align="center"> '.$companyphone3.'</td>'; 
    $content .='</tr>';    
    
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>PUESTO</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>TIEMPO QUE LABORO</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>MOTIVO DE SALIDA</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$companyjob3.'</td>';
    $content .='<td colspan="3"align="center"> '.$timework3.'</td>';
    $content .='<td colspan="3"align="center"> '.$reasonexit3.'</td>'; 
    $content .='</tr>';
    $content .='</table>';    
    $content .='</div>';
    $content .='</section>';         
    
        
    $content .='<section >';
    $content .='<div align="left">';      
    $content .= '<table  border="1" CELLPADDING=".5" CELLSPACING="3">';      
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>REFERENCIAS FAMILIARES</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>PRIMERA REFERENCIA FAMILIAR</b></td>';
    $content .='</tr>';        
    
    $content .='<tr>';    
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>PARENTESCO</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TELEFONO</b></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>AÑOS DE CONOCERLO</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="3"align="center"> '.$familyname.'</td>';
    $content .='<td colspan="3"align="center"> '.$relationship.'</td>';
    $content .='<td colspan="2"align="center"> '.$familyphone.'</td>'; 
    $content .='<td colspan="2"align="center"> '.$yearshim.'</td>';     
    $content .='</tr>';
    
        
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>SEGUNDA REFERENCIA FAMILIAR</b></td>';
    $content .='</tr>';        
        
        
    $content .='<tr>';    
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>PARENTESCO</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TELEFONO</b></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>AÑOS DE CONOCERLO</b></td>';    
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="3"align="center"> '.$familyname2.'</td>';
    $content .='<td colspan="3"align="center"> '.$relationship2.'</td>';
    $content .='<td colspan="2"align="center"> '.$familyphone2.'</td>'; 
    $content .='<td colspan="2"align="center"> '.$yearshim2.'</td>'; 
    $content .='</tr>'; 
    $content .='</table>';    
    $content .='</div>';
    $content .='</section>';     
        
    $content .='<section >';
    $content .='<div align="left">';      
    $content .= '<table  border="1" CELLPADDING=".5" CELLSPACING="3">';    
    $content .='<tr>';     
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>REFERENCIAS PERSONALES</b></td>';
    $content .='</tr>';
    
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>PRIMERA REFERENCIA PERSONAL</b></td>';
    $content .='</tr>';    
        
    $content .='<tr>';    
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>DIRECCION</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TELEFONO</b></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>AÑOS DE CONOCERLO</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="3"align="center"> '.$personalname.'</td>';
    $content .='<td colspan="3"align="center"> '.$personaladress.'</td>';
    $content .='<td colspan="2"align="center"> '.$personalphone.'</td>'; 
    $content .='<td colspan="2"align="center"> '.$personalyears.'</td>';     
    $content .='</tr>';    
        
    $content .='<tr>';    
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>SEGUNDA REFERENCIA PERSONAL</b></td>';
    $content .='</tr>';        
        
    $content .='<tr>';    
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>NOMBRE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>DIRECCION</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TELEFONO</b></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>AÑOS DE CONOCERLO</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="3"align="center" > '.$personalname2.'</td>';
    $content .='<td colspan="3"align="center" > '.$personaladress2.'</td>';
    $content .='<td colspan="2"align="center" > '.$personalphone2.'</td>'; 
    $content .='<td colspan="2"align="center" > '.$personalyears2.'</td>';     
    $content .='</tr>';    
    $content .='</table>';    
    $content .='</div>';
    $content .='</section>';    
        
    $content .='<section >';
    $content .='<div align="left">';    
    $content .= '<table  border="1" CELLPADDING=".5" CELLSPACING="3">';     
    $content .='<tr>';     
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>ESTUDIO SOCIOECONOMICO</b></td>';
    $content .='</tr>';
    
    $content .='<tr>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>SUELDO ANTERIOR</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>SUELDO REQUERIDO</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>SUELDO OFERTADO</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>EL TIPO DE HOGAR ES</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>EL HOGAR ES</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$previous.'</td>';
    $content .='<td colspan="2"align="center"> '.$required.'</td>';
    $content .='<td colspan="2"align="center"> '.$offered.'</td>';
    $content .='<td colspan="2"align="center"> '.$homex2.'</td>';
    $content .='<td colspan="2"align="center"> '.$homex1.'</td>';    
    $content .='</tr>';
        
    $content .='<tr>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>INGRESOS EXTRA</b></td>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>DESCRIPCION </b></td>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>TIEMPO DE RESIDIR EN SU DOMICILIO</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$incomeextra.'</td>';
    $content .='<td colspan="4"align="center"> '.$incomedesc.'</td>';
    $content .='<td colspan="4"align="center"> '.$yearsliving.'</td>'; 
    $content .='</tr>';  
        
    $content .='<tr>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>DEUDAS</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>CELULAR</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>DESPENSA</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TRANSPORTE</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>MANTENIMIENTO AL HOGAR</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$debts.'</td>';
    $content .='<td colspan="2"align="center"> '.$debtscell.'</td>';
    $content .='<td colspan="2"align="center"> '.$pantry.'</td>';
    $content .='<td colspan="2"align="center"> '.$transport.'</td>';
    $content .='<td colspan="2"align="center"> '.$maintenance.'</td>';    
    $content .='</tr>';
    
    $content .='<tr>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>PAGO DE ESCUELA</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>SERVICIOS MEDICOS</b></td>';
    $content .='<td colspan="1"align="center" bgcolor="lightgrey"> <b>ROPA Y CALZADO</b></td>';
    $content .='<td colspan="1"align="center" bgcolor="lightgrey"> <b>OTROS GASTOS</b></td>';
    $content .='<td colspan="1"align="center" bgcolor="lightgrey"> <b>TOTAL</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>CARACTERISTICAS Y SERVICIOS</b></td>';    
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$paymentschool.'</td>';
    $content .='<td colspan="2"align="center"> '.$medicalservices.'</td>';
    $content .='<td colspan="1"align="center"> '.$clothes.'</td>';
    $content .='<td colspan="1"align="center"> '.$otherexpenses.'</td>';
    $content .='<td colspan="1"align="center"> '.$overall.'</td>';
    $content .='<td colspan="3"align="center"> '.$articulo.'</td>';
    $content .='</tr>';     
    $content .='</table>';    
    $content .='</div>';
    $content .='</section>';
     
        
     $content .='<section >';
    $content .='<div align="left">';    
    $content .= '<table  border="1" CELLPADDING=".5" CELLSPACING="3">';     
    $content .='<tr>';     
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>INFORME MEDICO</b></td>';
    $content .='</tr>';
    
    $content .='<tr>';    
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>USA ANTEOJOS</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>DIAGNOSTICO</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>ENFERMEDAD CRONICA</b></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>CUAL</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="3"align="center"> '.$glasses.'</td>';
    $content .='<td colspan="2"align="center"> '.$glasses2.'</td>';
    $content .='<td colspan="3"align="center"> '.$chronic.'</td>'; 
    $content .='<td colspan="2"align="center"> '.$chronic2.'</td>';     
    $content .='</tr>';
        
    $content .='<tr>';    
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>OPERACIONES PRACTICADAS</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>CUAL</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>CONSUME ENERVANTES</b></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>CUAL</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="3"align="center"> '.$operation.'</td>';
    $content .='<td colspan="2"align="center"> '.$operation2.'</td>';
    $content .='<td colspan="3"align="center"> '.$enervants.'</td>'; 
    $content .='<td colspan="2"align="center"> '.$enervants2.'</td>';     
    $content .='</tr>';
    $content .='</table>';    
    $content .='</div>';
    $content .='</section>';
        
        
        
    $content .='<section >';
    $content .='<div align="left">';     
    $content .= '<table  border="1" CELLPADDING=".5" CELLSPACING="3">';      
    $content .='<tr>';     
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>INFORMACION ADICIONAL</b></td>';
    $content .='</tr>';
        
     $content .='<tr>';    
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>ACTIVIDAD EN TIEMPO LIBRE</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>PERSONAS QUE CONVIVE</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>VALORES</b></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>DEFECTOS</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="3"align="center"> '.$activities.'</td>';
    $content .='<td colspan="2"align="center"> '.$people.'</td>';
    $content .='<td colspan="3"align="center"> '.$valueperson.'</td>'; 
    $content .='<td colspan="2"align="center"> '.$defect.'</td>';     
    $content .='</tr>';
        
    $content .='<tr>';    
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>PRACTICA ALGUN DEPORTE</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>CUAL</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>PERTENECE A ALGUN PARTIDO POLITICO</b></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>CUAL</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="3"align="center"> '.$sport.'</td>';
    $content .='<td colspan="2"align="center"> '.$sport2.'</td>';
    $content .='<td colspan="3"align="center"> '.$politic.'</td>'; 
    $content .='<td colspan="2"align="center"> '.$politic2.'</td>';     
    $content .='</tr>';
        
    $content .='<tr>';    
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>PERTENECE A UN SINDICATO</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>CUAL</b></td>';
    $content .='<td colspan="3"align="center" bgcolor="lightgrey"> <b>ASISTIO A CONCILIACION Y ARBITRAJE</b></td>';  
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>CUAL</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="3"align="center"> '.$syndicate.'</td>';
    $content .='<td colspan="2"align="center"> '.$syndicate2.'</td>';
    $content .='<td colspan="3"align="center"> '.$conciliation.'</td>'; 
    $content .='<td colspan="2"align="center"> '.$conciliation2.'</td>';     
    $content .='</tr>'; 
    $content .='</table>';    
    $content .='</div>';
    $content .='</section>';    
        
    $content .='<section >';
    $content .='<div align="left">';     
    $content .= '<table  border="1" CELLPADDING=".5" CELLSPACING="3">'; 
    $content .='<tr>';     
    $content .='<td colspan="10"align="center" bgcolor="lightgrey"> <b>CARACTERISTICAS FISICAS</b></td>';
    $content .='</tr>'; 
        
    $content .='<tr>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>CARA</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>COLOR DE PIEL</b></td>';
    $content .='<td colspan="1"align="center" bgcolor="lightgrey"> <b>COLOR DE OJOS</b></td>';
    $content .='<td colspan="1"align="center" bgcolor="lightgrey"> <b>TIPO DE OJOS</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>COLOR DE CABELLO</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>COMPLEXION</b></td>';    
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$face.'</td>';
    $content .='<td colspan="2"align="center"> '.$skincolor.'</td>';
    $content .='<td colspan="1"align="center"> '.$eyecolor.'</td>';
    $content .='<td colspan="1"align="center"> '.$kindeyes.'</td>';
    $content .='<td colspan="2"align="center"> '.$haircolor.'</td>';
    $content .='<td colspan="2"align="center"> '.$complexion.'</td>';
    $content .='</tr>'; 
        
    $content .='<tr>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TATUAJE</b></td>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>DONDE</b></td>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>TAMAÑO</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$tattoo.'</td>';
    $content .='<td colspan="4"align="center"> '.$tattoo2.'</td>';
    $content .='<td colspan="4"align="center"> '.$tattoo3.'</td>';
    $content .='</tr>';  
        
     $content .='<tr>';    
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>PERFORACIONES</b></td>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>DONDE</b></td>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>CUANTAS</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="2"align="center"> '.$piercing.'</td>';
    $content .='<td colspan="4"align="center"> '.$piercing2.'</td>';
    $content .='<td colspan="4"align="center"> '.$piercing3.'</td>';
    $content .='</tr>'; 
        
    $content .='<tr>';    
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>PESO</b></td>';
    $content .='<td colspan="4"align="center" bgcolor="lightgrey"> <b>ESTATURA</b></td>';
    $content .='<td colspan="2"align="center" bgcolor="lightgrey"> <b>TIPO DE SANGRE</b></td>';
    $content .='</tr>';
        
    $content .='<tr>';
    $content .='<td colspan="4"align="center"> '.$weight.'</td>';
    $content .='<td colspan="4"align="center"> '.$stature.'</td>';
    $content .='<td colspan="2"align="center"> '.$typeblood.'</td>';
    $content .='</tr>';    
        
        
        
	}
	
	$content .= '</table>';
    $content .='</div>';
    $content .='</section>';

    $cnt++;} 

	//$content .= '
		//<div class="row padding">
        //	<div class="col-md-12" style="text-align:center;">
          //  	<span>Pdf Creator </span><a>By sistema sim</a>
            $content .= '</div>
        </div></body>
    	
	';
      	$pdf->addPage(); 
	ob_end_clean(); //ESTA LINEA SE COMENTA EN PRODUCCION//
    //$pdf->Image('../lib/reportes/logopdf.png', 55, 90, 100, '', '', '', '', false, 300);
	$pdf->writeHTML($content, true, 0, true, 0);
    //$pdf->Image('../lib/reportes/logopdf.png', 55, 90, 100, '', '', '', '', false, 300);
	$pdf->lastPage();


	$pdf->output('Fichatecnica.pdf', 'I');


?>
