     <aside id="slide-out" class="side-nav white fixed">
     	<div class="side-nav-wrapper">
     		<div class="sidebar-profile ">
     			<div class="sidebar-profile-image ">


     			</div>

     			<div class="sidebar-profile-info" align="center">
     				<?php
$eid=$_SESSION['eid'];
$sql = "SELECT * from  tblusers where id=:eid";
$query = $dbh -> prepare($sql);                          
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)

{
    $resultado = substr($result->image, 0);   
                            ?>
     				<ceneter><img id="foto" name="foto" class="circle" autocomplete="off" src="<?php echo htmlentities($resultado);?>" width="100" height="100" required></ceneter>
     				<p><?php echo htmlentities($result->name." ".$result->firstname." ".$result->lastname);?></p>
     				<ceneter>
     					<p><?php echo htmlentities($result->empid);?></p>
     				</ceneter>

     				<?php }} ?>
     			</div>


     		</div>
     		<ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">

     			<li class="no-padding"><a class="waves-effect waves-grey" href="dashboard.php"><i class="material-icons">settings_input_svideo</i>Escritorio</a></li>


     			<li class="no-padding">
     				<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">account_box</i>Técnicos<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
     				<div class="collapsible-body">
     					<ul>
     						<li><a href="addemployee2.php">Agregar Técnico</a></li>
     						<li><a href="manageemployee.php">Administrar Técnico</a></li>
     						<li><a href="listemployees.php">Lista de Técnicos</a></li>
							 <li><a href="managebajas.php">Bajas de Técnicos</a></li>

     					</ul>
     				</div>
     			</li>
     			<li class="no-padding">
     				<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">assignment</i>Entrega de servicio<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
     				<div class="collapsible-body">
     					<ul>
     						<li><a href="managepdf.php">Administrar PDF</a></li>
     						<!--<li><a href="manageannexedb.php">Administrar Anexo A</a></li>-->
     						<!--<li><a href="servicesup.php">Anexo B</a></li>-->

     					</ul>
     				</div>
     			</li>



     			<li class="no-padding">
     				<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">assignment</i>Incidencias<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
     				<div class="collapsible-body">
     					<ul>
     						<li><a href="manageincidents.php">Administrar incidencia</a></li>
     					</ul>
     				</div>
     			</li>

     			<li class="no-padding">
     				<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">assignment</i>Formato FAR y FBR<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
     				<div class="collapsible-body">
     					<ul>
     						<li><a href="managedoublets3.php">Administrar Formatos</a></li>
     					</ul>
     				</div>
     			</li>

     			<li class="no-padding">
     				<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">history_edu</i>Dobletes<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
     				<div class="collapsible-body">
     					<ul>

     						<li><a href="managedoublets.php">Administrar doblete</a></li>
     					</ul>
     				</div>
     			</li>

     			<li class="no-padding">
     				<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">assignment</i>Checklist<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
     				<div class="collapsible-body">
     					<ul>
     						<li><a href="managechecklist.php">Administrar Checklist</a></li>
     					</ul>
     				</div>
     			</li>


     			<li class="no-padding">
     				<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">explore</i>Puestos<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
     				<div class="collapsible-body">
     					<ul>
     						<li><a href="adddepartment.php">Agregar puestos</a></li>
     						<li><a href="managedepartments.php">Administrar puestos</a></li>
     					</ul>
     				</div>
     			</li>

     			<li class="no-padding">
     				<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">room_service</i>Servicios<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
     				<div class="collapsible-body">
     					<ul>
     						<li><a href="addserviceassigned.php">Agregar servicios</a></li>
     						<li><a href="manageservices.php">Administrar servicios</a></li>
     					</ul>
     				</div>
     			</li>




     			<li class="no-padding">

     			</li>




     		</ul>
     		<div class="footer">
     			<a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Desconectar</a>
     			<!--<p class="copyright">.: Sistema SIM :.<a href=""></a>©</p>-->

     		</div>
     	</div>
     </aside>
