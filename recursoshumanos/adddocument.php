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
							<?php 
                            $empid=$_GET['empid'];
                            $name=$_GET['name'];
                            ?>
								<?php if ($error) { ?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
								<div>
									<section>
										<div class="wizard-content">

											<h3> ARCHIVOS</h3>
											<hr style="border-color:black;">
											<h4> DOCUMENTOS</h4>
											<input type="hidden" name="name" id="name" value="<?php echo"$name";?>">
                                        <input type="hidden" name="empid" id="empid" value="<?php echo"$empid";?>">


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


											<!--<input type="button" name="previous" class="previous btn btn-default" value="Anterior" /><br>
											<button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>-->
											<input type="submit" class="waves-effect waves-light btn indigo m-b-xs" value="Subir archivos" />
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
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script>
        $(function() {
            $("#AUTO").on("submit", function(e) {
                e.preventDefault();
                var f = $(this);
                var formData = new FormData(document.getElementById("AUTO"));
                formData.append("dato", "valor");
                //formData.append(f.attr("name"), $(this)[0].files[0]);
                $.ajax({
                        url: "cadddocument.php",
                        type: "post",
                        dataType: "html",
                        data: formData,
                        beforeSend: function(b) {
                            if (b != 0) {
                                let timerInterval
                                Swal.fire({
                                    title: '',
                                    html: 'Se estan guardando tus documentos !',
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                        timerInterval = setInterval(() => {
                                            const content = Swal.getContent()
                                            if (content) {
                                                const b = content.querySelector('b')
                                                if (b) {
                                                    b.textContent = Swal.getTimerLeft()
                                                }
                                            }
                                        }, 100)
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                }).then((result) => {})
                            } else {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'OCURRIO UN ERROR!',
                                })
                            }
                        },
                        success: function(r) {
                            if (r != 0) {

                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'DOCUMENTOS GUARDADOS',
                                    showConfirmButton: false,
                                    timer: 2500
                                })
								document.getElementById("AUTO").reset();
								window.location.replace("manageemployee.php");
                            } else {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'OCURRIO UN ERROR!',
                                })
                            }
                        },
                        error: function(a) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'OCURRIO UN ERROR!',
                            })

                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    })
                    .done(function(res) {
                        console.log("Respuesta: " + res);
                    });
            });
        });

    </script>

	</body>

	</html>
<?php } ?>