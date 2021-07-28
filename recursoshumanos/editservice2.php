<?php
session_start();
error_reporting(0);
//ini_set('error_reporting', E_ALL);
include('../includes/config.php');
if(strlen($_SESSION['recursos'])==0)
    {   
header('location:index.php');
}

else{
$idd=$_GET['id']; 
$empid=$_GET['empid']; 	
$tech=$_GET['tech']; 	
$service=$_GET['service']; 	
	
if(isset($_POST['update']))
{

$matricula=$_POST['matricula'];
$tecnico=$_POST['tecnico']; 
$servicioo=$_POST['servicioo'];
$serviciod=$_POST['serviciod'];    
$creatoruser=$_SESSION['recursos'];
$action='modificación';
$action2='inserción';	


	
$sql2="INSERT INTO tblmoveservice(idtblemployees,empid,tech,serviceo,serviced,creatoruser,action)VALUES(:idd,:matricula,:tecnico,:servicioo,:serviciod,:creatoruser,:action2)";
$query2 = $dbh->prepare($sql2);
$query2->bindParam(':idd',$idd,PDO::PARAM_STR);
$query2->bindParam(':matricula',$matricula,PDO::PARAM_STR);
$query2->bindParam(':tecnico',$tecnico,PDO::PARAM_STR);
$query2->bindParam(':servicioo',$servicioo,PDO::PARAM_STR);
$query2->bindParam(':serviciod',$serviciod,PDO::PARAM_STR);
$query2->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);
$query2->bindParam(':action2',$action2,PDO::PARAM_STR);     
$query2->execute();	
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$sql="update tblemployees set assignedservice=:serviciod,creatoruser=:creatoruser,action=:action where id=:idd";
$query = $dbh->prepare($sql);
$query->bindParam(':serviciod',$serviciod,PDO::PARAM_STR);
$query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);
$query->bindParam(':action',$action,PDO::PARAM_STR);      
$query->bindParam(':idd',$idd,PDO::PARAM_STR);
$query->execute();	
echo "<script>  
alert('Registro de servicio, modificado con éxito');
</script>"; 	
echo "<script>
 if ( window.history.replaceState ) {
     window.history.replaceState( null, null, window.location.href );
 }
</script>";    
echo "<script type='text/javascript'> document.location = 'manageemployee.php'; </script>";
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
	<title>Recursos Humanos | Actualizar Servicio</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta charset="UTF-8">
	<meta name="description" content="Responsive Admin Dashboard Template" />
	<meta name="keywords" content="admin,dashboard" />
	<meta name="author" content="Steelcoders" />

	<!-- Styles -->
	<link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
	<link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
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

		#map {
			width: 60%;
			height: 50%;
			margin: 0 0 20px 0;
		}
	</style>
</head>

<body>
	<?php include('includes/header.php');?>

	<?php include('includes/sidebar.php');?>
	<main class="mn-inner">
		<div class="row">
			<div class="col s12">
				<div class="page-title">Actualizar Servicio</div>
			</div>
			<div class="col s12 m12 l6">
				<div class="card">
					<div class="card-content">

						<div class="row">
							<form class="col s12" name="chngpwd" method="post">
								<?php 
	                          if($error){?>
	                          <div class="errorWrap content">
	                          <strong>ERROR</strong>:<?php echo htmlentities($error); ?> 
	                          </div><?php } 
                               else if($msg){?>
                               <div class="succWrap content">
                               <strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> 
                               </div><?php }?>

								<div class="row">
									<form class="col s12" name="chngpwd" method="post">
										<div class="row">
											
											<div class="input-field col s12">
												<input id="matricula" type="text" name="matricula" class="validate" autocomplete="off" value="<?php echo $empid; ?>" required>
												<label for="servicecode">Matricula</label>
											</div>


											<div class="input-field col s12">
												<input id="tecnico" type="text" class="validate" autocomplete="off" name="tecnico" value="<?php echo $tech;?>" required>
												<label for="servicename">Técnico</label>
											</div>


											<div class="input-field col s12">
												<input type="text" id="servicioo" name="servicioo" value="<?php echo $service;?>" class="validate" required />
												<label for="servicioo">Servicio Origen</label>
											</div>



											<div class="input-field col s12">
									<select id="serviciod" name="serviciod" autocomplete="off">
													<option value="">Servicio Destino</option>
									<?php $sql = "SELECT servicename from tblserviceassigned";
                                    $query = $dbh -> prepare($sql);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {   ?>
								    <option value="<?php echo htmlentities($result->servicename);?>"><?php echo htmlentities($result->servicename);?></option>
													<?php }} ?>
												</select>
											</div>


										</div>

									</form>

									<div class="input-field col s12">
										<button type="submit" name="update" class="waves-effect waves-light btn indigo m-b-xs">ACTUALIZAR</button>

									</div>



								</div>



							</form>
						</div>
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
	<script type="text/javascript">
		$(document).ready(function() {
			setTimeout(function() {
				$(".content").fadeOut(1500);
			}, 6000);

		});
	</script>

</body>

</html>
<?php } ?>