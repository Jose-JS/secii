<?php
session_start();

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
//error_reporting(E_ALL);
 
// Motrar todos los errores de PHP
//ini_set('error_reporting', E_ALL);

include('../includes/config.php');
if(strlen($_SESSION['user'])==0)
    {   
header('location:index.php');
}
else{
$user=$_SESSION['user'];
if(isset($_POST['add']))
{
$businessname=$_POST['businessname'];
$rfc=$_POST['rfc'];
$adress=$_POST['adress'];
$state=$_POST['state'];
$municipality=$_POST['municipality'];
$suburb=$_POST['suburb'];    
$postalcode=$_POST['postalcode']; 
$paymenttype=$_POST['paymenttype']; 
$payment=$_POST['payment'];
$companyinvoices=$_POST['companyinvoices'];
$service=$_POST['service'];
$balance=$_POST['balance'];
$creditlimit=$_POST['creditlimit'];
$contractfirm=$_POST['contractfirm']; 
$contractterm=$_POST['contractterm'];
$classification=$_POST['classification'];
$coordinates=$_POST['coordinates'];
$phone=$_POST['phone'];
$fecha  = date("dmy");
$no_aleatorio  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta = '../administracion/contratos/'.$fecha.$no_aleatorio.$_FILES['foto']['name'];//foto medio cuerpo
opendir($ruta);
copy($_FILES['foto']['tmp_name'],$ruta);
$contract=$ruta;  
$status=1;
$email=$_POST['email'];
$paymentcondition=$_POST['paymentcondition'];
$creatoruser=$_SESSION['user'];
$action='inserción';
 
 
$sql="INSERT INTO tblclientsadd(businessname,rfc,adress,state,municipality,suburb,postalcode,paymenttype,payment,companyinvoices,service,balance,creditlimit,contractfirm,contractterm,classification,coordinates,phone,contract,status,email,paymentcondition,creatoruser,action) VALUES(:businessname,:rfc,:adress,:state,:municipality,:suburb,:postalcode,:paymenttype,:payment,:companyinvoices,:service,:balance,:creditlimit,:contractfirm,:contractterm,:classification,:coordinates,:phone,:contract,:status,:email,:paymentcondition,:creatoruser,:action)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':businessname',$businessname,PDO::PARAM_STR);
    $query->bindParam(':rfc',$rfc,PDO::PARAM_STR);    
    $query->bindParam(':adress',$adress,PDO::PARAM_STR);
    $query->bindParam(':state',$state,PDO::PARAM_STR);
    $query->bindParam(':municipality',$municipality,PDO::PARAM_STR);
    $query->bindParam(':suburb',$suburb,PDO::PARAM_STR);
    $query->bindParam(':postalcode',$postalcode,PDO::PARAM_STR);
    $query->bindParam(':paymenttype',$paymenttype,PDO::PARAM_STR);
    $query->bindParam(':payment',$payment,PDO::PARAM_STR);
    $query->bindParam(':companyinvoices',$companyinvoices,PDO::PARAM_STR);
    $query->bindParam(':service',$service,PDO::PARAM_STR);
    $query->bindParam(':balance',$balance,PDO::PARAM_STR);
    $query->bindParam(':creditlimit',$creditlimit,PDO::PARAM_STR);
    $query->bindParam(':contractfirm',$contractfirm,PDO::PARAM_STR);
    $query->bindParam(':contractterm',$contractterm,PDO::PARAM_STR);
    $query->bindParam(':classification',$classification,PDO::PARAM_STR);
    $query->bindParam(':coordinates',$coordinates,PDO::PARAM_STR);
    $query->bindParam(':phone',$phone,PDO::PARAM_STR);
    $query->bindParam(':contract',$contract,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':paymentcondition',$paymentcondition,PDO::PARAM_STR);
    $query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);
    $query->bindParam(':action',$action,PDO::PARAM_STR);
    
$query->execute();
 
$lastInsertId = $dbh->lastInsertId();
       
if($lastInsertId)
{

$msg="Registro de Cliente, agregado con éxito";
echo "<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
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
    <title>Administración | Datos de clientes</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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

        #map {
            width: 60%;
            height: 50%;
            margin: 0 0 20px 0;
        }

        label:hover,
        label:hover~label {
            color: orange;
        }
    </style>

    <script>
        var marker; //variable del marcador
        var coords = {}; //coordenadas obtenidas con la geolocalización
        //Funcion principal
        initMap = function() {
            //usamos la API para geolocalizar el usuario
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    coords = {
                        lng: position.coords.longitude,
                        lat: position.coords.latitude
                    };
                    setMapa(coords); //pasamos las coordenadas al metodo para crear el mapa
                },
                function(error) {
                    console.log(error);
                });
        }

        function setMapa(coords) {
            //Se crea una nueva instancia del objeto mapa
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: new google.maps.LatLng(coords.lat, coords.lng),

            });

            //Creamos el marcador en el mapa con sus propiedades
            //para nuestro obetivo tenemos que poner el atributo draggable en true
            //position pondremos las mismas coordenas que obtuvimos en la geolocalización
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng(coords.lat, coords.lng),

            });
            //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
            //cuando el usuario a soltado el marcador
            marker.addListener('click', toggleBounce);

            marker.addListener('dragend', function(event) {
                //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                document.getElementById("coords").value = this.getPosition().lat() + "," + this.getPosition().lng();
            });
        }
        //callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }
        // Carga de la libreria de google maps 
    </script>


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
    <?php include('includes/header.php');?>

    <?php include('includes/sidebar.php');?>
    <main class="mn-inner">
        <div class="row">

            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <form id="AUTO" method="post" name="addemp" enctype="multipart/form-data">
                            <?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                            <div>
                                <h3>Datos de Clientes</h3>

                                <div class="row">
                                    <div class="col m6">
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <label for="businessname">Razón Social</label>
                                                <input name="businessname" id="businessname" type="text" autocomplete="off" required>
                                                <span id="empid-availability" style="font-size:12px;"></span>
                                            </div>

                                            <div class="input-field col m6 s12">
                                                <label for="rfc">RFC</label>
                                                <input id="rfc" name="rfc" type="text" required>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <label for="state">Estado</label>
                                                <input id="state" name="state" type="text" autocomplete="off" required>
                                            </div>


                                            <div class="input-field col m6 s12">
                                                <label for="municipality">Municipio</label>
                                                <input id="municipality" name="municipality" type="text" autocomplete="off" required>
                                            </div>


                                            <div class="input-field col m6 s12">
                                                <label for="phone">Número de teléfono</label>
                                                <input id="phone" name="phone" type="tel" maxlength="10" autocomplete="off" required>
                                            </div>

                                            <div class="input-field col m6 s12">
                                                <label for="email">Correo</label>
                                                <input name="email" type="email" id="email" onBlur="checkAvailabilityEmailid()" autocomplete="off" required>
                                                <span id="emailid-availability" style="font-size:12px;"></span>
                                            </div>

                                            <div class="input-field col m6 s12">
                                                <label for="paymenttype">Tipo de pago</label>
                                                <input id="paymenttype" name="paymenttype" type="text" required>
                                            </div>

                                            <div class="input-field col m6 s12">
                                                <label for="payment">Pago</label>
                                                <input id="payment" name="payment" type="text" autocomplete="off" required>
                                            </div>

                                            <div class="input-field col m6 s12">
                                                <label for="balance">Saldo</label>
                                                <input id="balance" name="balance" type="text" autocomplete="off" required>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <label for="creditlimit">limite de crédito</label>
                                                <input id="creditlimit" name="creditlimit" type="text" maxlength="2" autocomplete="off" required>
                                            </div>

                                            <div class="input-field col m6 s12"> <label for="classification">Clasificación</label>
                                                <input id="classification" name="classification" type="text">
                                                <span id="total"></span>


                                            </div>
                                            <div class="input-field col m6 s12">
                                                <div id="rateYo"> </div>

                                            </div>



                                        </div>
                                    </div>

                                    <div class="col m6 ">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <label for="adress">Dirección</label>
                                                <input id="adress" name="adress" type="text" autocomplete="off" placeholder="Calle, No. exterior e interior" required>
                                            </div>

                                            <div class="input-field col m6 s12">
                                                <label for="suburb">Colonia</label>
                                                <input id="suburb" name="suburb" type="text" autocomplete="off" required>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <label for="postalcode">Codigo Postal</label>
                                                <input id="postalcode" name="postalcode" type="text" maxlength="5" autocomplete="off" required>
                                            </div>
                                            <div class="input-field col s12">
                                                <input type="text" id="coords" name="coordinates" class="validate" required />
                                                <label for="coords">Coordenadas</label>
                                            </div>

                                            <div class="input-field col m6 s12">
                                                <select id="companyinvoices" name="companyinvoices" autocomplete="off">
                                                    <option value="">Empresa que Factura</option>
                                                    <option value="APROSEMEX S.A. DE C.V.">APROSEMEX S.A. DE C.V.</option>
                                                    <option value="ASLO S.A. DE C.V.">ASLO S.A. DE C.V.</option>
                                                    <option value="OISME S.A DE C.V">OISME S.A DE C.V</option>
                                                </select>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <select id="service" name="service" tabindex="3" autocomplete="off">
                                                    <option value="">Servicio </option>
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

                                            <div class="input-field col m6 s12">
                                                <label for="contractfirm">Firma de contrato</label><br>
                                                <input id="contractfirm" name="contractfirm" type="date" autocomplete="off">
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <label for="contractterm">Vigencia de contrato</label><br>
                                                <input id="contractterm" name="contractterm" type="date" autocomplete="off">
                                            </div>

                                            <div class="input-field col m6 s12">
                                                <label for="paymentcondition">Condiciones de Pago(días)</label><br>
                                                <input id="paymentcondition" name="paymentcondition" type="text" autocomplete="off">
                                            </div>


                                            <div class="input-field col m6 s12">
                                                <label for="foto">Contrato</label><br><br>
                                                <input id="foto" name="foto" type="file" maxlength="30" autocomplete="off" required>
                                            </div>

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
    <div id="map" class="row col s12 m12 l6" align="center">Mapa Google</div>
    <div class="left-sidebar-hover"></div>

    <script>
        window.navigator = window.navigator || {};
        if (navigator.vibrate === undefined) {
            ['add'].forEach(function(elementId) {
                document.getElementById(elementId).setAttribute('disabled', 'disabled');
            });
        } else {
            document.getElementById('add').addEventListener('click', function() {
                navigator.vibrate([1000, 500, 1000, 500, 2000]);
            });
        }
    </script>
    <!-- Javascripts -->
    <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcL6t1TsFCjirxTvGrYv7zv-OrUH-GMGg&callback=initMap"></script>

    <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="../assets/js/alpha.min.js"></script>
    <script src="../assets/js/pages/form_elements.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

</body>

</html>
<script>
    $(function() {

        $("#rateYo").rateYo({

            onSet: function(rating, rateYoInstance) {

                var c = document.getElementById('total').innerHTML = rating;
                classification.value = c;
                total.style.display = "none";
                // alert("La clasificación es:  " + rating);
            }
        });
    });
</script>
<?php } ?>