<?php
session_start();

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
//error_reporting(E_ALL);

// Motrar todos los errores de PHP
//ini_set('error_reporting', E_ALL);

include('../includes/config.php');
if (strlen($_SESSION['tecnico']) == 0) {
    header('location:index.php');
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!-- Title -->
        <title>Entrega de Servicio.</title>



        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script language="javascript" src="js/validarentregaserv.js"></script>
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css ">


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
                                <div>
                                    <h3>Entrega de Servicio</h3>

                                    <div class="row">
                                        <div class="col m6">
                                            <div class="row">
                                                <?php
                                                $sql = "SELECT MAX(folio)+1 as folio FROM tblentregaservtesi LIMIT 1";
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
                                                        <div class="input-field col s12">
                                                            <label for="folio">Folio</label><br>
                                                            <input id="folio" name="folio" value="<?php echo htmlentities($c); ?>" type="text" autocomplete="off" required readonly="readonly">
                                                        </div>
                                                        <div class="input-field col s12">
                                                            <select id="sede" name="sede" tabindex="3" autocomplete="off">
                                                                <option value="">Servicio</option>
                                                                <?php $sql = "SELECT servicename from tblserviceassigned";
                                                                $query = $dbh->prepare($sql);
                                                                $query->execute();
                                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                $cnt = 1;
                                                                if ($query->rowCount() > 0) {
                                                                    foreach ($results as $result) {   ?>
                                                                        <option value="<?php echo htmlentities($result->servicename); ?>"><?php echo htmlentities($result->servicename); ?></option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label for="fecha">Fecha</label><br>
                                                            <input id="fecha" name="fecha" type="date" autocomplete="off" required>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label for="hora">Hora de entrega</label><br>
                                                            <input id="hora" name="hora" type="time" autocomplete="off" required>
                                                        </div>

                                                        <div class="input-field col s12">
                                                            <select id="tesientrega" name="tesientrega" autocomplete="off">
                                                                <option value="">Tesi que entrega</option>

                                                                <?php
                                                                $user = $_SESSION['tecnico'];
                                                                $sqll = "SELECT EmpId,Name,FirstName,LastName,user from tblemployees where user=:user and Status='1' order by FirstName asc";
                                                                $queryl = $dbh->prepare($sqll);
                                                                $queryl->bindParam(':user', $user, PDO::PARAM_STR);
                                                                $queryl->execute();
                                                                $resultsl = $queryl->fetchAll(PDO::FETCH_OBJ);
                                                                $cnt = 1;
                                                                if ($queryl->rowCount() > 0) {
                                                                    foreach ($resultsl as $resultl) {   ?>
                                                                        <option value="<?php echo htmlentities($resultl->EmpId); ?>&nbsp;<?php echo htmlentities($resultl->FirstName); ?>&nbsp;<?php echo htmlentities($resultl->LastName); ?>&nbsp;<?php echo htmlentities($resultl->Name); ?>"><?php echo htmlentities($resultl->EmpId); ?>&nbsp;<?php echo htmlentities($resultl->FirstName); ?>&nbsp;<?php echo htmlentities($resultl->LastName); ?>&nbsp;<?php echo htmlentities($resultl->Name); ?></option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                        </div>

                                                        <div class="input-field col s12">
                                                            <select id="tesirecibe" name="tesirecibe" autocomplete="off">
                                                                <option value="">Tesi que recibe</option>
                                                                <?php $sqll = "SELECT EmpId,Name,FirstName,LastName from tblemployees where Status='1' order by FirstName asc";
                                                                $queryl = $dbh->prepare($sqll);
                                                                $queryl->execute();
                                                                $resultsl = $queryl->fetchAll(PDO::FETCH_OBJ);
                                                                $cnt = 1;
                                                                if ($queryl->rowCount() > 0) {
                                                                    foreach ($resultsl as $resultl) {   ?>
                                                                        <option value="<?php echo htmlentities($resultl->EmpId); ?>&nbsp;<?php echo htmlentities($resultl->FirstName); ?>&nbsp;<?php echo htmlentities($resultl->LastName); ?>&nbsp;<?php echo htmlentities($resultl->Name); ?>"><?php echo htmlentities($resultl->EmpId); ?>&nbsp;<?php echo htmlentities($resultl->FirstName); ?>&nbsp;<?php echo htmlentities($resultl->LastName); ?>&nbsp;<?php echo htmlentities($resultl->Name); ?></option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <select id="lampara" name="lampara" autocomplete="off">
                                                                <option value="">Lampara</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                                <option value="NO APLICA">NO APLICA</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <select id="fornitura" name="fornitura" autocomplete="off">
                                                                <option value="">Fornitura</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                                <option value="NO APLICA">NO APLICA</option>
                                                            </select>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <select id="pr24" name="pr24" autocomplete="off">
                                                                <option value="">Pr-24</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                                <option value="NO APLICA">NO APLICA</option>
                                                            </select>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <select id="baston" name="baston" autocomplete="off">
                                                                <option value="">Baston retractil</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                                <option value="NO APLICA">NO APLICA</option>
                                                            </select>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <select id="gas" name="gas" autocomplete="off">
                                                                <option value="">Gas pimienta</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                                <option value="NO APLICA">NO APLICA</option>
                                                            </select>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <select id="taser" name="taser" autocomplete="off">
                                                                <option value="">Taser</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                                <option value="NO APLICA">NO APLICA</option>
                                                            </select>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <select id="chamarra" name="chamarra" autocomplete="off">
                                                                <option value="">Chamarra</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                                <option value="NO APLICA">NO APLICA</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <select id="abrigo" name="abrigo" autocomplete="off">
                                                                <option value="">Abrigo</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                                <option value="NO APLICA">NO APLICA</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <select id="botas" name="botas" autocomplete="off">
                                                                <option value="">Botas Hule</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                                <option value="NO APLICA">NO APLICA</option>
                                                            </select>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <select id="sombrilla" name="sombrilla" autocomplete="off">
                                                                <option value="">Sombrilla</option>
                                                                <option value="SI">SI</option>
                                                                <option value="NO">NO</option>
                                                                <option value="NO APLICA">NO APLICA</option>
                                                            </select>
                                                        </div>
                                            </div>
                                        </div>

                                        <div class="col m6 s12">
                                            <div class="row">


                                                <div class="input-field col m6 s12">
                                                    <select id="chaleco" name="chaleco" autocomplete="off">
                                                        <option value="">Chaleco</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="impermeable" name="impermeable" autocomplete="off">
                                                        <option value="">Impermeable</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="armacorta" name="armacorta" autocomplete="off">
                                                        <option value="">Arma corta D.C/Cargador</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="armalarga" name="armalarga" autocomplete="off">
                                                        <option value="">Arma larga D.C/Cargador</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="celular" name="celular" autocomplete="off">
                                                        <option value="">Celular</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="cargador1" name="cargador1" autocomplete="off">
                                                        <option value="">Cargador</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="garrafones" name="garrafones" autocomplete="off">
                                                        <option value="">Garrafones</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="trastes" name="trastes" autocomplete="off">
                                                        <option value="">Trastes cocina</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="servibar" name="servibar" autocomplete="off">
                                                        <option value="">Servibar</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="parrilla" name="parrilla" autocomplete="off">
                                                        <option value="">Parrilla</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="microondas" name="microondas" autocomplete="off">
                                                        <option value="">Horno de microondas</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="radio" name="radio" autocomplete="off">
                                                        <option value="">Radio troncal</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="cargador2" name="cargador2" autocomplete="off">
                                                        <option value="">Cargador</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="focos" name="focos" autocomplete="off">
                                                        <option value="">Focos</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="extintores" name="extintores" autocomplete="off">
                                                        <option value="">Extintores</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="camaras" name="camaras" autocomplete="off">
                                                        <option value="">Camaras</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="vidrios" name="vidrios" autocomplete="off">
                                                        <option value="">vidrios</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="puertas" name="puertas" autocomplete="off">
                                                        <option value="">Puertas</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="agua" name="agua" autocomplete="off">
                                                        <option value="">Agua</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <select id="luz" name="luz" autocomplete="off" required="required">
                                                        <option value="">Luz</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                        <option value="NO APLICA">NO APLICA</option>
                                                    </select>
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

                                        <?php $cnt++;
                                                    }
                                                } ?>
                                        <input type="submit" id="btnsave" onclick="valid();" class="waves-effect waves-light btn indigo m-b-xs" value="Guardar" />
                                            </div>


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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    </body>

    </html>

    <script type="text/javascript">
        $(function() {
            $("#AUTO").on("submit", function(e) {
                e.preventDefault();
                var url = "consultas/insertentregaserv.php";
                var datos = $("#AUTO").serialize();
                //alert(datos);
                //return false;
                $.ajax({
                    type: "POST",
                    url: url,
                    data: datos,
                    dataType: "json",
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'DATOS GUARDADOS',
                                showConfirmButton: false,
                                timer: 2500
                            })
                            //document.getElementById("AUTO").reset();
                            window.location.reload();
                        } else if (data.status == 'error') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'OCURRIO UN ERROR! 2',
                            })
                        }
                    },
                    error: function(e) {
                        if (e != 0) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'No se ha podido guardar la información',
                            })
                        }
                    },
                });
                return false;
            });

        });
    </script>



<?php } ?>