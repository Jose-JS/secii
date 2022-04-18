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
 
$folio=$_POST['folio'];
if (isset($_POST['add'])) {
    if (is_array($_POST['formatos'])) {
        $selected = '';
        $num_countries = count($_POST['formatos']);
        $current = 0;
        foreach ($_POST['formatos'] as $key => $value) {
            if ($current != $num_countries-1)
                $selected .= $value.',';
            else
                $selected .= $value.'';
            $current++;
        }
    }
}
	
	
	
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
$creatoruser=$_SESSION['supervisor'];
$action='inserción';
$fecha=$_POST['fecha'];
 
$sql="INSERT INTO tblformatab(folio,fecha,formatos,firm1,firm2,creatoruser,action) VALUES(:folio,:fecha,:selected,:contract,:contract1,:creatoruser,:action)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':folio',$folio,PDO::PARAM_STR);
	$query->bindParam(':fecha',$fecha,PDO::PARAM_STR);
    $query->bindParam(':selected',$selected,PDO::PARAM_STR);    
    $query->bindParam(':contract',$contract,PDO::PARAM_STR);
    $query->bindParam(':contract1',$contract1,PDO::PARAM_STR);
    $query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);
    $query->bindParam(':action',$action,PDO::PARAM_STR);
$query->execute();
 
$lastInsertId = $dbh->lastInsertId();
       
if($lastInsertId)
{

$msg="Registro de formato, creado con éxito";
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
 $sql = "SELECT MAX(folio)+1 as folio FROM tblformatab LIMIT 1";
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
	$c=$result->folio;
	if($c==null){
	$c=0+1;	
		
	}
	else{
		$c=$result->folio;
		//$c=4;
		}
?>

											<div class="input-field col m6 s12">
												<label for="folio">Folio</label><br>
												<input id="folio" name="folio" value="<?php echo htmlentities($c);?>" type="text" autocomplete="off" required readonly="readonly">
											</div>
											

											<script>
												function myFunction() {
													window.open("../supervisores/editdoublets2.php?i=<?php echo htmlentities($c);?>&l=v&l2=me&id=<?php echo htmlentities($_SESSION['id']);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction2(){
													window.open("../supervisores/adddoublets4.php?f=<?php echo htmlentities($c);?>", "_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction3() {
													window.open("../supervisores/adddoublets5.php?f=<?php echo htmlentities($c);?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												function myFunction4() {
													window.open("../supervisores/actaadministrativa.php?i=<?php echo htmlentities($c);?>&l=v&l2=me", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
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
$sql = "SELECT id,folio from  tbldoubletsa where folio=:n order by id desc limit 1";
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
												<?php if(($resul->folio) ==($resul->folio)) {
		$marcar="checked";?>

												<label for="annexed">Anexo</label><br><br>
												<input type="checkbox" id="annexeda" name="formatos[]" value="FORMATO FAR" class="check" onchange="window.open('../supervisores/adddoublets4.php?f=<?php echo htmlentities($c);?>','a','width=1200,height=800');"  <?php echo $marcar?>><label for="annexeda">Formato FAR</label>
												<?php					
}?> <?php if(($resul->folio)==null) {print"else";}?>

												<?php $cnt++;}}else{
													print"
												<label for='annexed'>Anexo</label><br><br>
												<input type='checkbox' id='annexeda' name='formatos[]' value='FORMATO FAR' class='check'onclick='myFunction2()'><label for='annexeda'>Formato FAR</label>";
}?>
											</div>
											<div class="input-field col m6 s12">
											
												<?php 
	   $n=$c;
//var_dump($n);
$sql = "SELECT id,folio from  tbldoubletsb where folio=:n order by id desc limit 1";
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
												<?php if(($resul->folio) ==($resul->folio)) {
		$marcar="checked";?>
											
												<input type="checkbox" id="annexedb" name="formatos[]" value="FORMATO FBR" class="check" onchange="window.open('../supervisores/adddoublets5.php?f=<?php echo htmlentities($c);?>','a','width=1200,height=800');"<?php echo $marcar?>> <label for="annexedb">Formato FBR</label>
																								<?php					
}?> <?php if(($resul->folio)==null) {print"else";}?>
										<?php $cnt++;}}else{
													print"
												<input type='checkbox' id='annexedb' name='formatos[]' value='FORMATO FBR' class='check'onclick='myFunction3()'><label for='annexedb'>Formato FBR</label>";
}?>
											</div>
											<div class="input-field col s12">
											<label for="fecha">Fecha</label><br>
									<input id="fecha" name="fecha" type="date" autocomplete="off" required>
											</div>
											<div class="input-field col m6 s12">
												<div id="signature-pad" class="signature-pad">
													<div class="description">FIRMA Y NOMBRE DE COORDINACION</div>
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
													<div class="description">FIRMA Y NOMBRE DIRECCION DE OPERACIONES</div>
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