<?php
session_start();
//error_reporting(0);
ini_set('error_reporting', E_ALL);
include('../includes/config.php');
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
        <title>Recursos Humanos | Administrar Bajas</title>

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

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

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
                    <div class="page-title">Administrar Bajas</div>
                </div>

                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Información de Bajas</span>
                            <div class="table-responsive">
                                <table id="tblbajas" class="cell-border display compact responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>NOMBRE</th>
                                            <th>FECHA</th>
                                            <th>SEDE</th>
                                            <th>MOTIVO</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                        <?php $sql = "SELECT * from  tblboletbaja order by fechabaja desc";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        //print "    <p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {               
                                                ?>
                                                <tr>
                                                    <td> <?php echo htmlentities($cnt); ?></td>
                                                    <td>
                                                        <?php
                                                        $matricula = $result->idempleado;
                                                        $sql22 = "SELECT FirstName,LastName,name from  tblemployees where id='$matricula'";
                                                        $query22 = $dbh->prepare($sql22);
                                                        $query22->execute();
                                                        $results22 = $query22->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt22 = 1;
                                                        if ($query22->rowCount() > 0) {
                                                            foreach ($results22 as $result22) {


                                                        ?>
                                                        <?php echo htmlentities($result22->FirstName); ?>&nbsp;<?php echo htmlentities($result22->LastName); ?>&nbsp;<?php echo htmlentities($result22->name); ?>
                                                        <?php $cnt22++;
                                                            }
                                                        } 
                                                        $sql22=null;
                                                         ?>
                                                    </td>
                                                   <td> <?php echo htmlentities($result->fechabaja); ?></td>
                                                
                                            
                                                    <td>
                                                        <?php
                                                        $matricula = $result->idmatricula;
                                                        $sql22 = "SELECT assignedservice from  tblemployees where EmpId='$matricula'";
                                                        $query22 = $dbh->prepare($sql22);
                                                        $query22->execute();
                                                        $results22 = $query22->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt22 = 1;
                                                        if ($query22->rowCount() > 0) {
                                                            foreach ($results22 as $result22) {


                                                        ?>
                                                        <?php echo htmlentities($result22->assignedservice); ?>
                                                        <?php $cnt22++;
                                                            }
                                                        } 
                                                        $sql22=null;
                                                         ?></td>
                                                    
                                                    <td><?php echo htmlentities($result->motivo); ?></td>
                                                    
                                                </tr>
                                        <?php $cnt++;
                                            }
                                        }
                                        $sql=null;?>
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
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/plugins/datatables/js/dataTables.buttons.min.js"></script>
        <script src="../assets/plugins/datatables/js/buttons.print.js"></script>
        <script src="../assets/plugins/datatables/js/buttons.print.min.js"></script>
        <script src="../assets/plugins/datatables/js/jszip.min.js"></script>
        <script src="../assets/plugins/datatables/js/pdfmake.min.js"></script>
        <script src="../assets/plugins/datatables/js/pdfmake.js"></script>
        <script src="../assets/plugins/datatables/js/vfs_fonts.js"></script>
        <script src="../assets/plugins/datatables/js/buttons.colVis.min.js"></script>
        <script src="../assets/plugins/datatables/js/buttons.html5.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
        <script src="../assets/js/pages/table-databajas.js"></script>
        
    </body>

    </html>
<?php } ?>