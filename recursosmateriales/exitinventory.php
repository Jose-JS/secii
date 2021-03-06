<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['recursos']) == 0) {
    header('location:index.php');
} else {
    $folio = $_GET["f"];

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!-- Title -->
        <title>Recursos Materiales | Salidas de inventario</title>

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

        <main class="mn-inner">
            <div class="row">
                <div class="col s12">
                    <div class="page-title">Salida de inventario</div>
                </div>
                <div class="col s12 m12 l6">
                    <div class="card">
                        <div class="card-content">

                            <div class="row">
                                <form class="col s12" id="formulario" name="formulario" method="post" enctype="multipart/form-data">

                                    <div class="input-field col s12">
                                        <input id="folio" name="folio" type="hidden" value="<?php echo "$folio" ?>">
                                        <select id="descripcion" name="descripcion" autocomplete="off" tabindex="2" required>
                                            <option value="">Equipo</option>
                                            <?php
                                            $sql = "SELECT DISTINCT descripcion from tblinventory order by descripcion asc";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {
                                            ?>

                                                    <option value="<?php echo htmlentities($result->descripcion); ?>"><?php echo htmlentities($result->descripcion); ?></option>
                                            <?php }
                                            }
                                            $query = null; // obligado para cerrar la conexi??n


                                            ?>
                                        </select>
                                    </div>

                                    <div class="input-field col s12">
                                        <select id="talla" name="talla" autocomplete="off" tabindex="2" required>
                                            <option value="">Talla</option>
                                            <?php
                                            $sql = "SELECT DISTINCT talla from tblinventory order by talla asc";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {   ?>
                                                    <option value="<?php echo htmlentities($result->talla); ?>"><?php echo htmlentities($result->talla); ?></option>
                                            <?php }
                                            }
                                            $query = null; // obligado para cerrar la conexi??n


                                            ?>
                                        </select>
                                    </div>

                                    <div class="input-field col s12">
                                        <select id="condicion" name="condicion" autocomplete="off" tabindex="2" required>
                                            <option value="">Condici??n</option>
                                            <?php
                                            $sql = "SELECT DISTINCT condicion from tblinventory order by condicion asc";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {   ?>
                                                    <option value="<?php echo htmlentities($result->condicion); ?>"><?php echo htmlentities($result->condicion); ?></option>
                                            <?php }
                                            }
                                            $query = null; // obligado para cerrar la conexi??n


                                            ?>
                                        </select>
                                    </div>

                                    <div class="input-field col s12">
                                        <input type="text" id="cantidad" name="cantidad" required />
                                        <label for="cantidad">Cantidad</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <label for="fecha">Fecha</label><br>

                                        <input id="fecha" name="fecha" tabindex="25" type="date" autocomplete="off" required />
                                    </div>
                                    <div class="input-field col s12">
                                        <input type="text" id="serie" name="serie" required />
                                        <label for="serie">Serie</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <select id="technical" name="technical" autocomplete="off" required>
                                            <option value="">Quien solicita</option>
                                            <?php $sql = "SELECT name,firstname,lastname,Department from tblemployees where Department='supervisor' order by firstname";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {   ?>
                                                    <option value="<?php echo htmlentities($result->firstname); ?>&nbsp;<?php echo htmlentities($result->lastname); ?>&nbsp;<?php echo htmlentities($result->name); ?>" required><?php echo htmlentities($result->firstname); ?>&nbsp;<?php echo htmlentities($result->lastname); ?>&nbsp;<?php echo htmlentities($result->name); ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="input-field col s12">
                                        <textarea id="comentario" name="comentario" class="validate" required></textarea>
                                        <label for="serie">Comentario</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <select id="tecnicoasig" name="tecnicoasig" autocomplete="off" required>
                                            <option value="">T??cnico</option>
                                            <?php $sql = "SELECT EmpId,name,firstname,lastname from tblemployees order by firstname";
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
            $(function() {
                $("#formulario").on("submit", function(e) {
                    e.preventDefault();
                    var url = "consultas/insertexit.php";
                    var datos = $("#formulario").serialize();
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
                                document.getElementById("formulario").reset();
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
                                    text: 'No se ha podido guardar la informaci??n',
                                })
                            }
                        },
                    });
                    return false;
                });

            });
        </script>

        <!--*** OBTENER LAS EXISTENCIAS SEGUN LA DESCRIPCION SELECCIONADA *** 
        <script>
            $("#descripcion").change(function() {
                $("#descripcion option:selected").each(function() {
                    valor = $(this).val();
                    console.log(valor);
                    $.post("consultas/selectcantidad.php", {
                        valor
                    }, function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Existencias',
                            text: '' + data,
                            showConfirmButton: false,
                            timer: 2500
                        })
                        //$("#existencia").html(data);
                        //alert("Status: " + data);
                        //console.log(data);
                    });
                });

            });
        </script>-->

        <script type="text/javascript">
            $(document).ready(function() {
                setTimeout(function() {
                    $(".content").fadeOut(1500);
                }, 6000);

            });
        </script>

    </body>

    </html>
<?php } ?>