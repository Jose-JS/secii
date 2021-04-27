<?php
session_start();

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
//error_reporting(E_ALL);
 
include('includes/config.php');
if(strlen($_SESSION['supervisor'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
$id=$_GET['id']; 
$invoice=$_GET['i'];    
$letter=$_GET['l'];	
$fech=$_POST['fech'];
$motiv=$_POST['motiv'];
$service=$_POST['service'];    
$technical=substr($_POST['technical'],6);   
$empid = substr($_POST['technical'],0,6); 
$turn=$_POST['turn'];
$descr=$_POST['desc']; 
$img = $_POST['base64'];
$img = str_replace('data:image/png;base64,', '', $img);
$fileData = base64_decode($img);
$fileName = uniqid().'.png';
    
$fecha  = date("dmy");
$no_aleatorio  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta = '../supervisores/firmas/'.$fecha.$no_aleatorio.$fileName;
opendir($ruta);
//copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
$contract=$ruta;    
file_put_contents($ruta, $fileData);         
$creatoruser=$_SESSION['supervisor'];    
$action='modificación';
 
 
$sql="UPDATE tblannexedtesi SET invoice=:invoice,fech=:fech,motiv=:motiv,service=:service,technical=:technical,idemp=:empid,turn=:turn,descr=:descr,creatoruser=:creatoruser,action=:action,letter=:letter WHERE id=:id";

    $query = $dbh->prepare($sql);
    $query->bindParam(':invoice',$invoice,PDO::PARAM_STR); 
    $query->bindParam(':fech',$fech,PDO::PARAM_STR);
    $query->bindParam(':motiv',$motiv,PDO::PARAM_STR); 
    $query->bindParam(':service',$service,PDO::PARAM_STR);
    $query->bindParam(':technical',$technical,PDO::PARAM_STR);
    $query->bindParam(':empid',$empid,PDO::PARAM_STR);
    $query->bindParam(':turn',$turn,PDO::PARAM_STR);
    $query->bindParam(':descr',$descr,PDO::PARAM_STR);
    $query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);
    $query->bindParam(':action',$action,PDO::PARAM_STR);
	$query->bindParam(':letter',$letter,PDO::PARAM_STR);
	$query->bindParam(':id',$id,PDO::PARAM_STR);
    
$query->execute();
 
$lastInsertId = $dbh->lastInsertId();

$msg="Modificación de Anexo de TESI";
echo "<script>

function cerrar() {
var ventana = window.self;
ventana.opener = window.self;
ventana.close();
}
setTimeout('cerrar()',7000);
</script>";

}
    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Title -->
	<title>Anexo TESI</title>



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
			color: orange;
		}
	</style>
	<script type="text/javascript">
		function valid() {

			return true;
		}
	</script>

	<script>
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
	<?php //include('includes/header.php');?>
	<?php //include('includes/sidebar.php');?>
	<main class="mn-inner">
		<div class="row">
			<div class="col s12">
				<div class="page-title">Anexo TESI</div>
			</div>
			<div class="col s12 m12 l6">
				<div class="card">
					<div class="card-content">

						<div class="row">
							<form id="AUTO" method="post" name="addemp" enctype="multipart/form-data">
								<?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<div>
									<h3>VERSION DE HECHOS</h3>
									<?php 
$invoice=$_GET['i'];
$letter=$_GET['l'];	
$sql = "SELECT * from  tblannexedtesi where letter=:letter and invoice=:invoice  order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query -> bindParam(':invoice',$invoice, PDO::PARAM_STR);
$query -> bindParam(':letter',$letter, PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $resul)
{              //var_dump($resul);
                    ?>
									<div class="row">


										<div class="input-field col m6 s12">
											<label for="fech">Fecha</label><br>
											<input id="fech" value="<?php echo htmlentities($resul->fech);?>" name="fech" type="date" autocomplete="off" required>
										</div>

										<div class="input-field col m6 s12">
											<label for="motiv">Motivo</label><br>
											<input id="motiv" value="<?php echo htmlentities($resul->motiv);?>" name="motiv" type="text" autocomplete="off" required>
										</div>
										<div class="input-field col m6 s12">
											<select id="service" name="service" autocomplete="off" required>
												<option value="<?php echo htmlentities($resul->service);?>"><?php echo htmlentities($resul->service);?></option>
												<?php $sql = "SELECT servicename from tblserviceassigned";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
												<option value="<?php echo htmlentities($result->servicename);?>" required><?php echo htmlentities($result->servicename);?></option>
												<?php }} ?>
											</select>
										</div>



										<div class="input-field col s12">
											<select id="technical" name="technical" autocomplete="off" required>
												<option value="<?php echo htmlentities($resul->idemp);?><?php echo htmlentities($resul->technical);?>"><?php echo htmlentities($resul->idemp);?><?php echo htmlentities($resul->technical);?></option>
												<?php $sql = "SELECT EmpId,name,firstname,lastname from tblemployees ORDER BY firstname";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
												<option value="<?php echo htmlentities($result->EmpId);?>&nbsp;<?php echo htmlentities($result->firstname);?>&nbsp;<?php echo htmlentities($result->lastname);?>&nbsp;<?php echo htmlentities($result->name);?>" required><?php echo htmlentities($result->EmpId);?>&nbsp;<?php echo htmlentities($result->firstname);?>&nbsp;<?php echo htmlentities($result->lastname);?>&nbsp;<?php echo htmlentities($result->name);?></option>
												<?php }} ?>
											</select>
										</div>
										<div class="input-field col m6 s12">
											<select id="turn" value="<?php echo htmlentities($resul->turn);?>" name="turn" autocomplete="off">
												<option value="<?php echo htmlentities($resul->turn);?>"><?php echo htmlentities($resul->turn);?></option>
												<option value="12X12">12X12</option>
												<option value="24X24">24X24</option>

											</select>
										</div>
										<div class="input-field col s12">
											<label for="desc">Descripción</label>
											<textarea value="<?php echo htmlentities($resul->descr);?>" name="desc" id="desc" autocomplete="off" required><?php echo htmlentities($resul->descr);?></textarea>
										</div>
									</div>
								</div>
								<?php }} ?>
						</div>
						<button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>


						</form>
					</div>
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
<?php } ?>