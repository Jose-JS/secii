<?php
session_start();

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
//error_reporting(E_ALL);
 
// Motrar todos los errores de PHP
//ini_set('error_reporting', E_ALL);

include('includes/config.php');
if(strlen($_SESSION['supervisor'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
$n=$_GET['i'];	
$sql = "SELECT * from  tblformatab where folio=:n order by id desc limit 1";
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

                   if(($resul->firm1) ==null && ($resul->firm2) ==null) {
					   $error="Tiene que tener las dos firmas para guardar.";
echo "<script>
 if ( window.history.replaceState ) {
     window.history.replaceState( null, null, window.location.href );
 }
</script>";	


}
                   else if(($resul->firm1) ==$resul->firm1 && ($resul->firm2) ==null) {
					   $error="Tiene que tener las dos firmas para guardar.";
echo "<script>
 if ( window.history.replaceState ) {
     window.history.replaceState( null, null, window.location.href );
 }
</script>";	


}

                  else if(($resul->firm1) ==null && ($resul->firm2) ==$resul->firm2) {
					   $error="Tiene que tener las dos firmas para guardar.";
echo "<script>
 if ( window.history.replaceState ) {
     window.history.replaceState( null, null, window.location.href );
 }
</script>";	


}	
	
	
else{
echo "<script>  
alert('Registro de formato, creado con éxito');
</script>"; 	
echo "<script>
 if ( window.history.replaceState ) {
     window.history.replaceState( null, null, window.location.href );
 }
</script>";    
echo "<script type='text/javascript'> document.location = 'managedoublets3.php'; </script>";	
	
	
	

}

}}



}
    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Title -->
	<title>FORMATO FAR Y FBR.</title>



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
								<h3>Formato FAR y FBR</h3>

								<div class="row">
									<div class="col m6">
										<div class="row">


<?php
	$c=$_GET['i'];	
 $sql = "SELECT MAX(folio) as folio FROM tblformatab LIMIT 1";
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
	
?>

											<div class="input-field col m6 s12">
												<label for="folio">Folio</label><br>
												<input id="folio" name="folio" value="<?php echo htmlentities($c);?>" type="text" autocomplete="off" required readonly="readonly">
											</div>
											

											<script>

												function myFunction2(){
													window.open("../supervisores/adddoubletsf1.php?f=<?php echo htmlentities($c);?>", "_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction3() {
													window.open("../supervisores/adddoubletsf2.php?f=<?php echo htmlentities($c);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												

											</script>
											<script>
		function habilitar(value)
		{
			if(value==true){
				// deshabilitamos
				document.getElementById("annexeda").disabled=true;
			}
		}
	   function habilitar2(value)
		{
			if(value==true){
				// deshabilitamos
				document.getElementById("annexedb").disabled=true;
			}
		}
	</script>

											<div class="input-field col m6 s12">
												<?php 
	   $n=$c;
//var_dump($n);
$sql = "SELECT * from  tblformatab where folio=:n order by id desc limit 1";
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
												<?php if(($resul->firm1) ==null) {
		$marcar="checked";
												
												print"
												<label for='annexed'></label><br><br>
												<input type='checkbox' id='annexeda' name='formatos[]' value='FORMATO FAR' class='check'onclick='myFunction2()'><label for='annexeda'>Firma Coordinador</label>";?>

												
												<?php					
} 	else{$marcar="checked";?>
						
						
												<input type="checkbox" id="annexeda" name="formatos[]" value="FORMATO FAR" class="check" onchange="window.open('../supervisores/adddoubletsf1.php?f=<?php echo htmlentities($c);?>','a','width=1200,height=800');"  <?php echo $marcar?>><label for="annexeda">Firma Coordinador</label>
													
<?php } ?>

												<?php $cnt++;}}
	
?>
											</div>
											
											
											
											<div class="input-field col m6 s12">
<?php											
$sql = "SELECT * from  tblformatab where folio=:n order by id desc limit 1";
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
												<?php if(($resul->firm2) ==null) {
		$marcar="checked";
												
												print"
												<label for='annexed2'></label><br><br>
												<input type='checkbox' id='annexeda2' name='formatos[]' value='Firma Director' class='check'onclick='myFunction3()'><label for='annexeda2'>Firma Director</label>";?>

												
												<?php					
} 	else{$marcar="checked";?>
						
						
												<input type="checkbox" id="annexeda2" name="formatos[]" value="Firma Director" class="check" onchange="window.open('../supervisores/adddoubletsf2.php?f=<?php echo htmlentities($c);?>','a','width=1200,height=800');"  <?php echo $marcar?>><label for="annexeda2">Firma Director</label>
													
<?php } ?>

												<?php $cnt++;}}
	
?>
											</div>											

											


										</div>
									</div>

								</div>
							</div>

<button type="submit" name="add" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>
					</div>
<?php $cnt++;} }?>
					
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
<?php } ?>