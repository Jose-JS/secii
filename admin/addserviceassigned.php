<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
$servicename=$_POST['servicename'];
$servicecode=$_POST['servicecode'];
$serviceaddress=$_POST['serviceaddress'];
$coordinates=$_POST['coordinates'];
$sql="INSERT INTO tblserviceassigned(servicename,servicecode,serviceaddress,coordinates) VALUES(:servicename,:servicecode,:serviceaddress,:coordinates)";
$query = $dbh->prepare($sql);
$query->bindParam(':servicename',$servicename,PDO::PARAM_STR);
$query->bindParam(':servicecode',$servicecode,PDO::PARAM_STR);
$query->bindParam(':serviceaddress',$serviceaddress,PDO::PARAM_STR);    
$query->bindParam(':coordinates',$coordinates,PDO::PARAM_STR);    
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Servicio creado con éxito";
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
    <title>Admin | Agregar servicio</title>

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
                <div class="page-title">Agregar servicio</div>
            </div>
            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">

                        <div class="row">
                            <form class="col s12" name="chngpwd" method="post">
                                <?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="servicecode" type="text" name="servicecode" class="validate" autocomplete="off" required>
                                        <label for="servicecode">código del servicio</label>
                                    </div>


                                    <div class="input-field col s12">
                                        <input id="servicename" type="text" class="validate" autocomplete="off" name="servicename" required>
                                        <label for="servicename">Nombre del servicio</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <input id="serviceaddress" type="text" name="serviceaddress" class="validate" autocomplete="off" name="servicename" required>
                                        <label for="adservice">Dirección</label>
                                    </div>


                                    <div class="input-field col s12">
                                        <input type="text" id="coords" name="coordinates" class="validate" required />
                                        <label for="coords">Coordenadas</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <button type="submit" name="add" class="waves-effect waves-light btn indigo m-b-xs">AÑADIR</button>

                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </main>

    <div id="map" align="center">aedfsdgsfgsf</div>



    <div class="left-sidebar-hover"></div>

    <!-- Javascripts -->
    <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcL6t1TsFCjirxTvGrYv7zv-OrUH-GMGg&callback=initMap"></script>
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


</body>

</html>
<?php } ?>