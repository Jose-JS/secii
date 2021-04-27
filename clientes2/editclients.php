<?php
session_start();

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
//error_reporting(E_ALL);
 
// Motrar todos los errores de PHP
//ini_set('error_reporting', E_ALL);

include('includes/config.php');
if(strlen($_SESSION['user'])==0)
    {   
header('location:index.php');
}
else{
$eid=intval($_GET['empid']);    
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
$status=1;
$email=$_POST['email'];
$paymentcondition=$_POST['paymentcondition'];
$creatoruser=$_SESSION['user'];
$action=modificación;
 
$sql="UPDATE tblclientsadd SET businessname=:businessname,rfc=:rfc,adress=:adress,state=:state,municipality=:municipality,suburb=:suburb,postalcode=:postalcode,paymenttype=:paymenttype,payment=:payment,companyinvoices=:companyinvoices,service=:service,balance=:balance,creditlimit=:creditlimit,contractfirm=:contractfirm,contractterm=:contractterm,classification=:classification,coordinates=:coordinates,phone=:phone,status=:status,email=:email,paymentcondition=:paymentcondition,creatoruser=:creatoruser,action=:action where id=:eid";

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
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':paymentcondition',$paymentcondition,PDO::PARAM_STR);
    $query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);
    $query->bindParam(':action',$action,PDO::PARAM_STR);
    $query->bindParam(':eid',$eid,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();


$msg="Registro de Cliente, modificado con éxito";
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
    <title>Administración | Editar clientes</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/plugins/dropzone/dropzone.css">
    <script type="text/javascript" src="../assets/plugins/dropzone/dropzone.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcL6t1TsFCjirxTvGrYv7zv-OrUH-GMGg&callback=initMap"></script>

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
            <?php 
$eid=intval($_GET['empid']);
$sql = "SELECT * from  tblclientsadd where id=:eid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $resul)
{           // var_dump($resul); //Se obtienen los resultados de todas las variables
                    ?>
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" style="height: 20px;" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <form id="AUTO" method="post" name="add" enctype="multipart/form-data">
                            <?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                            <div>
                                <h3>Datos de Clientes</h3>
                                <section>


                                    <div class="wizard-content">


                                        <fieldset>
                                            <div class="row">
                                                <div class="col m6">
                                                    <div class="row">
                                                        <div class="input-field col m6 s12">
                                                            <label for="businessname">Razón Social</label>
                                                            <input name="businessname" id="businessname" type="text" autocomplete="off" value="<?php echo htmlentities($resul->businessname);?>" required>
                                                            <span id="empid-availability" style="font-size:12px;"></span>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label for="rfc">RFC</label>
                                                            <input id="rfc" name="rfc" type="text" value="<?php echo htmlentities($resul->rfc);?>" required>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <label for="state">Estado</label>
                                                            <input id="state" name="state" type="text" autocomplete="off" value="<?php echo htmlentities($resul->state);?>" required>
                                                        </div>


                                                        <div class="input-field col m6 s12">
                                                            <label for="municipality">Municipio</label>
                                                            <input id="municipality" name="municipality" type="text" autocomplete="off" value="<?php echo htmlentities($resul->municipality);?>" required>
                                                        </div>


                                                        <div class="input-field col m6 s12">
                                                            <label for="phone">Número de teléfono</label>
                                                            <input id="phone" name="phone" type="tel" maxlength="10" autocomplete="off" value="<?php echo htmlentities($resul->phone);?>" required>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label for="email">Correo</label>
                                                            <input name="email" type="email" id="email" onBlur="checkAvailabilityEmailid()" autocomplete="off" required value="<?php echo htmlentities($resul->email);?>">
                                                            <span id="emailid-availability" style="font-size:12px;"></span>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label for="paymenttype">Tipo de pago</label>
                                                            <input id="paymenttype" name="paymenttype" type="text" value="<?php echo htmlentities($resul->paymenttype);?>" required>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label for="payment">Pago</label>
                                                            <input id="payment" name="payment" type="text" autocomplete="off" value="<?php echo htmlentities($resul->payment);?>" required>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label for="balance">Saldo</label>
                                                            <input id="balance" name="balance" value="<?php echo htmlentities($resul->balance);?>" type="text" autocomplete="off" required>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <label for="creditlimit">limite de crédito</label>
                                                            <input id="creditlimit" name="creditlimit" type="text" maxlength="2" autocomplete="off" value="<?php echo htmlentities($resul->creditlimit);?>" required>
                                                        </div>

                                                        <div class="input-field col m6 s12"> <label for="classification">Clasificación</label>
                                                            <input id="classification" name="classification" type="text" value="<?php echo htmlentities($resul->classification);?>">
                                                            <span id="total"></span>

                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <div id="rateYo"> 
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col m6 ">
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <label for="adress">Dirección</label>
                                                            <input id="adress" name="adress" type="text" autocomplete="off" value="<?php echo htmlentities($resul->adress);?>" required>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label for="suburb">Colonia</label>
                                                            <input id="suburb" name="suburb" type="text" autocomplete="off" value="<?php echo htmlentities($resul->suburb);?>" required>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <label for="postalcode">Codigo Postal</label>
                                                            <input id="postalcode" name="postalcode" type="text" maxlength="5" autocomplete="off" value="<?php echo htmlentities($resul->postalcode);?>" required>
                                                        </div>
                                                        <div class="input-field col s12">
                                                            <input type="text" id="coordinates" name="coordinates" class="validate" value="<?php echo htmlentities($resul->coordinates);?>" required />
                                                            <label for="coords">Coordenadas</label>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <select id="companyinvoices" name="companyinvoices" autocomplete="off">
                                                                <option value="<?php echo htmlentities($resul->companyinvoices);?>"><?php echo htmlentities($resul->companyinvoices);?></option>
                                                                <option value="APROSEMEX S.A. DE C.V.">APROSEMEX S.A. DE C.V.</option>
                                                                <option value="ASLO S.A. DE C.V.">ASLO S.A. DE C.V.</option>
                                                                <option value="OISME S.A DE C.V">OISME S.A DE C.V</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <select id="service" name="service" tabindex="3" autocomplete="off">
                                                                <option value="<?php echo htmlentities($resul->service);?>"><?php echo htmlentities($resul->service);?> </option>
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
                                                            <input id="contractfirm" name="contractfirm" type="date" value="<?php echo htmlentities($resul->contractfirm);?>" autocomplete="off">
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <label for="contractterm">Vigencia de contrato</label><br>
                                                            <input id="contractterm" value="<?php echo htmlentities($resul->contractterm);?>" name="contractterm" type="date" autocomplete="off">
                                                        </div>
                                                        
                                                        <div class="input-field col m6 s12">
                                                            <label for="paymentcondition">Condiciones de Pago(días)</label><br>
                                                            <input id="paymentcondition" name="paymentcondition" value="<?php echo htmlentities($resul->paymentcondition);?>"type="text" autocomplete="off">
                                                        </div>  
                                                        
                                                        <div class="input-field col s12">
                                                            <a href="<?php echo($resul->contract);?>" target="_blank">Mostrar Contrato</a>

                                                        </div>
                                                        <!--<div class="input-field col m6 s12">
                                                            <label for="foto">Contrato</label><br><br>
                                                            <input id="foto" name="foto" type="file" value="<?php echo htmlentities($resul->contract);?>" maxlength="30" autocomplete="off" required>
                                                        </div>-->
                                                        <div class="input-field col m6 s12">
                                                            <?php
                                                        $eid=$_SESSION['eid'];
//var_dump($eid);     

$sql="SELECT *  from  tblserviceassigned where id=63";     
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ 
    
    $porciones = explode(",", $result->coordinates);

                                ?>
                                                            <!--            <a href="https://maps.google.com/?q=<?php echo htmlentities($porciones[0]);?>,<?php echo htmlentities($porciones[1]);?>" target="_blank">Ruta</a>-->
                                                        </div>
                                                        <?php $cnt++; }?> <?php }?>
                                                        <!-- <div class="input-field col m6 s12">
<label for="foto">Foto</label><br><br>
<input id="foto" name="foto" type="file"  maxlength="30" autocomplete="off" required>  
 </div>
    -->
                                                        <div class="input-field col s12">
                                                            <!-- <button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>-->

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col m6">
                                                        <div class="row">
                                                            <div class="input-field col m6 s12">
                                                                <div class="btn-menu">
                                                                </div>
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
                                            <?php } }?>
                                            <button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>
                                        </fieldset>
                                    </div>
                                </section>
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

    $(document).ready(function() {
        var current = 1,
            current_step, next_step, steps;
        steps = $("fieldset").length;
        $(".next").click(function() {
            current_step = $(this).parent();
            next_step = $(this).parent().next();
            next_step.show();
            current_step.hide();
            setProgressBar(++current);
        });
        $(".previous").click(function() {
            current_step = $(this).parent();
            next_step = $(this).parent().prev();
            next_step.show();
            current_step.hide();
            setProgressBar(--current);
        });
        setProgressBar(current);
        // Change progress bar action
        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
                .html(percent + "%");
        }
    });
</script>
<?php } ?>