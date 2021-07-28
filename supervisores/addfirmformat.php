<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('../includes/config.php');
if(strlen($_SESSION['supervisor'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
    
$id=$_GET['id'];
    
$departuretime=$_POST['departuretime'];
$img = $_POST['base64'];
$img = str_replace('data:image/png;base64,', '', $img);
$fileData = base64_decode($img);
$fileName = uniqid().'.png';
$fecha  = date("dmy");
$no_aleatorio  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta = '../supervisores/firmas/'.$fecha.$no_aleatorio.$fileName;//foto medio cuerpo
opendir($ruta);
//copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
$contract=$ruta;    
file_put_contents($ruta, $fileData);    
    
$img1 = $_POST['base641'];
$img1 = str_replace('data:image/png;base64,', '', $img1);
$fileData1 = base64_decode($img1);
$fileName1 = uniqid().'.png';
$fecha1  = date("dmy");
$no_aleatorio1  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta1 = '../supervisores/firmas/'.$fecha1.$no_aleatorio1.$fileName1;//foto medio cuerpo
opendir($ruta1);
//copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
$contract1=$ruta1;    
file_put_contents($ruta1, $fileData1);
    
$img2 = $_POST['base642'];
$img2 = str_replace('data:image/png;base64,', '', $img2);
$fileData2 = base64_decode($img2);
$fileName2 = uniqid().'.png';
$fecha2  = date("dmy");
$no_aleatorio2  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta2 = '../supervisores/firmas/'.$fecha2.$no_aleatorio2.$fileName2;//foto medio cuerpo
opendir($ruta2);
//copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
$contract2=$ruta2;    
file_put_contents($ruta2, $fileData2); 
    
$img3 = $_POST['base643'];
$img3 = str_replace('data:image/png;base64,', '', $img3);
$fileData3 = base64_decode($img3);
$fileName3 = uniqid().'.png';
$fecha3  = date("dmy");
$no_aleatorio3  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta3 = '../supervisores/firmas/'.$fecha3.$no_aleatorio3.$fileName3;//foto medio cuerpo
opendir($ruta3);
//copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
$contract3=$ruta3;    
file_put_contents($ruta3, $fileData3);     
$creatoruser=$_SESSION['supervisor'];
$action='inserción';
	
  
    
$sql='UPDATE tblformatpat set firma1=:contract,firma2=:contract1,firma3=:contract2,firma4=:contract3,creatoruser=:creatoruser,action=:action where id=:id';
$query = $dbh->prepare($sql);
$query->bindParam(':contract',$contract,PDO::PARAM_STR);
$query->bindParam(':contract1',$contract1,PDO::PARAM_STR);	
$query->bindParam(':contract2',$contract2,PDO::PARAM_STR);
$query->bindParam(':contract3',$contract3,PDO::PARAM_STR);        
$query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);    
$query->bindParam(':action',$action,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);    
$query->execute();
$lastInsertId = $dbh->lastInsertId();

$msg='Fimas de formato, ingresadas con éxito';
echo '<script>
 if ( window.history.replaceState ) {
     window.history.replaceState( null, null, window.location.href );
 }
</script>'; 
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
                                <?php  
                if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                <div class="row">


                                    <div class="input-field col m6 s12">
                                        <div id="signature-pad" class="signature-pad">
                                           
                                            <div class="description">FIRMA CUSTODIO</div>
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
                                    
                                    
                                    <div class="input-field col m6 s12">
                                        <div id="signature-pad1" class="signature-pad1">
                                            <div class="description">FIRMA CHOFER</div>
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
                                        <div id="signature-pad2" class="signature-pad2">
                                            <div class="description">FIRMA CIMO</div>
                                            <div class="signature-pad2">
                                                <canvas style="width: 200px; height: 100px; border: 1px black solid; " id="canvas2"></canvas>
                                                <a class="btn btn-primary " id="clear2">Limpiar Firma</a>
                                                <!--<label name="clear"id="clear" for="coords">Limpiar</label>        -->
                                                <!--<button name="clear"id="clear"type="submit">Limpiar</button>-->

                                            </div>

                                        </div>

                                    </div>
                                    <input type="hidden" name="pacient_id2" value="">
                                    <input type="hidden" name="base642" value="" id="base642">
                                    
                                    
                                    <div class="input-field col m6 s12">
                                        <div id="signature-pad3" class="signature-pad3">
                                            <div class="description">FIRMA DIRECTOR DE OPERACIONES</div>
                                            <div class="signature-pad3">
                                                <canvas style="width: 200px; height: 100px; border: 1px black solid; " id="canvas3"></canvas>
                                                <a class="btn btn-primary " id="clear3">Limpiar Firma</a>
                                                <!--<label name="clear"id="clear" for="coords">Limpiar</label>        -->
                                                <!--<button name="clear"id="clear"type="submit">Limpiar</button>-->

                                            </div>

                                        </div>

                                    </div>
                                    <input type="hidden" name="pacient_id3" value="">
                                    <input type="hidden" name="base643" value="" id="base643">


                                    <div class="input-field col s12">
                                        <button type="submit" name="add" onclick="return valid();" class="waves-effect waves-light btn indigo m-b-xs">AÑADIR</button>
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
        document.getElementById('AUTO').addEventListener("submit", function(e) {

            var ctx1 = document.getElementById("canvas1");
            var image1 = ctx1.toDataURL(); // data:image/png....
            document.getElementById('base641').value = image1;
        }, false);

    </script>


    <script type="text/javascript">
        var wrapper2 = document.getElementById("signature-pad2");

        var canvas2 = wrapper2.querySelector("canvas");

        var signaturePad2 = new SignaturePad(canvas2, {
            backgroundColor: 'rgb(255, 255, 255)'
        });

        function resizeCanvas2() {

            var ratio = Math.max(window.devicePixelRatio || 1, 1);

            canvas2.width = canvas2.offsetWidth * ratio;
            canvas2.height = canvas2.offsetHeight * ratio;
            canvas2.getContext("2d").scale(ratio, ratio);
            document.getElementById('clear2').addEventListener('click', function() {
                signaturePad2.clear();
            });
            //  $('#clear').on('click', function(){
            //         signaturePad.clear();
            //   }); 

            canvas2.addEventListener('touchstart', onTouchStart, false);
            // signaturePad.clear();
        }

        window.onresize = resizeCanvas2;
        resizeCanvas2();

    </script>
    <script>
        document.getElementById('AUTO').addEventListener("submit", function(e) {

            var ctx2 = document.getElementById("canvas2");
            var image2 = ctx2.toDataURL(); // data:image/png....
            document.getElementById('base642').value = image2;
        }, false);

    </script>


    <script type="text/javascript">
        var wrapper3 = document.getElementById("signature-pad3");

        var canvas3 = wrapper3.querySelector("canvas");

        var signaturePad3 = new SignaturePad(canvas3, {
            backgroundColor: 'rgb(255, 255, 255)'
        });

        function resizeCanvas3() {

            var ratio = Math.max(window.devicePixelRatio || 1, 1);

            canvas3.width = canvas3.offsetWidth * ratio;
            canvas3.height = canvas3.offsetHeight * ratio;
            canvas3.getContext("2d").scale(ratio, ratio);
            document.getElementById('clear3').addEventListener('click', function() {
                signaturePad3.clear();
            });
            //  $('#clear').on('click', function(){
            //         signaturePad.clear();
            //   }); 

            canvas3.addEventListener('touchstart', onTouchStart, false);
            // signaturePad.clear();
        }

        window.onresize = resizeCanvas3;
        resizeCanvas3();

    </script>
    <script>
        document.getElementById('AUTO').addEventListener("submit", function(e) {

            var ctx3 = document.getElementById("canvas3");
            var image3 = ctx3.toDataURL(); // data:image/png....
            document.getElementById('base643').value = image3;
        }, false);

    </script>

</body>

</html>

<?php } ?>