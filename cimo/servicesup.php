<?php
session_start();

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
//error_reporting(E_ALL);
 
// Motrar todos los errores de PHP
//ini_set('error_reporting', E_ALL);

include('../includes/config.php');
if(strlen($_SESSION['supervisor'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
 
$invoice=$_POST['invoice'];
$date=$_POST['date'];
$deliverytime=$_POST['deliverytime'];
$supervisordelivers=substr($_POST['supervisordelivers'],6);
$supervisorreceiving=substr($_POST['supervisorreceiving'],6);
$mountedservice=$_POST['mountedservice'];    
$news=$_POST['news']; 
if (isset($_POST['add'])) {
    if (is_array($_POST['annexed'])) {
        $selected = '';
        $num_countries = count($_POST['annexed']);
        $current = 0;
        foreach ($_POST['annexed'] as $key => $value) {
            if ($current != $num_countries-1)
                $selected .= $value.',';
            else
                $selected .= $value.'';
            $current++;
        }
    }
} //var_dump($selected);
$mountedservice2=$_POST['mountedservice2'];    
$news2=$_POST['news2']; 
if (isset($_POST['add'])) {
    if (is_array($_POST['annexed2'])) {
        $selected2 = '';
        $num_countries = count($_POST['annexed2']);
        $current = 0;
        foreach ($_POST['annexed2'] as $key => $value) {
            if ($current != $num_countries-1)
                $selected2 .= $value.',';
            else
                $selected2 .= $value.'';
            $current++;
        }
    }
} 
$mountedservice3=$_POST['mountedservice3'];    
$news3=$_POST['news3']; 
if (isset($_POST['add'])) {
    if (is_array($_POST['annexed3'])) {
        $selected3 = '';
        $num_countries = count($_POST['annexed3']);
        $current = 0;
        foreach ($_POST['annexed3'] as $key => $value) {
            if ($current != $num_countries-1)
                $selected3 .= $value.',';
            else
                $selected3 .= $value.'';
            $current++;
        }
    }
} 
   // var_dump($selected3);
$mountedservice4=$_POST['mountedservice4'];    
$news4=$_POST['news4']; 
if (isset($_POST['add'])) {
    if (is_array($_POST['annexed4'])) {
        $selected4 = '';
        $num_countries = count($_POST['annexed4']);
        $current = 0;
        foreach ($_POST['annexed4'] as $key => $value) {
            if ($current != $num_countries-1)
                $selected4 .= $value.',';
            else
                $selected4 .= $value.'';
            $current++;
        }
    }
}     
$departuretime=$_POST['departuretime'];
$img = $_POST['base64'];
$img = str_replace('data:image/png;base64,', '', $img);
$fileData = base64_decode($img);
$fileName = uniqid().'.png';
$fecha  = date("dmy");
$no_aleatorio  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta = '../supervisores/firmas/'.$fecha.$no_aleatorio.$fileName;//foto medio cuerpo
opendir($ruta);
//copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
$contract=$ruta;    
file_put_contents($ruta, $fileData);    
    
$img1 = $_POST['base641'];
$img1 = str_replace('data:image/png;base64,', '', $img1);
$fileData1 = base64_decode($img1);
$fileName1 = uniqid().'.png';
    
$fecha1  = date("dmy");
$no_aleatorio1  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta1 = '../supervisores/firmas/'.$fecha1.$no_aleatorio1.$fileName1;//foto medio cuerpo
opendir($ruta1);
//copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
$contract1=$ruta1;    
file_put_contents($ruta1, $fileData1);
    
$img2 = $_POST['base642'];
$img2 = str_replace('data:image/png;base64,', '', $img2);
$fileData2 = base64_decode($img2);
$fileName2 = uniqid().'.png';
$fecha2  = date("dmy");
$no_aleatorio2  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta2 = '../supervisores/firmas/'.$fecha2.$no_aleatorio2.$fileName2;//foto medio cuerpo
opendir($ruta2);
//copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
$contract2=$ruta2;    
file_put_contents($ruta2, $fileData2);  
$zone=$_POST['zone'];    
$zone2=$_POST['zone2'];    
$zone3=$_POST['zone3']; 
$zone4=$_POST['zone4'];     
$creatoruser=$_SESSION['supervisor'];
$action='inserción';
$turn=$_POST['turn'];
$turn2=$_POST['turn2'];    
$status=1;    
 
 
$sql="INSERT INTO tblservicedelivery(invoice,date,deliverytime,supervisordelivers,supervisorreceiving,mountedservice,news,annexed,mountedservice2,news2,annexed2,mountedservice3,news3,annexed3,mountedservice4,news4,annexed4,departuretime,firm1,firm2,firm3,creatoruser,action,zone,zone2,zone3,zone4,turn,turn2,status) VALUES(:invoice,:date,:deliverytime,:supervisordelivers,:supervisorreceiving,:mountedservice,:news,:selected,:mountedservice2,:news2,:selected2,:mountedservice3,:news3,:selected3,:mountedservice4,:news4,:selected4,:departuretime,:contract,:contract1,:contract2,:creatoruser,:action,:zone,:zone2,:zone3,:zone4,:turn,:turn2,:status)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':invoice',$invoice,PDO::PARAM_STR);
    $query->bindParam(':date',$date,PDO::PARAM_STR);    
    $query->bindParam(':deliverytime',$deliverytime,PDO::PARAM_STR);
    $query->bindParam(':supervisordelivers',$supervisordelivers,PDO::PARAM_STR);
    $query->bindParam(':supervisorreceiving',$supervisorreceiving,PDO::PARAM_STR);
    $query->bindParam(':mountedservice',$mountedservice,PDO::PARAM_STR);
    $query->bindParam(':news',$news,PDO::PARAM_STR);
    $query->bindParam(':selected',$selected,PDO::PARAM_STR);
    $query->bindParam(':mountedservice2',$mountedservice2,PDO::PARAM_STR);
    $query->bindParam(':news2',$news2,PDO::PARAM_STR);
    $query->bindParam(':selected2',$selected2,PDO::PARAM_STR);
    $query->bindParam(':mountedservice3',$mountedservice3,PDO::PARAM_STR);
    $query->bindParam(':news3',$news3,PDO::PARAM_STR);
    $query->bindParam(':selected3',$selected3,PDO::PARAM_STR);
    $query->bindParam(':mountedservice4',$mountedservice4,PDO::PARAM_STR);
    $query->bindParam(':news4',$news4,PDO::PARAM_STR);
    $query->bindParam(':selected4',$selected4,PDO::PARAM_STR);
    $query->bindParam(':departuretime',$departuretime,PDO::PARAM_STR);
    $query->bindParam(':contract',$contract,PDO::PARAM_STR);
    $query->bindParam(':contract1',$contract1,PDO::PARAM_STR);
    $query->bindParam(':contract2',$contract2,PDO::PARAM_STR);
    $query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);
    $query->bindParam(':action',$action,PDO::PARAM_STR);
    $query->bindParam(':zone',$zone,PDO::PARAM_STR);
    $query->bindParam(':zone2',$zone2,PDO::PARAM_STR);
    $query->bindParam(':zone3',$zone3,PDO::PARAM_STR);
    $query->bindParam(':zone4',$zone4,PDO::PARAM_STR);
    $query->bindParam(':turn',$turn,PDO::PARAM_STR);
    $query->bindParam(':turn2',$turn2,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    
$query->execute();
 
$lastInsertId = $dbh->lastInsertId();
       
if($lastInsertId)
{

$msg="Registro de Entrega de servicio, agregado con éxito";
echo "<script>
 if ( window.history.replaceState ) {
     window.history.replaceState( null, null, window.location.href );
 }
</script>";    
}
else 
{
$error="Algo salió mal. Inténtalo de nuevo";
}

}
    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Title -->
	<title>Entrega de Servicio.</title>



	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta charset="UTF-8">
	<meta name="description" content="Responsive Admin Dashboard Template" />
	<meta name="keywords" content="admin,dashboard" />
	<meta name="author" content="Steelcoders" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!-- Styles -->
	<link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
	<link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />


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


		label:hover,
		label:hover~label {
			color: #26a69a;
		}
	</style>
	<script type="text/javascript">
		function valid() {

			return true;
		}
	</script>

	<script>
		function comprobar(checkbox) {
			otro = checkbox.parentNode.querySelector("[type=checkbox]:not(#" + checkbox.id + ")");

			if (otro.checked) {
				otro.checked = false;
			}
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
	</script>
</head>

<body>
	<?php include('includes/header.php');?>

	<?php include('includes/sidebar.php');?>
	<main class="mn-inner">
		<div class="row">

			<div class="col s12 m12 l12">
				<div class="card">
					<div class="card-content">
						<form id="AUTO" method="post" name="addemp" enctype="multipart/form-data">
							<?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
							<div>
								<h3>Entrega de Servicio</h3>

								<div class="row">
									<div class="col m6">
										<div class="row">
											<?php
 $sql = "SELECT MAX(invoice)+1 as invoice FROM tblservicedelivery LIMIT 1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
//$folio = (empty($sql['invoice']) ? 1 : $sql['invoice']+=1);    
//var_dump($folio);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
	//var_dump($result->invoice);
	$c=$result->invoice;
	if($c==null){
	$c=0+1;	
		
	}
	else{
		$c=$result->invoice;
		//$c=4;
		}
?>



											<div class="input-field col m6 s12">
												<label for="invoice">Folio</label><br>
												<input id="invoice" name="invoice" value="<?php echo htmlentities($c);?>" type="text" autocomplete="off" required readonly="readonly">
											</div>
											<script>
												function myFunction() {
													window.open("../supervisores/editdoublets2.php?i=<?php echo htmlentities($c);?>&l=v&l2=me&id=<?php echo htmlentities($_SESSION['id']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction2() {
													window.open("../supervisores/adddoublets2.php?i=<?php echo htmlentities($c);?>&l=v&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction3() {
													window.open("../supervisores/editactaadministrativa.php?i=<?php echo htmlentities($c);?>&l=v&l2=me&id=<?php echo htmlentities($_SESSION['id2']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction4() {
													window.open("../supervisores/actaadministrativa.php?i=<?php echo htmlentities($c);?>&l=v&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction5() {
													window.open("../supervisores/editnotainformativa.php?i=<?php echo htmlentities($c);?>&l=v&l2=me&id=<?php echo htmlentities($_SESSION['id3']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction6() {
													window.open("../supervisores/notainformativa.php?i=<?php echo htmlentities($c);?>&l=v&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction7() {
													window.open("../supervisores/editanexotesi.php?i=<?php echo htmlentities($c);?>&l=v&l2=me&id=<?php echo htmlentities($_SESSION['id4']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction8() {
													window.open("../supervisores/anexotesi.php?i=<?php echo htmlentities($c);?>&l=v&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction9() {
													window.open("../supervisores/editdoublets2.php?i=<?php echo htmlentities($c);?>&l=s&l2=me&id=<?php echo htmlentities($_SESSION['id5']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction10() {
													window.open("../supervisores/adddoublets2.php?i=<?php echo htmlentities($c);?>&l=s&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction11() {
													window.open("../supervisores/editactaadministrativa.php?i=<?php echo htmlentities($c);?>&l=s&l2=me&id=<?php echo htmlentities($_SESSION['id6']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction12() {
													window.open("../supervisores/actaadministrativa.php?i=<?php echo htmlentities($c);?>&l=s&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction13() {
													window.open("../supervisores/editnotainformativa.php?i=<?php echo htmlentities($c);?>&l=s&l2=me&id=<?php echo htmlentities($_SESSION['id7']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction14() {
													window.open("../supervisores/notainformativa.php?i=<?php echo htmlentities($c);?>&l=s&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction15() {
													window.open("../supervisores/editanexotesi.php?i=<?php echo htmlentities($c);?>&l=s&l2=me&id=<?php echo htmlentities($_SESSION['id8']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction16() {
													window.open("../supervisores/anexotesi.php?i=<?php echo htmlentities($c);?>&l=s&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction17() {
													window.open("../supervisores/editdoublets2.php?i=<?php echo htmlentities($c);?>&l=m&l2=me&id=<?php echo htmlentities($_SESSION['id9']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction18() {
													window.open("../supervisores/adddoublets2.php?i=<?php echo htmlentities($c);?>&l=m&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction19() {
													window.open("../supervisores/editactaadministrativa.php?i=<?php echo htmlentities($c);?>&l=m&l2=me&id=<?php echo htmlentities($_SESSION['id10']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction20() {
													window.open("../supervisores/actaadministrativa.php?i=<?php echo htmlentities($c);?>&l=m&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction21() {
													window.open("../supervisores/editnotainformativa.php?i=<?php echo htmlentities($c);?>&l=m&l2=me&id=<?php echo htmlentities($_SESSION['id11']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction22() {
													window.open("../supervisores/notainformativa.php?i=<?php echo htmlentities($c);?>&l=m&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction23() {
													window.open("../supervisores/editanexotesi.php?i=<?php echo htmlentities($c);?>&l=m&l2=me&id=<?php echo htmlentities($_SESSION['id12']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction24() {
													window.open("../supervisores/anexotesi.php?i=<?php echo htmlentities($c);?>&l=m&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction25() {
													window.open("../supervisores/editdoublets2.php?i=<?php echo htmlentities($c);?>&l=j&l2=me&id=<?php echo htmlentities($_SESSION['id13']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction26() {
													window.open("../supervisores/adddoublets2.php?i=<?php echo htmlentities($c);?>&l=j&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction27() {
													window.open("../supervisores/editactaadministrativa.php?i=<?php echo htmlentities($c);?>&l=j&l2=me&id=<?php echo htmlentities($_SESSION['id14']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction28() {
													window.open("../supervisores/actaadministrativa.php?i=<?php echo htmlentities($c);?>&l=j&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction29() {
													window.open("../supervisores/editnotainformativa.php?i=<?php echo htmlentities($c);?>&l=j&l2=me&id=<?php echo htmlentities($_SESSION['id15']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction30() {
													window.open("../supervisores/notainformativa.php?i=<?php echo htmlentities($c);?>&l=j&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction31() {
													window.open("../supervisores/editanexotesi.php?i=<?php echo htmlentities($c);?>&l=j&l2=me&id=<?php echo htmlentities($_SESSION['id16']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction32() {
													window.open("../supervisores/anexotesi.php?i=<?php echo htmlentities($c);?>&l=j&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}
											</script>
											<div class="input-field col m6 s12">
												<label for="date">Fecha</label><br>
												<input id="date" name="date" type="date" autocomplete="off" required>
											</div>



											<div class="input-field col m6 s12">
												<select id="supervisordelivers" name="supervisordelivers" autocomplete="off" required>
													<option value="">Supervisor que entrega</option>
													<?php $sqll = "SELECT empid,name,firstname,lastname from tblusers where kind='supervisor'";
$queryl = $dbh -> prepare($sqll);
$queryl->execute();
$resultsl=$queryl->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($queryl->rowCount() > 0)
{
foreach($resultsl as $resultl)
{   ?>
													<option value="<?php echo htmlentities($resultl->empid);?>&nbsp;<?php echo htmlentities($resultl->name);?>&nbsp;<?php echo htmlentities($resultl->firstname);?>&nbsp;<?php echo htmlentities($resultl->lastname);?>"><?php echo htmlentities($resultl->empid);?>&nbsp;<?php echo htmlentities($resultl->name);?>&nbsp;<?php echo htmlentities($resultl->firstname);?>&nbsp;<?php echo htmlentities($resultl->lastname);?></option>
													<?php }} ?>
												</select>
											</div>
											<div class="input-field col m6 s12">
												<select id="turn" name="turn" autocomplete="off">
													<option value="">Turno</option>
													<option value="12X12">12X12</option>
													<option value="24X24">24X24</option>

												</select>
											</div>


											<div class="input-field col s12">
												<label for="zone">SERVICIOS VENUS</label>
												<input id="zone" name="zone" type="number" autocomplete="off" required>
											</div>

											<div class="input-field col s12">
												<label for="mountedservice">Servicios montados sin novedad en tiempo y forma</label>
												<input id="mountedservice" name="mountedservice" type="number" autocomplete="off" required>
											</div>
											<div class="input-field col m6 s12">
												<label for="news" required>Novedades</label><br><br>
												<input type="radio" id="newss" name="news" value="SI" class="check"> <label for="newss">SI</label>
												<input type="radio" id="newsn" name="news" value="NO" class="check"> <label for="newsn">NO</label>
											</div>

											<div class="input-field col m6 s12">



												<?php 
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tbldoublets where letter='v' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{          
	$_SESSION['id']=$resul->id;
		//var_dump($_SESSION['id']); 
                    ?>
												<?php if(($resul->letter) =='v') {
		$marcar="checked";?>
												<label for="annexed">Anexo</label><br><br>
												<input type="checkbox" id="annexeda" name="annexed[]" value="Anexo A" class="check" onchange="window.open('../supervisores/adddoublets2.php?i=<?php echo htmlentities($resul->invoice);?>&l=v&l2=me','a','width=1200,height=800');" <?php echo $marcar?>><label for="annexeda">Anexo A</label> <?php if(($resul->letter) =='v') { $marcar="checked";echo '
												<a onclick="myFunction()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>

												<?php $cnt++;}}else{
													print"
												<label for='annexed'>Anexo</label><br><br>
												<input type='checkbox' id='annexeda' name='annexed[]' value='Anexo A' class='check' onclick='myFunction2()'><label for='annexeda' >Anexo A</label>";
}?>


												<?php 
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tblactadmin where letter='v' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                $_SESSION['id2']=$resul->id;               //var_dump($resul); 
                    ?> <?php if(($resul->letter) =='v') {
		$marcar="checked";?>

												<input type="checkbox" id="annexedb" name="annexed[]" value="Anexo B" class="check" onchange="window.open('../supervisores/actaadministrativa.php?i=<?php echo htmlentities($result->invoice);?>&l=v&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexedb">Anexo B</label> <?php if(($resul->letter) =='v') { $marcar="checked";echo '
												<a onclick="myFunction3()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>





												<?php $cnt++;}}else{
													print"
												<input type='checkbox' id='annexedb' name='annexed[]' value='Anexo B' class='check' onclick='myFunction4()'> <label for='annexedb'>Anexo B</label>";
												}?>








												<?php 
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tblnoteinformative where letter='v' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                   $_SESSION['id3']=$resul->id;           // var_dump($resul); 
                    ?> <?php if(($resul->letter) =='v') {
		$marcar="checked";?>
												<input type="checkbox" id="annexedc" name="annexed[]" value="Anexo C" class="check" onchange="window.open('../supervisores/notainformativa.php?i=<?php echo htmlentities($result->invoice);?>&l=v&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexedc">Anexo C</label> <?php if(($resul->letter) =='v') { $marcar="checked";echo '
												<a onclick="myFunction5()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>
												<?php $cnt++;}}else{
													print"
												<input type='checkbox' id='annexedc' name='annexed[]' value='Anexo C' class='check' onclick='myFunction6()'> <label for='annexedc'>Anexo C</label>";
												
												
												
													}?>


												<?php 
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tblannexedtesi where letter='v' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                         $_SESSION['id4']=$resul->id;      //var_dump($resul); 
                    ?> <?php if(($resul->letter) =='v') {
		$marcar="checked";?>
												<input type="checkbox" id="annexedtesi" name="annexed[]" value="Anexo TESI" class="check" onchange="window.open('../supervisores/anexotesi.php?i=<?php echo htmlentities($result->invoice);?>&l=v&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexedtesi">Anexo TESI</label>
												<?php if(($resul->letter) =='v') { $marcar="checked";echo '
												<a onclick="myFunction7()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>
												<?php $cnt++;}}else{
													print"<input type='checkbox' id='annexedtesi' name='annexed[]' value='Anexo TESI' class='check' onclick='myFunction8()'> <label for='annexedtesi'>Anexo TESI</label>";
													}?>
											</div>

											<div class="input-field col s12">
												<label for="zone2">SERVICIOS SATURNO</label>
												<input id="zone2" name="zone2" type="number" autocomplete="off" required>
											</div>
											<div class="input-field col s12">
												<label for="mountedservice2">Servicios montados sin novedad en tiempo y forma</label>
												<input id="mountedservice2" name="mountedservice2" type="number" autocomplete="off" required>
											</div>
											<div class="input-field col m6 s12">
												<label for="news2">Novedades</label><br><br>
												<input type="radio" id="newss2" name="news2" value="SI" class="check"> <label for="newss2">SI</label>
												<input type="radio" id="newsn2" name="news2" value="NO" class="check"> <label for="newsn2">NO</label>
											</div>

											<div class="input-field col m6 s12">
												<?php 
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tbldoublets where letter='s' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                    $_SESSION['id5']=$resul->id;         // var_dump($resul); 
                    ?>
												<?php if(($resul->letter) =='s') {
		$marcar="checked";?>
												<label for="annexed2">Anexo</label><br><br>
												<input type="checkbox" id="annexeda2" name="annexed2[]" value="Anexo A" class="check" onclick="window.open('../supervisores/adddoublets2.php?i=<?php echo htmlentities($result->invoice);?>&l=s&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexeda2">Anexo A</label> <?php if(($resul->letter) =='s') { $marcar="checked";echo '
												<a onclick="myFunction9()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>

												<?php $cnt++;}}else{
													print"<label for='annexed2'>Anexo</label><br><br>
												<input type='checkbox' id='annexeda2' name='annexed2[]' value='Anexo A' class='check' onclick='myFunction10()'> <label for=annexeda2>Anexo A</label>";
													}?>








												<?php 
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tblactadmin where letter='s' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                          $_SESSION['id6']=$resul->id;     //var_dump($resul); 
                    ?>
												<?php if(($resul->letter) =='s') {
		$marcar="checked";?>
												<input type="checkbox" id="annexedb2" name="annexed2[]" value="Anexo B" class="check" onchange="window.open('../supervisores/actaadministrativa.php?i=<?php echo htmlentities($result->invoice);?>&l=s&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexedb2">Anexo B</label><?php if(($resul->letter) =='s') { $marcar="checked";echo '
												<a onclick="myFunction11()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>

												<?php $cnt++;}}else{
	
	print "<input type='checkbox' id='annexedb2' name='annexed2[]' value='Anexo B' class='check'onclick='myFunction12()'> <label for='annexedb2'>Anexo B</label>	";
													}?>





												<?php 
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tblnoteinformative where letter='s' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                              $_SESSION['id7']=$resul->id; //var_dump($resul); 
                    ?>
												<?php if(($resul->letter) =='s') {
		$marcar="checked";?>
												<input type="checkbox" id="annexedc2" name="annexed2[]" value="Anexo C" class="check" onchange="window.open('../supervisores/notainformativa.php?i=<?php echo htmlentities($result->invoice);?>&l=s&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexedc2">Anexo C</label><?php if(($resul->letter) =='s') { $marcar="checked";echo '
												<a onclick="myFunction13()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>

												<?php $cnt++;}}else{
	
	print "<input type='checkbox' id='annexedc2' name='annexed[]' value='Anexo C' class='check' onclick='myFunction14()'> <label for='annexedc2'>Anexo C</label>";}?>






												<?php 
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tblannexedtesi where letter='s' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                           $_SESSION['id8']=$resul->id;   // var_dump($resul); 
                    ?>
												<?php if(($resul->letter) =='s') {
		$marcar="checked";?>
												<input type="checkbox" id="annexedtesi2" name="annexed2[]" value="Anexo TESI" class="check" onchange="window.open('../supervisores/anexotesi.php?i=<?php echo htmlentities($result->invoice);?>&l=s&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexedtesi2">Anexo TESI</label><?php if(($resul->letter) =='s') { $marcar="checked";echo '
												<a onclick="myFunction15()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>

												<?php $cnt++;}}else{
	
	print "<input type='checkbox' id='annexedtesi2' name='annexed2[]' value='Anexo TESI' class='check' onclick='myFunction16()'> <label for='annexedtesi2'>Anexo TESI</label>
	
	";}?>
											</div>






											<div class="input-field col m6 s12">
												<div id="signature-pad" class="signature-pad">
													<div class="description">Firma de supervisor que entrega</div>
													<div class="signature-pad">
														<canvas style="width: 200px; height: 100px; border: 1px black solid; " id="canvas" required></canvas>
														<a class="btn btn-primary " id="clear">Limpiar Firma</a>
														<!--<label name="clear"id="clear" for="coords">Limpiar</label>        -->
														<!--<button name="clear"id="clear"type="submit">Limpiar</button>-->

													</div>

												</div>

											</div>
											<input type="hidden" name="pacient_id" value="">
											<input type="hidden" name="base64" value="" id="base64">

											<div class="input-field col m6 s12">
												<div id="signature-pad1" class="signature-pad1">
													<div class="description">Firma del supervisor que recibe</div>
													<div class="signature-pad1">
														<canvas style="width: 200px; height: 100px; border: 1px black solid; " id="canvas1"></canvas>
														<a class="btn btn-primary " id="clear1">Limpiar Firma</a>
														<!--<label name="clear"id="clear" for="coords">Limpiar</label>        -->
														<!--<button name="clear"id="clear"type="submit">Limpiar</button>-->

													</div>

												</div>

											</div>

											<input type="hidden" name="pacient_id1" value="">
											<input type="hidden" name="base641" value="" id="base641">
										</div>
									</div>

									<div class="col m6 s12">
										<div class="row">
											<div class="input-field col s12">
												<label for="deliverytime">Hora de entrega</label><br>
												<input id="deliverytime" name="deliverytime" type="time" autocomplete="off" required>
											</div>
											<div class="input-field col m6 s12">
												<select id="supervisorreceiving" name="supervisorreceiving" autocomplete="off" required>
													<option value="">Supervisor que recibe</option>
													<?php $sqll = "SELECT * from tblusers where kind='supervisor'";
$queryl = $dbh -> prepare($sqll);
$queryl->execute();
$resultsl=$queryl->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($queryl->rowCount() > 0)
{
foreach($resultsl as $resultl)
{   ?>
													<option value="<?php echo htmlentities($resultl->empid);?>&nbsp;<?php echo htmlentities($resultl->name);?>&nbsp;<?php echo htmlentities($resultl->firstname);?>&nbsp;<?php echo htmlentities($resultl->lastname);?>"><?php echo htmlentities($resultl->empid);?>&nbsp;<?php echo htmlentities($resultl->name);?>&nbsp;<?php echo htmlentities($resultl->firstname);?>&nbsp;<?php echo htmlentities($resultl->lastname);?></option>
													<?php }} ?>
												</select>
											</div>
											<div class="input-field col m6 s12">
												<select id="turn2" name="turn2" autocomplete="off">
													<option value="">Turno</option>
													<option value="12X12">12X12</option>
													<option value="24X24">24X24</option>

												</select>
											</div>



											<div class="input-field col s12">
												<label for="zone3">SERVICIOS MARTE</label>
												<input id="zone3" name="zone3" type="number" autocomplete="off" required>
											</div>
											<div class="input-field col s12">
												<label for="mountedservice3">Servicios montados sin novedad en tiempo y forma</label>
												<input id="mountedservice3" name="mountedservice3" type="number" autocomplete="off" required>
											</div>
											<div class="input-field col m6 s12">
												<label for="news3">Novedades</label><br><br>
												<input type="radio" id="newss3" name="news3" value="SI" class="check"> <label for="newss3">SI</label>
												<input type="radio" id="newsn3" name="news3" value="NO" class="check"> <label for="newsn3">NO</label>
											</div>


											<div class="input-field col m6 s12">
												<?php 
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tbldoublets where letter='m' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                            $_SESSION['id9']=$resul->id;   //var_dump($resul); 
                    ?>
												<?php if(($resul->letter) =='m') {
		$marcar="checked";?>
												<label for="annexed3">Anexo</label><br><br>
												<input type="checkbox" id="annexeda3" name="annexed3[]" value="Anexo A" class="check" onchange="window.open('../supervisores/adddoublets2.php?i=<?php echo htmlentities($result->invoice);?>&l=m&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexeda3">Anexo A</label><?php if(($resul->letter) =='m') { $marcar="checked";echo '
												<a onclick="myFunction17()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>

												<?php $cnt++;}}else{
	
	print "<label for='annexed3'>Anexo</label><br><br>
												<input type='checkbox' id='annexeda3' name='annexed3[]' value='Anexo A' class='check' onclick='myFunction18()'> <label for='annexeda3'>Anexo A</label>";}?>



												<?php 
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tblactadmin where letter='m' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                               $_SESSION['id10']=$resul->id;//var_dump($resul); 
                    ?>
												<?php if(($resul->letter) =='m') {
		$marcar="checked";?>
												<input type="checkbox" id="annexedb3" name="annexed3[]" value="Anexo B" class="check" onchange="window.open('../supervisores/actaadministrativa.php?i=<?php echo htmlentities($result->invoice);?>&l=m&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexedb3">Anexo B</label><?php if(($resul->letter) =='m') { $marcar="checked";echo '
												<a onclick="myFunction19()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>

												<?php $cnt++;}}else{
	
	print "<input type='checkbox' id='annexedb3' name='annexed3[]' value='Anexo B' class='check' > <label for='annexedb3'onclick='myFunction20()'>Anexo B</label>";}?>



												<?php 
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tblnoteinformative where letter='m' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                              $_SESSION['id11']=$resul->id; //var_dump($resul); 
                    ?>
												<?php if(($resul->letter) =='m') {
		$marcar="checked";?>
												<input type="checkbox" id="annexedc3" name="annexed3[]" value="Anexo C" class="check" onchange="window.open('../supervisores/notainformativa.php?i=<?php echo htmlentities($result->invoice);?>&l=m&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexedc3">Anexo C</label><?php if(($resul->letter) =='m') { $marcar="checked";echo '
												<a onclick="myFunction21()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>

												<?php $cnt++;}}else{
	
	print "<input type='checkbox' id='annexedc3' name='annexed3[]' value='Anexo C' class='check' onclick='myFunction22()'> <label for='annexedc3'>Anexo C</label>";}?>




												<?php
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tblannexedtesi where letter='m' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                               $_SESSION['id12']=$resul->id;//var_dump($resul); 
                    ?>
												<?php if(($resul->letter) =='m') {
		$marcar="checked";?>
												<input type="checkbox" id="annexedtesi3" name="annexed3[]" value="Anexo TESI" class="check" onchange="window.open('../supervisores/anexotesi.php?i=<?php echo htmlentities($result->invoice);?>&l=m&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexedtesi3">Anexo TESI</label><?php if(($resul->letter) =='m') { $marcar="checked";echo '
												<a onclick="myFunction23()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>

												<?php $cnt++;}}else{
	
	print "<input type='checkbox' id='annexedtesi3' name='annexed3[]' value='Anexo TESI' class='check' onclick='myFunction24()'> <label for='annexedtesi3'>Anexo TESI</label>";}?>


											</div>

											<div class="input-field col s12">
												<label for="zone4">SERVICIOS JUPITER</label>
												<input id="zone4" name="zone4" type="number" autocomplete="off" required>
											</div>
											<div class="input-field col s12">
												<label for="mountedservice4">Servicios montados sin novedad en tiempo y forma</label>
												<input id="mountedservice4" name="mountedservice4" type="number" autocomplete="off" required>
											</div>
											<div class="input-field col m6 s12">
												<label for="news4">Novedades</label><br><br>
												<input type="radio" id="newss4" name="news4" value="SI" class="check"> <label for="newss4">SI</label>
												<input type="radio" id="newsn4" name="news4" value="NO" class="check"> <label for="newsn4">NO</label>
											</div>


											<div class="input-field col m6 s12">
												<?php
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tbldoublets where letter='j' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                               $_SESSION['id13']=$resul->id//var_dump($resul); 
                    ?>
												<?php if(($resul->letter) =='j') {
		$marcar="checked";?>
												<label for="annexeddd">Anexo</label><br><br>
												<input type="checkbox" id="annexeda4" name="annexed4[]" value="Anexo A" class="check" onchange="window.open('../supervisores/adddoublets2.php?i=<?php echo htmlentities($result->invoice);?>&l=j&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexeda4">Anexo A</label><?php if(($resul->letter) =='j') { $marcar="checked";echo '
												<a onclick="myFunction25()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>

												<?php $cnt++;}}else{
	
	print "<label for='annexeddd'>Anexo</label><br><br>
												<input type='checkbox' id='annexeda4' name='annexed4[]' value='Anexo A' class='check' onclick='myFunction26()'> <label for='annexeda4'>Anexo A</label>";}?>



												<?php
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tblactadmin where letter='j' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                               $_SESSION['id14']=$resul->id//var_dump($resul); 
                    ?>
												<?php if(($resul->letter) =='j') {
		$marcar="checked";?>
												<input type="checkbox" id="annexedb4" name="annexed4[]" value="Anexo B" class="check" onchange="window.open('../supervisores/actaadministrativa.php?i=<?php echo htmlentities($result->invoice);?>&l=j&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexedb4">Anexo B</label><?php if(($resul->letter) =='j') { $marcar="checked";echo '
												<a onclick="myFunction27()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>

												<?php $cnt++;}}else{
	
	print "<input type='checkbox' id='annexedb4' name='annexed4[]' value='Anexo B' class='check' onclick='myFunction28()'> <label for='annexedb4'>Anexo B</label>";}?>




												<?php
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tblnoteinformative where letter='j' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                               $_SESSION['id15']=$resul->id//var_dump($resul); 
                    ?>
												<?php if(($resul->letter) =='j') {
		$marcar="checked";?>
												<input type="checkbox" id="annexedc4" name="annexed4[]" value="Anexo C" class="check" onchange="window.open('../supervisores/notainformativa.php?i=<?php echo htmlentities($result->invoice);?>&l=j&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexedc4">Anexo C</label><?php if(($resul->letter) =='j') { $marcar="checked";echo '
												<a onclick="myFunction29()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>

												<?php $cnt++;}}else{
	
	print "<input type='checkbox' id='annexedc4' name='annexed4[]' value='Anexo C' class='check' > <label for='annexedc4'onclick='myFunction30()'>Anexo C</label>";}?>


												<?php
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,letter,invoice from  tblannexedtesi where letter='j' and invoice=:n order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':n',$n, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() >0)
	
{
foreach($results as $resul)
	
{                              $_SESSION['id16']=$resul->id// var_dump($resul); 
                    ?>
												<?php if(($resul->letter) =='j') {
		$marcar="checked";?>
												<input type="checkbox" id="annexedtesi4" name="annexed4[]" value="Anexo TESI" class="check" onchange="window.open('../supervisores/anexotesi.php?i=<?php echo htmlentities($result->invoice);?>&l=j&l2=me','a','width=1200,height=800');" <?php echo $marcar?>> <label for="annexedtesi4">Anexo TESI</label><?php if(($resul->letter) =='j') { $marcar="checked";echo '
												<a onclick="myFunction31()" title="Modificar datos"><i class="material-icons">edit</i></a>';}						
}?><?php if(($resul->invoice) ==null) {print"else";}?>

												<?php $cnt++;}}else{
	
	print "<input type='checkbox' id='annexedtesi4' name='annexed4[]' value='Anexo TESI' class='check' > <label for='annexedtesi4'onclick='myFunction32()'>Anexo TESI</label>";}?>
											</div>

											<div class="input-field col m6 s12">
												<label for="departuretime">Hora de salida de supervisor que entrega</label><br><br>
												<input id="departuretime" name="departuretime" type="time" autocomplete="off">
											</div>
											<div class="input-field col m6 s12">
												<div id="signature-pad2" class="signature-pad2">
													<div class="description">Firma director de operaciones</div>
													<div class="signature-pad2">
														<canvas style="width: 200px; height: 100px; border: 1px black solid; " id="canvas2"></canvas>
														<a class="btn btn-primary " id="clear2">Limpiar Firma</a>
														<!--<label name="clear"id="clear" for="coords">Limpiar</label>        -->
														<!--<button name="clear"id="clear"type="submit">Limpiar</button>-->

													</div>

												</div>

											</div>
											<input type="hidden" name="pacient_id2" value="">
											<input type="hidden" name="base642" value="" id="base642">

										</div>
									</div>

									<div class="row">
										<div class="col m6">
											<div class="row">
												<div class="input-field col m6 s12">

												</div>
											</div>
										</div>
										<div class="col m6">
											<div class="row">
												<div class="input-field col m6 s12">

												</div>
												<div class="input-field col m6 s12">

												</div>
											</div>
										</div>
									</div>

									<?php $cnt++;} }?>

								</div>

								<button type="submit" name="add" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>
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
	<script src="../assets/js/pages/form_elements.js"></script>
	<script src="../assets/js/signature_pad.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

</body>

</html>
<script type="text/javascript">
	$(function() {

		function funcion1() {
			//HABILITAR
			document.getElementById("annexeda").disabled = false;
			document.getElementById("annexedb").disabled = false;
			document.getElementById("annexedc").disabled = false;
			document.getElementById("annexedtesi").disabled = false;
		}

		function funcion2() {
			//DESHABILITAR
			document.getElementById("annexeda").disabled = true;
			document.getElementById("annexedb").disabled = true;
			document.getElementById("annexedc").disabled = true;
			document.getElementById("annexedtesi").disabled = true;
		}

		function funcion3() {
			//HABILITAR
			document.getElementById("annexeda2").disabled = false;
			document.getElementById("annexedb2").disabled = false;
			document.getElementById("annexedc2").disabled = false;
			document.getElementById("annexedtesi2").disabled = false;
		}

		function funcion4() {
			//DESHABILITAR
			document.getElementById("annexeda2").disabled = true;
			document.getElementById("annexedb2").disabled = true;
			document.getElementById("annexedc2").disabled = true;
			document.getElementById("annexedtesi2").disabled = true;
		}


		function funcion5() {
			//HABILITAR
			document.getElementById("annexeda3").disabled = false;
			document.getElementById("annexedb3").disabled = false;
			document.getElementById("annexedc3").disabled = false;
			document.getElementById("annexedtesi3").disabled = false;

		}

		function funcion6() {
			//DESHABILITAR
			document.getElementById("annexeda3").disabled = true;
			document.getElementById("annexedb3").disabled = true;
			document.getElementById("annexedc3").disabled = true;
			document.getElementById("annexedtesi3").disabled = true;
		}

		function funcion7() {
			//HABILITAR
			document.getElementById("annexeda4").disabled = false;
			document.getElementById("annexedb4").disabled = false;
			document.getElementById("annexedc4").disabled = false;
			document.getElementById("annexedtesi4").disabled = false;
		}

		function funcion8() {
			//DESHABILITAR
			document.getElementById("annexeda4").disabled = true;
			document.getElementById("annexedb4").disabled = true;
			document.getElementById("annexedc4").disabled = true;
			document.getElementById("annexedtesi4").disabled = true;
		}
		$('input[id="newss"]').on('change', this, function() {
			funcion1();
		});
		$('input[id="newsn"]').on('change', this, function() {
			funcion2();
		});
		$('input[id="newss2"]').on('change', this, function() {
			funcion3();
		});
		$('input[id="newsn2"]').on('change', this, function() {
			funcion4();
		});
		$('input[id="newss3"]').on('change', this, function() {
			funcion5();
		});
		$('input[id="newsn3"]').on('change', this, function() {
			funcion6();
		});
		$('input[id="newss4"]').on('change', this, function() {
			funcion7();
		});
		$('input[id="newsn4"]').on('change', this, function() {
			funcion8();
		});


	});
	var wrapper = document.getElementById("signature-pad");
	var canvas = wrapper.querySelector("canvas");
	var signaturePad = new SignaturePad(canvas, {
		backgroundColor: 'rgb(255, 255, 255)'
	});

	function resizeCanvas() {

		var ratio = Math.max(window.devicePixelRatio || 1, 1);

		canvas.width = canvas.offsetWidth * ratio;
		canvas.height = canvas.offsetHeight * ratio;
		canvas.getContext("2d").scale(ratio, ratio);
		document.getElementById('clear').addEventListener('click', function() {
			signaturePad.clear();
		});
		//  $('#clear').on('click', function(){
		//         signaturePad.clear();
		//   }); 

		canvas.addEventListener('touchstart', onTouchStart, false);
		// signaturePad.clear();
	}

	window.onresize = resizeCanvas;
	resizeCanvas();
</script>
<script>
	document.getElementById('AUTO').addEventListener("submit", function(e) {

		var ctx = document.getElementById("canvas");
		var image = ctx.toDataURL(); // data:image/png....
		document.getElementById('base64').value = image;
	}, false);
</script>
<script type="text/javascript">
	var wrapper1 = document.getElementById("signature-pad1");

	var canvas1 = wrapper1.querySelector("canvas");

	var signaturePad1 = new SignaturePad(canvas1, {
		backgroundColor: 'rgb(255, 255, 255)'
	});

	function resizeCanvas1() {

		var ratio = Math.max(window.devicePixelRatio || 1, 1);

		canvas1.width = canvas1.offsetWidth * ratio;
		canvas1.height = canvas1.offsetHeight * ratio;
		canvas1.getContext("2d").scale(ratio, ratio);
		document.getElementById('clear1').addEventListener('click', function() {
			signaturePad1.clear();
		});
		//  $('#clear').on('click', function(){
		//         signaturePad.clear();
		//   }); 

		canvas1.addEventListener('touchstart', onTouchStart, false);
		// signaturePad.clear();
	}

	window.onresize = resizeCanvas1;
	resizeCanvas1();
</script>
<script>
	document.getElementById('AUTO').addEventListener("submit", function(e) {

		var ctx1 = document.getElementById("canvas1");
		var image1 = ctx1.toDataURL(); // data:image/png....
		document.getElementById('base641').value = image1;
	}, false);
</script>


<script type="text/javascript">
	var wrapper2 = document.getElementById("signature-pad2");

	var canvas2 = wrapper2.querySelector("canvas");

	var signaturePad2 = new SignaturePad(canvas2, {
		backgroundColor: 'rgb(255, 255, 255)'
	});

	function resizeCanvas2() {

		var ratio = Math.max(window.devicePixelRatio || 1, 1);

		canvas2.width = canvas2.offsetWidth * ratio;
		canvas2.height = canvas2.offsetHeight * ratio;
		canvas2.getContext("2d").scale(ratio, ratio);
		document.getElementById('clear2').addEventListener('click', function() {
			signaturePad2.clear();
		});
		//  $('#clear').on('click', function(){
		//         signaturePad.clear();
		//   }); 

		canvas2.addEventListener('touchstart', onTouchStart, false);
		// signaturePad.clear();
	}

	window.onresize = resizeCanvas2;
	resizeCanvas2();
</script>
<script>
	document.getElementById('AUTO').addEventListener("submit", function(e) {

		var ctx2 = document.getElementById("canvas2");
		var image2 = ctx2.toDataURL(); // data:image/png....
		document.getElementById('base642').value = image2;
	}, false);
</script>

<?php } ?>