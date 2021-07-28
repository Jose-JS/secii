<?php
session_start();

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
//error_reporting(E_ALL);

// Motrar todos los errores de PHP
//ini_set('error_reporting', E_ALL);

include('../includes/config.php');
if (strlen($_SESSION['supervisor']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['add'])) {

        $folio = $_POST['folio'];
        $servicio = $_POST['servicio'];
        $vehiculo = $_POST['vehiculo'];
        $horario = $_POST['horario'];
        $cargagas = $_POST['cargagas'];
        $chofer = $_POST['chofer'];
        $custodio = $_POST['custodio'];
        $creatoruser = $_SESSION['supervisor'];
        $action = 'inserción';
        $fecha = $_POST['fecha'];
        $kmini = $_POST['kmini'];
        $comini = $_POST['comini'];

        $sql = 'INSERT INTO tblformatpat(folio,servicio,fecha,horario,vehiculo,cargagas,chofer,custodio,action,creatoruser,kmini,comini) VALUES(:folio,:servicio,:fecha,:horario,:vehiculo,:cargagas,:chofer,:custodio,:action,:creatoruser,:kmini,:comini)';

        $query = $dbh->prepare($sql);
        $query->bindParam(':folio', $folio, PDO::PARAM_STR);
        $query->bindParam(':servicio', $servicio, PDO::PARAM_STR);
        $query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $query->bindParam(':horario', $horario, PDO::PARAM_STR);
        $query->bindParam(':vehiculo', $vehiculo, PDO::PARAM_STR);
        $query->bindParam(':cargagas', $cargagas, PDO::PARAM_STR);
        $query->bindParam(':chofer', $chofer, PDO::PARAM_STR);
        $query->bindParam(':custodio', $custodio, PDO::PARAM_STR);
        $query->bindParam(':creatoruser', $creatoruser, PDO::PARAM_STR);
        $query->bindParam(':action', $action, PDO::PARAM_STR);
        $query->bindParam(':kmini', $kmini, PDO::PARAM_STR);
        $query->bindParam(':comini', $comini, PDO::PARAM_STR);
        $query->execute();

        $lastInsertId = $dbh->lastInsertId();

        if ($lastInsertId) {

            $msg = 'Registro de formato, creado con éxito';
            echo '<script>
 if ( window.history.replaceState ) {
     window.history.replaceState( null, null, window.location.href );
 }
</script>';
        } else {
            $error = 'Algo salió mal. Inténtalo de nuevo';
        }
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!-- Title -->
        <title>FORMATO PATRULLAJE.</title>



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
                color: #26a69a;
            }
        </style>
        <script type="text/javascript">
            function valid() {

                return true;
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
        <?php include('includes/header.php'); ?>

        <?php include('includes/sidebar.php'); ?>
        <main class="mn-inner">
            <div class="row">

                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content">
                            <form id="AUTO" method="post" name="addemp" enctype="multipart/form-data">
                                <?php if ($error) { ?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                                <div>
                                    <h3>FORMATO PATRULLAJE</h3>

                                    <div class="row">
                                        <div class="col m6">
                                            <div class="row">


                                                <?php
                                                $sql = "SELECT MAX(folio)+1 as folio FROM tblformatpat LIMIT 1";
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

                                                        <div class="input-field col m6 s12">
                                                            <label for="folio">Folio</label><br>
                                                            <input id="folio" name="folio" value="<?php echo htmlentities($c); ?>" type="text" autocomplete="off" required readonly="readonly">
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label for="fecha">Fecha</label><br>
                                                            <input id="fecha" name="fecha" type="date" autocomplete="off" required>
                                                        </div>

                                                        <div class="input-field col m6 s12">

                                                            <label for="horario">Horario:</label><br>

                                                            <input type="radio" id="diurno" name="horario" value="DIURNO">
                                                            <label for="diurno">Diurno</label>
                                                            <input type="radio" id="nocturno" name="horario" value="NOCTURNO">
                                                            <label for="nocturno">Nocturno</label>
                                                        </div>


                                                        <div class="input-field col m6 s12">
                                                            <select id="vehiculo" name="vehiculo" autocomplete="off" required>
                                                                <option value="">Vehículo</option>
                                                                <option value="001">001</option>
                                                                <option value="002">002</option>
                                                                <option value="003">003</option>
                                                                <option value="004">004</option>
                                                                <option value="005">005</option>
                                                                <option value="006">006</option>
                                                                <option value="007">007</option>
                                                                <option value="008">008</option>
                                                                <option value="009">009</option>
                                                                <option value="0010">0010</option>
                                                            </select>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label for="cargagas">Carga Gasolina</label>
                                                            <input id="cargagas" name="cargagas" type="text" autocomplete="off" required>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <select id="servicio" name="servicio" autocomplete="off" required>
                                                                <option value="">Servicio</option>
                                                                <option value="ESTADO DE MEXICO">ESTADO DE MEXICO</option>
                                                                <option value="MICHOACAN">MICHOACAN</option>
                                                                <option value="VERACRUZ">VERACRUZ</option>
                                                            </select>
                                                        </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col m6">
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <select id="chofer" name="chofer" autocomplete="off" required>
                                                            <option value="">Chofer</option>
                                                            <?php $sql = "SELECT EmpId,name,firstname,lastname from tblemployees where assignedservice='NMP'order by firstname";
                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                            $cnt = 1;
                                                            if ($query->rowCount() > 0) {
                                                                foreach ($results as $result) {   ?>
                                                                    <option value="<?php echo htmlentities($result->EmpId); ?>&nbsp;<?php echo htmlentities($result->firstname); ?>&nbsp;<?php echo htmlentities($result->lastname); ?>&nbsp;<?php echo htmlentities($result->name); ?>" required><?php echo htmlentities($result->EmpId); ?>&nbsp;<?php echo htmlentities($result->firstname); ?>&nbsp;<?php echo htmlentities($result->lastname); ?>&nbsp;<?php echo htmlentities($result->name); ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <select id="custodio" name="custodio" autocomplete="off" required>
                                                            <option value="">Custodio</option>
                                                            <?php $sql = "SELECT EmpId,name,firstname,lastname from tblemployees where assignedservice='NMP' order by firstname";
                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                            $cnt = 1;
                                                            if ($query->rowCount() > 0) {
                                                                foreach ($results as $result) {   ?>
                                                                    <option value="<?php echo htmlentities($result->EmpId); ?>&nbsp;<?php echo htmlentities($result->firstname); ?>&nbsp;<?php echo htmlentities($result->lastname); ?>&nbsp;<?php echo htmlentities($result->name); ?>" required><?php echo htmlentities($result->EmpId); ?>&nbsp;<?php echo htmlentities($result->firstname); ?>&nbsp;<?php echo htmlentities($result->lastname); ?>&nbsp;<?php echo htmlentities($result->name); ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="input-field col m6 s12">
                                                        <label for="kmini">KM inicio</label>
                                                        <input id="kmini" name="kmini" type="text" autocomplete="off" required>
                                                    </div>
                                                    <!-- <div class="input-field col m6 s12">
                                                    <label for="comini">Combustible inicio</label>
                                                    <input id="comini" name="comini" type="text" autocomplete="off" required>
                                                </div>-->
                                                    <div class="input-field col m6 s12">
                                                        <select id="comini" name="comini" autocomplete="off" required>
                                                            <option value="">Combustible Inicio</option>
                                                            <option value="MENOS DE 1/4">MENOS DE 1/4</option>
                                                            <option value="1/4 DE TANQUE">1/4 DE TANQUE</option>
                                                            <option value="MENOS DE 1/2 TANQUE">MENOS DE 1/2 TANQUE</option>
                                                            <option value="1/2 TANQUE">1/2 TANQUE</option>
                                                            <option value="MENOS DE 3/4 DE TANQUE">MENOS DE 3/4 DE TANQUE</option>
                                                            <option value="3/4 DE TANQUE">3/4 DE TANQUE</option>
                                                            <option value="TANQUE LLENO">TANQUE LLENO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <button type="submit" name="add" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>

                        <?php $cnt++;
                                                    }
                                                } ?>


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
    </body>

    </html>

<?php } ?>