<div class="loader-bg"></div>
<div class="loader">
	<div class="preloader-wrapper big active">
		<div class="spinner-layer spinner-blue">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div>
			<div class="gap-patch">
				<div class="circle"></div>
			</div>
			<div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
		<!--<div class="spinner-layer spinner-spinner-teal lighten-1">-->
		<div class="spinner-layer spinner-spinner-teal lighten-1">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div>
			<div class="gap-patch">
				<div class="circle"></div>
			</div>
			<div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
		<div class="spinner-layer spinner-yellow">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div>
			<div class="gap-patch">
				<div class="circle"></div>
			</div>
			<div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
		<div class="spinner-layer spinner-green">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div>
			<div class="gap-patch">
				<div class="circle"></div>
			</div>
			<div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css ">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<div class="mn-content fixed-sidebar col-xs-16">
	<header class="mn-header navbar-fixed">
		<nav class="blue-grey darken-1">
			<div class="nav-wrapper row">
				<section class="material-design-hamburger navigation-toggle">
					<a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
						<span class="material-design-hamburger__layer"></span>
					</a>
				</section>
				<div class="header-title col s1">
					<!--<span class="header-title col s1">SistemaSIM </span>  -->

				</div>
				<ul id="dropdown1" class="dropdown-content notifications-dropdown">
					<li class="notificatoins-dropdown-container">
						<ul>
							<li class="notification-drop-title">Notificaciones</li>
							<?php
							//error_reporting(E_ALL);
							$isread = 0;
							$sql = "SELECT * from tblinventoryexit where isread=:isread AND (descripcion='Botas Tacticas Negras' OR descripcion='Bota de Plastico' OR descripcion='Zapato Bostoniano') ORDER BY regdate DESC";
							$query = $dbh->prepare($sql);
							$query->bindParam(':isread', $isread, PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							if ($query->rowCount() > 0) {
								foreach ($results as $result) {
									$fecha = $result->fecha;
									$fechaEntera = strtotime($fecha);
									$anio = date("Y", $fechaEntera);
									$mes = date("m", $fechaEntera);
									$dia = date("d", $fechaEntera);
							?>


									<li>

										<!--<a href="manageexit.php?f=<?php echo htmlentities($result->folio); ?>&id=<?php echo htmlentities($result->id); ?>">-->
										<a name="LECTURA" href="#" onClick="lectura(<?php echo htmlentities($result->folio); ?>,<?php echo htmlentities($result->id); ?>)">

											<div class="notification">
												<div class="notification-icon circle blue"><i class="material-icons">paid</i></div>
												<div class="notification-text">
													<p><b><?php echo htmlentities($result->tecnicoasig); ?>
															<br /></b>DESCUENTO<br />FOLIO: <b><?php echo htmlentities($result->folio); ?></b> </p><span> <?php echo htmlentities($dia . "-" . $mes . "-" . $anio); ?></span>
												</div>
											</div>
										</a>

									</li>
							<?php }
							} ?>

						</ul>
					</li>
				</ul>
				<ul class=" right col s9 m3 nav-right-menu ">
					<?php
					$isread = 0;
					$sql = "SELECT id from tblinventoryexit where isread=0 AND (descripcion='Botas Tacticas Negras' OR descripcion='Bota de Plastico' OR descripcion='Zapato Bostoniano')";
					$query = $dbh->prepare($sql);
					$query->bindParam(':isread', $isread, PDO::PARAM_STR);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$unreadcount = $query->rowCount();
					if ($unreadcount > 0) {
						//var_dump("$undercount");                            
					?>
						<li class=" hide-on-small-and-down ">
							<a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large ">
								<div class="shake-slow shake-constant shake-constant--hover"><i class="material-icons">notifications_active</i>
									<span class="badge"><?php echo htmlentities($unreadcount); ?></span>
								</div>
							</a>
						</li>
					<?php } else { ?>
						<li class="hide-on-small-and-down"><a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large "><i class="material-icons">notifications_none</i>
								<span class="badge"><?php echo htmlentities($unreadcount); ?></span>
							</a></li>

					<?php } ?>
				</ul>
			</div>
		</nav>
	</header>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script>
		function lectura(result, result2) {
			var url = "consultas/updatelectura.php?f=" + result + "&id=" + result2;
			var datos = result;
			var datos2 = result2;
			console.log(datos);
			console.log(datos2);
			//alert(datos);
			//alert(datos2);
			//return false;

			$.ajax({
				type: "POST",
				url: url,
				data: {
					datos: datos,
					datos2: datos2
				},
				dataType: "json",
				success: function(data) {
					if (data.status == 'success') {
					//	Swal.fire({
					//		position: 'top-end',
					//		icon: 'success',
					//		title: 'REGISTRO BORRADO',
					//		showConfirmButton: false,
					//		timer: 2500
					//	})
						location.href = "manageexit.php?f=" + datos;
					} else if (data.status == 'error') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'OCURRIO UN ERROR! 2',
						})
						//location.reload(true);

					}
				},
				error: function(e) {
					if (e != 0) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No se ha podido borrar el registro',
						})
					}
				},
			});
			return false;
		}
	</script>