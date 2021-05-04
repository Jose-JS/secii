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
    
$folio=$_GET['f'];
    
$img = $_POST['base64'];
$img = str_replace('data:image/png;base64,', '', $img);
$fileData = base64_decode($img);
$fileName = uniqid().'.png'; 
$fecha  = date("dmy");
$no_aleatorio  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta = '../supervisores/firmas/'.$fecha.$no_aleatorio.$fileName;
opendir($ruta);
//copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
$contract=$ruta;    
file_put_contents($ruta, $fileData);   
    
$nosucursal=$_POST['nosucursal'];    
$hrllegada=$_POST['hrllegada'];
$hrsalida=$_POST['hrsalida'];    
$observacion=$_POST['observacion'];    	
$creatoruser=$_SESSION['supervisor'];
$action='inserción';
	
  
    
$sql='INSERT INTO tblformatpatreg(folio,nosucursal,hrllegada,hrsalida,observacion,firma,creatoruser,action) VALUES(:folio,:nosucursal,:hrllegada,:hrsalida,:observacion,:contract,:creatoruser,:action)';
$query = $dbh->prepare($sql);
$query->bindParam(':folio',$folio,PDO::PARAM_STR);
$query->bindParam(':nosucursal',$nosucursal,PDO::PARAM_STR);	
$query->bindParam(':hrllegada',$hrllegada,PDO::PARAM_STR);
$query->bindParam(':hrsalida',$hrsalida,PDO::PARAM_STR);	
$query->bindParam(':observacion',$observacion,PDO::PARAM_STR);
$query->bindParam(':contract',$contract,PDO::PARAM_STR);
$query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);        
$query->bindParam(':action',$action,PDO::PARAM_STR);              	
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg='Registro de formato, creado con éxito';
echo '<script>
 if ( window.history.replaceState ) {
     window.history.replaceState( null, null, window.location.href );
 }
</script>'; 
echo "<script type='text/javascript'> document.location = 'managerefformat.php'; </script>";    
}
else 
{
$error='Algo salió mal. Inténtalo de nuevo';
}
}

    ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Supervisores | Formato Patrullaje</title>

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

    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">FORMATO PATRULLAJE REGISTROS</div>
            </div>
            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <div class="page-title">FORMATO PATRULLAJE REGISTROS</div>
                        <div class="row">
                            <form id="AUTO" class="col s12" method="post" enctype="multipart/form-data">
                                <?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                <div class="row">
                                    <label for="nosucursal">No. Sucursal</label><br>
                                    <input id="nosucursal" name="nosucursal" type="text" autocomplete="off" required>
                                </div>

                                <div class="input-field col s12">
                                    <label for="hrllegada">Hora llegada</label><br>
                                    <input id="hrllegada" type="time" class="validate" autocomplete="off" name="hrllegada" required>
                                </div>

                                <div class="input-field col s12">
                                    <label for="hrsalida">Hora salida</label><br>
                                    <input id="hrsalida" type="time" class="validate" autocomplete="off" name="hrsalida" required>
                                </div>

                                <div class="input-field col s12">
                                    <label for="observacion">Observacion</label>
                                    <input id="observacion" type="text" class="validate" autocomplete="off" name="observacion" required>
                                </div>

                                <div class="input-field col m6 s12">
                                    <div id="signature-pad" class="signature-pad">
                                        <div class="description">FIRMA</div>
                                        <div class="signature-pad">
                                            <canvas style="width: 200px; height: 100px; border: 1px black solid; " id="canvas" required></canvas>
                                            <a class="btn btn-primary " id="clear">Limpiar Firma</a>
                                            <!--<label name="clear"id="clear" for="coords">Limpiar</label>        -->
                                            <!--<button name="clear"id="clear"type="submit">Limpiar</button>-->

                                        </div>

                                    </div>
                                </div>
                                <input type="hidden" name="pacient_id" value="">
                                <input type="hidden" name="base64" value="" id="base64">

                                <div class="input-field col s12">
                                    <button type="submit" name="add" onclick="return valid();" class="waves-effect waves-light btn indigo m-b-xs">AÑADIR</button>
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
    <script src="../assets/js/signature_pad.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".content").fadeOut(1500);
            }, 6000);

        });

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
        document.getElementById('AUTO').addEventListener("submit", function(e) {

            var ctx = document.getElementById("canvas");
            var image = ctx.toDataURL(); // data:image/png....
            document.getElementById('base64').value = image;
        }, false);

    </script>

</body>

</html>

<?php } ?>
