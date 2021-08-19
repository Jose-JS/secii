<?php
session_start();
error_reporting(0);
//ini_set('error_reporting', E_ALL);
include('../includes/config.php');
if (strlen($_SESSION['recursos']) == 0) {
    header('location:index.php');
} else {
 
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!-- Title -->
        <title>Recursos Materiales | Administrar Salidas Folio</title>

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
        <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css ">




        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
       

    </head>

    <body>
        <?php include('includes/header.php'); ?>
        <?php include('includes/sidebar.php'); ?>
        <main class="mn-inner">
            <div class="row">
                <div class="col s12">
                    <div class="page-title">Administrar Salidas Folio</div>
                </div>

                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Información salida folios</span>

                            <?php if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php } ?>
                            <div class="table-responsive">
                                <table id="example" class="cell-border display compact responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>FOLIO</th>
                                            <th>FECHA</th>
                                            <th>SERVICIO</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $sql = "SELECT * from  tblinventoryfol order by folio desc";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {               ?>
                                                <tr>
                                                    <td> <?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->folio); ?></td>
                                                    <td><?php echo htmlentities($result->fecha); ?></td>
                                                    <td><?php echo htmlentities($result->servicio); ?></td>
                                                    <td><a name="look_documents" href="manageexit.php?f=<?php echo htmlentities($result->folio); ?>" title="Visualizar salidas" class="tooltipped" data-position="bottom" data-tooltip="Visualizar salidas"><i class="material-icons">visibility</i></a>
                                                    <a href="creator_pdf_exit.php?folio=<?php echo htmlentities($result->folio); ?>" class="tooltipped" target="_blank" title="PDF Salidas" data-position="bottom" data-tooltip="PDF Salidas"><i class="material-icons">picture_as_pdf</i></a>
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
            </div>
        </main>


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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
       </body>

    </html>
<?php } ?>