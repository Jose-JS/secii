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
 

function optimizar_imagen($origen, $destino, $calidad) {
 
      $info = getimagesize($origen);
 
      if ($info['mime'] == 'image/jpeg'){
     $foto = imagecreatefromjpeg($origen);
      }
 
   else if ($info['mime'] == 'image/gif'){
     $foto = imagecreatefromgif($origen);
   }
 
   else if ($info['mime'] == 'image/png'){
     $foto = imagecreatefrompng($origen);
   }
 
   imagejpeg($foto, $destino, $calidad);
   
   return $destino;
   
}
$fecha22  = date("dmy");    
$no_aleatorio22  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta22 ='../supervisores/fotochecklist/'.$fecha22.$no_aleatorio22.$_FILES['foto']['name'];
opendir($ruta22);
copy(optimizar_imagen($_FILES['foto']['tmp_name'],$ruta22,40));
//copy($_FILES['foto']['tmp_name'],$ruta22);	
//$foto= optimizar_imagen(copy( $_FILES['foto']['tmp_name'], $destino,40));
$nombre22=$ruta22;	
	
$empid =$_POST['empid']; 
$tesi=$_POST['tesi'];   
$documentos=$_POST['documentos'];
$introduccion=$_POST['introduccion'];	
$aviso=$_POST['aviso'];	
$reglamento=$_POST['reglamento'];	
$alta=$_POST['alta'];	
$boleta=$_POST['boleta'];	
$huellas=$_POST['huellas'];	
$contrato=$_POST['contrato'];	
$credencial=$_POST['credencial'];	
$acuerdo=$_POST['acuerdo'];	
$creatoruser=$_SESSION['supervisor'];
$fecha=$_POST['fecha'];	
$action=inserción;	

