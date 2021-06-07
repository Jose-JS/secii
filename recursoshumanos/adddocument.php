<?php
session_start();

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
//error_reporting(E_ALL);

// Motrar todos los errores de PHP
//ini_set('error_reporting', E_ALL);

include('includes/config.php');
if (strlen($_SESSION['recursos']) == 0) {
	header('location:index.php');
} else {
	if (isset($_POST['add'])) {
		$eid = intval($_GET['empid']);
		$name = $_GET['name'];
		$rutax = '../Documentos/' . $name;
		if (!file_exists($rutax)) {
			mkdir($rutax, 0777, true);
		}
		$foto2 = $_FILES['foto2']['name'];
		if ($foto2 <> null) {
			$fecha2  = date("dmy");
			$no_aleatorio2  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta2 = '../Documentos/' . $name . '/' . $fecha2 . $no_aleatorio2 . $_FILES['foto2']['name']; //Acta de nacimiento
			opendir($ruta2);
			copy($_FILES['foto2']['tmp_name'], $ruta2);
			$nombre2 = $ruta2;
		}

		$foto3 = $_FILES['foto3']['name'];
		if ($foto3 <> null) {
			$fecha3  = date("dmy");
			$no_aleatorio3  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     	
			$ruta3 = '../Documentos/' . $name . '/' . $fecha3 . $no_aleatorio3 . $_FILES['foto3']['name']; //Comprobante de Domicilio
			opendir($ruta3);
			copy($_FILES['foto3']['tmp_name'], $ruta3);
			$nombre3 = $ruta3;
		}

		$foto4 = $_FILES['foto4']['name'];
		if ($foto4 <> null) {
			$fecha4  = date("dmy");
			$no_aleatorio4  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta4 = '../Documentos/' . $name . '/' . $fecha4 . $no_aleatorio4 . $_FILES['foto4']['name']; //CERTIFICADO DE ESTUDIOS
			opendir($ruta4);
			copy($_FILES['foto4']['tmp_name'], $ruta4);
			$nombre4 = $ruta4;
		}


		$foto5 = $_FILES['foto5']['name'];
		if ($foto5 <> null) {
			$fecha5  = date("dmy");
			$no_aleatorio5  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta5 = '../Documentos/' . $name . '/' . $fecha5 . $no_aleatorio5 . $_FILES['foto5']['name']; //Cartilla militar
			opendir($ruta5);
			copy($_FILES['foto5']['tmp_name'], $ruta5);
			$nombre5 = $ruta5;
		}


		$foto6 = $_FILES['foto6']['name'];
		if ($foto6 <> null) {
			$fecha6  = date("dmy");
			$no_aleatorio6  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta6 = '../Documentos/' . $name . '/' . $fecha6 . $no_aleatorio6 . $_FILES['foto6']['name']; //INE
			opendir($ruta6);
			copy($_FILES['foto6']['tmp_name'], $ruta6);
			$nombre6 = $ruta6;
		}

		$foto7 = $_FILES['foto7']['name'];
		if ($foto7 <> null) {
			$fecha7  = date("dmy");
			$no_aleatorio7  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta7 = '../Documentos/' . $name . '/' . $fecha7 . $no_aleatorio7 . $_FILES['foto7']['name']; //No. imss
			opendir($ruta7);
			copy($_FILES['foto7']['tmp_name'], $ruta7);
			$nombre7 = $ruta7;
		}


		$foto8 = $_FILES['foto8']['name'];
		if ($foto8 <> null) {
			$fecha8  = date("dmy");
			$no_aleatorio8  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta8 = '../Documentos/' . $name . '/' . $fecha8 . $no_aleatorio8 . $_FILES['foto8']['name']; //RFC
			opendir($ruta8);
			copy($_FILES['foto8']['tmp_name'], $ruta8);
			$nombre8 = $ruta8;
		}


		$foto9 = $_FILES['foto9']['name'];
		if ($foto9 <> null) {
			$fecha9  = date("dmy");
			$no_aleatorio9  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta9 = '../Documentos/' . $name . '/' . $fecha9 . $no_aleatorio9 . $_FILES['foto9']['name']; //Curp
			opendir($ruta9);
			copy($_FILES['foto9']['tmp_name'], $ruta9);
			$nombre9 = $ruta9;
		}

		$foto10 = $_FILES['foto10']['name'];
		if ($foto10 <> null) {
			$fecha10  = date("dmy");
			$no_aleatorio10  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta10 = '../Documentos/' . $name . '/' . $fecha10 . $no_aleatorio10 . $_FILES['foto10']['name']; //Antecedentes no penales
			opendir($ruta10);
			copy($_FILES['foto10']['tmp_name'], $ruta10);
			$nombre10 = $ruta10;
		}

		$foto11 = $_FILES['foto11']['name'];
		if ($foto11 <> null) {
			$fecha11  = date("dmy");
			$no_aleatorio11  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta11 = '../Documentos/' . $name . '/' . $fecha11 . $no_aleatorio11 . $_FILES['foto11']['name']; //No adeudo infonavit
			opendir($ruta11);
			copy($_FILES['foto11']['tmp_name'], $ruta11);
			$nombre11 = $ruta11;
		}

		$foto16 = $_FILES['foto16']['name'];
		if ($foto16 <> null) {
			$fecha16  = date("dmy");
			$no_aleatorio16  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta16 = '../Documentos/' . $name . '/' . $fecha16 . $no_aleatorio16 . $_FILES['foto16']['name']; //HUELLAS DACTILARES
			opendir($ruta16);
			copy($_FILES['foto16']['tmp_name'], $ruta16);
			$nombre16 = $ruta16;
		}

		$foto17 = $_FILES['foto17']['name'];
		if ($foto17 <> null) {
			$fecha17  = date("dmy");
			$no_aleatorio17  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta17 = '../Documentos/' . $name . '/' . $fecha17 . $no_aleatorio17 . $_FILES['foto17']['name']; //ESTUDIO SOCIOECONOMICO
			opendir($ruta17);
			copy($_FILES['foto17']['tmp_name'], $ruta17);
			$nombre17 = $ruta17;
		}

		$foto18 = $_FILES['foto18']['name'];
		if ($foto18 <> null) {
			$fecha18  = date("dmy");
			$no_aleatorio18  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta18 = '../Documentos/' . $name . '/' . $fecha18 . $no_aleatorio18 . $_FILES['foto18']['name']; //PSICOMETRIA
			opendir($ruta18);
			copy($_FILES['foto18']['tmp_name'], $ruta18);
			$nombre18 = $ruta18;
		}


		$foto20 = $_FILES['foto20']['name'];
		if ($foto20 <> null) {
			$fecha20  = date("dmy");
			$no_aleatorio20  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta20 = '../Documentos/' . $name . '/' . $fecha20 . $no_aleatorio20 . $_FILES['foto20']['name']; //MEDIO CUERPO
			opendir($ruta20);
			copy($_FILES['foto20']['tmp_name'], $ruta20);
			$nombre20 = $ruta20;
		}

		$foto21 = $_FILES['foto21']['name'];
		if ($foto21 <> null) {
			$fecha21  = date("dmy");
			$no_aleatorio21  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta21 = '../Documentos/' . $name . '/' . $fecha21 . $no_aleatorio21 . $_FILES['foto21']['name']; //CUERPO COMPLETO
			opendir($ruta21);
			copy($_FILES['foto21']['tmp_name'], $ruta21);
			$nombre21 = $ruta21;
		}

		$foto22 = $_FILES['foto22']['name'];
		if ($foto22 <> null) {
			$fecha22  = date("dmy");
			$no_aleatorio22  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta22 = '../Documentos/' . $name . '/' . $fecha22 . $no_aleatorio22 . $_FILES['foto22']['name']; //TOXICOLOGICO
			opendir($ruta22);
			copy($_FILES['foto22']['tmp_name'], $ruta22);
			$nombre22 = $ruta22;
		}

		$foto23 = $_FILES['foto23']['name'];
		if ($foto23 <> null) {
			$fecha23  = date("dmy");
			$no_aleatorio23  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta23 = '../Documentos/' . $name . '/' . $fecha23 . $no_aleatorio23 . $_FILES['foto23']['name']; //PERFIL IZQUIERDO
			opendir($ruta23);
			copy($_FILES['foto23']['tmp_name'], $ruta23);
			$nombre23 = $ruta23;
		}


		$foto24 = $_FILES['foto24']['name'];
		if ($foto24 <> null) {
			$fecha24  = date("dmy");
			$no_aleatorio24  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta24 = '../Documentos/' . $name . '/' . $fecha24 . $no_aleatorio24 . $_FILES['foto24']['name']; //PERFIL DERECHO
			opendir($ruta24);
			copy($_FILES['foto24']['tmp_name'], $ruta24);
			$nombre24 = $ruta24;
		}

		$foto25 = $_FILES['foto25']['name'];
		if ($foto25 <> null) {
			$fecha25  = date("dmy");
			$no_aleatorio25  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta25 = '../Documentos/' . $name . '/' . $fecha25 . $no_aleatorio25 . $_FILES['foto25']['name']; //CERTIFICADO MEDICO
			opendir($ruta25);
			copy($_FILES['foto25']['tmp_name'], $ruta25);
			$nombre25 = $ruta25;
		}

		$foto26 = $_FILES['foto26']['name'];
		if ($foto26 <> null) {
			$fecha26  = date("dmy");
			$no_aleatorio26  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta26 = '../Documentos/' . $name . '/' . $fecha26 . $no_aleatorio26 . $_FILES['foto26']['name']; //REFERENCIAS LABORALES
			opendir($ruta26);
			copy($_FILES['foto26']['tmp_name'], $ruta26);
			$nombre26 = $ruta26;
		}

		$foto27 = $_FILES['foto27']['name'];
		if ($foto27 <> null) {
			$fecha27  = date("dmy");
			$no_aleatorio27  = rand(0, 100) * rand(0, 100); //Generamos dos Digitos aleatorios     
			$ruta27 = '../Documentos/' . $name . '/' . $fecha27 . $no_aleatorio27 . $_FILES['foto27']['name']; //CONSTANCIA FONACOT
			opendir($ruta27);
			copy($_FILES['foto27']['tmp_name'], $ruta27);
			$nombre27 = $ruta27;
		}

		$creatoruser = $_SESSION['recursos'];
		$action = 'inserción';

		$sql = "INSERT INTO tbldocument(idemp,name,namedoc,creatoruser,action)
VALUES(:eid,'ACTA DE NACIMIENTO',:nombre2,:creatoruser,:action),
      (:eid,'COMPROBANTE DE DOMICILIO',:nombre3,:creatoruser,:action),
	  (:eid,'CERTIFICADO DE ESTUDIOS',:nombre4,:creatoruser,:action),
	  (:eid,'CARTILLA MILITAR',:nombre5,:creatoruser,:action),
	  (:eid,'INE',:nombre6,:creatoruser,:action),
	  (:eid,'NUMERO DE SEGURIDAD SOCIAL',:nombre7,:creatoruser,:action),
	  (:eid,'RFC',:nombre8,:creatoruser,:action),
	  (:eid,'CURP',:nombre9,:creatoruser,:action),
	  (:eid,'ANTECEDENTES NO PENALES',:nombre10,:creatoruser,:action),
	  (:eid,'CONSTANCIA DE NO ADEUDO INFONAVIT',:nombre11,:creatoruser,:action),
	  (:eid,'HUELLAS DACTILARES',:nombre16,:creatoruser,:action),
	  (:eid,'ESTUDIO SOCIOECONOMICO',:nombre17,:creatoruser,:action),
	  (:eid,'PSICOMETRIA',:nombre18,:creatoruser,:action),
	  (:eid,'MEDIO CUERPO',:nombre20,:creatoruser,:action),
	  (:eid,'CUERPO COMPLETO',:nombre21,:creatoruser,:action),
	  (:eid,'TOXICOLOGICO',:nombre22,:creatoruser,:action),
	  (:eid,'PERFIL IZQUIERDO',:nombre23,:creatoruser,:action),
	  (:eid,'PERFIL DERECHO',:nombre24,:creatoruser,:action),
	  (:eid,'CERTIFICADO MEDICO',:nombre25,:creatoruser,:action),
	  (:eid,'REFERENCIAS LABORALES',:nombre26,:creatoruser,:action),
	  (:eid,'CONSTANCIA FONACOT',:nombre27,:creatoruser,:action)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query->bindParam(':nombre2', $nombre2, PDO::PARAM_STR);
		$query->bindParam(':nombre3', $nombre3, PDO::PARAM_STR);
		$query->bindParam(':nombre4', $nombre4, PDO::PARAM_STR);
		$query->bindParam(':nombre5', $nombre5, PDO::PARAM_STR);
		$query->bindParam(':nombre6', $nombre6, PDO::PARAM_STR);
		$query->bindParam(':nombre7', $nombre7, PDO::PARAM_STR);
		$query->bindParam(':nombre8', $nombre8, PDO::PARAM_STR);
		$query->bindParam(':nombre9', $nombre9, PDO::PARAM_STR);
		$query->bindParam(':nombre10', $nombre10, PDO::PARAM_STR);
		$query->bindParam(':nombre11', $nombre11, PDO::PARAM_STR);
		$query->bindParam(':nombre16', $nombre16, PDO::PARAM_STR);
		$query->bindParam(':nombre17', $nombre17, PDO::PARAM_STR);
		$query->bindParam(':nombre18', $nombre18, PDO::PARAM_STR);
		$query->bindParam(':nombre19', $nombre19, PDO::PARAM_STR);
		$query->bindParam(':nombre20', $nombre20, PDO::PARAM_STR);
		$query->bindParam(':nombre21', $nombre21, PDO::PARAM_STR);
		$query->bindParam(':nombre22', $nombre22, PDO::PARAM_STR);
		$query->bindParam(':nombre23', $nombre23, PDO::PARAM_STR);
		$query->bindParam(':nombre24', $nombre24, PDO::PARAM_STR);
		$query->bindParam(':nombre25', $nombre25, PDO::PARAM_STR);
		$query->bindParam(':nombre26', $nombre26, PDO::PARAM_STR);
		$query->bindParam(':nombre27', $nombre27, PDO::PARAM_STR);
		$query->bindParam(':creatoruser', $creatoruser, PDO::PARAM_STR);
		$query->bindParam(':action', $action, PDO::PARAM_STR);

		$query->execute();
		$lastInsertId = $dbh->lastInsertId();

		$sql3 = "UPDATE tblemployees SET visibility='1' WHERE id='" . $_GET["empid"] . "'";
		$query3 = $dbh->prepare($sql3);
		$query3->execute();
		$lastInsertId = $dbh->lastInsertId();

		$msg = "Documentos de Técnico agregados con éxito";
		echo "<script>
 if ( window.history.replaceState ) {
   window.history.replaceState( null, null, window.location.href );
 }
</script>";

		header('location:manageemployee.php');
	}

?>

	<!DOCTYPE html>
	<html lang="en">

	<head>

		<!-- Title -->
		<title>Recursos Humanos | Agregar Documentos</title>

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
		</style>
		<script type="text/javascript">
			function comprobar(checkbox) {
				otro = checkbox.parentNode.querySelector("[type=checkbox]:not(#" + checkbox.id + ")");

				if (otro.checked) {
					otro.checked = false;
				}
			}


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
		<?php include('includes/header.php'); ?>

		<?php include('includes/sidebar.php'); ?>
		<main class="mn-inner">
			<div class="row">

				<div class="col s12 m12 l12">
					<div class="card">
						<div class="card-content">

							<form id="AUTO" method="post" name="addemp" enctype="multipart/form-data">
								<?php if ($error) { ?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
								<div>
									<section>
										<div class="wizard-content">

											<h3> ARCHIVOS</h3>
											<hr style="border-color:black;">
											<h4> DOCUMENTOS</h4>


											<div class="row">
												<div class="col m6">
													<div class="row">

														<div class="input-field col s12">
															<label for="foto2">Acta de nacimiento </label><br><br>
															<input id="foto2" class="form-control" name="foto2" type="file" maxlength="30" autocomplete="off">
														</div>
														<div class="input-field col s12">
															<label for="foto3">Comprobante de domicilio</label><br><br>
															<input id="foto3" class="form-control" name="foto3" type="file" maxlength="30" autocomplete="off">
														</div>
														<div class="input-field col s12">
															<label for="foto6">Ine o Ife </label><br><br>
															<input id="foto6" class="form-control" name="foto6" type="file" maxlength="30" autocomplete="off">
														</div>
														<div class="input-field col s12">
															<label for="foto7">No. imss </label><br><br>
															<input id="foto7" class="form-control" name="foto7" type="file" maxlength="30" autocomplete="off">
														</div>
														<div class="input-field col s12">
															<label for="foto10">Antecedentes no penales </label><br><br>
															<input id="foto10" class="form-control" name="foto10" type="file" maxlength="30" autocomplete="off">
														</div>

													</div>
												</div>


												<div class="col m6">
													<div class="row">
														<div class="input-field col s12">
															<label for="foto4">Certificado de estudios </label><br><br>
															<input id="foto4" class="form-control" name="foto4" type="file" maxlength="30" autocomplete="off">
														</div>
														<div class="input-field col s12">
															<label for="foto5">Cartilla militar</label><br><br>
															<input id="foto5" class="form-control" name="foto5" type="file" maxlength="30" autocomplete="off">
														</div>
														<div class="input-field col s12">
															<label for="foto8">RFC </label><br><br>
															<input id="foto8" class="form-control" name="foto8" type="file" maxlength="30" autocomplete="off">
														</div>
														<div class="input-field col s12">
															<label for="foto9">Curp</label><br><br>
															<input id="foto9" class="form-control" name="foto9" type="file" maxlength="30" autocomplete="off">
														</div>
														<div class="input-field col s12">
															<label for="foto11">No adeudo infonavit</label><br><br>
															<input id="foto11" class="form-control" name="foto11" type="file" maxlength="30" autocomplete="off">
														</div>


													</div>
												</div>
											</div>

											<hr style="border-color:black;">
											<h4> HUELLAS DIGITALES</h4>

											<div class="row">
												<div class="col m6">
													<div class="row">

														<div class="input-field col m6 s12">
															<label for="foto16">Huellas y firma</label><br><br>
															<input id="foto16" class="form-control" name="foto16" type="file" maxlength="30" autocomplete="off">
														</div>

														<div class="input-field col m6 s12">
															<label for="foto17">Estudio socioeconomico </label><br><br>
															<input id="foto17" class="form-control" name="foto17" type="file" maxlength="30" autocomplete="off">
														</div>
														<div class="row">
															<div class="input-field col m6 s12">
																<label for="foto27">Constancia fonacot</label><br><br>
																<input id="foto27" class="form-control" name="foto27" type="file" maxlength="30" autocomplete="off">
															</div>
														</div>

													</div>
												</div>


												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="foto18">Psicometria</label><br><br>
															<input id="foto18" class="form-control" name="foto18" type="file" maxlength="30" autocomplete="off">
														</div>
														<div class="row">
															<div class="input-field col m6 s12">
																<label for="foto25">Certificado médico</label><br><br>
																<input id="foto25" class="form-control" name="foto25" type="file" maxlength="30" autocomplete="off">
															</div>
														</div>
														<div class="row">
															<div class="input-field col m6 s12">
																<label for="foto26">Referencias laborales</label><br><br>
																<input id="foto26" class="form-control" name="foto26" type="file" maxlength="30" autocomplete="off">
															</div>
														</div>


													</div>
												</div>
											</div>

											<hr style="border-color:black;">
											<h4>FOTOGRAFIAS TECNICO</h4>

											<div class="row">
												<div class="col m6">
													<div class="row">

														<div class="input-field col m6 s12">
															<label for="foto20">Medio cuerpo </label><br><br>
															<input id="foto20" class="form-control" name="foto20" type="file" maxlength="30" autocomplete="off">
														</div>

														<div class="input-field col m6 s12">
															<label for="foto21">Cuerpo completo </label><br><br>
															<input id="foto21" class="form-control" name="foto21" type="file" maxlength="30" autocomplete="off">
														</div>

														<div class="input-field col m6 s12">
															<label for="foto22">Toxicológico </label><br><br>
															<input id="foto22" class="form-control" name="foto22" type="file" maxlength="30" autocomplete="off">
														</div>
													</div>
												</div>


												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="foto23">Perfil izquierdo </label><br><br>
															<input id="foto23" class="form-control" name="foto23" type="file" maxlength="30" autocomplete="off">
														</div>

														<div class="input-field col m6 s12">
															<label for="foto24">Perfil derecho </label><br><br>
															<input id="foto24" class="form-control" name="foto24" type="file" maxlength="30" autocomplete="off">
														</div>



													</div>
												</div>
											</div>


											<!--<input type="button" name="previous" class="previous btn btn-default" value="Anterior" /><br>-->
											<button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>
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

	</body>

	</html>
<?php } ?>