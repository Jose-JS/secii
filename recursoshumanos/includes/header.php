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
							$isread = 0;
							$sql = "SELECT id,isread,datetime,technical from tblincidents where isread=:isread ORDER BY datetime DESC";
							$query = $dbh->prepare($sql);
							$query->bindParam(':isread', $isread, PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							if ($query->rowCount() > 0) {
								foreach ($results as $result) {
									$fecha = $result->datetime;
									$fechaEntera = strtotime($fecha);
									$anio = date("Y", $fechaEntera);
									$mes = date("m", $fechaEntera);
									$dia = date("d", $fechaEntera);
							?>


									<li>

										<a href="manageincidents.php?incidentid=<?php echo htmlentities($result->id);
																				$id = $_GET['incidentid'];
																				$isread = 1;
																				$sql = "update tblincidents set isread=:isread  WHERE id=:id";
																				$query = $dbh->prepare($sql);
																				$query->bindParam(':id', $id, PDO::PARAM_STR);
																				$query->bindParam(':isread', $isread, PDO::PARAM_STR);
																				$query->execute();
																				$sql=null;
																				?>">

											<div class="notification">
												<div class="notification-icon circle yellow"><i class="material-icons">done</i></div>
												<div class="notification-text">
													<p><b><?php echo htmlentities($result->technical); ?>
															<br /></b>creación de incidencia </p><span> <?php echo htmlentities($dia . "-" . $mes . "-" . $anio); ?></span>
												</div>
											</div>
										</a>

									</li>
							<?php }
							} 
							$sql=null;
							?>

							<?php //error_reporting(E_ALL);
							$isread = 0;
							$sql = "SELECT id,isread,datetime,technical from tbldoublets where isread=:isread ORDER BY datetime DESC";
							$query = $dbh->prepare($sql);
							$query->bindParam(':isread', $isread, PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							if ($query->rowCount() > 0) {
								foreach ($results as $result) {
									$fecha = $result->datetime;
									$fechaEntera = strtotime($fecha);
									$anio = date("Y", $fechaEntera);
									$mes = date("m", $fechaEntera);
									$dia = date("d", $fechaEntera);

							?>


									<li>
										<a href="managedoublets.php?doubletsid=<?php echo htmlentities($result->id);
																				$isread = 1;
																				$sql = "update tbldoublets set isread=:isread  WHERE id=:id";
																				$query = $dbh->prepare($sql);
																				$query->bindParam(':id', $id, PDO::PARAM_STR);
																				$query->bindParam(':isread', $isread, PDO::PARAM_STR);
																				$query->execute(); 
																				$sql=null;
																				?>">
											<div class="notification">
												<div class="notification-icon circle green"><i class="material-icons">assignment_turned_in</i></div>
												<div class="notification-text">
													<p><b><?php echo htmlentities($result->technical); ?><br /></b> creación de doblete </p><span> <?php echo htmlentities($dia . "-" . $mes . "-" . $anio); ?></span>
												</div>
											</div>
										</a>

									</li>
							<?php }
							} 
							$sql=null;
							?>






							<?php

							$isread = 0;
							$sql = "SELECT id,isread,date,technical,invoice from tblactadmin where isread=:isread ORDER BY date DESC";
							$query = $dbh->prepare($sql);
							$query->bindParam(':isread', $isread, PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							if ($query->rowCount() > 0) {
								foreach ($results as $result) {
									$fecha = $result->date;
									$fechaEntera = strtotime($fecha);
									$anio = date("Y", $fechaEntera);
									$mes = date("m", $fechaEntera);
									$dia = date("d", $fechaEntera);
							?>


									<li>
										<a href="managepdf.php?actadminid=<?php echo htmlentities($result->id);
																			$id = $_GET['actadminid'];
																			$isread = 1;
																			$sql = "update tblactadmin set isread=:isread  WHERE id=:id";
																			$query = $dbh->prepare($sql);
																			$query->bindParam(':id', $id, PDO::PARAM_STR);
																			$query->bindParam(':isread', $isread, PDO::PARAM_STR);
																			$query->execute(); 
																			$sql=null; ?>">
											<div class="notification">
												<div class="notification-icon circle red"><i class="material-icons">assignment_late</i></div>
												<div class="notification-text">
													<p><b><?php echo htmlentities($result->technical); ?><br /></b> creación de acta administrativa <br />FOLIO:<?php echo htmlentities($result->invoice); ?> </p><span> <?php echo htmlentities($dia . "-" . $mes . "-" . $anio); ?></span>
												</div>
											</div>
										</a>
									</li>
							<?php }
							} 
							$sql=null;
							?>


						</ul>
					</li>
				</ul>




				<ul class=" right col s9 m3 nav-right-menu ">
					<?php
					$isread = 0;
					$sql = "SELECT id from tbldoublets where isread=0
UNION ALL
SELECT id from tblincidents where isread=0
UNION ALL
SELECT id from tblactadmin where isread=0
";
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

					<?php } 
					$sql=null;
					?>


				</ul>




			</div>
		</nav>
	</header>