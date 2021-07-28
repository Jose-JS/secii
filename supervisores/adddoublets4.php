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
    
$folio=$_GET['f'];
$fecha=$_POST['fecha'];	
$sedeorig=$_POST['sedeorig'];
$tesireac=substr($_POST['tesireac'],6);   
$empid = substr($_POST['tesireac'],0,6); 
$turnoreac=$_POST['turnoreac'];
$sedecubre=$_POST['sedecubre']; 
$turnocubre=$_POST['turnocubre']; 	
$tesi=$_POST['tesi']; 		
$motivo=$_POST['motivo'];
$gen=$_POST['gen'];	
$notasup=$_POST['notasup'];		
$creatoruser=$_SESSION['supervisor'];
$action='inserción';	

	
    
  
    
$sql="INSERT INTO tbldoubletsa(folio,fecha,sedeorig,empid,tesireac,turnoreac,sedecubre,turnocubre,tesi,motivo,creatoruser,action,gen,notasup) VALUES(:folio,:fecha,:sedeorig,:empid,:tesireac,:turnoreac,:sedecubre,:turnocubre,:tesi,:motivo,:creatoruser,:action,:gen,:notasup)";
$query = $dbh->prepare($sql);
$query->bindParam(':folio',$folio,PDO::PARAM_STR);
$query->bindParam(':fecha',$fecha,PDO::PARAM_STR);	
$query->bindParam(':sedeorig',$sedeorig,PDO::PARAM_STR);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);	
$query->bindParam(':tesireac',$tesireac,PDO::PARAM_STR);
$query->bindParam(':turnoreac',$turnoreac,PDO::PARAM_STR);
$query->bindParam(':sedecubre',$sedecubre,PDO::PARAM_STR);    
$query->bindParam(':turnocubre',$turnocubre,PDO::PARAM_STR);    
$query->bindParam(':tesi',$tesi,PDO::PARAM_STR);	
$query->bindParam(':motivo',$motivo,PDO::PARAM_STR);	
$query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);        
$query->bindParam(':action',$action,PDO::PARAM_STR);        
$query->bindParam(':gen',$gen,PDO::PARAM_STR);
$query->bindParam(':notasup',$notasup,PDO::PARAM_STR);	
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
if($gen=='SI'){
$sql2="INSERT INTO tbldoublets(idfr,invoicefr,datetime,service,empid,technical,turn,reason,creatoruser,action,cover) VALUES(:lastInsertId,:folio,:fecha,:sedeorig,:empid,:tesireac,:turnoreac,:motivo,:creatoruser,:action,:tesi)";
$query2 = $dbh->prepare($sql2);
$query2->bindParam(':lastInsertId',$lastInsertId,PDO::PARAM_STR);	
$query2->bindParam(':folio',$folio,PDO::PARAM_STR);
$query2->bindParam(':fecha',$fecha,PDO::PARAM_STR);	
$query2->bindParam(':sedeorig',$sedeorig,PDO::PARAM_STR);
$query2->bindParam(':empid',$empid,PDO::PARAM_STR);	
$query2->bindParam(':tesireac',$tesireac,PDO::PARAM_STR);
$query2->bindParam(':turnoreac',$turnoreac,PDO::PARAM_STR);        
$query2->bindParam(':motivo',$motivo,PDO::PARAM_STR);	
$query2->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);        
$query2->bindParam(':action',$action,PDO::PARAM_STR);
$query2->bindParam(':tesi',$tesi,PDO::PARAM_STR);	
$query2->execute();
$lastInsertId = $dbh->lastInsertId();	
	if($lastInsertId)
{
echo "EXITO";
}
else 
{
	echo "ERROR";
}
}		
	
echo "<script>  
if (confirm('GENERAR MAS REGISTROS?')) {
  console.log('Registro de Formato, agregado con éxito');
  if ( window.history.replaceState ) {

     window.history.replaceState( null, null, window.location.href );
  }
} else {
   if ( window.history.replaceState ) {
     window.history.replaceState( null, null, window.location.href );
  }
function cerrar() {
var ventana = window.self;
ventana.opener = window.self;
ventana.close();
}
setTimeout('cerrar()',2000);

}</script>";
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
	<title>Supervisores | FORMATO FAR</title>

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


			return true;
		}
	</script>

