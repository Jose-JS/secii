<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['recursos'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{


}

    ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Title -->
	<title>Recursos Humanos | Lista</title>

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

			</div>
			<div class="col s12 m12 l6">
				<div class="card">
					<div class="page-title">Lista</div>
					<div class="card-content">

						<div class="row">
							<form class="col s12" name="chngpwd" method="post">
								<?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<div class="row">
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
									<div class="input-field col s12">
										<a name="create_pdf" href="javascript:getURL()" title="Lista de Técnicos" class="tooltipped" data-position="bottom" data-tooltip="Lista de Técnicos"><i class="material-icons">picture_as_pdf</i>GENERAR PDF</a>
									</div>
									<script>
										function getURL() {
											var dir = "listemployees3.php?company=";
											dir += document.getElementById('company').value;
											//window.open("http://www.google.com")
											//window.open=("dir");
											window.open(dir, '', '', '_blank');
										}

									</script>
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