$sql="INSERT INTO tblchecklist(empid,tesi,documentos,introduccion,aviso,reglamento,alta,boleta,huellas,contrato,credencial,acuerdo,fecha,creatoruser,action,foto) VALUES(:empid,:tesi,:documentos,:introduccion,:aviso,:reglamento,:alta,:boleta,:huellas,:contrato,:credencial,:acuerdo,:fecha,:creatoruser,:action,:nombre22)";
$query = $dbh->prepare($sql);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->bindParam(':tesi',$tesi,PDO::PARAM_STR);	
$query->bindParam(':documentos',$documentos,PDO::PARAM_STR);
$query->bindParam(':introduccion',$introduccion,PDO::PARAM_STR);	
$query->bindParam(':aviso',$aviso,PDO::PARAM_STR);
$query->bindParam(':reglamento',$reglamento,PDO::PARAM_STR);
$query->bindParam(':alta',$alta,PDO::PARAM_STR);    
$query->bindParam(':boleta',$boleta,PDO::PARAM_STR);    
$query->bindParam(':huellas',$huellas,PDO::PARAM_STR);	
$query->bindParam(':contrato',$contrato,PDO::PARAM_STR);	
$query->bindParam(':credencial',$credencial,PDO::PARAM_STR);		
$query->bindParam(':acuerdo',$acuerdo,PDO::PARAM_STR);		
$query->bindParam(':fecha',$fecha,PDO::PARAM_STR);		
$query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);        
$query->bindParam(':action',$action,PDO::PARAM_STR);  
$query->bindParam(':nombre22',$nombre22,PDO::PARAM_STR);  	
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
	<title>FORMATO CHECKLIST.</title>



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
								<h3>Formato Checklist</h3>

								<div class="row">
									<div class="col m6">
										<div class="row">

											<!--	<div class="input-field col s12">
												<select id="tesi" name="tesi" autocomplete="off" required>
													<option value="">Técnico</option>
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
											</div>-->

											<div class="input-field col m6 s12">
												<label for="empid">Matricula</label>
												<input id="empid" name="empid" type="text" autocomplete="off">
											</div>

											<div class="input-field col m6 s12">
												<label for="tesi">Nombre TESI</label>
												<input id="tesi" name="tesi" type="text" autocomplete="off">
											</div>


											<div class="input-field col s12">
												<label for="documentos">Documentos</label>
												<input id="docuemntos" name="documentos" type="text" autocomplete="off">
											</div>

											<div class="input-field col m6 s12">
												<label for="introduccion">Introducción</label><br>
												<input type="radio" id="introduccions" name="introduccion" value="si" class="test"> <label for="introduccions">Si</label>
												<input type="radio" id="introduccionn" name="introduccion" value="no" class="test"> <label for="introduccionn" class="only-one">No</label>
											</div>

											<div class="input-field col m6 s12">
												<label for="aviso">Aviso</label><br>
												<input type="radio" id="avisos" name="aviso" value="si" class="test"> <label for="avisos">Si</label>
												<input type="radio" id="avison" name="aviso" value="no" class="test"> <label for="avison" class="only-one">No</label>
											</div>

											<div class="input-field col m6 s12">
												<label for="reglamento">Reglamento</label><br>
												<input type="radio" id="reglamentos" name="reglamento" value="si" class="test"> <label for="reglamentos">Si</label>
												<input type="radio" id="reglamenton" name="reglamento" value="no" class="test"> <label for="reglamenton" class="only-one">No</label>
											</div>

											<div class="input-field col m6 s12">
												<label for="alta">Alta</label><br>
												<input type="radio" id="altas" name="alta" value="si" class="test"> <label for="altas">Si</label>
												<input type="radio" id="altan" name="alta" value="no" class="test"> <label for="altan" class="only-one">No</label>
											</div>


											<div class="input-field col m6 s12">
												<label for="boleta">Ficha Técnica</label><br>
												<input type="radio" id="boletas" name="boleta" value="si" class="test"> <label for="boletas">Si</label>
												<input type="radio" id="boletan" name="boleta" value="no" class="test"> <label for="boletan" class="only-one">No</label>
											</div>

											<div class="input-field col m6 s12">
												<label for="huellas">Huellas</label><br>
												<input type="radio" id="huellass" name="huellas" value="si" class="test"> <label for="huellass">Si</label>
												<input type="radio" id="huellasn" name="huellas" value="no" class="test"> <label for="huellasn" class="only-one">No</label>
											</div>

											<div class="input-field col m6 s12">
												<label for="contrato">Firma de contrato</label><br>
												<input type="radio" id="contratos" name="contrato" value="si" class="test"> <label for="contratos">Si</label>
												<input type="radio" id="contraton" name="contrato" value="no" class="test"> <label for="contraton" class="only-one">No</label>
											</div>

											<div class="input-field col m6 s12">

												<label for="credencial">Recepción de credencial</label><br>
												<input type="radio" id="credencials" name="credencial" value="si" class="test"> <label for="credencials">Si</label>
												<input type="radio" id="credencialn" name="credencial" value="no" class="test"> <label for="credencialn" class="only-one">No</label>
											</div>

											<div class="input-field col m6 s12">
												<label for="acuerdo">Acuerdo</label><br>
												<input type="radio" id="acuerdos" name="acuerdo" value="si" class="test"> <label for="acuerdos">Si</label>
												<input type="radio" id="acuerdon" name="acuerdo" value="no" class="test"> <label for="acuerdon" class="only-one">No</label>
											</div>

											<div class="input-field col m6 s12">
												<label for="fecha">Fecha</label><br>
												<input id="fecha" name="fecha" type="date" autocomplete="off" required>
											</div>

											<div class="input-field col m6 s12">
												<label for="foto">FOTO<font color="red">*</font></label><br><br>
												<!-- Abre automatica la camara
				                            <input id="foto" name="foto" type="file" capture="camera">
				                             -->
												<input id="foto" name="foto" type="file">
											</div>
										</div>
									</div>

								</div>
							</div>

							<button type="submit" name="add" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>

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


</body>

</html>

<?php } ?>
