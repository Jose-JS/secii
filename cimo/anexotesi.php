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
$letter=$_GET['l'];	
$fech=$_POST['fech'];
$motiv=$_POST['motiv'];
$service=$_POST['service'];    
$technical=substr($_POST['technical'],6);   
$empid = substr($_POST['technical'],0,6); 
$turn=$_POST['turn'];
$descr=$_POST['desc']; 
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
$creatoruser=$_SESSION['supervisor'];    
$action='inserción';
 
 
$sql="INSERT INTO tblannexedtesi(invoice,fech,motiv,service,technical,idemp,turn,descr,firm,creatoruser,action,letter) VALUES(:invoice,:fech,:motiv,:service,:technical,:empid,:turn,:descr,:contract,:creatoruser,:action,:letter)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':invoice',$invoice,PDO::PARAM_STR); 
    $query->bindParam(':fech',$fech,PDO::PARAM_STR);
    $query->bindParam(':motiv',$motiv,PDO::PARAM_STR); 
    $query->bindParam(':service',$service,PDO::PARAM_STR);
    $query->bindParam(':technical',$technical,PDO::PARAM_STR);
    $query->bindParam(':empid',$empid,PDO::PARAM_STR);
    $query->bindParam(':turn',$turn,PDO::PARAM_STR);
    $query->bindParam(':descr',$descr,PDO::PARAM_STR);
    $query->bindParam(':contract',$contract,PDO::PARAM_STR);
    $query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);
    $query->bindParam(':action',$action,PDO::PARAM_STR);
	$query->bindParam(':letter',$letter,PDO::PARAM_STR);
    
$query->execute();
 
$lastInsertId = $dbh->lastInsertId();
       
