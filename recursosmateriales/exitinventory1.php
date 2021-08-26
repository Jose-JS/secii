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
																<select id="servicio" name="servicio" autocomplete="off" required>
																	<option value="">Servicio </option>
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



                                            </div>
                                            <input type="button" onclick="myFunction2()" value="Generar salida" class="waves-effect waves-light btn indigo m-b-xs">
                                            <input type="submit" class="waves-effect waves-light btn indigo m-b-xs" value="GUARDAR" />


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
        <script>
            $(function() {
                $("#formulario").on("submit", function(e) {
                    e.preventDefault();
                    var url = "consultas/insertfolio.php";
                    var datos = $("#formulario").serialize();
                    //alert(datos);
                    //return false;
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datos,
                        beforeSend: function(b) {
                            if (b != 0) {
                                let timerInterval
                                Swal.fire({
                                    title: '',
                                    html: 'Se estan guardando los datos !',
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                        timerInterval = setInterval(() => {
                                            const content = Swal.getContent()
                                            if (content) {
                                                const b = content.querySelector('b')
                                                if (b) {
                                                    b.textContent = Swal.getTimerLeft()
                                                }
                                            }
                                        }, 100)
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                }).then((result) => {})
                            } else {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'OCURRIO UN ERROR! 1',
                                })
                            }
                        },
                        success: function(r) {
                            if (r != 0) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'DATOS GUARDADOS',
                                    showConfirmButton: false,
                                    timer: 2500
                                })
                                location.reload(true);
                            } else {
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

    </body>

    </html>
<?php } ?>