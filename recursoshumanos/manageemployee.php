<?php
session_start();
error_reporting(0);
//ini_set('error_reporting', E_ALL);
include('includes/config.php');
if (strlen($_SESSION['recursos']) == 0) {
    header('location:index.php');
} else {
    // codigo para inactivar Técnico    
    if (isset($_GET['inid'])) {
        $id = $_GET['inid'];
        $status = 0;
        $sql = "update tblemployees set Status=:status  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        header('location:manageemployee.php');
    }



    //codigo para activar Técnico
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $status = 1;
        $sql = "update tblemployees set Status=:status  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        header('location:manageemployee.php');
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!-- Title -->
        <title>Recursos Humanos | Administrar Técnicos</title>

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




        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
        <style>
            div.container {
                max-width: 1200px
            }

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

            /*  .material-icons{
            color:darkcyan;
            font-size: 20px;

        }*/
        </style>

    </head>

    <body>
        <?php include('includes/header.php'); ?>
        <?php include('includes/sidebar.php'); ?>
        <main class="mn-inner">
            <div class="row">
                <div class="col s12">
                    <div class="page-title">Administrar Técnicos</div>
                </div>

                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Información de Técnicos</span>

                            <?php if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php } ?>
                            <div class="table-responsive">
                                <table id="example" class="cell-border display compact responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>MATRICULA</th>
                                            <th>NOMBRE</th>
                                            <th>EMPRESA</th>
                                            <th>SERVICIO</th>
                                            <th>ESTADO</th>
                                            <th>FOTO</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $sql = "SELECT * from  tblemployees where Status=1 order by Firstname";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {               ?>
                                                <tr>
                                                    <td> <?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->EmpId); ?></td>
                                                    <td><?php echo htmlentities($result->FirstName); ?>&nbsp;<?php echo htmlentities($result->LastName); ?>&nbsp;<?php echo htmlentities($result->name); ?></td>
                                                    <td><?php echo htmlentities($result->company); ?></td>
                                                    <td><?php echo htmlentities($result->assignedservice); ?>
                                                        <a href="editservice2.php?id=<?php echo htmlentities($result->id); ?>&empid=<?php echo htmlentities($result->EmpId); ?>&tech=<?php echo htmlentities($result->FirstName); ?>&nbsp;<?php echo htmlentities($result->LastName); ?>&nbsp;<?php echo htmlentities($result->name); ?>&service=<?php echo htmlentities($result->assignedservice); ?>" title="Cambio de servicio" class="tooltipped" data-position="bottom" data-tooltip="Cambio de servicio"><i class="material-icons">edit</i></a>
                                                    </td>

                                                    <td>
                                                        <?php
                                                        $stats = $result->Status;
                                                        if ($stats) {
                                                        ?>
                                                            <a class="waves-effect waves-green btn-flat m-b-xs">Activo</a>

                                                        <?php } else { ?>
                                                            <a class="waves-effect waves-red btn-flat m-b-xs">Inactivo </a><br>

                                                            <a href="creator_pdf_boletabaja.php?id=<?php echo htmlentities($result->id); ?>&c=<?php echo htmlentities($result->company); ?>" class="waves-effect waves-red btn-flat m-b-xs tooltipped" target="_blank" title="Boleta de Baja" data-position="bottom" data-tooltip="Boleta de Baja"><i class="material-icons">picture_as_pdf</i></a>

                                                            <a href="creator_pdf_boletabajainformacion.php?id=<?php echo htmlentities($result->id); ?>&c=<?php echo htmlentities($result->company); ?>" class="waves-effect waves-red btn-flat m-b-xs tooltipped" title="Boleta de Baja Informativa" target="_blank" data-position="bottom" data-tooltip="Boleta de Baja Informativa"><i class="material-icons">picture_as_pdf</i></a>
                                                        <?php } ?>


                                                    </td>
                                                    <td>
                                                        <?php
                                                        $ejemplo = $result->id;
                                                        $sql22 = "SELECT * from  tbldocument where idemp='$ejemplo' and name='MEDIO CUERPO'";
                                                        $query22 = $dbh->prepare($sql22);
                                                        $query22->execute();
                                                        $results22 = $query22->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt22 = 1;
                                                        if ($query22->rowCount() > 0) {
                                                            foreach ($results22 as $result22) {


                                                        ?>
                                                                <?php if ($result22->namedoc == null) {
                                                                } else { ?>
                                                                    <img loading="lazy" id="foto" name="foto" class="materialboxed" autocomplete="off" src="<?php echo htmlentities($result22->namedoc); ?>" width="100" height="120" required>
                                                                <?php } ?>
                                                        <?php $cnt22++;
                                                            }
                                                        } ?>
                                                    </td>

                                                    <td>
                                                        <?php
                                                        $ejemplo = $result->id;
                                                        $sql22 = "SELECT * from  tbldocument where idemp='$ejemplo' and name='ACTA DE NACIMIENTO'";
                                                        $query22 = $dbh->prepare($sql22);
                                                        $query22->execute();
                                                        $results22 = $query22->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt22 = 1;
                                                        if ($query22->rowCount() > 0) { ?>

                                                            <?php
                                                            foreach ($results22 as $result22) {   ?>
                                                            <?php $cnt22++;
                                                            }
                                                        } else { ?>
                                                            <a name="add_document" class="tooltipped" data-position="bottom" data-tooltip="Agregar documentos" href="adddocument.php?empid=<?php echo htmlentities($result->id); ?>&name=<?php echo htmlentities($result->FirstName); ?>&nbsp;<?php echo htmlentities($result->LastName); ?>&nbsp;<?php echo htmlentities($result->name); ?>" title="Agregar documentos"><i class="material-icons">note_add</i></a>
                                                        <?php } ?>

                                                        <a href="editemployee2.php?empid=<?php echo htmlentities($result->id); ?>" title="Modificar datos" class="tooltipped" data-position="bottom" data-tooltip="Modificar datos"><i class="material-icons">edit</i></a>
                                                        <!--<a href="editemployee.php?empid=<?php echo htmlentities($result->id); ?>"><i class="material-icons">how_to_reg</i></a>-->
                                                        <?php
                                                        if ($result->visibility == '1') {
                                                        ?>
                                                            <a name="look_documents" href="adddocument2.php?empid=<?php echo htmlentities($result->id); ?>&name=<?php echo htmlentities($result->FirstName); ?>&nbsp;<?php echo htmlentities($result->LastName); ?>&nbsp;<?php echo htmlentities($result->name); ?>" title="Visualizar documentos e imagenes" class="tooltipped" data-position="bottom" data-tooltip="Visualizar documentos e imagenes"><i class="material-icons">visibility</i></a>
                                                        <?php } else {
                                                        } ?>


                                                        <a name="add_bitacora" href="binnacle.php?empid=<?php echo htmlentities($result->EmpId); ?>" title="Bitácora" class="tooltipped" data-position="bottom" data-tooltip="Bitácora"><i class="material-icons">assessment</i></a><BR>

                                                        <!--<a name="create_pdf" href="ejemoplo_credencial.php?empid=<?php echo htmlentities($result->id); ?>" target="_blank" title="PDF de Técnico"><i class="material-icons">picture_as_pdf</i></a>-->

                                                        <a name="create_pdf" href="ficha_tecnica.php?empid=<?php echo htmlentities($result->id); ?>&idemp=<?php echo htmlentities($result->company); ?>" target="_blank" title="Ficha Técnica" class="tooltipped" data-position="bottom" data-tooltip="Ficha Técnica"><i class="material-icons">picture_as_pdf</i></a>

                                                        <a name="create_pdf" href="creator_pdf_finanzas.php?empid=<?php echo htmlentities($result->id); ?>" target="_blank" title="PDF Finanzas" class="tooltipped" data-position="bottom" data-tooltip="PDF Finanzas"><i class="material-icons">picture_as_pdf</i></a>

                                                        <a name="create_pdf" href="creator_pdf_operaciones.php?empid=<?php echo htmlentities($result->id); ?>" target="_blank" title="PDF Operaciones" class="tooltipped" data-position="bottom" data-tooltip="PDF Operaciones"><i class="material-icons">picture_as_pdf</i></a><br>

                                                        <a name="create_pdf" href="credencial_adelante2.php?empid=<?php echo htmlentities($result->id); ?>&idemp=<?php echo htmlentities($result->company); ?>" target="_blank" title="credencial" class="tooltipped" data-position="bottom" data-tooltip="credencial"><i class="material-icons">style</i></a>


                                                        <?php if ($result->Status == 1) { ?>

                                                            <a href="addboletabaja.php?id=<?php echo htmlentities($result->id); ?>&idemp=<?php echo htmlentities($result->EmpId); ?>" onclick="return confirm ('¿Estás seguro de que quieres inactivar a este Técnico?');" title="Inactivar Técnico" class="tooltipped" data-position="bottom" data-tooltip="Inactivar Técnico" />

                                                            <i class="material-icons" title="Inactivar">lock</i>
                                                        <?php } else { ?>
                                                            <a href="manageemployee.php?id=<?php echo htmlentities($result->id); ?>" onclick="return confirm('¿Seguro que quieres activar a este Técnico?');" title="Activar Técnico" class="tooltipped" data-position="bottom" data-tooltip="Activar Técnico" /><i class="material-icons" title="Activar">lock_open</i>
                                                        <?php } ?>
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

    </body>

    </html>
<?php } ?>