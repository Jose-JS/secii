<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['recursos']) == 0) {
    header('location:index.php');
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!-- Title -->
        <title>Recursos Materiales | Editar articulo inventario</title>

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
        <script language="javascript" src="ajax/editvalidacioninventory.js"></script>

    </head>

    <body>
        <?php include('includes/header.php'); ?>

        <?php include('includes/sidebar.php'); ?>

        <main class="mn-inner">
            <div class="row">
                <div class="col s12">
                    <div class="page-title">Editar articulo a inventario</div>
                </div>
                <div class="col s12 m12 l6">
                    <div class="card">
                        <div class="card-content">
                            <?php
                            $id = $_GET['id'];
                            ?>

                            <div class="row">
                                <form class="col s12" id="formulario" name="formulario" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <input id="id" name="id" type="hidden">
                                        <div class="input-field col s12">
                                            <input id="descripcion" type="text" name="descripcion" autocomplete="off" required />
                                            <label for="descripcion">Descripción</label>
                                        </div>


                                        <div class="input-field col s12">
                                            <input id="talla" type="text" autocomplete="off" name="talla" required />
                                            <label for="talla">talla</label>
                                        </div>

                                        <div class="input-field col s12">
                                            <input id="estado" type="text" name="estado" autocomplete="off" required />
                                            <label for="estado">Estado</label>
                                        </div>


                                        <div class="input-field col s12">
                                            <input type="text" id="cantidad" name="cantidad" required />
                                            <label for="cantidad">Cantidad</label>
                                        </div>

                                        <div class="input-field col s12">
                                            <label for="fecha">Fecha</label><br>

                                            <input id="fecha" name="fecha" tabindex="25" type="date" autocomplete="off">
                                        </div>

                                        <div class="input-field col s12">
                                            <input type="submit" class="waves-effect waves-light btn indigo m-b-xs" value="GUARDAR" />

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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            $.ajax({
                type: 'post',
                url: 'consultas/selectinventory.php?id=<?php echo "$id"; ?>',
                datatype: "json",
                //data:{id:id},
                success: function(data1) {
                    var data1 = JSON.parse(data1);
                    // console.log(data1[0].descripcion);
                    $("#id").val(data1[0].id);
                    $("#descripcion").val(data1[0].descripcion);
                    $("#talla").val(data1[0].talla);
                    $("#estado").val(data1[0].condicion);
                    $("#cantidad").val(data1[0].cantidad);
                    $("#fecha").val(data1[0].fecha);

                }
            });
        </script>


    </body>

    </html>
<?php } ?>