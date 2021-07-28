<?php
session_start();

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
//error_reporting(E_ALL);

// Motrar todos los errores de PHP
//ini_set('error_reporting', E_ALL);

include('../includes/config.php');
if (strlen($_SESSION['recursos']) == 0) {
	header('location:index.php');
} else {
	$eid = intval($_GET['empid']);


	if (isset($_POST['update'])) {
		$empid = $_POST['empcode'];
		$department = $_POST['department'];
		//$assignedservice=$_POST['assignedservice'];
		$fechini = $_POST['fechini'];
		$name = $_POST['name'];
		$fname = $_POST['FirstName'];
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
		$enervants2 = $_POST['enervants2'];
		$incapacitado = $_POST['incapacitado'];
		$incapacitado2 = $_POST['incapacitado2'];
		$ingresomensual = $_POST['ingresomensual'];
		$ingresomensual2 = $_POST['ingresomensual2'];
		$ingresomensual3 = $_POST['ingresomensual3'];
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
		$action = 'modificación';
		$fechaingreso = $_POST['fechaingreso'];
		$fechacapacitacion = $_POST['fechacapacitacion'];
		$sueldodiario = $_POST['sueldodiario'];
		$sql = "UPDATE tblemployees SET name=:name,FirstName=:fname,LastName=:lname,EmailId=:email,Gender=:gender,Dob=:dob,Department=:department,Address=:address,City=:city,Country=:country,suburb=:suburb,Phonenumber=:mobileno,placebirth=:placebirth,nationality=:nationality,age=:age,marital=:marital,ife=:ife,curp=:curp,rfc=:rfc,imss=:imss,infonavit=:infonavit,infonavitmon=:infonavitmon,fonacot=:fonacot,fonacotmon=:fonacotmon,typelicence=:typelicence,military=:military,phonelocal=:phonelocal,phonerecado=:phonerecado,dependent=:dependent,dependentname=:dependentname,dependentrelation=:dependentrelation,dependentage=:dependentage,dependentname2=:dependentname2,dependentrelation2=:dependentrelation2,dependentage2=:dependentage2,dependentname3=:dependentname3,dependentrelation3=:dependentrelation3,dependentage3=:dependentage3,dependentname4=:dependentname4,dependentrelation4=:dependentrelation4,dependentage4=:dependentage4,dependentname5=:dependentname5,dependentrelation5=:dependentrelation5,dependentage5=:dependentage5,cp=:cp,fechini=:fechini,primaryname=:primaryname,primaryadress=:primaryadress,primarydocument=:primarydocument,highschoolname=:highschoolname,highschooladress=:highschooladress,highschooldocument=:highschooldocument,schoolname=:schoolname,schooladress=:schooladress,schooldocument=:schooldocument,universityname=:universityname,universityadress=:universityadress,universitydocument=:universitydocument,companyname=:companyname,companyadress=:companyadress,companyphone=:companyphone,companyjob=:companyjob,timework=:timework,reasonexit=:reasonexit,companyname2=:companyname2,companyadress2=:companyadress2,companyphone2=:companyphone2,companyjob2=:companyjob2,timework2=:timework2,reasonexit2=:reasonexit2,companyname3=:companyname3,companyadress3=:companyadress3,companyphone3=:companyphone3,companyjob3=:companyjob3,timework3=:timework3,reasonexit3=:reasonexit3,familyname=:familyname,relationship=:relationship,yearshim=:yearshim,familyphone=:familyphone,familyname2=:familyname2,relationship2=:relationship2,yearshim2=:yearshim2,familyphone2=:familyphone2,personalname=:personalname,personalyears=:personalyears,personalphone=:personalphone,personaladress=:personaladress,personalname2=:personalname2,personalyears2=:personalyears2,personalphone2=:personalphone2,personaladress2=:personaladress2,previous=:previous,required=:required,offered=:offered,incomeextra=:incomeextra,incomedesc=:incomedesc,yearsliving=:yearsliving,activities=:activities,people=:people,valueperson=:valuesperson,defect=:defect,observations=:observations,weight=:weight,stature=:stature,typeblood=:typeblood,homex1=:homex1,homex2=:homex2,articulo=:selected,glasses=:glasses,glasses2=:glasses2,chronic=:chronic,chronic2=:chronic2,operation=:operation,operation2=:operation2,enervants=:enervants,enervants2=:enervants2,sport=:sport,sport2=:sport2,politic=:politic,politic2=:politic2,syndicate=:syndicate,syndicate2=:syndicate2,conciliation=:conciliation,conciliation2=:conciliation2,face=:face,skincolor=:skincolor,eyecolor=:eyecolor,kindeyes=:kindeyes,haircolor=:haircolor,complexion=:complexion,tattoo=:tattoo,tattoo2=:tattoo2,tattoo3=:tattoo3,piercing=:piercing,piercing2=:piercing2,piercing3=:piercing3,company=:company,creatoruser=:creatoruser,action=:action,banco=:banco,nocuenta=:nocuenta,clabeint=:clabeint,sueldonet=:sueldonet,debts=:debts,debtscell=:debtscell,pantry=:pantry,transport=:transport,maintenance=:maintenance,paymentschool=:paymentschool,medicalservices=:medicalservices,clothes=:clothes,otherexpenses=:otherexpenses,overall=:overall,fechaingreso=:fechaingreso,fechacapacitacion=:fechacapacitacion,ingresomensual=:ingresomensual,ingresomensual2=:ingresomensual2,ingresomensual3=:ingresomensual3,incapacitado=:incapacitado,incapacitado2=:incapacitado2,sueldodiario=:sueldodiario where id=:eid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':name', $name, PDO::PARAM_STR);
		$query->bindParam(':fname', $fname, PDO::PARAM_STR);
		$query->bindParam(':lname', $lname, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':gender', $gender, PDO::PARAM_STR);
		$query->bindParam(':dob', $dob, PDO::PARAM_STR);
		$query->bindParam(':department', $department, PDO::PARAM_STR);
		$query->bindParam(':address', $address, PDO::PARAM_STR);
		$query->bindParam(':city', $city, PDO::PARAM_STR);
		$query->bindParam(':country', $country, PDO::PARAM_STR);
		$query->bindParam(':suburb', $suburb, PDO::PARAM_STR);
		$query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
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
		//$query->bindParam(':assignedservice',$assignedservice,PDO::PARAM_STR);
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
		$query->bindParam(':personalyears', $personalyears, PDO::PARAM_STR);
		$query->bindParam(':personalphone', $personalphone, PDO::PARAM_STR);
		$query->bindParam(':personaladress', $personaladress, PDO::PARAM_STR);
		$query->bindParam(':personalname2', $personalname2, PDO::PARAM_STR);
		$query->bindParam(':personalyears2', $personalyears2, PDO::PARAM_STR);
		$query->bindParam(':personalphone2', $personalphone2, PDO::PARAM_STR);
		$query->bindParam(':personaladress2', $personaladress2, PDO::PARAM_STR);
		$query->bindParam(':previous', $previous, PDO::PARAM_STR);
		$query->bindParam(':required', $required, PDO::PARAM_STR);
		$query->bindParam(':offered', $offered, PDO::PARAM_STR);
		$query->bindParam(':incomeextra', $incomeextra, PDO::PARAM_STR);
		$query->bindParam(':incomedesc', $incomedesc, PDO::PARAM_STR);
		$query->bindParam(':yearsliving', $yearsliving, PDO::PARAM_STR);
		$query->bindParam(':activities', $activities, PDO::PARAM_STR);
		$query->bindParam(':people', $people, PDO::PARAM_STR);
		$query->bindParam(':valuesperson', $valuesperson, PDO::PARAM_STR);
		$query->bindParam(':defect', $defect, PDO::PARAM_STR);
		$query->bindParam(':observations', $observations, PDO::PARAM_STR);
		$query->bindParam(':weight', $weight, PDO::PARAM_STR);
		$query->bindParam(':stature', $stature, PDO::PARAM_STR);
		$query->bindParam(':typeblood', $typeblood, PDO::PARAM_STR);
		$query->bindParam(':homex1', $homex1, PDO::PARAM_STR);
		$query->bindParam(':homex2', $homex2, PDO::PARAM_STR);
		$query->bindParam(':selected', $selected, PDO::PARAM_STR);
		$query->bindParam(':glasses', $glasses, PDO::PARAM_STR);
		$query->bindParam(':glasses2', $glasses2, PDO::PARAM_STR);
		$query->bindParam(':chronic', $chronic, PDO::PARAM_STR);
		$query->bindParam(':chronic2', $chronic2, PDO::PARAM_STR);
		$query->bindParam(':operation', $operation, PDO::PARAM_STR);
		$query->bindParam(':operation2', $operation2, PDO::PARAM_STR);
		$query->bindParam(':enervants', $enervants, PDO::PARAM_STR);
		$query->bindParam(':enervants2', $enervants2, PDO::PARAM_STR);
		$query->bindParam(':sport', $sport, PDO::PARAM_STR);
		$query->bindParam(':sport2', $sport2, PDO::PARAM_STR);
		$query->bindParam(':politic', $politic, PDO::PARAM_STR);
		$query->bindParam(':politic2', $politic2, PDO::PARAM_STR);
		$query->bindParam(':syndicate', $syndicate, PDO::PARAM_STR);
		$query->bindParam(':syndicate2', $syndicate2, PDO::PARAM_STR);
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
		$query->bindParam(':company', $company, PDO::PARAM_STR);
		$query->bindParam(':creatoruser', $creatoruser, PDO::PARAM_STR);
		$query->bindParam(':action', $action, PDO::PARAM_STR);
		$query->bindParam(':banco', $banco, PDO::PARAM_STR);
		$query->bindParam(':nocuenta', $nocuenta, PDO::PARAM_STR);
		$query->bindParam(':clabeint', $clabeint, PDO::PARAM_STR);
		$query->bindParam(':sueldonet', $sueldonet, PDO::PARAM_STR);
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
		$query->bindParam(':fechaingreso', $fechaingreso, PDO::PARAM_STR);
		$query->bindParam(':fechacapacitacion', $fechacapacitacion, PDO::PARAM_STR);
		$query->bindParam(':ingresomensual', $ingresomensual, PDO::PARAM_STR);
		$query->bindParam(':ingresomensual2', $ingresomensual2, PDO::PARAM_STR);
		$query->bindParam(':ingresomensual3', $ingresomensual3, PDO::PARAM_STR);
		$query->bindParam(':incapacitado', $incapacitado, PDO::PARAM_STR);
		$query->bindParam(':incapacitado2', $incapacitado2, PDO::PARAM_STR);
		$query->bindParam(':sueldodiario', $sueldodiario, PDO::PARAM_STR);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);

		$query->execute();

		$lastInsertId = $dbh->lastInsertId();


		$msg = "Registro de Técnico, agregado con éxito";

		echo "<script>
 if ( window.history.replaceState ) {
   window.history.replaceState( null, null, window.location.href );
 }
</script>";
	}



