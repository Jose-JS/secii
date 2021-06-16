<?php
session_start();

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
//error_reporting(E_ALL);

// Motrar todos los errores de PHP
//ini_set('error_reporting', E_ALL);

include('includes/config.php');
$empid = $_POST['empcode'];
$department = $_POST['department'];
$assignedservice = $_POST['assignedservice'];
$fechini = $_POST['fechini'];
$name = $_POST['name'];
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$gender = $_POST['gender'];
$marital = $_POST['marital'];
$placebirth = $_POST['placebirth'];
$nationality = $_POST['nationality'];
$ife = $_POST['ife'];
$curp = $_POST['curp'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$rfc = $_POST['rfc'];
$imss = $_POST['imss'];
$infonavit = $_POST['infonavit'];
$infonavitmon = $_POST['infonavitmon'];
$fonacot = $_POST['fonacot'];
$fonacotmon = $_POST['fonacotmon'];
$phonelocal = $_POST['phonelocal'];
$phonerecado = $_POST['phonerecado'];
$typelicence = $_POST['typelicence'];
$military = $_POST['military'];
$mobileno = $_POST['mobileno'];
$dependent = $_POST['dependent'];
$dependentname = $_POST['dependentname'];
$dependentrelation = $_POST['dependentrelation'];
$dependentage = $_POST['dependentage'];
$dependentname2 = $_POST['dependentname2'];
$dependentrelation2 = $_POST['dependentrelation2'];
$dependentage2 = $_POST['dependentage2'];
$dependentname3 = $_POST['dependentname3'];
$dependentrelation3 = $_POST['dependentrelation3'];
$dependentage3 = $_POST['dependentage3'];
$dependentname4 = $_POST['dependentname4'];
$dependentrelation4 = $_POST['dependentrelation4'];
$dependentage4 = $_POST['dependentage4'];
$dependentname5 = $_POST['dependentname5'];
$dependentrelation5 = $_POST['dependentrelation5'];
$dependentage5 = $_POST['dependentage5'];
$address = $_POST['address'];
$city = $_POST['city'];
$suburb = $_POST['suburb'];
$email = $_POST['email'];
$country = $_POST['country'];
$cp = $_POST['cp'];
//$password=md5($_POST['password']); 
$password = $_POST['password'];
$status = 1;

$primaryname = $_POST['primaryname'];
$primaryadress = $_POST['primaryadress'];
$primarydocument = $_POST['primarydocument'];
$highschoolname = $_POST['highschoolname'];
$highschooladress = $_POST['highschooladress'];
$highschooldocument = $_POST['highschooldocument'];
$schoolname = $_POST['schoolname'];
$schooladress = $_POST['schooladress'];
$schooldocument = $_POST['schooldocument'];
$universityname = $_POST['universityname'];
$universityadress = $_POST['universityadress'];
$universitydocument = $_POST['universitydocument'];
$companyname = $_POST['companyname'];
$companyadress = $_POST['companyadress'];
$companyphone = $_POST['companyphone'];
$companyjob = $_POST['companyjob'];
$timework = $_POST['timework'];
$reasonexit = $_POST['reasonexit'];
$companyname2 = $_POST['companyname2'];
$companyadress2 = $_POST['companyadress2'];
$companyphone2 = $_POST['companyphone2'];
$companyjob2 = $_POST['companyjob2'];
$timework2 = $_POST['timework2'];
$reasonexit2 = $_POST['reasonexit2'];
$companyname3 = $_POST['companyname3'];
$companyadress3 = $_POST['companyadress3'];
$companyphone3 = $_POST['companyphone3'];
$companyjob3 = $_POST['companyjob3'];
$timework3 = $_POST['timework3'];
$reasonexit3 = $_POST['reasonexit3'];
$familyname = $_POST['familyname'];
$relationship = $_POST['relationship'];
$yearshim = $_POST['yearshim'];
$familyphone = $_POST['familyphone'];
$familyname2 = $_POST['familyname2'];
$relationship2 = $_POST['relationship2'];
$yearshim2 = $_POST['yearshim2'];
$familyphone2 = $_POST['familyphone2'];
$personalname = $_POST['personalname'];
$personalyears = $_POST['personalyears'];
$personalphone = $_POST['personalphone'];
$personaladress = $_POST['personaladress'];
$personalname2 = $_POST['personalname2'];
$personalyears2 = $_POST['personalyears2'];
$personalphone2 = $_POST['personalphone2'];
$personaladress2 = $_POST['personaladress2'];
$previous = $_POST['previous'];
$required = $_POST['required'];
$offered = $_POST['offered'];
$yearsliving = $_POST['yearsliving'];
$homex1 = $_POST['homex1'];
$homex2 = $_POST['homex2'];
$incomeextra = $_POST['incomeextra'];
$incomedesc = $_POST['incomedesc'];
$debts = $_POST['debts'];
$debtscell = $_POST['debtscell'];
$pantry = $_POST['pantry'];
$transport = $_POST['transport'];
$maintenance = $_POST['maintenance'];
$paymentschool = $_POST['paymentschool'];
$medicalservices = $_POST['medicalservices'];
$clothes = $_POST['clothes'];
$otherexpenses = $_POST['otherexpenses'];
$overall = $_POST['overall'];
if (is_array($_POST['articulo'])) {
    $selected = '';
    $num_countries = count($_POST['articulo']);
    $current = 0;
    foreach ($_POST['articulo'] as $key => $value) {
        if ($current != $num_countries - 1)
            $selected .= $value . ', ';
        else
            //$selected .= $value.'.';
            $current++;
    }
}
$glasses = $_POST['glasses'];
$glasses2 = $_POST['glasses2'];
$chronic = $_POST['chronic'];
$chronic2 = $_POST['chronic2'];
$operation = $_POST['operation'];
$operation2 = $_POST['operation2'];
$enervants = $_POST['enervants'];
$incapacitado = $_POST['incapacitado'];
$incapacitado2 = $_POST['incapacitado2'];
$ingresomensual = $_POST['ingresomensual'];
$ingresomensual2 = $_POST['ingresomensual2'];
$ingresomensual3 = $_POST['ingresomensual3'];
$chronic = $_POST['chronic'];
$enervants2 = $_POST['enervants2'];
$activities = $_POST['activities'];
$people = $_POST['people'];
$valuesperson = $_POST['valuesperson'];
$defect = $_POST['defect'];
$sport = $_POST['sport'];
$sport2 = $_POST['sport2'];
$politic = $_POST['politic'];
$politic2 = $_POST['politic2'];
$syndicate = $_POST['syndicate'];
$syndicate2 = $_POST['syndicate2'];
$conciliation = $_POST['conciliation'];
$conciliation2 = $_POST['conciliation2'];
$face = $_POST['face'];
$skincolor = $_POST['skincolor'];
$eyecolor = $_POST['eyecolor'];
$kindeyes = $_POST['kindeyes'];
$haircolor = $_POST['haircolor'];
$complexion = $_POST['complexion'];
$tattoo = $_POST['tattoo'];
$tattoo2 = $_POST['tattoo2'];
$tattoo3 = $_POST['tattoo3'];
$piercing = $_POST['piercing'];
$piercing2 = $_POST['piercing2'];
$piercing3 = $_POST['piercing3'];
$observations = $_POST['observations'];
$weight = $_POST['weight'];
$stature = $_POST['stature'];
$typeblood = $_POST['typeblood'];
$company = $_POST['company'];
$banco = $_POST['banco'];
$nocuenta = $_POST['nocuenta'];
$clabeint = $_POST['clabeint'];
$sueldonet = $_POST['sueldonet'];
$creatoruser = $_SESSION['recursos'];
$action = 'inserción';
$fechaingreso = $_POST['fechaingreso'];
$fechacapacitacion = $_POST['fechacapacitacion'];
$sueldodiario = $_POST['sueldodiario'];
$sql = 'INSERT INTO tblemployees(EmpId,name,FirstName,LastName,EmailId,Password,
Gender,Dob,Department,Address,City,Country,suburb,Phonenumber,Status,placebirth,
nationality,age,marital,ife,curp,rfc,imss,infonavit,infonavitmon,fonacot,fonacotmon,typelicence,military,phonelocal,
phonerecado,dependent,dependentname,dependentrelation,dependentage,dependentname2,
dependentrelation2,dependentage2,dependentname3,dependentrelation3,dependentage3,
dependentname4,dependentrelation4,dependentage4,dependentname5,dependentrelation5,
dependentage5,cp,assignedservice,fechini,primaryname,primaryadress,primarydocument,
highschoolname,highschooladress,highschooldocument,schoolname,schooladress,schooldocument,
universityname,universityadress,universitydocument,companyname,companyadress,companyphone,
companyjob,timework,reasonexit,companyname2,companyadress2,companyphone2,companyjob2,
timework2,reasonexit2,companyname3,companyadress3,companyphone3,companyjob3,timework3,
reasonexit3,familyname,relationship,yearshim,familyphone,familyname2,relationship2,
yearshim2,familyphone2,personalname,personalyears,personalphone,personaladress,
personalname2,personalyears2,personalphone2,personaladress2,previous,required,offered,
homex1,homex2,incomeextra,incomedesc,yearsliving,debts,debtscell,pantry,transport,maintenance,
paymentschool,medicalservices,clothes,otherexpenses,overall,articulo,glasses,glasses2,chronic,
chronic2,operation,operation2,enervants,enervants2,activities,people,valueperson,defect,sport,
sport2,politic,politic2,syndicate,syndicate2,conciliation,conciliation2,face,skincolor,eyecolor,
kindeyes,haircolor,complexion,tattoo,tattoo2,tattoo3,piercing,piercing2,piercing3,observations,
weight,stature,typeblood,company,creatoruser,action,banco,nocuenta,clabeint,sueldonet,fechaingreso,
fechacapacitacion,ingresomensual,ingresomensual2,ingresomensual3,incapacitado,incapacitado2,sueldodiario) 
VALUES(:empid,:name,:fname,:lname,:email,:password,:gender,:dob,:department,:address,:city,:country,:suburb,:mobileno,
:status,:placebirth,:nationality,:age,:marital,:ife,:curp,:rfc,:imss,:infonavit,:infonavitmon,:fonacot,:fonacotmon,:typelicence,:military,:phonelocal,
:phonerecado,:dependent,:dependentname,:dependentrelation,:dependentage,:dependentname2,:dependentrelation2,:dependentage2,
:dependentname3,:dependentrelation3,:dependentage3,:dependentname4,:dependentrelation4,:dependentage4,:dependentname5,
:dependentrelation5,:dependentage5,:cp,:assignedservice,:fechini,:primaryname,:primaryadress,:primarydocument,
:highschoolname,:highschooladress,:highschooldocument,:schoolname,:schooladress,:schooldocument,:universityname,
:universityadress,:universitydocument,:companyname,:companyadress,:companyphone,:companyjob,:timework,:reasonexit,
:companyname2,:companyadress2,:companyphone2,:companyjob2,:timework2,:reasonexit2,:companyname3,:companyadress3,
:companyphone3,:companyjob3,:timework3,:reasonexit3,:familyname,:relationship,:yearshim,:familyphone,:familyname2,
:relationship2,:yearshim2,:familyphone2,:personalname,:persoanlyears,:persoanlphone,:persoanladress,:personalname2,
:persoanlyears2,:persoanlphone2,:persoanladress2,:previous,:required,:offered,:homex1,:homex2,:incomeextra,:incomedesc,
:yearsliving,:debts,:debtscell,:pantry,:transport,:maintenance,:paymentschool,:medicalservices,:clothes,:otherexpenses,
:overall,:selected,:glasses,:glasses2,:chronic,:chronic2,:operation,:operation2,:enervants,:enervants2,:activities,
:people,:valuesperson,:defect,:sport,:sport2,:politic,:politic2,:syndicate,:syndicate2,:conciliation,:conciliation2,
:face,:skincolor,:eyecolor,:kindeyes,:haircolor,:complexion,:tattoo,:tattoo2,:tattoo3,:piercing,:piercing2,:piercing3,
:observations,:weight,:stature,:typeblood,:company,:creatoruser,:action,:banco,:nocuenta,:clabeint,:sueldonet,:fechaingreso,:fechacapacitacion,:ingresomensual,
:ingresomensual2,:ingresomensual3,:incapacitado,:incapacitado2,:sueldodiario)';
$query = $dbh->prepare($sql);
$query->bindParam(':empid', $empid, PDO::PARAM_STR);
$query->bindParam(':name', $name, PDO::PARAM_STR);
$query->bindParam(':fname', $fname, PDO::PARAM_STR);
$query->bindParam(':lname', $lname, PDO::PARAM_STR);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->bindParam(':password', $password, PDO::PARAM_STR);
$query->bindParam(':gender', $gender, PDO::PARAM_STR);
$query->bindParam(':dob', $dob, PDO::PARAM_STR);
$query->bindParam(':department', $department, PDO::PARAM_STR);
$query->bindParam(':address', $address, PDO::PARAM_STR);
$query->bindParam(':city', $city, PDO::PARAM_STR);
$query->bindParam(':country', $country, PDO::PARAM_STR);
$query->bindParam(':suburb', $suburb, PDO::PARAM_STR);
$query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
$query->bindParam(':status', $status, PDO::PARAM_STR);
$query->bindParam(':placebirth', $placebirth, PDO::PARAM_STR);
$query->bindParam(':nationality', $nationality, PDO::PARAM_STR);
$query->bindParam(':age', $age, PDO::PARAM_STR);
$query->bindParam(':marital', $marital, PDO::PARAM_STR);
$query->bindParam(':ife', $ife, PDO::PARAM_STR);
$query->bindParam(':curp', $curp, PDO::PARAM_STR);
$query->bindParam(':rfc', $rfc, PDO::PARAM_STR);
$query->bindParam(':imss', $imss, PDO::PARAM_STR);
$query->bindParam(':infonavit', $infonavit, PDO::PARAM_STR);
$query->bindParam(':infonavitmon', $infonavitmon, PDO::PARAM_STR);
$query->bindParam(':fonacot', $fonacot, PDO::PARAM_STR);
$query->bindParam(':fonacotmon', $fonacotmon, PDO::PARAM_STR);
$query->bindParam(':typelicence', $typelicence, PDO::PARAM_STR);
$query->bindParam(':military', $military, PDO::PARAM_STR);
$query->bindParam(':phonelocal', $phonelocal, PDO::PARAM_STR);
$query->bindParam(':phonerecado', $phonerecado, PDO::PARAM_STR);
$query->bindParam(':dependent', $dependent, PDO::PARAM_STR);
$query->bindParam(':dependentname', $dependentname, PDO::PARAM_STR);
$query->bindParam(':dependentrelation', $dependentrelation, PDO::PARAM_STR);
$query->bindParam(':dependentage', $dependentage, PDO::PARAM_STR);
$query->bindParam(':dependentname2', $dependentname2, PDO::PARAM_STR);
$query->bindParam(':dependentrelation2', $dependentrelation2, PDO::PARAM_STR);
$query->bindParam(':dependentage2', $dependentage2, PDO::PARAM_STR);
$query->bindParam(':dependentname3', $dependentname3, PDO::PARAM_STR);
$query->bindParam(':dependentrelation3', $dependentrelation3, PDO::PARAM_STR);
$query->bindParam(':dependentage3', $dependentage3, PDO::PARAM_STR);
$query->bindParam(':dependentname4', $dependentname4, PDO::PARAM_STR);
$query->bindParam(':dependentrelation4', $dependentrelation4, PDO::PARAM_STR);
$query->bindParam(':dependentage4', $dependentage4, PDO::PARAM_STR);
$query->bindParam(':dependentname5', $dependentname5, PDO::PARAM_STR);
$query->bindParam(':dependentrelation5', $dependentrelation5, PDO::PARAM_STR);
$query->bindParam(':dependentage5', $dependentage5, PDO::PARAM_STR);
$query->bindParam(':cp', $cp, PDO::PARAM_STR);
$query->bindParam(':assignedservice', $assignedservice, PDO::PARAM_STR);
$query->bindParam(':fechini', $fechini, PDO::PARAM_STR);
$query->bindParam(':primaryname', $primaryname, PDO::PARAM_STR);
$query->bindParam(':primaryadress', $primaryadress, PDO::PARAM_STR);
$query->bindParam(':primarydocument', $primarydocument, PDO::PARAM_STR);
$query->bindParam(':highschoolname', $highschoolname, PDO::PARAM_STR);
$query->bindParam(':highschooladress', $highschooladress, PDO::PARAM_STR);
$query->bindParam(':highschooldocument', $highschooldocument, PDO::PARAM_STR);
$query->bindParam(':schoolname', $schoolname, PDO::PARAM_STR);
$query->bindParam(':schooladress', $schooladress, PDO::PARAM_STR);
$query->bindParam(':schooldocument', $schooldocument, PDO::PARAM_STR);
$query->bindParam(':universityname', $universityname, PDO::PARAM_STR);
$query->bindParam(':universityadress', $universityadress, PDO::PARAM_STR);
$query->bindParam(':universitydocument', $universitydocument, PDO::PARAM_STR);
$query->bindParam(':companyname', $companyname, PDO::PARAM_STR);
$query->bindParam(':companyadress', $companyadress, PDO::PARAM_STR);
$query->bindParam(':companyphone', $companyphone, PDO::PARAM_STR);
$query->bindParam(':companyjob', $companyjob, PDO::PARAM_STR);
$query->bindParam(':timework', $timework, PDO::PARAM_STR);
$query->bindParam(':reasonexit', $reasonexit, PDO::PARAM_STR);
$query->bindParam(':companyname2', $companyname2, PDO::PARAM_STR);
$query->bindParam(':companyadress2', $companyadress2, PDO::PARAM_STR);
$query->bindParam(':companyphone2', $companyphone2, PDO::PARAM_STR);
$query->bindParam(':companyjob2', $companyjob2, PDO::PARAM_STR);
$query->bindParam(':timework2', $timework2, PDO::PARAM_STR);
$query->bindParam(':reasonexit2', $reasonexit2, PDO::PARAM_STR);
$query->bindParam(':companyname3', $companyname3, PDO::PARAM_STR);
$query->bindParam(':companyadress3', $companyadress3, PDO::PARAM_STR);
$query->bindParam(':companyphone3', $companyphone3, PDO::PARAM_STR);
$query->bindParam(':companyjob3', $companyjob3, PDO::PARAM_STR);
$query->bindParam(':timework3', $timework3, PDO::PARAM_STR);
$query->bindParam(':reasonexit3', $reasonexit3, PDO::PARAM_STR);
$query->bindParam(':familyname', $familyname, PDO::PARAM_STR);
$query->bindParam(':relationship', $relationship, PDO::PARAM_STR);
$query->bindParam(':yearshim', $yearshim, PDO::PARAM_STR);
$query->bindParam(':familyphone', $familyphone, PDO::PARAM_STR);
$query->bindParam(':familyname2', $familyname2, PDO::PARAM_STR);
$query->bindParam(':relationship2', $relationship2, PDO::PARAM_STR);
$query->bindParam(':yearshim2', $yearshim2, PDO::PARAM_STR);
$query->bindParam(':familyphone2', $familyphone2, PDO::PARAM_STR);
$query->bindParam(':personalname', $personalname, PDO::PARAM_STR);
$query->bindParam(':persoanlyears', $personalyears, PDO::PARAM_STR);
$query->bindParam(':persoanlphone', $personalphone, PDO::PARAM_STR);
$query->bindParam(':persoanladress', $personaladress, PDO::PARAM_STR);
$query->bindParam(':personalname2', $personalname2, PDO::PARAM_STR);
$query->bindParam(':persoanlyears2', $personalyears2, PDO::PARAM_STR);
$query->bindParam(':persoanlphone2', $personalphone2, PDO::PARAM_STR);
$query->bindParam(':persoanladress2', $personaladress2, PDO::PARAM_STR);
$query->bindParam(':previous', $previous, PDO::PARAM_STR);
$query->bindParam(':required', $required, PDO::PARAM_STR);
$query->bindParam(':offered', $offered, PDO::PARAM_STR);
$query->bindParam(':homex1', $homex1, PDO::PARAM_STR);
$query->bindParam(':homex2', $homex2, PDO::PARAM_STR);
$query->bindParam(':incomeextra', $incomeextra, PDO::PARAM_STR);
$query->bindParam(':incomedesc', $incomedesc, PDO::PARAM_STR);
$query->bindParam(':yearsliving', $yearsliving, PDO::PARAM_STR);
$query->bindParam(':debts', $debts, PDO::PARAM_STR);
$query->bindParam(':debtscell', $debtscell, PDO::PARAM_STR);
$query->bindParam(':pantry', $pantry, PDO::PARAM_STR);
$query->bindParam(':transport', $transport, PDO::PARAM_STR);
$query->bindParam(':maintenance', $maintenance, PDO::PARAM_STR);
$query->bindParam(':paymentschool', $paymentschool, PDO::PARAM_STR);
$query->bindParam(':medicalservices', $medicalservices, PDO::PARAM_STR);
$query->bindParam(':clothes', $clothes, PDO::PARAM_STR);
$query->bindParam(':otherexpenses', $otherexpenses, PDO::PARAM_STR);
$query->bindParam(':overall', $overall, PDO::PARAM_STR);
$query->bindParam(':selected', $selected, PDO::PARAM_STR);
$query->bindParam(':glasses', $glasses, PDO::PARAM_STR);
$query->bindParam(':glasses2', $glasses2, PDO::PARAM_STR);
$query->bindParam(':chronic', $chronic, PDO::PARAM_STR);
$query->bindParam(':chronic2', $chronic2, PDO::PARAM_STR);
$query->bindParam(':operation', $operation, PDO::PARAM_STR);
$query->bindParam(':operation2', $operation2, PDO::PARAM_STR);
$query->bindParam(':enervants', $enervants, PDO::PARAM_STR);
$query->bindParam(':enervants2', $enervants2, PDO::PARAM_STR);
$query->bindParam(':activities', $activities, PDO::PARAM_STR);
$query->bindParam(':people', $people, PDO::PARAM_STR);
$query->bindParam(':valuesperson', $valuesperson, PDO::PARAM_STR);
$query->bindParam(':defect', $defect, PDO::PARAM_STR);
$query->bindParam(':sport', $sport, PDO::PARAM_STR);
$query->bindParam(':sport2', $sport2, PDO::PARAM_STR);
$query->bindParam(':politic', $politic, PDO::PARAM_STR);
$query->bindParam(':politic2', $politic2, PDO::PARAM_STR);
$query->bindParam(':syndicate', $politic, PDO::PARAM_STR);
$query->bindParam(':syndicate2', $politic2, PDO::PARAM_STR);
$query->bindParam(':conciliation', $conciliation, PDO::PARAM_STR);
$query->bindParam(':conciliation2', $conciliation2, PDO::PARAM_STR);
$query->bindParam(':face', $face, PDO::PARAM_STR);
$query->bindParam(':skincolor', $skincolor, PDO::PARAM_STR);
$query->bindParam(':eyecolor', $eyecolor, PDO::PARAM_STR);
$query->bindParam(':kindeyes', $kindeyes, PDO::PARAM_STR);
$query->bindParam(':haircolor', $haircolor, PDO::PARAM_STR);
$query->bindParam(':complexion', $complexion, PDO::PARAM_STR);
$query->bindParam(':tattoo', $tattoo, PDO::PARAM_STR);
$query->bindParam(':tattoo2', $tattoo2, PDO::PARAM_STR);
$query->bindParam(':tattoo3', $tattoo3, PDO::PARAM_STR);
$query->bindParam(':piercing', $piercing, PDO::PARAM_STR);
$query->bindParam(':piercing2', $piercing2, PDO::PARAM_STR);
$query->bindParam(':piercing3', $piercing3, PDO::PARAM_STR);
$query->bindParam(':observations', $observations, PDO::PARAM_STR);
$query->bindParam(':weight', $weight, PDO::PARAM_STR);
$query->bindParam(':stature', $stature, PDO::PARAM_STR);
$query->bindParam(':typeblood', $typeblood, PDO::PARAM_STR);
$query->bindParam(':company', $company, PDO::PARAM_STR);
$query->bindParam(':creatoruser', $creatoruser, PDO::PARAM_STR);
$query->bindParam(':action', $action, PDO::PARAM_STR);
$query->bindParam(':banco', $banco, PDO::PARAM_STR);
$query->bindParam(':nocuenta', $nocuenta, PDO::PARAM_STR);
$query->bindParam(':clabeint', $clabeint, PDO::PARAM_STR);
$query->bindParam(':sueldonet', $sueldonet, PDO::PARAM_STR);
$query->bindParam(':fechaingreso', $fechaingreso, PDO::PARAM_STR);
$query->bindParam(':fechacapacitacion', $fechacapacitacion, PDO::PARAM_STR);
$query->bindParam(':ingresomensual', $ingresomensual, PDO::PARAM_STR);
$query->bindParam(':ingresomensual2', $ingresomensual2, PDO::PARAM_STR);
$query->bindParam(':ingresomensual3', $ingresomensual3, PDO::PARAM_STR);
$query->bindParam(':incapacitado', $incapacitado, PDO::PARAM_STR);
$query->bindParam(':incapacitado2', $incapacitado2, PDO::PARAM_STR);
$query->bindParam(':sueldodiario', $sueldodiario, PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
if ($lastInsertId) {
    $msg = "Registro de Técnico, agregado con éxito";
    echo "<script>
if (window.history.replaceState) {
window.history.replaceState(null, null, window.location.href);
}
</script>";
} else {
    $error = "Algo salió mal. Inténtalo de nuevo";
}
