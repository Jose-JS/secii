<?php
session_start();
error_reporting(0);
//error_reporting(E_ALL);
include('includes/config.php');
if(strlen($_SESSION['supervisor'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
    
$id=$_GET['i'];
$nota=$_POST['nota'];	
$creatoruser=$_SESSION['supervisor'];
$action=modificación;    
  
$sql="UPDATE tbldoubletsb SET nota=:nota,creatoruser=:creatoruser,action=:action WHERE id=:id";   
$query = $dbh->prepare($sql);	
$query->bindParam(':id',$id,PDO::PARAM_STR);  	
$query->bindParam(':nota',$nota,PDO::PARAM_STR);        	
$query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);        
$query->bindParam(':action',$action,PDO::PARAM_STR);        
$query->execute();
$lastInsertId = $dbh->lastInsertId();
$query->execute();
 
$lastInsertId = $dbh->lastInsertId();

$msg="Modificación de Formato FBR";
echo "<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>";	
}

    ?>


<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Title -->
	<title>C.I.M.O. | Editar FORMATO FBR</title>

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
	</style>

	<script type="text/javascript">
		function valid() {


			return true;
		}
	</script>

</head>

<body>
       <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
	<main class="mn-inner">
		<div class="row">
			<div class="col s12">
				<div class="page-title">FORMATO FBR</div>
			</div>
			<div class="col s12 m12 l6">
				<div class="card">
					<div class="card-content">
<div class="page-title">FORMATO FBR</div>
						<div class="row">
							<form id="AUTO" class="col s12" method="post" enctype="multipart/form-data">
								<?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<div class="row">
								<?php 
	 $id=$_GET['i'];
	$sql = "SELECT * from tbldoubletsb where id=:id";
$query = $dbh -> prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
								
									<label for="fecha">Fecha</label><br>
									<input id="fecha" name="fecha" value="<?php echo htmlentities($result->fecha);?>"type="date" autocomplete="off" >
								</div>
								
							<div class="input-field col s12">
									<select id="sedeorig" name="sedeorig" autocomplete="off"  >
										<option value="<?php echo htmlentities($result->sedeorig);?>"><?php echo htmlentities($result->sedeorig);?></option>

									</select>
								</div>

								<div class="input-field col s12">
									<select id="tesireac" name="tesireac" autocomplete="off"  >
										<option value=""><?php echo htmlentities($result->empid);?>&nbsp;<?php echo htmlentities($result->tesireac);?></option>

									</select>
								</div>
								
						        <div class="input-field col s12">
									<select id="turnoreac" name="turnoreac" autocomplete="off"  >
										<option value=""><?php echo htmlentities($result->turnoreac);?></option>
									</select>
								</div>


								<div class="input-field col s12">
									<select id="sedecubre" name="sedecubre" autocomplete="off"  >
										<option value=""><?php echo htmlentities($result->sedecubre);?></option>
									</select>
								</div>
								
								<div class="input-field col s12">
									<select id="turnocubre" name="turnocubre" autocomplete="off"  >
										<option value=""><?php echo htmlentities($result->turnocubre);?></option>
									</select>
								</div>



								<div class="input-field col s12">
									<label for="tesi">Técnico cubre</label>
									<input id="tesi" type="text" value="<?php echo htmlentities($result->tesi);?>"class="validate" autocomplete="off" name="tesi"  >
								</div>
								
								<div class="input-field col s12">
									<label for="tesi">Técnico cubre</label>
									<input id="tesi" type="text" value="<?php echo htmlentities($result->motivo);?>"class="validate" autocomplete="off" name="tesi"  >
								</div>
								
								<div class="input-field col s12">
									<label for="nota">Nota</label>
									<input id="nota" value="<?php echo htmlentities($result->nota);?>"type="text"class="validate" autocomplete="off" name="nota"  >
								</div>


                               <?php }} ?>
                                <div class="input-field col s12">
									<button type="submit" name="add" onclick="return valid();" class="waves-effect waves-light btn indigo m-b-xs">Modificar</button>

								</div>




						</div>

						</form>
					</div>
				</div>
			</div>



		</div>

		</div>
	</main>

	</div>
	<div class="left-sidebar-hover"></div>

	<!-- Javascripts -->
	<script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>

	<script src="../assets/plugins/materialize/js/materialize.min.js"></script>
	<script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
	<script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
	<script src="../assets/js/alpha.min.js"></script>
	<script src="../assets/js/pages/form_elements.js"></script>
	<script src="../assets/js/signature_pad.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setTimeout(function() {
				$(".content").fadeOut(1500);
			}, 6000);

		});
	</script>

</body>

</html>
<script type="text/javascript">
	var wrapper = document.getElementById("signature-pad");

	var canvas = wrapper.querySelector("canvas");

	var signaturePad = new SignaturePad(canvas, {
		backgroundColor: 'rgb(255, 255, 255)'
	});

	function resizeCanvas() {

		var ratio = Math.max(window.devicePixelRatio || 1, 1);

		canvas.width = canvas.offsetWidth * ratio;
		canvas.height = canvas.offsetHeight * ratio;
		canvas.getContext("2d").scale(ratio, ratio);
		document.getElementById('clear').addEventListener('click', function() {
			signaturePad.clear();
		});
		//  $('#clear').on('click', function(){
		//         signaturePad.clear();
		//   }); 

		canvas.addEventListener('touchstart', onTouchStart, false);
		// signaturePad.clear();
	}

	window.onresize = resizeCanvas;
	resizeCanvas();
</script>
<script>
	document.getElementById('AUTO').addEventListener("submit", function(e) {

		var ctx = document.getElementById("canvas");
		var image = ctx.toDataURL(); // data:image/png....
		document.getElementById('base64').value = image;
	}, false);
</script>
<?php } ?>