?>

	<!DOCTYPE html>
	<html lang="en">

	<head>

		<!-- Title -->
		<title>Recursos Humanos | Actualizar Técnico</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta charset="UTF-8">
		<meta name="description" content="Responsive Admin Dashboard Template" />
		<meta name="keywords" content="admin,dashboard" />
		<meta name="author" content="Steelcoders" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

		<!-- Styles -->
		<link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
		<link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css ">


		<style type="text/css">
			#AUTO fieldset {
				display: none
			}

			#AUTO fieldset:first-child {
				display: block;
			}
		</style>
		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #dd3d36;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #5cb85c;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.div2 {
				border-style: solid;
				border-width: 1px;
				border-color: gainsboro
			}
		</style>

		<script type="text/javascript">
			function valid() {

				var txtDepartament = document.getElementById('departament').selectedIndex;
				var txtFechini = document.getElementById('fechini').value;
				var txtName = document.getElementById('name').value;
				var txtFirstname = document.getElementById('FirstName').value;
				var txtLastname = document.getElementById('lastname').value;
				var txtGender = document.getElementById('gender').value;
				var txtMarital = document.getElementById('marital').value;
				var txtPlacebirth = document.getElementById('placebirth').value;
				var txtNationality = document.getElementById('nationality').value;
				var txtIfe = document.getElementById('ife').value;
				var txtCurp = document.getElementById('curp').value;
				var txtDob = document.getElementById('dob').value;
				var txtAge = document.getElementById('age').value;
				var txtRfc = document.getElementById('rfc').value;
				var txtImss = document.getElementById('imss').value;
				var txtMobileno = document.getElementById('mobileno').value;
				var txtAddress = document.getElementById('address').value;
				var txtCity = document.getElementById('city').value;
				var txtSuburb = document.getElementById('suburb').value;
				var txtCountry = document.getElementById('country').value;
				var txtCp = document.getElementById('cp').value;
				var txtPhonerecado = document.getElementById('phonerecado').value;


				if (txtDepartament == null) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione un puesto',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor seleccione un puesto');
					return false;
				} else if (!isNaN(txtFechini)) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Debe elegir una fecha de ingreso',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('ERROR: Debe elegir una fecha de ingreso');
					return false;
				} else if (txtName == null || txtName == 0 || /^\s+$/.test(txtName)) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese un nombre',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese un nombre');
					return false;
				} else if (txtFirstname == null || txtFirstname == 0 || /^\s+$/.test(txtFirstname)) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese apellido paterno',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})

					//alert('[ERROR] Por favor ingrese apellido paterno');
					return false;
				} else if (txtLastname == null || txtLastname == 0 || /^\s+$/.test(txtLastname)) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese apellido materno',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese apellido materno');
					return false;
				} else if (txtGender == null || txtGender == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione un genero',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor seleccione un genero');
					return false;
				} else if (txtMarital == null || txtMarital == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione un estado civil',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor seleccione un estado civil');
					return false;
				} else if (txtPlacebirth == null || txtPlacebirth == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese su lugar de nacimiento',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese su lugar de nacimiento');
					return false;
				} else if (txtNationality == null || txtNationality == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese una nacionalidad',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese una nacionalidad');
					return false;
				} else if (txtIfe == null || txtIfe == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese su clave de elector',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese su clave de elector');
					return false;
				} else if (txtCurp == null || txtCurp == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese su curp',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese su curp');
					return false;
				} else if (!isNaN(txtDob)) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Debe elegir una fecha de nacimiento',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('ERROR: Debe elegir una fecha de nacimiento');
					return false;
				} else if (txtAge == null || txtAge == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese su edad',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese su edad');
					return false;
				} else if (txtRfc == null || txtRfc == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese su rfc',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese su rfc');
					return false;
				} else if (txtImss == null || txtImss == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese su numero de seguridad social',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese su numero de seguridad social');
					return false;
				} else if (txtMobileno == null || txtMobileno == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese su numero celular',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese su numero celular');
					return false;
				} else if (txtAddress == null || txtAddress == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese su dirección',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese su dirección');
					return false;
				} else if (txtCity == null || txtCity == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese su Municipio',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese su Municipio');
					return false;
				} else if (txtSuburb == null || txtSuburb == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese su colonia',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese su colonia');
					return false;
				} else if (txtCountry == null || txtCountry == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese su estado',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese su estado');
					return false;
				} else if (txtCp == null || txtCp == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese su codigo postal',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese su codigo postal');
					return false;
				} else if (txtPhonerecado == null || txtPhonerecado == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor ingrese su numero de recado',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor ingrese su numero de recado');
					return false;
				}



				return true;

			}

			function comprobar(checkbox) {
				otro = checkbox.parentNode.querySelector("[type=checkbox]:not(#" + checkbox.id + ")");

				if (otro.checked) {
					otro.checked = false;
				}
			}

			function checkAvailabilityEmpid() {
				$("#loaderIcon").show();
				jQuery.ajax({
					url: "check_availability.php",
					data: 'empcode=' + $("#empcode").val(),
					type: "POST",
					success: function(data) {
						$("#empid-availability").html(data);
						$("#loaderIcon").hide();
					},
					error: function() {}
				});
			}

			function checkAvailabilityEmailid() {
				$("#loaderIcon").show();
				jQuery.ajax({
					url: "check_availability.php",
					data: 'emailid=' + $("#email").val(),
					type: "POST",
					success: function(data) {
						$("#emailid-availability").html(data);
						$("#loaderIcon").hide();
					},
					error: function() {}
				});
			}
		</script>

		<script type="text/javascript">
			$(document).ready(function() {
				setTimeout(function() {
					$(".content").fadeOut(1500);
				}, 6000);

			});

			function calcular_edad() {
				var fechanac = dob.value;
				var diaB = <?php echo date('d') ?>;
				var mesB = <?php echo date('m') ?>;
				var anoB = <?php echo date('Y') ?>;
				var array_fecha = fechanac.split("-")
				var ano = parseInt(array_fecha[0]);
				var mes = parseInt(array_fecha[1]);
				var dia = parseInt(array_fecha[2]);
				//	alert(ano);
				edad = anoB - ano;
				//	alert(edad);
				edad = anoB - ano - 1; //-1 No se sabe si cumplio o no años este año 
				if (mesB + 1 - mes < 0) //-1 
				{
					edad = edad - 1;
				}
				if (mesB + 1 - mes > 0) //Igual 
				{
					edad = edad;
				}
				if (diaB - dia >= 0) //+1 
				{
					edad = edad + 1;
				}
				age.value = edad;
			}

			function sumar(valor) {
				var total = 0;
				valor = parseInt(valor); // Convertir el valor a un entero (número).
				total = document.getElementById('spTotal').innerHTML;
				// Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
				total = (total == null || total == undefined || total == "") ? 0 : total;
				/* Esta es la suma. */
				total = (parseInt(total) + parseInt(valor));
				// Colocar el resultado de la suma en el control "span".
				var c = document.getElementById('spTotal').innerHTML = total;
				overall.value = c;
				spTotal.style.display = "none";
			}
		</script>
	</head>

	<body>
		<?php include('includes/header.php'); ?>
		<?php include('includes/sidebar.php'); ?>
		<main class="mn-inner">
			<div class="row">
				<?php
				$eid = intval($_GET['empid']);
				$sql = "SELECT * from  tblemployees where id=:eid";
				$query = $dbh->prepare($sql);
				$query->bindParam(':eid', $eid, PDO::PARAM_STR);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);
				$cnt = 1;
				if ($query->rowCount() > 0) {
					foreach ($results as $resul) {            //   var_dump($resul); Se obtienen los resultados de todas las variables
				?>
						<div class="col s12 m12 l12">
							<div class="card">
								<div class="card-content">
									<div class="progress">
										<div class="progress-bar progress-bar-striped active" role="progressbar" style="height: 20px;" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<form id="AUTO" method="post" name="update" enctype="multipart/form-data">

										<?php if ($error) { ?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap content"><strong>ÉXITO</strong> : <?php echo htmlentities($msg); ?> </div><?php } ?>
										<div>
											<h3>FICHA TECNICA</h3>

											<!--		<img id="foto" name="foto" class="materialboxed" autocomplete="off" src="<?php echo htmlentities($result2->namedoc); ?>" width="100" height="120" required> -->
											<section>


												<div class="wizard-content ">

													<div class="row">
														<div class="col m6">
															<div class="row">


																<fieldset>

																	<div class="input-field col m6 s12">
																		<br><label for="empcode">Matricula de Técnico</label>
																		<input name="empcode" id="empcode" value="<?php echo htmlentities($resul->EmpId); ?>" type="text" autocomplete="off" readonly required>
																		<span id="empid-availability" style="font-size:12px;"></span>
																	</div>

																	<div class="input-field col m6 s12">
																		<label for="fechini">Departamento</label><br>
																		<select id="departament" name="department" autocomplete="off" required>
																			<option value="<?php echo htmlentities($resul->Department); ?>"><?php echo htmlentities($resul->Department); ?></option>
																			<?php $sql = "SELECT DepartmentName from tbldepartments";
																			$query = $dbh->prepare($sql);
																			$query->execute();
																			$results = $query->fetchAll(PDO::FETCH_OBJ);
																			$cnt = 1;

																			if ($query->rowCount() > 0) {
																				foreach ($results as $result) {   ?>
																					<option value="<?php echo htmlentities($result->DepartmentName); ?>"><?php echo htmlentities($result->DepartmentName); ?></option>
																			<?php }
																			} ?>
																		</select>
																	</div>


																	<div class="input-field col m6 s12">
																		<label for="">Nombre</label>
																		<input id="name" name="name" type="text" value="<?php echo htmlentities($resul->name); ?>" required>
																	</div>

																	<div class="input-field col m6 s12">
																		<label for="firstName">Apellido Paterno</label>
																		<input id="FirstName" name="FirstName" type="text" value="<?php echo htmlentities($resul->FirstName); ?>" required>
																	</div>

																	<div class="input-field col m6 s12">
																		<label for="lastName">Apellido Materno</label>
																		<input id="lastname" name="lastName" type="text" value="<?php echo htmlentities($resul->LastName); ?>" autocomplete="off" required>
																	</div>


																	<div class="input-field col m6 s12">
																		<label for="placebirth">Lugar de Nacimiento</label>
																		<input id="placebirth" name="placebirth" value="<?php echo htmlentities($resul->placebirth); ?>" type="text" required>
																	</div>

																	<div class="input-field col m6 s12">
																		<label for="nationality">Nacionalidad</label><br>
																		<input id="nationality" value="<?php echo htmlentities($resul->nationality); ?>" name="nationality" type="text" autocomplete="off" required="required">
																	</div>

																	<div class="input-field col m6 s12">
																		<label for="nationality">Fecha de nacimiento</label><br><br>
																		<input id="dob" name="dob" type="date" value="<?php echo htmlentities($resul->Dob); ?>" autocomplete="off">
																	</div>


																	<div class="input-field col m6 s12">
																		<label for="age">Edad</label>
																		<input id="age" name="age" value="<?php echo htmlentities($resul->age); ?>" type="text" onclick="javascript:calcular_edad();" autocomplete="off" required>
																	</div>

																	<div class="input-field col m6 s12">
																		<label for="phonelocal">Telefono Local</label>
																		<input name="phonelocal" id="phonelocal" value="<?php echo htmlentities($resul->phonelocal); ?>" type="tel" maxlength="10" autocomplete="off">
																	</div>

																	<div class="input-field col m6 s12">
																		<label for="phonerecado">Telefono de Recados</label>
																		<input name="phonerecado" id="phonerecado" value="<?php echo htmlentities($resul->phonerecado); ?>" type="tel" maxlength="10" autocomplete="off" required>
																	</div>

																	<div class="input-field col m6 s12">
																		<label for="phone">Número de teléfono móvil</label>
																		<input id="mobileno" name="mobileno" value="<?php echo htmlentities($resul->Phonenumber); ?>" type="tel" maxlength="10" autocomplete="off" required>
																	</div>

																	<div class="input-field col s12">
																		<label for="address">Dirección</label>
																		<input id="address" name="address" value="<?php echo htmlentities($resul->Address); ?>" type="text" autocomplete="off" placeholder="Calle, No. exterior e interior" required>
																	</div>

																	<div class="input-field col m6 s12">
																		<label for="email">Correo</label>
																		<input name="email" type="email" id="email" value="<?php echo htmlentities($resul->EmailId); ?>" autocomplete="off" required>
																		<span id="emailid-availability" style="font-size:12px;"></span>
																	</div>





															</div>
														</div>




														<div class="col m6 div2">
															<div class="row">

																<!--   <div class="input-field col m6 s12">
                                                        <select id="assignedservice" name="assignedservice" autocomplete="off" required>
                                                            <option value="<?php echo htmlentities($resul->assignedservice); ?>"><?php echo htmlentities($resul->assignedservice); ?></option>
                                                            <?php $sql = "SELECT servicename from tblserviceassigned";
															$query = $dbh->prepare($sql);
															$query->execute();
															$results = $query->fetchAll(PDO::FETCH_OBJ);
															$cnt = 1;
															if ($query->rowCount() > 0) {
																foreach ($results as $result) {   ?>
                                                            <option value="<?php echo htmlentities($result->servicename); ?>"><?php echo htmlentities($result->servicename); ?></option>
                                                            <?php }
															} ?>
                                                        </select>
                                                    </div> -->
																<div class="input-field col s12">
																	<label for="fechini">Empresa</label><br>
																	<select id="company" name="company" autocomplete="off">
																		<option value="<?php echo htmlentities($resul->company); ?>"><?php echo htmlentities($resul->company); ?></option>
																		<option value="APROSEMEX S.A. DE C.V.">APROSEMEX S.A. DE C.V.</option>
																		<option value="ASLO SEGURIDAD PRIVADA S.A. DE C.V.">ASLO SEGURIDAD PRIVADA S.A. DE C.V.
																		</option>
																		<option value="OIFSI S.A. DE C.V.">OIFSI S.A. DE C.V.</option>
																		<option value="OISME S.A. DE C.V.">OISME S.A. DE C.V.</option>
																	</select>
																</div>
																<div class="input-field col m6 s12">
																	<label for="fechini">Situación sentimental</label><br>
																	<select id="marital" name="marital" autocomplete="off">
																		<option value="<?php echo htmlentities($resul->marital); ?>"><?php echo htmlentities($resul->marital); ?></option>
																		<option value="soltero/a">soltero/a</option>
																		<option value="casado/a">casado/a</option>
																		<option value="union libre">union libre</option>
																		<option value="separado/a">separado/a</option>
																		<option value="divorciado/a">divorciado/a</option>
																		<option value="viudo/a">viudo/a</option>
																	</select>
																</div>




																<div class="input-field col m6 s12">
																	<label for="fechini">Genero</label><br>
																	<select id="gender" name="gender" autocomplete="off">
																		<option value="<?php echo htmlentities($resul->Gender); ?>"><?php echo htmlentities($resul->Gender); ?></option>
																		<option value="Masculino">Masculino</option>
																		<option value="Femenino">Femenino</option>
																		<option value="Otro">Otro</option>
																	</select>
																</div>
																<div class="input-field col s12">
																	<label for="fechini">Fecha de Ingreso</label><br>
																	<input id="fechini" name="fechini" value="<?php echo htmlentities($resul->fechini); ?>" type="date" autocomplete="off">
																</div>


																<div class="input-field col m6 s12">
																	<label for="ife">No. de IFE</label>
																	<input id="ife" name="ife" type="text" value="<?php echo htmlentities($resul->ife); ?>" autocomplete="off" maxlength="13" required>
																</div>


																<div class="input-field col m6 s12">
																	<label for="curp">Curp</label>
																	<input id="curp" name="curp" type="text" value="<?php echo htmlentities($resul->curp); ?>" maxlength="18" autocomplete="off" required>
																</div>

																<div class="input-field col m6 s12">
																	<label for="rfc">RFC</label>
																	<input id="rfc" name="rfc" type="text" value="<?php echo htmlentities($resul->rfc); ?>" maxlength="13" autocomplete="off" required>
																</div>

																<div class="input-field col m6 s12">
																	<label for="imss">No. IMSS</label>
																	<input id="imss" name="imss" type="text" value="<?php echo htmlentities($resul->imss); ?>" maxlength="11" autocomplete="off" required>
																</div>

																<div class="input-field col m6 s12">
																	<label for="infonavit">No. Crédito Infonavit</label>
																	<input id="infonavit" tabindex="30" name="infonavit" value="<?php echo htmlentities($resul->infonavit); ?>" type="text" autocomplete="off">
																</div>

																<div class="input-field col m6 s12">
																	<label for="infonavitmon">Monto de descuento infonavit</label>
																	<input id="infonavitmon" tabindex="30" name="infonavitmon" value="<?php echo htmlentities($resul->infonavitmon); ?>" type="text" autocomplete="off">
																</div>

																<div class="input-field col m6 s12">
																	<label for="fonacot">No. Crédito fonacot</label>
																	<input id="fonacot" tabindex="30" name="fonacot" value="<?php echo htmlentities($resul->fonacot); ?>" type="text" autocomplete="off">
																</div>

																<div class="input-field col m6 s12">
																	<label for="fonacotmon">Monto de descuento fonacot</label>
																	<input id="fonacotmon" tabindex="30" name="fonacotmon" value="<?php echo htmlentities($resul->fonacotmon); ?>" type="text" autocomplete="off">
																</div>

																<div class="input-field col m6 s12">
																	<label for="typelicence">Tipo de Licencia</label>
																	<input id="typelicence" name="typelicence" value="<?php echo htmlentities($resul->typelicence); ?>" type="text" autocomplete="off">
																</div>


																<div class="input-field col m6 s12">
																	<label for="military">Cartilla Militar</label>
																	<input id="military" name="military" value="<?php echo htmlentities($resul->military); ?>" type="text" autocomplete="off">
																</div>

																<div class="input-field col m6 s12">
																	<label for="city">Municipio</label>
																	<input id="city" name="city" type="text" value="<?php echo htmlentities($resul->City); ?>" autocomplete="off" required>
																</div>

																<div class="input-field col m6 s12">
																	<label for="suburb">Colonia</label>
																	<input id="suburb" name="suburb" value="<?php echo htmlentities($resul->suburb); ?>" type="text" autocomplete="off" required>
																</div>


																<div class="input-field col m6 s12">
																	<label for="country">Estado</label>
																	<input id="country" name="country" value="<?php echo htmlentities($resul->Country); ?>" type="text" autocomplete="off" required>
																</div>

																<div class="input-field col m6 s12">
																	<label for="cp">Codigo Postal</label>
																	<input id="cp" name="cp" value="<?php echo htmlentities($resul->cp); ?>" type="text" maxlength="5" autocomplete="off" required>
																</div>

																<div class="input-field col m6 s12">
																	<label for="dependent">No. de dependientes</label>
																	<input id="dependent" name="dependent" value="<?php echo htmlentities($resul->dependent); ?>" type="text" maxlength="2" autocomplete="off">
																</div>

																<!--    <div class="input-field col m6 s12">
<label for="foto">Foto</label><br><br>
<input id="foto" name="foto" type="file"  value="<?php echo htmlentities($resul->foto); ?>"maxlength="30" autocomplete="off" required>  
 </div>
    -->

																<div class="input-field col s12">
																	<!-- <button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>-->

																</div>
															</div>
														</div>


														<br><br> <br> <br><br> <br>
														<div class="row">
															<div class="col m6">
																<div class="row">

																</div>


															</div>
														</div>


														<h3>DATOS DE DEPENDIENTES</h3>
														<div class="col m6 ">
															<div class="row">


																<div class="input-field col m6 s12">
																	<label for="dependentname">Nombre</label>
																	<input id="dependentname" value="<?php echo htmlentities($resul->dependentname); ?>" name="dependentname" type="text" autocomplete="off">
																</div>
																<div class="input-field col m6 s12">
																	<label for="dependentrelation">Parentesco</label>
																	<input id="dependentrelation" value="<?php echo htmlentities($resul->dependentrelation); ?>" name="dependentrelation" type="text" autocomplete="off">
																</div>
															</div>
														</div>


														<div class="row">
															<div class="col m6">
																<div class="row">
																	<div class="input-field col m6 s12">
																		<label for="dependentage">Edad</label>
																		<input id="dependentage" value="<?php echo htmlentities($resul->dependentage); ?>" name="dependentage" type="text" autocomplete="off">
																	</div>
																</div>


															</div>
														</div>
														<div class="col m6">
															<div class="row">


																<div class="input-field col m6 s12">
																	<label for="dependentname2">Nombre</label>
																	<input id="dependentname2" value="<?php echo htmlentities($resul->dependentname2); ?>" name="dependentname2" type="text" autocomplete="off">
																</div>
																<div class="input-field col m6 s12">
																	<label for="dependentrelation2">Parentesco</label>
																	<input id="dependentrelation2" value="<?php echo htmlentities($resul->dependentrelation2); ?>" name="dependentrelation2" type="text" autocomplete="off">
																</div>
															</div>
														</div>


														<div class="row">
															<div class="col m6">
																<div class="row">


																	<div class="input-field col m6 s12">
																		<label for="dependentage2">Edad</label>
																		<input id="dependentage2" value="<?php echo htmlentities($resul->dependentage2); ?>" name="dependentage2" type="text" autocomplete="off">
																	</div>
																</div>


															</div>
														</div>

														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="dependentname3">Nombre</label>
																	<input id="dependentname3" value="<?php echo htmlentities($resul->dependentname3); ?>" name="dependentname3" type="text" autocomplete="off">
																</div>
																<div class="input-field col m6 s12">
																	<label for="dependentrelation3">Parentesco</label>
																	<input id="dependentrelation3" value="<?php echo htmlentities($resul->dependentrelation3); ?>" name="dependentrelation3" type="text" autocomplete="off">
																</div>
															</div>
														</div>


														<div class="row">
															<div class="col m6">
																<div class="row">


																	<div class="input-field col m6 s12">
																		<label for="dependentage3">Edad</label>
																		<input id="dependentage3" value="<?php echo htmlentities($resul->dependentage3); ?>" name="dependentage3" type="text" autocomplete="off">
																	</div>
																</div>


															</div>
														</div>
														<div class="col m6">
															<div class="row">


																<div class="input-field col m6 s12">
																	<label for="dependentname4">Nombre</label>
																	<input id="dependentname4" value="<?php echo htmlentities($resul->dependentname4); ?>" name="dependentname4" type="text" autocomplete="off">
																</div>
																<div class="input-field col m6 s12">
																	<label for="dependentrelation4">Parentesco</label>
																	<input id="dependentrelation4" value="<?php echo htmlentities($resul->dependentrelation4); ?>" name="dependentrelation4" type="text" autocomplete="off">
																</div>
															</div>
														</div>



														<div class="row">
															<div class="col m6">
																<div class="row">


																	<div class="input-field col m6 s12">
																		<label for="dependentage4">Edad</label>
																		<input id="dependentage4" value="<?php echo htmlentities($resul->dependentage4); ?>" name="dependentage4" type="text" autocomplete="off">
																	</div>
																</div>


															</div>
														</div>
														<div class="col m6">
															<div class="row">


																<div class="input-field col m6 s12">
																	<label for="dependentname5">Nombre</label>
																	<input id="dependentname5" value="<?php echo htmlentities($resul->dependentname5); ?>" name="dependentname5" type="text" autocomplete="off">
																</div>
																<div class="input-field col m6 s12">
																	<label for="dependentrelation5">Parentesco</label>
																	<input id="dependentrelation5" value="<?php echo htmlentities($resul->dependentrelation5); ?>" name="dependentrelation5" type="text" autocomplete="off">
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col m6">
																<div class="row">

																	<div class="input-field col m6 s12">
																		<label for="dependentage5">Edad</label>
																		<input id="dependentage5" value="<?php echo htmlentities($resul->dependentage5); ?>" name="dependentage5" type="text" autocomplete="off">
																	</div>
																</div>


															</div>
														</div>

													</div>


													<input type="button" align="center" name="next" class="next btn btn-info" value="siguiente" />

													</fieldset>
												</div>
												<fieldset>
													<h2> ESTUDIOS</h2>
													<hr style="border-color:black;">

													<h4> PRIMARIA</h4>
													<hr style="border-color:black;">
													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="primaryname">Nombre </label>
																	<input id="primaryname" value="<?php echo htmlentities($resul->primaryname); ?>" name="primaryname" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="primaryadress">Domicilio </label>
																	<input id="primaryadress" value="<?php echo htmlentities($resul->primaryadress); ?>" name="primaryadress" type="text">
																</div>
															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="primarydocument">Documento</label>
																	<input id="primarydocument" name="primarydocument" value="<?php echo htmlentities($resul->primarydocument); ?>" type="text">
																</div>
															</div>
														</div>
													</div>


													<h4> SECUNDARIA</h4>

													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="highschoolname">Nombre</label>
																	<input id="highschoolname" name="highschoolname" value="<?php echo htmlentities($resul->highschoolname); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="highschooladress">Domicilio </label>
																	<input id="highschooladress" name="highschooladress" value="<?php echo htmlentities($resul->highschooladress); ?>" type="text">
																</div>
															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="highschooldocument">Documento</label>
																	<input id="highschooldocument" name="highschooldocument" value="<?php echo htmlentities($resul->highschooldocument); ?>" type="text">
																</div>
															</div>
														</div>
													</div>


													<hr style="border-color:black;">
													<h4> PREPARATORIA</h4>
													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="schoolname">Nombre </label>
																	<input id="schoolname" name="schoolname" value="<?php echo htmlentities($resul->schoolname); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="schooladress">Domicilio </label>
																	<input id="chooladress" name="schooladress" value="<?php echo htmlentities($resul->schooladress); ?>" type="text">
																</div>
															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="schooldocument">Documento</label>
																	<input id="schooldocument" name="schooldocument" value="<?php echo htmlentities($resul->schooldocument); ?>" type="text">
																</div>
															</div>
														</div>
													</div>


													<hr style="border-color:black;">
													<h4> UNIVERSIDAD</h4>
													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="universityname">Nombre</label>
																	<input id="universityname" name="universityname" value="<?php echo htmlentities($resul->universityname); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="universityadress">Domicilio </label>
																	<input id="universityadress" name="universityadress" value="<?php echo htmlentities($resul->universityadress); ?>" type="text">
																</div>
															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="universitydocument">Documento</label>
																	<input id="universitydocument" name="universitydocument" value="<?php echo htmlentities($resul->universitydocument); ?>" type="text">
																</div>
															</div>
														</div>
													</div>

													<input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
													<input type="button" name="next" class="next btn btn-info" value="Siguiente" />

												</fieldset>
												<fieldset>
													<h2> REFERENCIAS LABORALES</h2>
													<hr style="border-color:black;">
													<h4> PRIMER REFERENCIA LABORAL</h4>
													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="companyname">Nombre de la empresa</label>
																	<input id="companyname" name="companyname" value="<?php echo htmlentities($resul->companyname); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="companyjob">Puesto</label>
																	<input id="companyjob" name="companyjob" value="<?php echo htmlentities($resul->companyjob); ?>" type="text">
																</div>

																<div class="input-field col m6 s12">
																	<label for="timework">Tiempo que laboro</label>
																	<input id="timework" name="timework" value="<?php echo htmlentities($resul->timework); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="companyphone">Telefono</label>
																	<input id="companyphone" name="companyphone" value="<?php echo htmlentities($resul->companyphone); ?>" maxlength="10" type="text">
																</div>

															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col  m6 s12">
																	<label for="companyadress">Dirección</label>
																	<input id="companyadress" name="companyadress" value="<?php echo htmlentities($resul->companyadress); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="reasonexit">Motivo de salida</label>
																	<input id="reasonexit" name="reasonexit" value="<?php echo htmlentities($resul->reasonexit); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="ingresomensual">Ingreso Mensual</label>
																	<input id="ingresomensual" name="ingresomensual" value="<?php echo htmlentities($resul->ingresomensual); ?>" type="text">
																</div>

															</div>
														</div>
													</div>
													<hr style="border-color:black;">
													<h4> SEGUNDA REFERENCIA LABORAL</h4>

													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="companyname2">Nombre de la empresa</label>
																	<input id="companyname2" name="companyname2" value="<?php echo htmlentities($resul->companyname2); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="companyjob2">Puesto</label>
																	<input id="companyjob2" name="companyjob2" value="<?php echo htmlentities($resul->companyjob2); ?>" type="text">
																</div>

																<div class="input-field col m6 s12">
																	<label for="timework2">Tiempo que laboro</label>
																	<input id="timework2" name="timework2" value="<?php echo htmlentities($resul->timework2); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="companyphone2">Telefono</label>
																	<input id="companyphone2" name="companyphone2" maxlength="10" value="<?php echo htmlentities($resul->companyphone2); ?>" type="text">
																</div>

															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col  m6 s12">
																	<label for="companyadress2">Dirección</label>
																	<input id="companyadress2" name="companyadress2" value="<?php echo htmlentities($resul->companyadress2); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="reasonexit2">Motivo de salida</label>
																	<input id="reasonexit2" name="reasonexit2" value="<?php echo htmlentities($resul->reasonexit2); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="ingresomensual2">Ingreso Mensual</label>
																	<input id="ingresomensual2" name="ingresomensual2" value="<?php echo htmlentities($resul->ingresomensual2); ?>" type="text">
																</div>

															</div>
														</div>
													</div>

													<hr style="border-color:black;">
													<h4> TERCERA REFERENCIA LABORAL</h4>

													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="companyname3">Nombre de la empresa</label>
																	<input id="companyname3" name="companyname3" value="<?php echo htmlentities($resul->companyname3); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="companyjob3">Puesto</label>
																	<input id="companyjob3" name="companyjob3" value="<?php echo htmlentities($resul->companyjob3); ?>" type="text">
																</div>

																<div class="input-field col m6 s12">
																	<label for="timework3">Tiempo que laboro</label>
																	<input id="timework3" name="timework3" value="<?php echo htmlentities($resul->timework3); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="companyphone3">Telefono</label>
																	<input id="companyphone3" name="companyphone3" maxlength="10" value="<?php echo htmlentities($resul->companyphone3); ?>" type="text">
																</div>

															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col  m6 s12">
																	<label for="companyadress3">Dirección</label>
																	<input id="companyadress3" name="companyadress3" value="<?php echo htmlentities($resul->companyadress3); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="reasonexit3">Motivo de salida</label>
																	<input id="reasonexit3" name="reasonexit3" value="<?php echo htmlentities($resul->reasonexit3); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="ingresomensual3">Ingreso Mensual</label>
																	<input id="ingresomensual3" name="ingresomensual3" value="<?php echo htmlentities($resul->ingresomensual3); ?>" type="text">
																</div>

															</div>
														</div>
													</div>


													<input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
													<input type="button" name="next" class="next btn btn-info" value="Siguiente" />
												</fieldset>



												<fieldset>
													<h2> REFERENCIAS FAMILIARES</h2>
													<hr style="border-color:black;">
													<h4> PRIMERA REFERENCIA FAMILIAR</h4>

													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="familyname">Nombre del familiar</label>
																	<input id="familyname" name="familyname" value="<?php echo htmlentities($resul->familyname); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="relationship">Parentesco</label>
																	<input id="relationship" name="relationship" value="<?php echo htmlentities($resul->relationship); ?>" type="text">
																</div>


															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="yearshim">Años de conocerlo</label>
																	<input id="yearshim" name="yearshim" value="<?php echo htmlentities($resul->yearshim); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="familyphone">Telefono</label>
																	<input id="familyphone" name="familyphone" maxlength="10" value="<?php echo htmlentities($resul->familyphone); ?>" type="tel">
																</div>

															</div>
														</div>
													</div>

													<hr style="border-color:black;">
													<h4> SEGUNDA REFERENCIA FAMILIAR</h4>

													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="familyname2">Nombre del familiar</label>
																	<input id="familyname2" name="familyname2" value="<?php echo htmlentities($resul->familyname2); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="relationship2">Parentesco</label>
																	<input id="relationship2" name="relationship2" value="<?php echo htmlentities($resul->relationship2); ?>" type="text">
																</div>


															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="yearshim2">Años de conocerlo</label>
																	<input id="yearshim2" name="yearshim2" value="<?php echo htmlentities($resul->yearshim2); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="familyphone2">Telefono</label>
																	<input id="familyphone2" name="familyphone2" maxlength="10" value="<?php echo htmlentities($resul->familyphone2); ?>" type="tel">
																</div>

															</div>
														</div>
													</div>
													<input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
													<input type="button" name="next" class="next btn btn-info" value="Siguiente" />
												</fieldset>


												<fieldset>
													<h2> REFERENCIAS PERSONALES</h2>
													<hr style="border-color:black;">
													<h4> PRIMERA REFERENCIA PERSONAL</h4>

													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="personalname">Nombre</label>
																	<input id="personalname" name="personalname" value="<?php echo htmlentities($resul->personalname); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="personalyears">Años de conocerlo</label>
																	<input id="personalyears" name="personalyears" value="<?php echo htmlentities($resul->personalyears); ?>" type="text">
																</div>



															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="personalphone">Telefono</label>
																	<input id="personalphone" name="personalphone" maxlength="10" value="<?php echo htmlentities($resul->personalphone); ?>" type="tel">
																</div>
																<div class="input-field col m6 s12">
																	<label for="personaladress">Direccion</label>
																	<input id="personaladress" name="personaladress" value="<?php echo htmlentities($resul->personaladress); ?>" type="text">
																</div>

															</div>
														</div>
													</div>

													<hr style="border-color:black;">
													<h4> SEGUNDA REFERENCIA PERSONAL</h4>

													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="personalname2">Nombre</label>
																	<input id="personalname2" name="personalname2" value="<?php echo htmlentities($resul->personalname2); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="personalyears2">Años de conocerlo</label>
																	<input id="personalyears2" name="personalyears2" value="<?php echo htmlentities($resul->personalyears2); ?>" type="text">
																</div>

															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="personalphone2">Telefono</label>
																	<input id="personalphone2" name="personalphone2" maxlength="10" value="<?php echo htmlentities($resul->personalphone2); ?>" type="tel">
																</div>
																<div class="input-field col m6 s12">
																	<label for="personaladress2">Direccion</label>
																	<input id="personaladress2" name="personaladress2" value="<?php echo htmlentities($resul->personaladress2); ?>" type="text">
																</div>

															</div>
														</div>
													</div>
													<input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
													<input type="button" name="next" class="next btn btn-info" value="Siguiente" />
												</fieldset>


												<fieldset>
													<h2>ESTUDIO SOCIOECONOMICO</h2>
													<hr style="border-color:black;">
													<h4> INGRESOS Y EGRESOS</h4>

													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="previous">Sueldo anterior</label>
																	<input id="previous" name="previous" value="<?php echo htmlentities($resul->previous); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="required">Sueldo requerido</label>
																	<input id="required" name="required" value="<?php echo htmlentities($resul->required); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="homex1">El hogar donde habita es:</label><br>
																	<input type="radio" id="homex1p" name="homex1" value="propio" <?php if (($resul->homex1) == 'propio') print "checked=true" ?>readonly> <label for="homex1p">Propio</label>
																	<input type="radio" id="homex1r" name="homex1" value="rentada" <?php if (($resul->homex1) == 'rentada') print "checked=true" ?>readonly> <label for="homex1r">Rentada</label>
																	<input type="radio" id="homex1o" name="homex1" value="otra" <?php if (($resul->homex1) == 'otra') print "checked=true" ?>readonly> <label for="homex1o">Otra</label>
																</div>
																<div class="input-field col m6 s12">
																	<label for="homex2">El hogar donde habita es:</label><br>
																	<input type="radio" id="homex2c" name="homex2" value="casa" <?php if (($resul->homex2) == 'casa') print "checked=true" ?> readonly> <label for="homex2c">Casa</label>
																	<input type="radio" id="homex2d" name="homex2" value="departamento" <?php if (($resul->homex2) == 'departamento') print "checked=true" ?>readonly> <label for="homex2d">Departamento</label>
																	<input type="radio" id="homex2o" name="homex2" value="otra" <?php if (($resul->homex2) == 'otra') print "checked=true" ?>readonly> <label for="homex2o">Otra</label>
																</div>


															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="offered">Sueldo ofertado</label>
																	<input id="offered" name="offered" value="<?php echo htmlentities($resul->offered); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="yearsliving">Tiempo de residir en su domicilio</label>
																	<input id="yearsliving" name="yearsliving" value="<?php echo htmlentities($resul->yearsliving); ?>" type="text">
																</div>

																<div class="input-field col m6 s12">
																	<label for="incomeextra">Ingresos extra</label>
																	<input id="incomeextra" name="incomeextra" value="<?php echo htmlentities($resul->incomeextra); ?>" type="text">
																</div>

																<div class="input-field col m6 s12">
																	<label for="incomedesc">Descripción</label>
																	<input id="incomedesc" name="incomedesc" value="<?php echo htmlentities($resul->incomedesc); ?>" type="text">
																</div>
															</div>
														</div>
													</div>

													<hr style="border-color:black;">
													<h4>CONCEPTO DE GASTOS Y/O APORTACION A LA FAMILIA</h4>

													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="debts">Deudas</label>
																	<input id="debts" name="debts" value="<?php echo htmlentities($resul->debts); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="debtscell">Celular</label>
																	<input id="debtscell" name="debtscell" value="<?php echo htmlentities($resul->debtscell); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="maintenance">Mantenimeinto del hogar</label>
																	<input id="maintenance" name="maintenance" value="<?php echo htmlentities($resul->maintenance); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="paymentschool">Pago de escuela</label>
																	<input id="paymentschool" name="paymentschool" value="<?php echo htmlentities($resul->paymentschool); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="otherexpenses">Otros gastos</label>
																	<input id="otherexpenses" name="otherexpenses" value="<?php echo htmlentities($resul->otherexpenses); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="overall">Total</label>
																	<input id="overall" name="overall" value="<?php echo htmlentities($resul->overall); ?>" type="text">
																	<span id="spTotal"></span>
																</div>



															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="pantry">Alimentos y despensa</label>
																	<input id="pantry" name="pantry" value="<?php echo htmlentities($resul->pantry); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="transport">Transporte y/o gasolina</label>
																	<input id="transport" name="transport" value="<?php echo htmlentities($resul->transport); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="medicalservices">Servicios médicos</label>
																	<input id="medicalservices" name="medicalservices" value="<?php echo htmlentities($resul->medicalservices); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="clothes">Ropa y calzado</label>
																	<input id="clothes" name="clothes" value="<?php echo htmlentities($resul->clothes); ?>" type="text">
																</div>

															</div>
														</div>
													</div>

													<hr style="border-color:black;">
													<hr style="border-color:black;">
													<h4>SELECCIONE LAS CARACTERISTICAS DE SU VIVIENDA Y LOS SERVICIOS CON LOS QUE CUENTA</h4>

													<div class="row">
														<div class="col m6">
															<div class="row">

																<?php
																//$opciones=explode( ',',$resul->articulo);
																//for ($i=0,$size=count($opciones);$i<$size;$i++)
																//  if(($opciones[$i])=='luz') print "checked=true"
																//echo $opciones[$i];
																//echo $opciones[1];
																//foreach ($opciones as $arr)

																//for ($i=0,$size=count($arr);$i<$size;$i++)
																//   echo"$arr[$i] <br />\n";


																?>




																<div class="input-field col m6 s12">
																	<input type="checkbox" id="stove" name="articulo[]" value="estufa" <?php
																																		$opciones = explode(',', $resul->articulo);
																																		for ($i = 0, $size = count($opciones); $i < $size; $i++)
																																			if (($opciones[$i]) == ' estufa' || ($opciones[$i]) == 'estufa') print "checked" ?>> <label for="stove">Estufa</label>
																</div>
																<div class="input-field col m6 s12">
																	<input type="checkbox" id="microwave" name="articulo[]" value="microondas" <?php
																																				$opciones = explode(',', $resul->articulo);
																																				for ($i = 0, $size = count($opciones); $i < $size; $i++)
																																					if (($opciones[$i]) == ' microondas' || ($opciones[$i]) == 'microondas') print "checked" ?>> <label for="microwave">Microondas</label>
																</div>
																<div class="input-field col m6 s12">
																	<input type="checkbox" id="computer" name="articulo[]" value="computadora" <?php
																																				$opciones = explode(',', $resul->articulo);
																																				for ($i = 0, $size = count($opciones); $i < $size; $i++)
																																					if (($opciones[$i]) == ' computadora' || ($opciones[$i]) == 'computadora') print "checked" ?>> <label for="computer">Computadora</label>
																</div>
																<div class="input-field col m6 s12">
																	<input type="checkbox" id="stereo" name="articulo[]" value="estereo" <?php
																																			$opciones = explode(',', $resul->articulo);
																																			for ($i = 0, $size = count($opciones); $i < $size; $i++)
																																				if (($opciones[$i]) == 'estereo' || ($opciones[$i]) == ' estereo') print "checked" ?>> <label for="stereo">Estéreo</label>
																</div>
																<div class="input-field col m6 s12">
																	<input type="checkbox" id="light" name="articulo[]" value="luz" <?php
																																	$opciones = explode(',', $resul->articulo);
																																	for ($i = 0, $size = count($opciones); $i < $size; $i++)
																																		if (($opciones[$i]) == ' luz' || ($opciones[$i]) == 'luz') print "checked" ?>> <label for="light">Luz</label>
																</div>
																<div class="input-field col m6 s12">
																	<input type="checkbox" id="internet" name="articulo[]" value="internet" <?php
																																			$opciones = explode(',', $resul->articulo);
																																			for ($i = 0, $size = count($opciones); $i < $size; $i++)
																																				if (($opciones[$i]) == ' internet' || ($opciones[$i]) == 'internet') print "checked" ?>> <label for="internet">Internet</label>
																</div>



															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<input type="checkbox" id="fridge" name="articulo[]" value="refrigerador" <?php
																																				$opciones = explode(',', $resul->articulo);
																																				for ($i = 0, $size = count($opciones); $i < $size; $i++)
																																					if (($opciones[$i]) == ' refrigerador' || ($opciones[$i]) == 'refrigerador') print "checked" ?>> <label for="fridge">Refrigerador</label>
																</div>
																<div class="input-field col m6 s12">
																	<input type="checkbox" id="washing" name="articulo[]" value="lavadora" <?php
																																			$opciones = explode(',', $resul->articulo);
																																			for ($i = 0, $size = count($opciones); $i < $size; $i++)
																																				if (($opciones[$i]) == ' lavadora' || ($opciones[$i]) == 'lavadora') print "checked" ?>> <label for="washing">Lavadora</label>
																</div>
																<div class="input-field col m6 s12">
																	<input type="checkbox" id="tv" name="articulo[]" value="televisor" <?php
																																		$opciones = explode(',', $resul->articulo);
																																		for ($i = 0, $size = count($opciones); $i < $size; $i++)
																																			if (($opciones[$i]) == ' televisor' || ($opciones[$i]) == 'televisor') print "checked" ?>> <label for="tv">Televisor</label>
																</div>
																<div class="input-field col m6 s12">
																	<input type="checkbox" id="paytv" name="articulo[]" value="T.v de paga" <?php
																																			$opciones = explode(',', $resul->articulo);
																																			for ($i = 0, $size = count($opciones); $i < $size; $i++)
																																				if (($opciones[$i]) == ' T.v de paga' || ($opciones[$i]) == 'T.v de paga') print "checked" ?>> <label for="paytv">Servicio de T.V. de paga</label>
																</div>
																<div class="input-field col m6 s12">
																	<input type="checkbox" id="aqua" name="articulo[]" value="agua" <?php
																																	$opciones = explode(',', $resul->articulo);
																																	for ($i = 0, $size = count($opciones); $i < $size; $i++)
																																		if (($opciones[$i]) == ' agua' || ($opciones[$i]) == 'agua') print "checked" ?>> <label for="aqua">Agua</label>
																</div>
																<div class="input-field col m6 s12">
																	<input type="checkbox" id="phoneeco" name="articulo[]" value="telefono" <?php
																																			$opciones = explode(',', $resul->articulo);
																																			for ($i = 0, $size = count($opciones); $i < $size; $i++)
																																				if (($opciones[$i]) == ' telefono' || ($opciones[$i]) == 'telefono') print "checked" ?>> <label for="phoneeco">Teléfono</label>
																</div>
															</div>
														</div>
													</div>



													<input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
													<input type="button" name="next" class="next btn btn-info" value="Siguiente" />
												</fieldset>
												<fieldset>
													<h2>INFORME MEDICO</h2>
													<hr style="border-color:black;">
													<div class="row">
														<div class="col m6">
															<div class="row">

																<div class="input-field col m6 s12">
																	<label for="glasses">Usa anteojos:</label><br>
																	<input type="radio" id="glassess" name="glasses" value="si" <?php if (($resul->glasses) == 'si') print "checked=true" ?> class="test"> <label for="glassess">Si</label>
																	<input type="radio" id="glassesn" name="glasses" value="no" <?php if (($resul->glasses) == 'no') print "checked=true" ?> class="test"> <label for="glassesn" class="only-one">No</label>
																</div>

																<div class="input-field col  s12">
																	<label for="chronic">Enfermedades crónicas:</label><br>
																	<input type="radio" id="chronics" name="chronic" value="si" <?php if (($resul->chronic) == 'si') print "checked=true" ?>class="check"> <label for="chronics">Si</label>
																	<input type="radio" id="chronicn" name="chronic" value="no" <?php if (($resul->chronic) == 'no') print "checked=true" ?>> <label for="chronicn" class="check">No</label>
																</div>

																<div class="input-field col  s12">
																	<label for="operation">Operaciones practicadas:</label><br><br>
																	<input type="radio" id="operations" name="operation" value="si" <?php if (($resul->operation) == 'si') print "checked=true" ?>> <label for="operations">Si</label>
																	<input type="radio" id="operationn" name="operation" value="no" <?php if (($resul->operation) == 'no') print "checked=true" ?>> <label for="operationn">No</label>
																</div>



																<div class="input-field col  s12">
																	<label for="enervants">Consume algún enervante:</label><br><br>
																	<input type="radio" id="enervantss" name="enervants" value="si" class="check" <?php if (($resul->enervants) == 'si') print "checked=true" ?>> <label for="enervantss">Si</label>
																	<input type="radio" id="enervantsn" name="enervants" value="no" class="check" <?php if (($resul->enervants) == 'no') print "checked=true" ?>> <label for="enervantsn">No</label>
																</div>
																<div class="input-field col  s12">
																	<label for="incapacitado">En los últimos 5 años se ha incapacitado:</label><br><br>
																	<input type="radio" id="incapacitados" name="incapacitado" value="si" class="check" <?php if (($resul->incapacitado) == 'si') print "checked=true" ?>> <label for="incapacitados">Si</label>
																	<input type="radio" id="incapacitadon" name="incapacitado" value="no" class="check" <?php if (($resul->incapacitado) == 'no') print "checked=true" ?>> <label for="incapacitadon">No</label>
																</div>




															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6   s12"><br>
																	<label for="glasses2">¿Cuál es el diagnóstico?</label>
																	<input id="glasses2" name="glasses2" value="<?php echo htmlentities($resul->glasses2); ?>" type="text">
																</div>

																<div class="input-field col   s12">
																	<label for="chronic2">¿Cuál?</label>
																	<input id="chronic2" name="chronic2" value="<?php echo htmlentities($resul->chronic2); ?>" type="text">
																</div>

																<div class="input-field col    s12">
																	<label for="operation2">¿Cuál?</label>
																	<input id="operation2" name="operation2" value="<?php echo htmlentities($resul->operation2); ?>" type="text">
																</div>

																<div class="input-field col   s12">
																	<label for="enervants2">¿Cuál?</label>
																	<input id="enervants2" name="enervants2" value="<?php echo htmlentities($resul->enervants2); ?>" type="text">
																</div>
																<div class="input-field col   s12">
																	<label for="incapacitado2">¿Por qué?</label>
																	<input id="incapacitado2" name="incapacitado2" value="<?php echo htmlentities($resul->incapacitado2); ?>" type="text">
																</div>

															</div>
														</div>
													</div>

													<input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
													<input type="button" name="next" class="next btn btn-info" value="Siguiente" />
												</fieldset>



												<fieldset>
													<h2>INFORMACION ADICIONAL</h2>
													<hr style="border-color:black;">

													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="activities">Actividades en su tiempo libre</label>
																	<input id="activities" name="activities" value="<?php echo htmlentities($resul->activities); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="people">Con quien convive en su tiempo libre</label>
																	<input id="people" name="people" value="<?php echo htmlentities($resul->people); ?>" type="text">
																</div>

																<div class="input-field col s12">
																	<label for="sport">¿Practica algún deporte?</label><br><br><br>
																	<input type="radio" id="sports" name="sport" value="si" class="check" <?php if (($resul->sport) == 'si') print "checked=true" ?>> <label for="sports">Si</label>
																	<input type="radio" id="sportn" name="sport" value="no" class="check" <?php if (($resul->sport) == 'no') print "checked=true" ?>> <label for="sportn">No</label>
																</div>

																<div class="input-field col  s12">
																	<label for="politic">¿Pertenece o ha pertenecido a un partido político?</label><br><br><br>
																	<input type="radio" id="politics" name="politic" value="si" class="check" <?php if (($resul->politic) == 'si') print "checked=true" ?>> <label for="politics">Si</label>
																	<input type="radio" id="politicn" name="politic" value="no" class="check" <?php if (($resul->politic) == 'no') print "checked=true" ?>> <label for="politicn">No</label>
																</div>



																<div class="input-field col s12">
																	<label for="syndicate">¿Pertenece o ha pertenecido a un sindicato?</label><br><br><br>
																	<input type="radio" id="syndicates" name="syndicate" value="si" class="check" <?php if (($resul->syndicate) == 'si') print "checked=true" ?>> <label for="syndicates">Si</label>
																	<input type="radio" id="syndicaten" name="syndicate" value="no" class="check" <?php if (($resul->syndicate) == 'no') print "checked=true" ?>> <label for="syndicaten">No</label>
																</div>




																<div class="input-field col  s12">
																	<label for="conciliation">¿Ah acudido a conciliación y arbitraje?</label><br><br><br>
																	<input type="radio" id="conciliations" name="conciliation" value="si" class="check" <?php if (($resul->conciliation) == 'si') print "checked=true" ?>> <label for="conciliations">Si</label>
																	<input type="radio" id="conciliationn" name="conciliation" value="no" class="check" <?php if (($resul->conciliation) == 'no') print "checked=true" ?>> <label for="conciliationn">No</label>
																</div>
															</div>
														</div>

														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="valuesperson">Tres valores más importantes</label>
																	<input id="valuesperson" name="valuesperson" value="<?php echo htmlentities($resul->valueperson); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="defect">Tres defectos que más le generan conflicto</label>
																	<input id="defect" name="defect" value="<?php echo htmlentities($resul->defect); ?>" type="text">
																</div>

																<div class="input-field col  s12">
																	<label for="sport2">¿Cuál?</label>
																	<input id="sport2" name="sport2" value="<?php echo htmlentities($resul->sport2); ?>" type="text">
																</div>

																<div class="input-field col  s12">
																	<label for="politic2">¿Cuál?</label>
																	<input id="politic2" name="politic2" value="<?php echo htmlentities($resul->politic2); ?>" type="text">
																</div>

																<div class="input-field col  s12">
																	<label for="syndicate2">¿Cuál?</label>
																	<input id="syndicate2" name="syndicate2" value="<?php echo htmlentities($resul->syndicate2); ?>" type="text">
																</div>
																<div class="input-field col  s12">
																	<label for="conciliation2">¿Cuál?</label>
																	<input id="conciliation2" name="conciliation2" value="<?php echo htmlentities($resul->conciliation2); ?>" type="text">
																</div>

															</div>
														</div>
													</div>

													<h4>MARQUE LAS OPCIONES QUE LE CARACTERIZAN FISICAMENTE</h4>
													<hr style="border-color:black;">

													<div class="row">
														<div class="col m6">
															<div class="row">

																<div class="input-field col  s12">
																	<label for="face">Forma de cara</label><br>
																	<input type="radio" id="facer" name="face" value="redonda" class="check" <?php if (($resul->face) == 'redonda') print "checked=true" ?>readonly> <label for="facer">Redonda</label>
																	<input type="radio" id="faceo" name="face" value="ovalada" class="check" <?php if (($resul->face) == 'ovalada') print "checked=true" ?>readonly> <label for="faceo">Ovalada</label>
																	<input type="radio" id="facec" name="face" value="cuadrada" class="check" <?php if (($resul->face) == 'cuadrada') print "checked=true" ?>readonly> <label for="facec">Cuadrada</label>
																</div>

																<div class="input-field col s12">
																	<label for="skincolor">Color de piel</label><br>
																	<input type="radio" id="skincolorb" name="skincolor" value="blanca" class="check" <?php if (($resul->skincolor) == 'blanca') print "checked=true" ?>> <label for="skincolorb">Blanca</label>
																	<input type="radio" id="skincolort" name="skincolor" value="trigueña" class="check" <?php if (($resul->skincolor) == 'trigueña') print "checked=true" ?>> <label for="skincolort">Trigueña</label>
																	<input type="radio" id="skincolorm" name="skincolor" value="mulata" class="check" <?php if (($resul->skincolor) == 'mulata') print "checked=true" ?>> <label for="skincolorm">Mulata</label>
																</div>



																<div class="input-field col  s12">
																	<label for="haircolor">Color de cabello</label><br>
																	<input type="radio" id="haircolorcc" name="haircolor" value="castaño claro" class="check" <?php if (($resul->haircolor) == 'castaño claro') print "checked=true" ?>> <label for="haircolorcc">Castaño claro</label>
																	<input type="radio" id="haircolorco" name="haircolor" value="castaño obscuro" class="check" <?php if (($resul->haircolor) == 'castaño obscuro') print "checked=true" ?>> <label for="haircolorco">Castaño obscuro</label>
																	<input type="radio" id="haircolort" name="haircolor" value="teñido" class="check" <?php if (($resul->haircolor) == 'teñido') print "checked=true" ?>> <label for="haircolort">Teñido</label>
																</div>

																<hr style="border-color:black;">

																<div class="input-field col m6 s12">
																	<label for="tattoo">Tatuajes</label><br>
																	<input type="radio" id="tattoos" name="tattoo" value="si" class="check" <?php if (($resul->tattoo) == 'si') print "checked=true" ?>> <label for="tattoos">Si</label>
																	<input type="radio" id="tattoon" name="tattoo" value="no" class="check" <?php if (($resul->tattoo) == 'no') print "checked=true" ?>> <label for="tattoon">No</label>
																</div>

																<div class="input-field col m6 s12"><br>
																	<label for="tattoo2">¿Dónde?</label>
																	<input id="tattoo2" name="tattoo2" value="<?php echo htmlentities($resul->tattoo2); ?>" type="text">
																</div>

																<div class="input-field col m6 s12">
																	<label for="piercing">Perforaciones</label><br>
																	<input type="radio" id="piercings" name="piercing" value="si" class="check" <?php if (($resul->piercing) == 'si') print "checked=true" ?>> <label for="piercings">Si</label>
																	<input type="radio" id="piercingn" name="piercing" value="no" class="check" <?php if (($resul->piercing) == 'no') print "checked=true" ?>> <label for="piercingn" class="check">No</label>
																</div>

																<div class="input-field col m6 s12"><br>
																	<label for="piercing2">¿Dónde?</label>
																	<input id="piercing2" name="piercing2" value="<?php echo htmlentities($resul->piercing2); ?>" type="text">
																</div>

																<div class="input-field col m6 s12">
																	<label for="observations">Observaciones</label>
																	<input id="observations" name="observations" value="<?php echo htmlentities($resul->observations); ?>" type="text">
																</div>

																<div class="input-field col m6 s12">
																	<label for="weight">Peso</label>
																	<input id="weight" name="weight" value="<?php echo htmlentities($resul->weight); ?>" type="text">
																</div>


															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col  s12">
																	<label for="eyecolor">Color de ojos</label><br>
																	<input type="radio" id="eyecolorco" name="eyecolor" value="cafe obscuro" class="check" <?php if (($resul->eyecolor) == 'cafe obscuro') print "checked=true" ?>> <label for="eyecolorco">Café obscuro</label>
																	<input type="radio" id="eyecolorcocc" name="eyecolor" value="cafe claro" class="check" <?php if (($resul->eyecolor) == 'cafe claro') print "checked=true" ?>> <label for="eyecolorcocc">Café claro</label>
																	<input type="radio" id="eyecolorcoc" name="eyecolor" value="color" class="check" <?php if (($resul->eyecolor) == 'color') print "checked=true" ?>> <label for="eyecolorcoc">Color</label>
																</div>

																<div class="input-field col  s12">
																	<label for="kindeyes">Tipo de ojos</label><br>
																	<input type="radio" id="kindeyesg" name="kindeyes" value="grandes" class="check" <?php if (($resul->kindeyes) == 'grandes') print "checked=true" ?>> <label for="kindeyesg">Grandes</label>
																	<input type="radio" id="kindeyesp" name="kindeyes" value="pequeños" class="check" <?php if (($resul->kindeyes) == 'pequeños') print "checked=true" ?>> <label for="kindeyesp">Pequeños</label>
																	<input type="radio" id="kindeyesr" name="kindeyes" value="rasgados" class="check" <?php if (($resul->kindeyes) == 'rasgados') print "checked=true" ?>> <label for="kindeyesr">Rasgados</label>
																</div>
																<div class="input-field col s12">
																	<label for="complexion">Complexión</label><br>
																	<input type="radio" id="complexiong" name="complexion" value="gruesa" class="check" <?php if (($resul->complexion) == 'gruesa') print "checked=true" ?>> <label for="complexiong">Gruesa</label>
																	<input type="radio" id="complexionm" name="complexion" value="mediana" class="check" <?php if (($resul->complexion) == 'mediana') print "checked=true" ?>> <label for="complexionm">Mediana</label>
																	<input type="radio" id="complexiond" name="complexion" value="delgada" class="check" <?php if (($resul->complexion) == 'delgada') print "checked=true" ?>> <label for="complexiond">Delgada</label>
																</div>

																<div class="input-field col  s12"><br>
																	<label for="tattoo3">Tamaño</label>
																	<input id="tattoo3" name="tattoo3" value="<?php echo htmlentities($resul->tattoo3); ?>" type="text">
																</div>

																<div class="input-field col  s12"><br>
																	<label for="piercing3">¿Cuántas?</label>
																	<input id="piercing3" name="piercing3" value="<?php echo htmlentities($resul->piercing3); ?>" type="text">
																</div>
																<div class="input-field col m6 s12">
																	<label for="stature">Estatura</label>
																	<input id="stature" name="stature" value="<?php echo htmlentities($resul->stature); ?>" type="text">
																</div>

																<div class="input-field col m6 s12">
																	<label for="typeblood">Tipo de sangre</label>
																	<input id="typeblood" name="typeblood" value="<?php echo htmlentities($resul->typeblood); ?>" type="text">
																</div>

															</div>
														</div>

													</div>
													<h4>DATOS BANCARIOS</h4>
													<hr style="border-color:black;">
													<div class="row">
														<div class="col m6">
															<div class="row">



																<div class="input-field col m6 s12">
																	<label for="banco">BANCO</label>
																	<input id="banco" name="banco" value="<?php echo htmlentities($resul->banco); ?>" type="text">
																</div>

																<div class="input-field col  m6 s12">
																	<label for="nocuenta">No. Cuenta</label>
																	<input id="nocuenta" name="nocuenta" value="<?php echo htmlentities($resul->nocuenta); ?>" type="text">
																</div>

																<div class="input-field col M6 s12">
																	<label for="fechaingreso">Fecha de ingreso</label><br>

																	<input id="fechaingreso" name="fechaingreso" value="<?php echo htmlentities($resul->fechaingreso); ?>" tabindex="25" type="date" autocomplete="off">
																</div>

																<div class="input-field col M6 s12">
																	<label for="fechacapacitacion">Fecha de capacitación</label><br>

																	<input id="fechacapacitacion" name="fechacapacitacion" value="<?php echo htmlentities($resul->fechacapacitacion); ?>" tabindex="25" type="date" autocomplete="off">
																</div>



															</div>
														</div>
														<div class="col m6">
															<div class="row">





																<div class="input-field col m6 s12">
																	<label for="clabeint">Clabe Interbancaria</label>
																	<input id="clabeint" value="<?php echo htmlentities($resul->clabeint); ?>" name="clabeint" type="text">
																</div>
																<div class="input-field col  m6 s12">
																	<label for="sueldonet">Sueldo Neto Mensual</label>
																	<input id="sueldonet" value="<?php echo htmlentities($resul->sueldonet); ?>" name="sueldonet" type="text">
																</div>

																<div class="input-field col  m6 s12">
																	<label for="sueldodiario">Sueldo diario integrado</label>
																	<input id="sueldodiario" value="<?php echo htmlentities($resul->sueldodiario); ?>" name="sueldodiario" type="text">
																</div>



															</div>
														</div>
													</div>
											<?php }
									} ?>
											<input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
											<button type="submit" name="update" onclick="return valid();" id="update" class="waves-effect waves-light btn indigo m-b-xs">ACTUALIZAR</button>


												</fieldset>


											</section>



										</div>
									</form>
								</div>
							</div>
						</div>
			</div>
		</main>

		<div class="left-sidebar-hover"></div>

		<!-- Javascripts -->
		<script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
		<script src="../assets/plugins/materialize/js/materialize.min.js"></script>
		<script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
		<script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
		<script src="../assets/js/alpha.min.js"></script>


		<script type="text/javascript">
			$(function() {

				function funcion1() {
					document.getElementById("glasses2").disabled = false;
					//document.getElementById("glasses3").disabled=false;
					//document.getElementById("glasses4").disabled=false;

				}

				function funcion2() {
					document.getElementById("glasses2").disabled = true;
					//document.getElementById("glasses3").disabled=true;
					//document.getElementById("glasses4").disabled=true;


				}

				function funcion3() {
					// habilitamos
					document.getElementById("tattoo2").disabled = false;
					document.getElementById("tattoo3").disabled = false;


				}

				function funcion4() {
					// deshabilitamos
					document.getElementById("tattoo2").disabled = true;
					document.getElementById("tattoo3").disabled = true;
					$tattoo2 = 'null';
					$tattoo3 = 'null';
				}

				function funcion5() {
					// habilitamos
					document.getElementById("piercing2").disabled = false;
					document.getElementById("piercing3").disabled = false;
				}

				function funcion6() {
					// deshabilitamos
					document.getElementById("piercing2").disabled = true;
					document.getElementById("piercing3").disabled = true;
					$piercing2 = 'null';
					$piercing3 = 'null';
				}

				function funcion7() {
					// habilitamos
					document.getElementById("chronic2").disabled = false;
				}

				function funcion8() {
					// deshabilitamos
					document.getElementById("chronic2").disabled = true;
					$chronic = 'null';
				}

				function funcion9() {

					// habilitamos
					document.getElementById("operation2").disabled = false;

				}

				function funcion10() {
					// deshabilitamos
					document.getElementById("operation2").disabled = true;
					$operation2 = 'null';
				}


				function funcion11() {

					// habilitamos
					document.getElementById("enervants2").disabled = false;

				}

				function funcion12() {

					// deshabilitamos
					document.getElementById("enervants2").disabled = true;
					$enervants2 = 'null';
				}

				function funcion13() {

					// habilitamos
					document.getElementById("sport2").disabled = false;

				}

				function funcion14() {

					// deshabilitamos
					document.getElementById("sport2").disabled = true;
					$sport2 = 'null';
				}

				function funcion15() {

					// habilitamos
					document.getElementById("politic2").disabled = false;

				}

				function funcion16() {

					// deshabilitamos
					document.getElementById("politic2").disabled = true;
					$politic2 = 'null';
				}

				function funcion17() {

					// habilitamos
					document.getElementById("syndicate2").disabled = false;

				}

				function funcion18() {

					// deshabilitamos
					document.getElementById("syndicate2").disabled = true;
					$syndicate2 = 'null';
				}

				function funcion19() {

					// habilitamos
					document.getElementById("conciliation2").disabled = false;

				}

				function funcion20() {

					// deshabilitamos
					document.getElementById("conciliation2").disabled = true;
					$conciliation2 = 'null';
				}

				function funcion21() {

					// habilitamos
					document.getElementById("incapacitado2").disabled = false;

				}

				function funcion22() {

					// deshabilitamos
					document.getElementById("incapacitado2").disabled = true;
					$incapacitado2 = 'null';
				}


				// Ejemplo 1
				$('input[id="glassess"]').on('change', this, function() {
					funcion1();
				});
				// Ejemplo 1
				$('input[id="glassesn"]').on('change', this, function() {
					funcion2();
				});

				// Ejemplo 2
				$('input[id="tattoos"]').on('change', this, function() {
					funcion3();
				});
				// Ejemplo 2
				$('input[id="tattoon"]').on('change', this, function() {
					funcion4();
				});
				// Ejemplo 3
				$('input[id="piercings"]').on('change', this, function() {
					funcion5();
				});
				// Ejemplo 3
				$('input[id="piercingn"]').on('change', this, function() {
					funcion6();
				});
				// Ejemplo 4
				$('input[id="chronics"]').on('change', this, function() {
					funcion7();
				});
				// Ejemplo 4
				$('input[id="chronicn"]').on('change', this, function() {
					funcion8();
				});

				// Ejemplo 5
				$('input[id="operations"]').on('change', this, function() {
					funcion9();
				});
				// Ejemplo 5
				$('input[id="operationn"]').on('change', this, function() {
					funcion10();
				});
				// Ejemplo 6
				$('input[id="enervantss"]').on('change', this, function() {
					funcion11();
				});
				// Ejemplo 6
				$('input[id="enervantsn"]').on('change', this, function() {
					funcion12();
				});
				// Ejemplo 7
				$('input[id="sports"]').on('change', this, function() {
					funcion13();
				});
				// Ejemplo 7
				$('input[id="sportn"]').on('change', this, function() {
					funcion14();
				});
				// Ejemplo 8
				$('input[id="politics"]').on('change', this, function() {
					funcion15();
				});
				// Ejemplo 8
				$('input[id="politicn"]').on('change', this, function() {
					funcion16();
				});

				// Ejemplo 9
				$('input[id="syndicates"]').on('change', this, function() {
					funcion17();
				});
				// Ejemplo 9
				$('input[id="syndicaten"]').on('change', this, function() {
					funcion18();
				});

				// Ejemplo 10
				$('input[id="conciliations"]').on('change', this, function() {
					funcion19();
				});
				// Ejemplo 10
				$('input[id="conciliationn"]').on('change', this, function() {
					funcion20();
				});
				// Ejemplo 11
				$('input[id="incapacitados"]').on('change', this, function() {
					funcion21();
				});
				// Ejemplo 11
				$('input[id="incapacitadon"]').on('change', this, function() {
					funcion22();
				});
			});


			$(document).ready(function() {
				var current = 1,
					current_step, next_step, steps;
				steps = $("fieldset").length;
				$(".next").click(function() {
					current_step = $(this).parent();
					next_step = $(this).parent().next();
					next_step.show();
					current_step.hide();
					setProgressBar(++current);
				});
				$(".previous").click(function() {
					current_step = $(this).parent();
					next_step = $(this).parent().prev();
					next_step.show();
					current_step.hide();
					setProgressBar(--current);
				});
				setProgressBar(current);
				// Change progress bar action
				function setProgressBar(curStep) {
					var percent = parseFloat(100 / steps) * curStep;
					percent = percent.toFixed();
					$(".progress-bar")
						.css("width", percent + "%")
						.html(percent + "%");


				}
			});
		</script>
	</body>

	</html>
<?php } ?>