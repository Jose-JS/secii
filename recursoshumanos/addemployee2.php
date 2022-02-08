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


?>

	<!DOCTYPE html>
	<html lang="en">

	<head>

		<!-- Title -->
		<title>Recursos Humanos | Agregar Técnico</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta charset="UTF-8">
		<meta name="description" content="Responsive Admin Dashboard Template" />
		<meta name="keywords" content="admin,dashboard" />
		<meta name="author" content="Steelcoders" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


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
			function comprobar(checkbox) {
				otro = checkbox.parentNode.querySelector("[type=checkbox]:not(#" + checkbox.id + ")");

				if (otro.checked) {
					otro.checked = false;
				}
			}


			function valid() {
				if (document.addemp.password.value != document.addemp.confirmpassword.value) {
					alert("La nueva contraseña y el campo Confirmar contraseña no coinciden !!");
					document.addemp.confirmpassword.focus();
					return false;
				}
				var txtDepartament = document.getElementById('department').selectedIndex;
				var txtAssignedservice = document.getElementById('assignedservice').selectedIndex;
				var txtFechini = document.getElementById('fechini').value;
				var txtName = document.getElementById('name').value;
				var txtFirstname = document.getElementById('firstname').value;
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




				if (txtDepartament == null || txtDepartament == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione un puesto',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor seleccione un puesto');
					return false;
				} else if (txtAssignedservice == null || txtAssignedservice == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione un servicio',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					//alert('[ERROR] Por favor seleccione un servicio');
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
		</script>

		<script>
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
				<div class="col s12 m12 l12">
					<div class="card">
						<div class="card-content">
							<div class="progress">
								<div class="progress-bar progress-bar-striped active" role="progressbar" style="height: 20px;" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<form id="AUTO" method="post" name="addemp" enctype="multipart/form-data">
								<div>
									<h3>FICHA TECNICA</h3>
									<section>
										<div class="wizard-content">
											<div class="row">
												<fieldset>
													<div class="col m6">
														<div class="row">
															<div class="input-field col m6 s12">
																<label for="empcode">Matrícula (debe ser única)</label>
																<input name="empcode" id="empcode" onBlur="checkAvailabilityEmpid()" maxlength="6" type="text" autocomplete="off" tabindex="1" required>
																<span id="empid-availability" style="font-size:12px;"></span>
															</div>
															<div class="input-field col m6 s12">
																<select id="department" name="department" autocomplete="off" tabindex="2" required>
																	<option value="">Puesto</option>
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
																<label for="name">Nombre</label>
																<input id="name" name="name" type="text" tabindex="3" required>
															</div>

															<div class="input-field col m6 s12">
																<label for="firstName">Apellido Paterno</label>
																<input id="firstname" name="firstName" tabindex="4" type="text" required>
															</div>

															<div class="input-field col m6 s12">
																<label for="lastName">Apellido Materno</label>
																<input id="lastname" tabindex="5" name="lastName" type="text" autocomplete="off" required>
															</div>


															<div class="input-field col m6 s12">
																<label for="placebirth">Lugar de Nacimiento</label>
																<input id="placebirth" tabindex="6" name="placebirth" type="text" required>
															</div>

															<div class="input-field col m6 s12">
																<label for="nationality">Nacionalidad</label><br>
																<input id="nationality" tabindex="7" name="nationality" type="text" autocomplete="off" required>
															</div>

															<div class="input-field col m6 s12">
																<label for="nationality">Fecha de nacimiento</label><br>
																<input id="dob" name="dob" tabindex="8" type="date" autocomplete="off">
															</div>


															<div class="input-field col m6 s12">
																<label for="age">Edad</label>
																<input id="age" name="age" tabindex="9" type="text" onclick="javascript:calcular_edad();" maxlength="2" autocomplete="off" required>
															</div>

															<div class="input-field col m6 s12">
																<label for="phonelocal">Telefono Local</label>
																<input name="phonelocal" id="phonelocal" type="tel" maxlength="10" tabindex="10" autocomplete="off">
															</div>


															<div class="input-field col m6 s12">
																<label for="phonerecado">Telefono de Recados</label>
																<input name="phonerecado" id="phonerecado" type="tel" maxlength="10" tabindex="11" autocomplete="off" required>
															</div>

															<div class="input-field col m6 s12">
																<label for="phone">Número de teléfono móvil</label>
																<input id="mobileno" name="mobileno" type="tel" maxlength="10" tabindex="12" autocomplete="off" required>
															</div>

															<div class="input-field col s12">
																<label for="address">Dirección</label>
																<input id="address" tabindex="13" name="address" type="text" autocomplete="off" placeholder="Calle, No. exterior e interior" required>
															</div>


															<div class="input-field col  s12">
																<label for="email">Correo</label>
																<input name="email" tabindex="18" type="email" id="email" onBlur="checkAvailabilityEmailid()" autocomplete="off" required>
																<span id="emailid-availability" style="font-size:12px;"></span>
															</div>



															<div class="input-field col m6 s12">
																<label for="password">Contraseña</label>
																<input id="password" tabindex="19" name="password" type="password" autocomplete="off" required>
															</div>
															<div class="input-field col m6 s12">
																<label for="confirm">Confirmar Contraseña</label>
																<input id="confirmpassword" tabindex="20" name="confirmpassword" type="password" autocomplete="off" required>
															</div>

														</div>
													</div>

													<div class="col m6">
														<div class="row">

															<div class="input-field col m6 s12">
																<select id="assignedservice" name="assignedservice" tabindex="21" autocomplete="off">
																	<option value="">Servicio Asignado</option>
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
															</div>

															<div class="input-field col m6 s12">
																<select id="company" tabindex="22" name="company" autocomplete="off">
																	<option value="">Empresa</option>
																	<option value="APROSEMEX S.A. DE C.V.">APROSEMEX S.A. DE C.V.</option>
																	<option value="ASLO SEGURIDAD PRIVADA S.A. DE C.V.">ASLO SEGURIDAD PRIVADA S.A. DE C.V.
																	</option>
																	<option value="OIFSI S.A. DE C.V.">OIFSI S.A. DE C.V.</option>
																	<option value="OISME S.A. DE C.V.">OISME S.A. DE C.V.</option>
																</select>
															</div>
															<div class="input-field col m6 s12">
																<select id="marital" tabindex="23" name="marital" autocomplete="off">
																	<option value="">Estado Civil</option>
																	<option value="soltero/a">soltero/a</option>
																	<option value="casado/a">casado/a</option>
																	<option value="union libre">union libre</option>
																	<option value="separado/a">separado/a</option>
																	<option value="divorciado/a">divorciado/a</option>
																	<option value="viudo/a">viudo/a</option>
																</select>
															</div>
															<div class="input-field col m6 s12">
																<select id="gender" tabindex="24" name="gender" autocomplete="off">
																	<option value="">Género</option>
																	<option value="Masculino">Masculino</option>
																	<option value="Femenino">Femenino</option>
																	<option value="Otro">Otro</option>
																</select>
															</div>

															<div class="input-field col s12">
																<label for="nationality">Fecha</label><br>

																<input id="fechini" name="fechini" tabindex="25" type="date" autocomplete="off">
															</div>

															<div class="input-field col m6 s12">
																<label for="ife">No. de IFE</label>
																<input id="ife" name="ife" type="text" autocomplete="off" tabindex="26" maxlength="13" required>
															</div>


															<div class="input-field col m6 s12">
																<label for="curp">Curp</label>
																<input id="curp" name="curp" type="text" maxlength="18" tabindex="27" autocomplete="off" required>
															</div>

															<div class="input-field col m6 s12">
																<label for="rfc">RFC</label>
																<input id="rfc" name="rfc" type="text" maxlength="13" tabindex="28" autocomplete="off" required>
															</div>

															<div class="input-field col m6 s12">
																<label for="imss">No. IMSS</label>
																<input id="imss" name="imss" type="text" maxlength="11" tabindex="29" autocomplete="off" required>
															</div>

															<div class="input-field col m6 s12">
																<label for="infonavit">No. Crédito Infonavit</label>
																<input id="infonavit" tabindex="30" name="infonavit" type="text" autocomplete="off">
															</div>

															<div class="input-field col m6 s12">
																<label for="infonavitmon">Monto de descuento infonavit</label>
																<input id="infonavitmon" tabindex="30" name="infonavitmon" type="text" autocomplete="off">
															</div>

															<div class="input-field col m6 s12">
																<label for="fonacot">No. Crédito fonacot</label>
																<input id="fonacot" tabindex="30" name="fonacot" type="text" autocomplete="off">
															</div>

															<div class="input-field col m6 s12">
																<label for="fonacotmon">Monto de descuento fonacot</label>
																<input id="fonacotmon" tabindex="30" name="fonacotmon" type="text" autocomplete="off">
															</div>

															<div class="input-field col m6 s12">
																<label for="typelicence">Tipo de Licencia</label>
																<input id="typelicence" tabindex="31" name="typelicence" type="text" autocomplete="off">
															</div>


															<div class="input-field col m6 s12">
																<label for="military">Cartilla Militar</label>
																<input id="military" tabindex="32" name="military" type="text" autocomplete="off">
															</div>

															<div class="input-field col m6 s12">
																<label for="city">Municipio</label>
																<input id="city" tabindex="14" name="city" type="text" autocomplete="off" required>
															</div>

															<div class="input-field col m6 s12">
																<label for="suburb">Colonia</label>
																<input id="suburb" tabindex="15" name="suburb" type="text" autocomplete="off" required>
															</div>


															<div class="input-field col m6 s12">
																<label for="country">Estado</label>
																<input id="country" tabindex="16" name="country" type="text" autocomplete="off" required>
															</div>

															<div class="input-field col m6 s12">
																<label for="cp">Codigo Postal</label>
																<input id="cp" name="cp" tabindex="17" type="text" maxlength="5" autocomplete="off" required>
															</div>


															<div class="input-field col m6 s12">
																<label for="dependent">No. de dependientes</label>
																<input id="dependent" tabindex="33" name="dependent" type="text" maxlength="2" autocomplete="off">
															</div>


															<div class="input-field col s12">
																<!-- <button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>-->

															</div>
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
													<h4>DATOS DE DEPENDIENTES</h4>
													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="dependentname">Nombre</label>
																	<input id="dependentname" tabindex="34" name="dependentname" type="text" autocomplete="off">
																</div>
																<div class="input-field col m6 s12">
																	<label for="dependentrelation">Parentesco</label>
																	<input id="dependentrelation" name="dependentrelation" tabindex="35" type="text" autocomplete="off">
																</div>

															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="dependentage">Edad</label>
																	<input id="dependentage" tabindex="36" name="dependentage" type="text" maxlength="2" autocomplete="off">
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="dependentname2">Nombre</label>
																	<input id="dependentname2" name="dependentname2" tabindex="37" type="text" autocomplete="off">
																</div>
																<div class="input-field col m6 s12">
																	<label for="dependentrelation2">Parentesco</label>
																	<input id="dependentrelation2" name="dependentrelation2" tabindex="38" type="text" autocomplete="off">
																</div>

															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="dependentage2">Edad</label>
																	<input id="dependentage2" tabindex="39" name="dependentage2" type="text" maxlength="2" autocomplete="off">
																</div>
															</div>
														</div>
													</div>


													<div class="row">
														<div class="col m6">
															<div class="row">


																<div class="input-field col m6 s12">
																	<label for="dependentname3">Nombre</label>
																	<input id="dependentname3" name="dependentname3" tabindex="40" type="text" autocomplete="off">
																</div>
																<div class="input-field col m6 s12">
																	<label for="dependentrelation3">Parentesco</label>
																	<input id="dependentrelation3" name="dependentrelation3" tabindex="41" type="text" autocomplete="off">
																</div>
															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="dependentage3">Edad</label>
																	<input id="dependentage3" tabindex="42" name="dependentage3" type="text" maxlength="2" autocomplete="off">
																</div>
															</div>
														</div>
													</div>


													<div class="row">
														<div class="col m6">
															<div class="row">


																<div class="input-field col m6 s12">
																	<label for="dependentname4">Nombre</label>
																	<input id="dependentname4" name="dependentname4" tabindex="43" type="text" autocomplete="off">
																</div>
																<div class="input-field col m6 s12">
																	<label for="dependentrelation4">Parentesco</label>
																	<input id="dependentrelation4" name="dependentrelation4" tabindex="44" type="text" autocomplete="off">
																</div>
															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="dependentage4">Edad</label>
																	<input id="dependentage4" tabindex="45" name="dependentage4" type="text" maxlength="2" autocomplete="off">
																</div>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col m6">
															<div class="row">



																<div class="input-field col m6 s12">
																	<label for="dependentname5">Nombre</label>
																	<input id="dependentname5" name="dependentname5" tabindex="46" type="text" autocomplete="off">
																</div>
																<div class="input-field col m6 s12">
																	<label for="dependentrelation5">Parentesco</label>
																	<input id="dependentrelation5" name="dependentrelation5" tabindex="47" type="text" autocomplete="off">
																</div>
															</div>
														</div>
														<div class="col m6">
															<div class="row">
																<div class="input-field col m6 s12">
																	<label for="dependentage5">Edad</label>
																	<input id="dependentage5" name="dependentage5" type="text" maxlength="2" tabindex="48" autocomplete="off">
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
															<input id="primaryname" name="primaryname" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="primaryadress">Domicilio </label>
															<input id="primaryadress" name="primaryadress" type="text">
														</div>
													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="primarydocument">Documento</label>
															<input id="primarydocument" name="primarydocument" type="text">
														</div>
													</div>
												</div>
											</div>

											<hr style="border-color:black;">
											<h4> SECUNDARIA</h4>

											<div class="row">
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="highschoolname">Nombre</label>
															<input id="highschoolname" name="highschoolname" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="highschooladress">Domicilio </label>
															<input id="highschooladress" name="highschooladress" type="text">
														</div>
													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="highschooldocument">Documento</label>
															<input id="highschooldocument" name="highschooldocument" type="text">
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
															<input id="schoolname" name="schoolname" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="schooladress">Domicilio </label>
															<input id="chooladress" name="schooladress" type="text">
														</div>
													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="schooldocument">Documento</label>
															<input id="schooldocument" name="schooldocument" type="text">
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
															<input id="universityname" name="universityname" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="universityadress">Domicilio </label>
															<input id="universityadress" name="universityadress" type="text">
														</div>
													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="universitydocument">Documento</label>
															<input id="universitydocument" name="universitydocument" type="text">
														</div>
													</div>
												</div>
											</div>

											<input type="button" name="previous" class="previous btn btn-default" value="Anterior" /><br><br>
											<input type="button" name="next" class="next btn btn-info" value="Siguiente" />

										</fieldset>
										<fieldset>
											<h4> REFERENCIAS LABORALES</h4>
											<hr style="border-color:black;">
											<h4> PRIMER REFERENCIA LABORAL</h4>
											<div class="row">
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="companyname">Nombre de la empresa</label>
															<input id="companyname" name="companyname" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="companyjob">Puesto</label>
															<input id="companyjob" name="companyjob" type="text">
														</div>

														<div class="input-field col m6 s12">
															<label for="timework">Tiempo que laboro</label>
															<input id="timework" name="timework" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="companyphone">Telefono</label>
															<input id="companyphone" name="companyphone" maxlength="10" type="text">
														</div>

													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col  s12">
															<label for="companyadress">Dirección</label>
															<input id="companyadress" name="companyadress" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="reasonexit">Motivo de salida</label>
															<input id="reasonexit" name="reasonexit" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="ingresomensual">Ingreso Mensual</label>
															<input id="ingresomensual" name="ingresomensual" type="text">
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
															<input id="companyname2" name="companyname2" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="companyjob2">Puesto</label>
															<input id="companyjob2" name="companyjob2" type="text">
														</div>

														<div class="input-field col m6 s12">
															<label for="timework2">Tiempo que laboro</label>
															<input id="timework2" name="timework2" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="companyphone2">Telefono</label>
															<input id="companyphone2" name="companyphone2" maxlength="10" type="text">
														</div>

													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col  s12">
															<label for="companyadress2">Dirección</label>
															<input id="companyadress2" name="companyadress2" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="reasonexit2">Motivo de salida</label>
															<input id="reasonexit2" name="reasonexit2" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="ingresomensual2">Ingreso Mensual</label>
															<input id="ingresomensual2" name="ingresomensual2" type="text">
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
															<input id="companyname3" name="companyname3" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="companyjob3">Puesto</label>
															<input id="companyjob3" name="companyjob3" type="text">
														</div>

														<div class="input-field col m6 s12">
															<label for="timework3">Tiempo que laboro</label>
															<input id="timework3" name="timework3" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="companyphone3">Telefono</label>
															<input id="companyphone3" name="companyphone3" maxlength="10" type="text">
														</div>

													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col  s12">
															<label for="companyadress3">Dirección</label>
															<input id="companyadress3" name="companyadress3" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="reasonexit3">Motivo de salida</label>
															<input id="reasonexit3" name="reasonexit3" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="ingresomensual3">Ingreso Mensual</label>
															<input id="ingresomensual3" name="ingresomensual3" type="text">
														</div>

													</div>
												</div>
											</div>


											<input type="button" name="previous" class="previous btn btn-default" value="Anterior" /><br><br>
											<input type="button" name="next" class="next btn btn-info" value="Siguiente" />
										</fieldset>



										<fieldset>
											<h3> REFERENCIAS FAMILIARES</h3>
											<hr style="border-color:black;">
											<h4> PRIMERA REFERENCIA FAMILIAR</h4>

											<div class="row">
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="familyname">Nombre del familiar</label>
															<input id="familyname" name="familyname" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="relationship">Parentesco</label>
															<input id="relationship" name="relationship" type="text">
														</div>


													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="yearshim">Años de conocerlo</label>
															<input id="yearshim" name="yearshim" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="familyphone">Telefono</label>
															<input id="familyphone" name="familyphone" maxlength="10" type="text">
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
															<input id="familyname2" name="familyname2" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="relationship2">Parentesco</label>
															<input id="relationship2" name="relationship2" type="text">
														</div>


													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="yearshim2">Años de conocerlo</label>
															<input id="yearshim2" name="yearshim2" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="familyphone2">Telefono</label>
															<input id="familyphone2" name="familyphone2" maxlength="10" type="text">
														</div>

													</div>
												</div>
											</div>
											<input type="button" name="previous" class="previous btn btn-default" value="Anterior" /><br><br>
											<input type="button" name="next" class="next btn btn-info" value="Siguiente" />
										</fieldset>


										<fieldset>
											<h3> REFERENCIAS PERSONALES</h3>
											<hr style="border-color:black;">
											<h4> PRIMERA REFERENCIA PERSONAL</h4>

											<div class="row">
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="personalname">Nombre</label>
															<input id="personalname" name="personalname" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="personalyears">Años de conocerlo</label>
															<input id="personalyears" name="personalyears" type="text">
														</div>



													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="personalphone">Telefono</label>
															<input id="personalphone" name="personalphone" maxlength="10" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="personaladress">Direccion</label>
															<input id="personaladress" name="personaladress" type="text">
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
															<input id="personalname2" name="personalname2" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="personalyears2">Años de conocerlo</label>
															<input id="personalyears2" name="personalyears2" type="text">
														</div>

													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="personalphone2">Telefono</label>
															<input id="personalphone2" name="personalphone2" maxlength="10" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="personaladress2">Direccion</label>
															<input id="personaladress2" name="personaladress2" type="text">
														</div>

													</div>
												</div>
											</div>
											<input type="button" name="previous" class="previous btn btn-default" value="Anterior" /><br><br>
											<input type="button" name="next" class="next btn btn-info" value="Siguiente" />
										</fieldset>


										<fieldset>
											<h4>ESTUDIO SOCIOECONOMICO</h4>
											<hr style="border-color:black;">
											<h4> INGRESOS Y EGRESOS</h4>

											<div class="row">
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="previous">Sueldo anterior</label>
															<input id="previous" name="previous" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="required">Sueldo requerido</label>
															<input id="required" name="required" type="text">
														</div>

														<div class="input-field col m6 s12">
															<label for="offered">Sueldo ofertado</label>
															<input id="offered" name="offered" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="yearsliving">Tiempo de residir en su domicilio</label>
															<input id="yearsliving" name="yearsliving" type="text">
														</div>

														<div class="input-field col m6 s12">
															<label for="homex1">El hogar donde habita es:</label><br><br>
															<input type="radio" id="homex1p" name="homex1" value="propio" class="check"> <label for="homex1p">Propio</label>
															<input type="radio" id="homex1r" name="homex1" value="rentada" class="check"> <label for="homex1r">Rentada</label>
															<input type="radio" id="homex1o" name="homex1" value="otra" class="check"> <label for="homex1o">Otra</label>
														</div>
														<div class="input-field col m6 s12">
															<label for="homex2">El hogar donde habita es:</label><br><br>
															<input type="radio" id="homex2c" name="homex2" value="casa" class="check"> <label for="homex2c">Casa</label>
															<input type="radio" id="homex2d" name="homex2" value="departamento" class="check"> <label for="homex2d">Departamento</label>
															<input type="radio" id="homex2o" name="homex2" value="otra" class="check"> <label for="homex2o">Otra</label>
														</div>
													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="incomeextra">Ingresos extra</label>
															<input id="incomeextra" name="incomeextra" type="text">
														</div>

														<div class="input-field col m6 s12">
															<label for="incomedesc">Descripción</label>
															<input id="incomedesc" name="incomedesc" type="text">
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
															<input id="debts" name="debts" type="text" onchange="sumar(this.value);">
														</div>
														<div class="input-field col m6 s12">
															<label for="debtscell">Celular</label>
															<input id="debtscell" name="debtscell" type="text" onchange="sumar(this.value);">
														</div>
														<div class="input-field col m6 s12">
															<label for="maintenance">Mantenimeinto del hogar</label>
															<input id="maintenance" name="maintenance" type="text" onchange="sumar(this.value);">
														</div>
														<div class="input-field col m6 s12">
															<label for="paymentschool">Pago de escuela</label>
															<input id="paymentschool" name="paymentschool" type="text" onchange="sumar(this.value);">
														</div>
														<div class="input-field col m6 s12">
															<label for="clothes">Ropa y calzado</label>
															<input id="clothes" name="clothes" type="text" onchange="sumar(this.value);">
														</div>
														<div class="input-field col m6 s12">
															<label for="otherexpenses">Otros gastos</label>
															<input id="otherexpenses" name="otherexpenses" type="text" onchange="sumar(this.value);">
														</div>
													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="pantry">Alimentos y despensa</label>
															<input id="pantry" name="pantry" type="text" onchange="sumar(this.value);">
														</div>
														<div class="input-field col m6 s12">
															<label for="transport">Transporte y/o gasolina</label>
															<input id="transport" name="transport" type="text" onchange="sumar(this.value);">
														</div>
														<div class="input-field col m6 s12">
															<label for="medicalservices">Servicios médicos</label>
															<input id="medicalservices" name="medicalservices" type="text" onchange="sumar(this.value);">
														</div>

														<div class="input-field col m6 s12">
															<label for="overall">Total</label>
															<input id="overall" name="overall" type="text">
															<span id="spTotal"></span>
														</div>
													</div>
												</div>
											</div>
											<hr style="border-color:black;">
											<h4>SELECCIONE LAS CARACTERISTICAS DE SU VIVIENDA Y LOS SERVICIOS CON LOS QUE CUENTA</h4>

											<div class="row">
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<input type="checkbox" id="stove" name="articulo[]" value="estufa"> <label for="stove">Estufa</label>
														</div>
														<div class="input-field col m6 s12">
															<input type="checkbox" id="microwave" name="articulo[]" value="microondas"> <label for="microwave">Microondas</label>
														</div>
														<div class="input-field col m6 s12">
															<input type="checkbox" id="computer" name="articulo[]" value="computadora"> <label for="computer">Computadora</label>
														</div>
														<div class="input-field col m6 s12">
															<input type="checkbox" id="stereo" name="articulo[]" value="estereo"> <label for="stereo">Estéreo</label>
														</div>
														<div class="input-field col m6 s12">
															<input type="checkbox" id="light" name="articulo[]" value="luz"> <label for="light">Luz</label>
														</div>
														<div class="input-field col m6 s12">
															<input type="checkbox" id="internet" name="articulo[]" value="internet"> <label for="internet">Internet</label>
														</div>
													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<input type="checkbox" id="fridge" name="articulo[]" value="refrigerador"> <label for="fridge">Refrigerador</label>
														</div>
														<div class="input-field col m6 s12">
															<input type="checkbox" id="washing" name="articulo[]" value="lavadora"> <label for="washing">Lavadora</label>
														</div>
														<div class="input-field col m6 s12">
															<input type="checkbox" id="tv" name="articulo[]" value="televisor"> <label for="tv">Televisor</label>
														</div>
														<div class="input-field col m6 s12">
															<input type="checkbox" id="paytv" name="articulo[]" value="T.v de paga"> <label for="paytv">Servicio de T.V. de paga</label>
														</div>
														<div class="input-field col m6 s12">
															<input type="checkbox" id="aqua" name="articulo[]" value="agua"> <label for="aqua">Agua</label>
														</div>
														<div class="input-field col m6 s12">
															<input type="checkbox" id="phoneeco" name="articulo[]" value="telefono"> <label for="phoneeco">Teléfono</label>
														</div>
													</div>
												</div>
											</div>
											<input type="button" name="previous" class="previous btn btn-default" value="Anterior" /><br><br>
											<input type="button" name="next" class="next btn btn-info" value="Siguiente" />
										</fieldset>
										<fieldset>
											<h3>INFORME MEDICO</h3>
											<hr style="border-color:black;">
											<div class="row">
												<div class="col m6">
													<div class="row">

														<div class="input-field col  s12">
															<label for="glasses">Usa anteojos:</label><br>
															<input type="radio" id="glassess" name="glasses" value="si" class="test"> <label for="glassess">Si</label>
															<input type="radio" id="glassesn" name="glasses" value="no" class="test"> <label for="glassesn" class="only-one">No</label>
														</div>
														<div class="input-field col   s12"><br>
															<label for="glasses2">¿Cuál es el diagnóstico?</label>
															<input id="glasses2" name="glasses2" disabled="true" type="text">
														</div>
														<div class="input-field col  s12">
															<label for="chronic">Enfermedades crónicas:</label><br>
															<input type="radio" id="chronics" name="chronic" value="si" class="check"> <label for="chronics">Si</label>
															<input type="radio" id="chronicn" name="chronic" value="no"> <label for="chronicn" class="check">No</label>
														</div>
														<div class="input-field col   s12">
															<label for="chronic2">¿Cuál?</label>
															<input id="chronic2" name="chronic2" disabled="true" type="text">
														</div>
														<div class="input-field col  s12">
															<label for="operation">Operaciones practicadas:</label><br><br>
															<input type="radio" id="operations" name="operation" value="si"> <label for="operations">Si</label>
															<input type="radio" id="operationn" name="operation" value="no"> <label for="operationn">No</label>
														</div>
														<div class="input-field col    s12">
															<label for="operation2">¿Cuál?</label>
															<input id="operation2" name="operation2" disabled="true" type="text">
														</div>
														<div class="input-field col  s12">
															<label for="enervants">Consume algún enervante:</label><br><br>
															<input type="radio" id="enervantss" name="enervants" value="si" class="check"> <label for="enervantss">Si</label>
															<input type="radio" id="enervantsn" name="enervants" value="no" class="check"> <label for="enervantsn">No</label>
														</div>
														<div class="input-field col   s12">
															<label for="enervants2">¿Cuál?</label>
															<input id="enervants2" name="enervants2" disabled="true" type="text">
														</div>
														<div class="input-field col  s12">
															<label for="incapacitado">En los últimos 5 años se ha incapacitado:</label><br><br>
															<input type="radio" id="incapacitados" name="incapacitado" value="si" class="check"> <label for="incapacitados">Si</label>
															<input type="radio" id="incapacitadon" name="incapacitado" value="no" class="check"> <label for="incapacitadon">No</label>
														</div>
														<div class="input-field col   s12">
															<label for="incapacitado2">¿Por qué?</label>
															<input id="incapacitado2" name="incapacitado2" disabled="true" type="text">
														</div>
													</div>
												</div>
												<div class="col m6">
													<div class="row">
													</div>
												</div>
											</div>
											<input type="button" name="previous" class="previous btn btn-default" value="Anterior" /><br><br>
											<input type="button" name="next" class="next btn btn-info" value="Siguiente" />
										</fieldset>
										<fieldset>
											<h4>INFORMACION ADICIONAL</h4>
											<hr style="border-color:black;">
											<div class="row">
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="activities">Actividades en su tiempo libre</label>
															<input id="activities" name="activities" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="people">Con quien convive en su tiempo libre</label>
															<input id="people" name="people" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="valuesperson">Tres valores más importantes</label>
															<input id="valuesperson" name="valuesperson" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="defect">Tres defectos que más le generan conflicto</label>
															<input id="defect" name="defect" type="text">
														</div>
														<div class="input-field col s12">
															<label for="sport">¿Practica algún deporte?</label><br><br>
															<input type="radio" id="sports" name="sport" value="si" class="check"> <label for="sports">Si</label>
															<input type="radio" id="sportn" name="sport" value="no" class="check"> <label for="sportn">No</label>
														</div>
														<div class="input-field col  s12">
															<label for="sport2">¿Cuál?</label>
															<input id="sport2" name="sport2" disabled="true" type="text">
														</div>
														<div class="input-field col  s12">
															<label for="politic">¿Pertenece o ha pertenecido a un partido político?</label><br><br><br>
															<input type="radio" id="politics" name="politic" value="si" class="check"> <label for="politics">Si</label>
															<input type="radio" id="politicn" name="politic" value="no" class="check"> <label for="politicn">No</label>
														</div>
														<div class="input-field col  s12">
															<label for="politic2">¿Cuál?</label>
															<input id="politic2" name="politic2" disabled="true" type="text">
														</div>
														<div class="input-field col s12">
															<label for="syndicate">¿Pertenece o ha pertenecido a un sindicato?</label><br><br><br>
															<input type="radio" id="syndicates" name="syndicate" value="si" class="check"> <label for="syndicates">Si</label>
															<input type="radio" id="syndicaten" name="syndicate" value="no" class="check"> <label for="syndicaten">No</label>
														</div>

														<div class="input-field col  s12">
															<label for="syndicate2">¿Cuál?</label>
															<input id="syndicate2" name="syndicate2" disabled="true" type="text">
														</div>


														<div class="input-field col  s12">
															<label for="conciliation">¿Ah acudido a conciliación y arbitraje?</label><br><br>
															<input type="radio" id="conciliations" name="conciliation" value="si" class="check"> <label for="conciliations">Si</label>
															<input type="radio" id="conciliationn" name="conciliation" value="no" class="check"> <label for="conciliationn">No</label>
														</div>

														<div class="input-field col  s12">
															<label for="conciliation2">¿Cuál?</label>
															<input id="conciliation2" name="conciliation2" disabled="true" type="text">
														</div>

													</div>
												</div>

												<div class="col m6">
													<div class="row">
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
															<input type="radio" id="facer" name="face" value="redonda" class="check"> <label for="facer">Redonda</label>
															<input type="radio" id="faceo" name="face" value="ovalada" class="check"> <label for="faceo">Ovalada</label>
															<input type="radio" id="facec" name="face" value="cuadrada" class="check"> <label for="facec">Cuadrada</label>
														</div>

														<div class="input-field col s12">
															<label for="skincolor">Color de piel</label><br>
															<input type="radio" id="skincolorb" name="skincolor" value="blanca" class="check"> <label for="skincolorb">Blanca</label>
															<input type="radio" id="skincolort" name="skincolor" value="trigueña" class="check"> <label for="skincolort">Trigueña</label>
															<input type="radio" id="skincolorm" name="skincolor" value="mulata" class="check"> <label for="skincolorm">Mulata</label>
														</div>



														<div class="input-field col  s12">
															<label for="haircolor">Color de cabello</label><br>
															<input type="radio" id="haircolorcc" name="haircolor" value="castaño claro" class="check"> <label for="haircolorcc">Castaño claro</label>
															<input type="radio" id="haircolorco" name="haircolor" value="castaño obscuro" class="check"> <label for="haircolorco">Castaño obscuro</label>
															<input type="radio" id="haircolort" name="haircolor" value="teñido" class="check"> <label for="haircolort">Teñido</label>
														</div>


														<div class="input-field col m6 s12">
															<label for="tattoo">Tatuajes</label><br>
															<input type="radio" id="tattoos" name="tattoo" value="si" class="check"> <label for="tattoos">Si</label>
															<input type="radio" id="tattoon" name="tattoo" value="no" class="check"> <label for="tattoon">No</label>
														</div>

														<div class="input-field col m6 s12"><br>
															<label for="tattoo2">¿Dónde?</label>
															<input id="tattoo2" name="tattoo2" disabled="true" type="text">
														</div>

														<div class="input-field col  s12"><br>
															<label for="tattoo3">Tamaño</label>
															<input id="tattoo3" name="tattoo3" disabled="true" type="text">
														</div>

														<div class="input-field col m6 s12">
															<label for="piercing">Perforaciones</label><br>
															<input type="radio" id="piercings" name="piercing" value="si" class="check"> <label for="piercings">Si</label>
															<input type="radio" id="piercingn" name="piercing" value="no" class="check"> <label for="piercingn" class="check">No</label>
														</div>

														<div class="input-field col m6 s12"><br>
															<label for="piercing2">¿Dónde?</label>
															<input id="piercing2" name="piercing2" disabled="true" type="text">
														</div>

														<div class="input-field col  s12"><br>
															<label for="piercing3">¿Cuántas?</label>
															<input id="piercing3" name="piercing3" disabled="true" type="text">
														</div>

													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col  s12">
															<label for="eyecolor">Color de ojos</label><br>
															<input type="radio" id="eyecolorco" name="eyecolor" value="cafe obscuro" class="check"> <label for="eyecolorco">Café obscuro</label>
															<input type="radio" id="eyecolorcocc" name="eyecolor" value="cafe claro" class="check"> <label for="eyecolorcocc">Café claro</label>
															<input type="radio" id="eyecolorcoc" name="eyecolor" value="color" class="check"> <label for="eyecolorcoc">Color</label>
														</div>

														<div class="input-field col  s12">
															<label for="kindeyes">Tipo de ojos</label><br>
															<input type="radio" id="kindeyesg" name="kindeyes" value="grandes" class="check"> <label for="kindeyesg">Grandes</label>
															<input type="radio" id="kindeyesp" name="kindeyes" value="pequeños" class="check"> <label for="kindeyesp">Pequeños</label>
															<input type="radio" id="kindeyesr" name="kindeyes" value="rasgados" class="check"> <label for="kindeyesr">Rasgados</label>
														</div>
														<div class="input-field col s12">
															<label for="complexion">Complexión</label><br>
															<input type="radio" id="complexiong" name="complexion" value="gruesa" class="check"> <label for="complexiong">Gruesa</label>
															<input type="radio" id="complexionm" name="complexion" value="mediana" class="check"> <label for="complexionm">Mediana</label>
															<input type="radio" id="complexiond" name="complexion" value="delgada" class="check"> <label for="complexiond">Delgada</label>
														</div>

														<div class="input-field col m6 s12">
															<label for="observations">Observaciones</label>
															<input id="observations" name="observations" type="text">
														</div>

														<div class="input-field col m6 s12">
															<label for="weight">Peso</label>
															<input id="weight" name="weight" type="text">
														</div>
														<div class="input-field col m6 s12">
															<label for="stature">Estatura</label>
															<input id="stature" name="stature" type="text">
														</div>

														<div class="input-field col m6 s12">
															<label for="typeblood">Tipo de sangre</label>
															<input id="typeblood" name="typeblood" type="text">
														</div>

														<div class="input-field col M6 s12">
															<label for="fechaingreso">Fecha de ingreso</label><br>

															<input id="fechaingreso" name="fechaingreso" tabindex="25" type="date" autocomplete="off">
														</div>

														<div class="input-field col M6 s12">
															<label for="fechacapacitacion">Fecha de capacitación</label><br>

															<input id="fechacapacitacion" name="fechacapacitacion" tabindex="25" type="date" autocomplete="off">
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
															<input id="banco" name="banco" type="text">
														</div>

														<div class="input-field col  m6 s12">
															<label for="nocuenta">No. Cuenta</label>
															<input id="nocuenta" name="nocuenta" type="text">
														</div>
														<div class="input-field col  m6 s12">
															<label for="sueldodiario">Sueldo diario integrado</label>
															<input id="sueldodiario" name="sueldodiario" type="text">
														</div>
														<div class="input-field col  m6 s12">
															<label for="bono">Bono</label>
															<input id="bono" name="bono" type="text">
														</div>
													</div>
												</div>
												<div class="col m6">
													<div class="row">
														<div class="input-field col m6 s12">
															<label for="clabeint">Clabe Interbancaria</label>
															<input id="clabeint" name="clabeint" type="text">
														</div>
														<div class="input-field col  m6 s12">
															<label for="sueldonet">Sueldo Neto Mensual</label>
															<input id="sueldonet" name="sueldonet" type="text">
														</div>


													</div>
												</div>
											</div>

											<!--<input type="button" name="previous" class="previous btn btn-default" value="Anterior" /><br><br>
                                        <input type="button" name="next" class="next btn btn-info" value="Siguiente" />-->

											<input type="button" name="previous" class="previous btn btn-default" value="Anterior" /><br><br>
											<input type="submit" id="btnsave" onclick="return valid();" class="waves-effect waves-light btn indigo m-b-xs" value="Guardar" />

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
	</body>

	</html>
	<script>
	
		// Si pulsamos tecla en un Input
		$("input").keydown(function(e) {
			// Capturamos qué telca ha sido
			var keyCode = e.which;
			// Si la tecla es el Intro/Enter
			if (keyCode == 13) {
				// Evitamos que se ejecute eventos
				event.preventDefault();
				// Devolvemos falso
				return false;
			}
		});

		$(function() {

			$("#AUTO").on("submit", function(e) {
				e.preventDefault();
				var url = "addemployeeB.php";
				var datos = $("#AUTO").serialize();
				//alert(datos);
				//return false;
				$.ajax({
					type: "POST",
					url: url,
					data: datos,
					beforeSend: function(b) {
						if (b != 0) {
							let timerInterval
							Swal.fire({
								title: 'ESPERA',
								html: 'Se estan guardando los datos !',
								timerProgressBar: true,
								didOpen: () => {
									document.getElementById('btnsave').disabled = true;
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
								text: 'OCURRIO UN ERROR! 1',
							})
						}
					},
					success: function(r) {
						if (r != 0) {
							Swal.fire({
								position: 'top-end',
								icon: 'success',
								title: 'Registro de Técnico, agregado con éxito',
								showConfirmButton: false,
								timer: 2500

							})
							//document.getElementById("AUTO").reset();
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'OCURRIO UN ERROR! 2',
							})
						}
					},
					error: function(e) {
						if (e != 0) {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'OCURRIO UN ERROR! 3',
							})
						}
					},
				})
				return false;
			});
		});
	</script>
	<script>
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
<?php } ?>