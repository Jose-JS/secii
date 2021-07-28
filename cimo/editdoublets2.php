<?php
session_start();
error_reporting(0);
//error_reporting(E_ALL);
include('../includes/config.php');
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
    
$datetime=$_POST['datetime'];
$service=$_POST['service'];
$technical=substr($_POST['technical'],6);   
$empid = substr($_POST['technical'],0,6); 
$cover=$_POST['cover'];
$reason=$_POST['reason'];
$turn=$_POST['turn']; 
$creatoruser=$_SESSION['supervisor'];
$action='modificación';    
$relaytime=$_POST['relaytime'];
  
    
$sql="UPDATE tbldoublets set datetime=:datetime,empid=:empid,technical=:technical,service=:service,cover=:cover,reason=:reason,turn=:turn,creatoruser=:creatoruser,action=:action,relaytime=:relaytime,invoice=:invoice,letter=:letter where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':datetime',$datetime,PDO::PARAM_STR);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->bindParam(':technical',$technical,PDO::PARAM_STR);
$query->bindParam(':service',$service,PDO::PARAM_STR);
$query->bindParam(':cover',$cover,PDO::PARAM_STR);
$query->bindParam(':reason',$reason,PDO::PARAM_STR);    
$query->bindParam(':turn',$turn,PDO::PARAM_STR);    
$query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);        
$query->bindParam(':action',$action,PDO::PARAM_STR);        
$query->bindParam(':relaytime',$relaytime,PDO::PARAM_STR);         
$query->bindParam(':invoice',$invoice,PDO::PARAM_STR);    
$query->bindParam(':letter',$letter,PDO::PARAM_STR);    	
$query->bindParam(':id',$id,PDO::PARAM_STR);    		
$query->execute();
$lastInsertId = $dbh->lastInsertId();	
$msg="Registro de Técnico, agregado con éxito";	
 echo "
<script>
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
	<title>Supervisores | Agregar Dobletes</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta charset="UTF-8">
	<meta name="description" content="Responsive Admin Dashboard Template" />
	<meta name="keywords" content="admin,dashboard" />
	<meta name="author" content="Steelcoders" />

	<!-- Styles -->
	<link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
	<link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
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
	</style>

	<script type="text/javascript">
		function valid() {

			var txtservice = document.getElementById('service').selectedIndex;
			var txttechnical = document.getElementById('technical').selectedIndex;
			var txtdate = document.getElementById('date').value;
			var txttime = document.getElementById('time').value;
			var txtissue = document.getElementById('issue').value;
			var txtreason = document.getElementById('reason').value;
			var txtproductivity = document.getElementById('productivity').value;
			var txtart = document.getElementById('art').value;




			if (txtservice == null || txtservice == 0) {
				// Si no se cumple la condicion...
				alert('[ERROR] Por favor seleccione un servicio');
				return false;
			} else if (txttechnical == null || txttechnical == 0) {
				// Si no se cumple la condicion...
				alert('[ERROR] Por favor seleccione un Técnico');
				return false;
			} else if (!isNaN(txtdate)) {
				alert('ERROR: Debe elegir una fecha de registro');
				return false;
			} else if (!isNaN(txttime)) {
				alert('ERROR: Debe elegir una hora de registro');
				return false;
			} else if (txtissue == null || txtissue == 0 || /^\s+$/.test(txtissue)) {
				// Si no se cumple la condicion...
				alert('[ERROR] Por favor ingrese un número de incidencia');
				return false;
			} else if (txtreason == null || txtreason == 0 || /^\s+$/.test(txtreason)) {
				// Si no se cumple la condicion...
				alert('[ERROR] Por favor ingrese un motivo');
				return false;
			} else if (txtart == null || txtart == 0 || /^\s+$/.test(txtart)) {
				// Si no se cumple la condicion...
				alert('[ERROR] Por favor seleccione un opción');
				return false;
			} else if (txtproductivity == null || txtproductivity == 0) {
				// Si no se cumple la condicion...
				alert('[ERROR] Por favor ingrese productividad');
				return false;
			}

			return true;
		}
	</script>

</head>

<body>
	<?php //include('includes/header.php');?>

	<!--<?php //include('includes/sidebar.php');?>-->

	<main class="mn-inner">
		<div class="row">
			<div class="col s12">
				<div class="page-title">Agregar Doblete</div>
			</div>
			<div class="col s12 m12 l6">
				<div class="card">
					<div class="card-content">

						<div class="row">
							<form id="AUTO" class="col s12" method="post" enctype="multipart/form-data">
								<?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<?php 
$invoice=$_GET['i'];
$letter=$_GET['l'];	
$sql = "SELECT * from  tbldoublets where letter=:letter and invoice=:invoice  order by id desc limit 1";
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
									<label for="date">Fecha y Hora de doblete</label><br>
									<input id="datetime" name="datetime" type="datetime-local" value="<?php echo htmlentities($resul->datetime);?>" autocomplete="off" required>
								</div>



								<div class="input-field col s12">
									<select id="technical" name="technical" autocomplete="off" required>
										<option value="<?php echo htmlentities($resul->empid);?>&nbsp;<?php echo htmlentities($resul->technical);?>"><?php echo htmlentities($resul->empid);?>&nbsp;<?php echo htmlentities($resul->technical);?></option>
										<?php $sql = "SELECT EmpId,name,firstname,lastname from tblemployees order by firstname";
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


								<div class="input-field col s12">
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
									<label for="issue">Técnico cubre</label>
									<input id="cover" value="<?php echo htmlentities($resul->cover);?>" type="text" class="validate" autocomplete="off" name="cover" required>
								</div>

								<div class="input-field col s12">
									<label for="reason">Motivo</label>
									<input id="reason" value="<?php echo htmlentities($resul->reason);?>" type="text" class="validate" autocomplete="off" name="reason" required>
								</div>

								<div class="input-field col s12">
									<select id="turn" name="turn" autocomplete="off" required>
										<option value="<?php echo htmlentities($resul->turn);?>"><?php echo htmlentities($resul->turn);?></option>
										<option value="24X24">24X24</option>
										<option value="12X12">12X12</option>
									</select>
								</div>
								
								<div class="input-field col s12">
									<label for="nota">Nota</label>
									<textarea id="nota" class="validate" autocomplete="off" name="nota" required></textarea>
								</div>

								<div class="input-field col s12">
									<label for="relaytime">Hora de relevo</label><br>
									<input id="relaytime" value="<?php echo htmlentities($resul->relaytime);?>" type="time" class="validate" autocomplete="off" name="relaytime" required>

								</div>
								<!--<div class="input-field col s12">
                                <img id="foto" name="foto" autocomplete="off" src="<?php echo htmlentities($resul->firm);?>" width="100" height="120" required>
                                 </div>-->


								<?php }} ?>

								<div class="input-field col s12">
									<button type="submit" name="add" onclick="return valid();" class="waves-effect waves-light btn indigo m-b-xs">AÑADIR</button>

								</div>




						</div>

						</form>
					</div>
				</div>
			</div>



		</div>

		</div>
	</main>

	</div>
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
	<script type="text/javascript">
		$(document).ready(function() {
			setTimeout(function() {
				$(".content").fadeOut(1500);
			}, 6000);

		});
	</script>

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