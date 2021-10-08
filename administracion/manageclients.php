<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql = "delete from  tblincidents  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Registro de Incidencia eliminado";
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!-- Title -->
        <title>Administración | Administrar Clientes</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/css/responsive.dataTables.min.css" />
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">


        <!-- Theme Styles -->
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
        </style>
    </head>

    <body>
        <?php include('includes/header.php'); ?>

        <?php include('includes/sidebar.php'); ?>
        <main class="mn-inner">
            <div class="row">
                <div class="col s12">
                    <div class="page-title">Administrar Clientes</div>
                </div>
                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Información de Clientes</span>
                            <?php if ($msg) { ?><div class="succWrap content"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php } ?>
                            <table id="example2" class="display responsive nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>No </th>
                                        <th>RAZON SOCIAL</th>
                                        <th>CLASIFICACION</th>
                                        <th>TELEFONO</th>
                                        <th>UBICACION</th>
                                        <th>ACCION</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $sql = "SELECT * from tblclientsadd";
                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {               ?>
                                            <tr>
                                                <td> <?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities($result->businessname); ?></td>
                                                <td><?php echo htmlentities($result->classification); ?></td>
                                                <td><?php echo htmlentities($result->phone); ?></td>
                                                <td><?php $porciones = explode(",", $result->coordinates);  ?>
                                                    <a href="https://maps.google.com/?q=<?php echo htmlentities($porciones[0]); ?>,<?php echo htmlentities($porciones[1]); ?>" target="_blank"><i class="material-icons">place</i></a>


                                                </td>
                                                <td><a href="editclients.php?empid=<?php echo htmlentities($result->id); ?>" title="Modificar datos"><i class="material-icons">edit</i></a>
                                                    <a href="addload.php?empid=<?php echo htmlentities($result->id); ?>" title="Cargos"><i class="material-icons">money</i></a>
                                                    <a href="expirationinvoices.php?empid=<?php echo htmlentities($result->id); ?>" title="Abonos"><i class="material-icons">payments</i></a>
                                                    <a href="accountstatus.php?empid=<?php echo htmlentities($result->id); ?>" title="Estado de Cuenta"><i class="material-icons">account_balance</i></a>

                                                </td>


                                            </tr>
                                    <?php $cnt++;
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        </div>
        <div class="left-sidebar-hover"></div>

        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
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