if($lastInsertId)
{

$msg="Registro de Anexo de TESI, agregado con éxito";
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
setTimeout('cerrar()',7000);
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
    <title>Anexo TESI</title>



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
            var txtservice = document.getElementById('service').selectedIndex;
            var txtbalance = document.getElementById('balance').value;
            var txtcreditlimit = document.getElementById('creditlimit').value;
            var txtcontractfirm = document.getElementById('contractfirm').value;
            var txtcontractterm = document.getElementById('contractterm').value;
            var txtclassification = document.getElementById('classification').value;
            var txtcoordinates = document.getElementById('coordinates').value;
            var txtphone = document.getElementById('phone').value;
            var txtcontract = document.getElementById('foto').value;
            var txtemail = document.getElementById('email').value;

            if (txtbusinessname == null || txtbusinessname == 0 || /^\s+$/.test(txtbusinessname)) {
                alert('[ERROR] Por favor ingrese Razón Social');
                return false;
            }

            if (txtrfc == null || txtrfc == 0 || /^\s+$/.test(txtrfc)) {
                alert('[ERROR] Por favor ingrese RFC');
                return false;
            } else if (txtAdress == null || txtAdress == 0 || /^\s+$/.test(txtAdress)) {
                alert('[ERROR] Por favor ingrese una Dirección');
                return false;
            } else if (txtstate == null || txtstate == 0 || /^\s+$/.test(txtstate)) {
                alert('[ERROR] Por favor ingrese un estado');
                return false;
            } else if (txtmunicipality == null || txtmunicipality == 0 || /^\s+$/.test(txtmunicipality)) {
                alert('[ERROR] Por favor ingrese un municipio');
                return false;
            } else if (txtsuburb == null || txtsuburb == 0) {
                alert('[ERROR] Por favor ingrese una colonia');
                return false;
            } else if (txtpostalcode == null || txtpostalcode == 0) {
                alert('[ERROR] Por favor ingrese su codigo postal');
                return false;
            } else if (txtphone == null || txtphone == 0) {
                alert('[ERROR] Por favor ingrese su telefono');
                return false;
            } else if (txtemail == null || txtemail == 0) {
                alert('[ERROR] Por favor ingrese su correo');
                return false;
            } else if (txtcoordinates == null || txtcoordinates == 0) {
                alert('[ERROR] Por favor ingrese coordenadas');
                return false;
            } else if (txtpaymenttype == null || txtpaymenttype == 0) {
                alert('[ERROR] Por favor ingrese un tipo de pago');
                return false;
            } else if (txtpayment == null || txtpayment == 0) {
                alert('[ERROR] Por favor ingrese un pago');
                return false;
            } else if (txtcompanyinvoices == null || txtcompanyinvoices == 0) {
                alert('[ERROR] Por favor seleccione una empresa que factura');
                return false;
            } else if (txtservice == null || txtservice == 0) {
                alert('[ERROR] Por favor seleccione un servicio');
                return false;
            } else if (txtbalance == null || txtbalance == 0) {
                alert('[ERROR] Por favor ingrese un saldo');
                return false;
            } else if (txtcreditlimit == null || txtcreditlimit == 0) {
                alert('[ERROR] Por favor ingrese limite de credito');
                return false;
            } else if (!isNaN(txtcontractfirm)) {
                alert('ERROR: Debe elegir una fecha de firma de contrato');
                return false;
            } else if (!isNaN(txtcontractterm)) {
                alert('ERROR: Debe elegir una fecha de vigencia de contrato');
                return false;
            } else if (txtclassification == null || txtclassification == 0) {
                alert('[ERROR] Por favor ingrese una clasificación');
                return false;
            }



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
            <div class="col s12">
                <div class="page-title">Anexo TESI</div>
            </div>
            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">

                        <div class="row">
                        <form id="AUTO" method="post" name="addemp" enctype="multipart/form-data">
                            <?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                            <div>
                                <h3>VERSION DE HECHOS</h3>

                                        <div class="row">


                                            <div class="input-field col m6 s12">
                                                <label for="fech">Fecha</label><br>
                                                <input id="fech" name="fech" type="date" autocomplete="off" required>
                                            </div>

                                            <div class="input-field col m6 s12">
                                                <label for="motiv">Motivo</label><br>
                                                <input id="motiv" name="motiv" type="text" autocomplete="off" required>
                                            </div>
                                                                            <div class="input-field col m6 s12">
                                    <select id="service" name="service" autocomplete="off" required>
                                        <option value="">Servicio</option>
                                        <?php 
$letter=$_GET['l'];
$letter2=$_GET['l2'];	
$sql = "SELECT servicename from tblserviceassigned where letter=:letter OR letter=:letter2";
$query = $dbh -> prepare($sql);
$query->bindParam(':letter',$letter,PDO::PARAM_STR);		
$query->bindParam(':letter2',$letter2,PDO::PARAM_STR);			
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
                                        <option value="<?php echo htmlentities($result->servicename);?>" required><?php echo htmlentities($result->servicename);?></option>
                                        <?php }} ?>
                                    </select>
                                </div>



<div class="input-field col s12">
                                    <select id="technical" name="technical" autocomplete="off" required>
                                        <option value="">Técnico</option>
                                        <?php $sql = "SELECT EmpId,name,firstname,lastname from tblemployees ORDER BY firstname";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
                                        <option value="<?php echo htmlentities($result->EmpId);?>&nbsp;<?php echo htmlentities($result->firstname);?>&nbsp;<?php echo htmlentities($result->lastname);?>&nbsp;<?php echo htmlentities($result->name);?>" required><?php echo htmlentities($result->EmpId);?>&nbsp;<?php echo htmlentities($result->firstname);?>&nbsp;<?php echo htmlentities($result->lastname);?>&nbsp;<?php echo htmlentities($result->name);?></option>
                                        <?php }} ?>
                                    </select>
                                        </div>
                                             <div class="input-field col m6 s12">
                                                <select id="turn" name="turn" autocomplete="off">
                                                    <option value="">Turno</option>
                                                    <option value="12X12">12X12</option>
                                                    <option value="24X24">24X24</option>

                                                </select>
                                            </div>
                                                         <div class="input-field col s12">
                                                <label for="desc">Descripción</label>
                                                <textarea name="desc" id="desc" autocomplete="off" required></textarea>
                                            </div>
                                            <div class="input-field col m6 s12 ">
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
                                            <input type="hidden" name="pacient_id" value="">
                                            <input type="hidden" name="base64" value="" id="base64">
                                      </div>
                                    </div>

                                </div>
                                <button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>

                           
                        </form> </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="map" class="row col s12 m12 l6" align="center">Mapa Google</div>
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
<?php } ?>