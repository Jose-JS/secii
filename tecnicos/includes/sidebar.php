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
							//var_dump($eid);
							$sql = "SELECT * from  tbldocument where idemp=:eid and name='MEDIO CUERPO' ";
							$query = $dbh->prepare($sql);
							$query->bindParam(':eid', $eid, PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							$cnt = 1;
							if ($query->rowCount() > 0) {
								foreach ($results as $result) {
									$resultado =$result->namedoc;

							?>
     							<center>

     								<img id="foto" name="foto" class="circle" autocomplete="off" src="<?php echo htmlentities($resultado); ?>" width="110" height="110" required>

						<?php 
						    $sql2 = "SELECT * from  tblemployees where id=:eid";
							$query2 = $dbh->prepare($sql2);
							$query2->bindParam(':eid', $eid, PDO::PARAM_STR);
							$query2->execute();
							$results2 = $query2->fetchAll(PDO::FETCH_OBJ);
							$cnt = 1;
							if ($query2->rowCount() > 0) {
								foreach ($results2 as $result2) {
									?>
     								<p><?php echo htmlentities($result2->name . " " . $result2->FirstName . " " . $result2->LastName); ?></p>

     								<p><?php echo htmlentities($result2->EmpId); ?></p>
     							</center>
<?php }} ?>

     				</div>
     			</center>

     		</div>
     		<ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
     			<li class="no-padding"><a class="waves-effect waves-grey" href="dashboard.php"><i class="material-icons">house</i>Escritorio</a></li>
				 
				 
				 <li class="no-padding">
     				<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">assignment</i>Entrega de servicio<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
     				<div class="collapsible-body">
     					<ul>
     						<li><a href="entregaservicio.php">Entrega de servicio</a></li>
     						<li><a href="manageentregaserv.php">Administrar PDF</a></li>
     						<!--<li><a href="manageannexedb.php">Administrar Anexo A</a></li>-->
     						<!--<li><a href="servicesup.php">Anexo B</a></li>-->

     					</ul>
     				</div>
     			</li> 
     	<?php }
							} ?>

     		</ul>
     		<div class="footer">
     			<a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Desconectar</a>
     			<!--<p class="copyright">.: Sistema SIM :.<a href=""></a>©</p>-->

     		</div>
     	</div>
     </aside>