</head>

<body>
	<main class="mn-inner">
		<div class="row">
			<div class="col s12">
				<div class="page-title">FORMATO FAR</div>
			</div>
			<div class="col s12 m12 l6">
				<div class="card">
					<div class="card-content">
						<div class="page-title">FORMATO FAR</div>
						<div class="row">
							<form id="AUTO" class="col s12" method="post" enctype="multipart/form-data">
								<?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<div class="row">
									<label for="fecha">Fecha</label><br>
									<input id="fecha" name="fecha" type="date" autocomplete="off" required>
								</div>

								<div class="input-field col s12">
									<select id="sedeorig" name="sedeorig" autocomplete="off" required>
										<option value="">Sede Origen</option>
										<?php 
$sql = "SELECT servicename from tblserviceassigned";
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
									<select id="tesireac" name="tesireac" autocomplete="off" required>
										<option value="">Técnico</option>
										<?php 
$sql = "SELECT EmpId,name,firstname,lastname from tblemployees order by firstname";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   
?>
										<option value="<?php echo htmlentities($result->EmpId);?>&nbsp;<?php echo htmlentities($result->firstname);?>&nbsp;<?php echo htmlentities($result->lastname);?>&nbsp;<?php echo htmlentities($result->name);?>" required><?php echo htmlentities($result->EmpId);?>&nbsp;<?php echo htmlentities($result->firstname);?>&nbsp;<?php echo htmlentities($result->lastname);?>&nbsp;<?php echo htmlentities($result->name);?></option>
										<?php }} ?>
									</select>
								</div>

								<div class="input-field col s12">
									<select id="turnoreac" name="turnoreac" autocomplete="off" required>
										<option value="">Turno</option>
										<option value="24X24">24X24</option>
										<option value="12X12">12X12</option>
									</select>
								</div>


								<div class="input-field col s12">
									<select id="sedecubre" name="sedecubre" autocomplete="off" required>
										<option value="">Sede por Cubrir</option>
<?php 
$sql = "SELECT servicename from tblserviceassigned";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   
?>
										<option value="<?php echo htmlentities($result->servicename);?>" required><?php echo htmlentities($result->servicename);?></option>
										<?php }} ?>
									</select>
								</div>

								<div class="input-field col s12">
									<select id="turnocubre" name="turnocubre" autocomplete="off" required>
										<option value="">Turno</option>
										<option value="24X24">24X24</option>
										<option value="12X12">12X12</option>
									</select>
								</div>



								<div class="input-field col s12">
									<label for="tesi">Técnico cubre</label>
									<input id="tesi" type="text" class="validate" autocomplete="off" name="tesi" required>
								</div>

								<div class="input-field col m6 s12">
									<label for="homex1">Motivo</label><br><br>
									<input type="radio" id="homex1p" name="motivo" value="FALTA" class="check"> <label for="homex1p">Falta</label><br>
									<input type="radio" id="homex1r" name="motivo" value="VACANTE" class="check"> <label for="homex1r">Vacante</label><br>
									<input type="radio" id="homex1o" name="motivo" value="VACACIONES" class="check"> <label for="homex1o">Vacaciones</label><br>
									<input type="radio" id="homex1t" name="motivo" value="INCAPACIDAD" class="check"> <label for="homex1t">Incapacidad</label><br>
									<input type="radio" id="homex1q" name="motivo" value="APOYO" class="check"> <label for="homex1q">Apoyo</label>

								</div>

								<div class="input-field col s12">
									<label for="homex2">Gen. doblete</label><br><br>
									<input type="radio" id="homex2q" name="gen" value="SI" class="check"> <label for="homex2q">SI</label>
									<input type="radio" id="homex2qq" name="gen" value="NO" class="check"> <label for="homex2qq">NO</label>
								</div>

								<div class="input-field col s12">
									<label for="notasup">Nota</label>
									<input id="notasup" type="text" class="validate" autocomplete="off" name="notasup">
								</div>
								<div class="input-field col s12">
									<button type="submit" name="add" onclick="return valid();" class="waves-effect waves-light btn indigo m-b-xs">AÑADIR</button>

								</div>

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