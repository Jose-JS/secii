<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['recursos'])==0)
    {   
header('location:index.php');
}
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Dobletes</title>

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
    <!--  <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">-->
    
    <link href="../assets/plugins/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


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


        th,
        td {
            text-align: center;
        }
    </style>


</head>

<body>
    <?php include('includes/header.php');?>

    <?php include('includes/sidebar.php');?>
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Administrar Dobletes</div>
            </div>
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Información de dobletes</span>
                        <?php if($msg){?><div class="succWrap content"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>

                        <table id="example2" class="display responsive nowrap" width="100%" >
                            <thead>
                                <tr>
                                    <th>No </th>
                                    <th>Matricula</th>
                                    <th>Técnico</th>
                                    <th>Fecha</th>
                                    <th>Servicio</th>
                                    <th>Cubre</th>
                                    <th>Motivo</th>
                                    <th>Turno</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $sql = "SELECT * from tbldoublets order by datetime desc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$fecha=$result->datetime;
$fechaEntera = strtotime($fecha);
$anio = date("Y", $fechaEntera);
$mes = date("m", $fechaEntera);
$dia = date("d", $fechaEntera);								
								?>
                                <tr>
                                    <td> <?php echo htmlentities($cnt);?></td>
                                     <td><?php echo htmlentities($result->empid);?></td>
                                    <td><?php echo htmlentities($result->technical);?></td>
                                    <td><?php echo htmlentities($dia);?>-<?php echo htmlentities($mes);?>-<?php echo htmlentities($anio);?></td>
                                    <td><?php echo htmlentities($result->service);?></td>
                                    <td><?php echo htmlentities($result->cover);?></td>
                                    <td><?php echo htmlentities($result->reason);?></td>
                                    <td><?php echo htmlentities($result->turn);?></td>

                                </tr>
                                <?php $cnt++;} }?>
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
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="../assets/js/alpha.min.js"></script>
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