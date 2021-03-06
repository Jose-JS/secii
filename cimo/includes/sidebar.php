     <aside id="slide-out" class="side-nav white fixed">
     	<div class="side-nav-wrapper">
     		<div class="sidebar-profile ">
     			<div class="sidebar-profile-image ">
     				<!--<img src="../assets/images/profile-image.png" class="circle" alt="">-->

     			</div>
     			<center>
     				<div class="sidebar-profile-info">
     					<?php
							$eid = $_SESSION['eid'];
							$sql = "SELECT * from  tblusers where id=:eid";
							$query = $dbh->prepare($sql);
							$query->bindParam(':eid', $eid, PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							$cnt = 1;
							if ($query->rowCount() > 0) {
								foreach ($results as $result) {
									$resultado = substr($result->image, 0);
							?>
     							<ceneter>
     								<img id="foto" name="foto" class="circle" autocomplete="off" src="<?php echo htmlentities($resultado); ?>" width="100" height="100" required>
     								<p><?php echo htmlentities($result->name . " " . $result->firstname . " " . $result->lastname); ?></p>

     								<p><?php echo htmlentities($result->empid); ?></p>
     							</ceneter>

     					<?php }
							} ?>
     				</div>
     			</center>

     		</div>
     		<ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
     			<li class="no-padding"><a class="waves-effect waves-grey" href="dashboard.php"><i class="material-icons">house</i>Escritorio</a></li>

     			<!--<li class="no-padding"><a class="waves-effect waves-grey" href="adduser.php"><i class="material-
                    icons">user</i>Usuarios</a></li>-->

     			<!-- <li class="no-padding"><a class="waves-effect waves-grey" href="addincidents.php"><i class="material-
                    icons"></i>Incidencias</a></li>-->

     			<!-- Opción de Incidencia***** 
                    
                    <li class="no-padding">
                     <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">event</i>Incidencias<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                     <div class="collapsible-body">
                         <ul>
                             <li><a href="addincidents.php">Agregar incidencia</a></li>
                             <li><a href="manageincidents.php">Administrar incidencia</a></li>
                         </ul>
                     </div>
                 </li> -->



     			<!--	<li class="no-padding">
     				<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">assignment</i>Dobletes<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
     				<div class="collapsible-body">
     					<ul>
     						<li><a href="adddoublets.php">Agregar doblete </a></li>
     						<li><a href="managedoublets.php">Administrar doblete</a></li>
     					</ul>
     				</div>
     			</li> -->

     			<li class="no-padding">
     				<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">assignment</i>Formato FAR y FBR<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
     				<div class="collapsible-body">
     					<ul>
						    <li><a href="adddoublets3.php">Crear formato FAR Y FBR</a></li>
     						<li><a href="manageformata.php">Nota formato FAR</a></li>
     						<li><a href="manageformatb.php">Nota formato FBR</a></li>
     						<li><a href="managedoublets3.php">Administrar PDF</a></li>
     					</ul>
     				</div>
     			</li>
				 

     			<li class="no-padding">
     				<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">assignment</i>Patrullaje<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
     				<div class="collapsible-body">
     					<ul>
     						<li><a href="addformatpat.php">Crear Formato</a></li>
     						<li><a href="manageformatpat.php">Administrar Patrullaje</a></li>
     					</ul>
     				</div>
     			</li>



     		</ul>
     		<div class="footer">
     			<a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Desconectar</a>
     			<!--<p class="copyright">.: Sistema SIM :.<a href=""></a>©</p>-->

     		</div>
     	</div>
     </aside>