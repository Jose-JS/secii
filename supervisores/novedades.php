<?php
session_start();

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
//error_reporting(E_ALL);
 
// Motrar todos los errores de PHP
//ini_set('error_reporting', E_ALL);

include('includes/config.php');
if(strlen($_SESSION['supervisor'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
$invoice=$_GET['i'];
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
    
$img1 = $_POST['base641'];
$img1 = str_replace('data:image/png;base64,', '', $img1);
$fileData1 = base64_decode($img1);
$fileName1 = uniqid().'.png';
$fecha1  = date("dmy");
$no_aleatorio1  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta1 = '../supervisores/firmas/'.$fecha1.$no_aleatorio1.$fileName1;
opendir($ruta1);
//copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
$contract1=$ruta1;    
file_put_contents($ruta1, $fileData1);
$date=$_POST['date'];
$description=$_POST['description'];     
$creatoruser=$_SESSION['supervisor'];    
$action='inserción';
 
 
$sql="INSERT INTO tblnovelties(invoice,date,description,firm1,firm2,creatoruser,action) VALUES(:invoice,:date,:description,:contract,:contract1,:creatoruser,:action)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':invoice',$invoice,PDO::PARAM_STR);    
    $query->bindParam(':date',$date,PDO::PARAM_STR);
    $query->bindParam(':description',$description,PDO::PARAM_STR);
    $query->bindParam(':contract',$contract,PDO::PARAM_STR);
    $query->bindParam(':contract1',$contract1,PDO::PARAM_STR);
    $query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);
    $query->bindParam(':action',$action,PDO::PARAM_STR);
    
$query->execute();
 
$lastInsertId = $dbh->lastInsertId();
       
if($lastInsertId)
{

$msg="Registro de amonestación, agregado con éxito";
echo "<script>
   if ( window.history.replaceState ) {
     window.history.replaceState( null, null, window.location.href );
  }
</script>";    
echo "<script>

function cerrar() {
var ventana = window.self;
ventana.opener = window.self;
ventana.close();
}
setTimeout('cerrar()',10000);
</script>";    
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
    <title>Boleta de Amonestación</title>



    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />


    <style type="text/css">
        #AUTO fieldset {
            display: none
        }

        #AUTO fieldset:first-child {
            display: block;
        }
    </style>
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

        .div2 {
            border-style: solid;
            border-width: 1px;
            border-color: gainsboro
        }

        

        label:hover,
        label:hover~label {
            color: orange;
        }
    </style>
    <script type="text/javascript">
        
        function valid() {

            var txtbusinessname = document.getElementById('businessname').value;
            var txtAdress = document.getElementById('adress').value;
            var txtrfc = document.getElementById('rfc').value;
            var txtstate = document.getElementById('state').value;
            var txtmunicipality = document.getElementById('municipality').value;
            var txtsuburb = document.getElementById('suburb').value;
            var txtpostalcode = document.getElementById('postalcode').value;
            var txtpaymenttype = document.getElementById('paymenttype').value;
            var txtpayment = document.getElementById('payment').value;
            var txtcompanyinvoices = document.getElementById('companyinvoices').value;
            v       



            return true;
        }
    </script>

    <script>
        function checkAvailabilityEmailid() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'emailid=' + $("#email").val(),
                type: "POST",
                success: function(data) {
                    $("#emailid-availability").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".content").fadeOut(1500);
            }, 6000);

        });
    </script>
</head>

<body>
    <?php //include('includes/header.php');?>

    <?php //include('includes/sidebar.php');?>
    <main class="mn-inner">
        <div class="row">

            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <form id="AUTO" method="post" name="addemp" enctype="multipart/form-data">
                            <?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                            <div>
                                <h3>Declaración Técnico</h3>

                                <div class="row">
                                    <div class="col m6">
                                        <div class="row">
                                                                                       
                                            <div class="input-field col m6 s12">
                                                <label for="date">Fecha</label><br>
                                                <input id="date" name="date" type="date" autocomplete="off" required>
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="description">Descripción</label>
                                                <textarea name="description" id="description" autocomplete="off" required></textarea>
                                            </div>
                                            <div class="input-field col s12 ">
                                                <div id="signature-pad" class="signature-pad">
                                                    <div class="description">FIRMA TECNICO</div>
                                                    <div class="signature-pad">
                                                        <canvas style="width: 200px; height: 100px; border: 1px black solid; " id="canvas"></canvas>
                                                        <a class="btn btn-primary " id="clear">Limpiar Firma</a>
                                                        <!--<label name="clear"id="clear" for="coords">Limpiar</label>        -->
                                                        <!--<button name="clear"id="clear"type="submit">Limpiar</button>-->

                                                    </div>

                                                </div>

                                            </div>
                                                    <div class="input-field col s12 ">
                                                <div id="signature-pad1" class="signature-pad1">
                                                    <div class="description">FIRMA SUPERVISOR</div>
                                                    <div class="signature-pad1 outer">
                                                        <canvas style="width: 200px; height: 100px; border: 1px black solid; " id="canvas1"></canvas>
                                                        <a class="btn btn-primary " id="clear1">Limpiar Firma</a>
                                                        <!--<label name="clear"id="clear" for="coords">Limpiar</label>        -->
                                                        <!--<button name="clear"id="clear"type="submit">Limpiar</button>-->

                                                    </div>

                                                </div>

                                            </div>
                                            <input type="hidden" name="pacient_id" value="">
                                            <input type="hidden" name="base64" value="" id="base64">
                                            <input type="hidden" name="pacient_id" value="">
                                            <input type="hidden" name="base641" value="" id="base641">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m6">
                                            <div class="row">
                                                <div class="input-field col m6 s12">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col m6">
                                            <div class="row">
                                                <div class="input-field col m6 s12">

                                                </div>
                                                <div class="input-field col m6 s12">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>

                            </div>
                        </form>
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

<?php } ?>