<?php
session_start();

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
//error_reporting(E_ALL);


include('../includes/config.php');
if (strlen($_SESSION['recursos']) == 0) {
    header('location:index.php');
} else {
    if(isset($_POST['add']))
{
    $folio=$_POST['folio'];
    $fecha=$_POST['fecha'];
    
    $img1 = $_POST['base641'];
    $img1 = str_replace('data:image/png;base64,', '', $img1);
    $fileData1 = base64_decode($img1);
    $fileName1 = uniqid().'.png';
    $fecha1  = date("dmy");
    $no_aleatorio1  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
    $ruta1 = '../supervisores/firmas/'.$fecha1.$no_aleatorio1.$fileName1;//foto medio cuerpo
    opendir($ruta1);
    //copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
    $contractresponsable=$ruta1;    
    file_put_contents($ruta1, $fileData1);

    $img = $_POST['base64'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $fileData = base64_decode($img);
    $fileName = uniqid().'.png';
    $fecha  = date("dmy");
    $no_aleatorio  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
    $ruta = '../supervisores/firmas/'.$fecha.$no_aleatorio.$fileName;//foto medio cuerpo
    opendir($ruta);
    //copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
    $contracttesi=$ruta;    
    file_put_contents($ruta, $fileData);
    
    
    $creatoruser=$_SESSION['recursos'];
    $action='inserción';
    
            
            //INSERTA REGISTRO DE FOLIO
            $sql3="INSERT INTO tblinventoryfol(folio,fecha,creatoruser,action,firm1,firm2) VALUES(:folio,:fecha,:creatoruser,:action,:contractresponsable,:contracttesi)";
            $query3 = $dbh->prepare($sql3);
            $query3->bindParam(':folio',$folio,PDO::PARAM_STR);
            $query3->bindParam(':contractresponsable',$contractresponsable,PDO::PARAM_STR);
            $query3->bindParam(':contracttesi',$contracttesi,PDO::PARAM_STR);
            $query3->bindParam(':fecha',$fecha,PDO::PARAM_STR);  
            $query3->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);    
            $query3->bindParam(':action',$action,PDO::PARAM_STR);      
            $query3->execute();
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId)
            {
                echo 'script> alert("EXITO"); </script>';
            }
            else 
            {
                echo '<script> alert("ERROR"); </script>';
            }
    
        }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!-- Title -->
        <title>Recursos Materiales | Salidas</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <?php include('includes/header.php'); ?>

        <?php include('includes/sidebar.php'); ?>
        <main class="mn-inner">
            <div class="row">

                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content">
                            <form id="formulario" method="post" name="formulario" enctype="multipart/form-data">
                                <?php if ($error) { ?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                                <div>
                                    <h3>Salidas.</h3>

                                    <div class="row">
                                        <div class="col m6">
                                            <div class="row">


                                                <?php
                                                $sql = "SELECT MAX(folio)+1 as folio FROM tblinventoryfol LIMIT 1";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                //$folio = (empty($sql['invoice']) ? 1 : $sql['invoice']+=1);    
                                                //var_dump($folio);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {
                                                        //var_dump($result->invoice);
                                                        $c = $result->folio;
                                                        if ($c == null) {
                                                            $c = 0 + 1;
                                                        } else {
                                                            $c = $result->folio;
                                                            //$c=4;
                                                        }
                                                ?>

                                                        <script>
                                                            function myFunction2() {
                                                                window.open("../recursosmateriales/exitinventory.php?f=<?php echo htmlentities($c); ?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
                                                            }
                                                        </script>

                                                        <div class="input-field col m6 s12">
                                                            <label for="folio">Folio</label><br>
                                                            <input id="folio" name="folio" value="<?php echo htmlentities($c); ?>" type="text" autocomplete="off" required readonly="readonly">
                                                        </div>

                                                        <div class="input-field col s12">
                                                            <label for="fecha">Fecha</label><br>

                                                            <input id="fecha" name="fecha" tabindex="25" type="date" autocomplete="off" required>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                        <div id="signature-pad1" class="signature-pad1">
                                            <div class="description">FIRMA DE ENTREGA</div>
                                            <div class="signature-pad1">
                                                <canvas style="width: 200px; height: 100px; border: 1px black solid; " id="canvas1"></canvas>
                                                <a class="btn btn-primary " id="clear1">Limpiar Firma</a>
                                                <!--<label name="clear"id="clear" for="coords">Limpiar</label>        -->
                                                <!--<button name="clear"id="clear"type="submit">Limpiar</button>-->

                                            </div>

                                        </div>

                                    </div>
                                    <input type="hidden" name="pacient_id1" value="">
                                    <input type="hidden" name="base641" value="" id="base641">

                                    <div class="input-field col m6 s12">
                                    <div id="signature-pad" class="signature-pad">
                                            <div class="description">FIRMA DE TESI</div>
                                            <div class="signature-pad">
                                                <canvas style="width: 200px; height: 100px; border: 1px black solid; " id="canvas"></canvas>
                                                <a class="btn btn-primary " id="clear">Limpiar Firma</a>
                                                <!--<label name="clear"id="clear" for="coords">Limpiar</label>        -->
                                                <!--<button name="clear"id="clear"type="submit">Limpiar</button>-->

                                            </div>

                                        </div>

                                    </div>
                                    <input type="hidden" name="pacient_id" value="">
                                    <input type="hidden" name="base64" value="" id="base64">

                                

                                                       



                                            </div>
                                            <input type="button" onclick="myFunction2()" value="Generar salida" class="waves-effect waves-light btn indigo m-b-xs">
                                            <button type="submit" name="add" onclick="return valid();" class="waves-effect waves-light btn indigo m-b-xs">GUARDAR</button>


                                        </div>
                                    </div>

                                </div>
                        </div>


                    </div>
            <?php $cnt++;
                                                    }
                                                } ?>

                </div>
                </form>
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
        <script src="../assets/js/signature_pad.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    

        
        <script type="text/javascript">
	var wrapper1 = document.getElementById("signature-pad1");

	var canvas1 = wrapper1.querySelector("canvas");

	var signaturePad1 = new SignaturePad(canvas1, {
		backgroundColor: 'rgb(255, 255, 255)'
	});

	function resizeCanvas1() {

		var ratio = Math.max(window.devicePixelRatio || 1, 1);

		canvas1.width = canvas1.offsetWidth * ratio;
		canvas1.height = canvas1.offsetHeight * ratio;
		canvas1.getContext("2d").scale(ratio, ratio);
		document.getElementById('clear1').addEventListener('click', function() {
			signaturePad1.clear();
		});
		//  $('#clear').on('click', function(){
		//         signaturePad.clear();
		//   }); 

		canvas1.addEventListener('touchstart', onTouchStart, false);
		// signaturePad.clear();
	}

	window.onresize = resizeCanvas1;
	resizeCanvas1();
</script>
<script>
	document.getElementById('formulario').addEventListener("submit", function(e) {

		var ctx1 = document.getElementById("canvas1");
		var image1 = ctx1.toDataURL(); // data:image/png....
		document.getElementById('base641').value = image1;
	}, false);
</script>

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
	document.getElementById('formulario').addEventListener("submit", function(e) {

		var ctx = document.getElementById("canvas");
		var image = ctx.toDataURL(); // data:image/png....
		document.getElementById('base64').value = image;
	}, false);
</script>

    </body>

    </html>
<?php } ?>