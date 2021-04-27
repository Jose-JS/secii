<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from  tblincidents  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Registro de Incidencia eliminado";

}

    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Admin | Bitácora</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />

    <!-- Styles -->
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
    <?php include('includes/header.php');?>

    <?php include('includes/sidebar.php');?>
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Bitácora</div>
            </div>
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Información de Incidencias</span>

                        <table id="example" class="display responsive-table dataTable ">
                            <thead>
                                <tr>
                                    <th>No </th>
                                    <th>Fecha y Hora</th>
                                    <th>Matricula</th>
                                    <th>Técnico</th>
                                    <th>Servicio</th>
                                    <th>No. de Incidencia</th>
                                    <th>Descripción</th>
                                    <th>Bono</th>
                                    <th>Prodcutividad</th>

                                </tr>
                            </thead>

                            <tbody>

                                <?php 
     $id=$_GET['empid'];
 
    $sql = "SELECT * from tblincidents where empid=:id order by datetime desc";
$query = $dbh -> prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR); 
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{             
                                        ?>

                                <tr>
                                    <td> <?php echo htmlentities($cnt);?></td>
                                    <td><?php echo htmlentities($result->datetime);?></td>
                                    <td><?php echo htmlentities($result->empid);?></td>
                                    <td><?php echo htmlentities($result->technical);?></td>
                                    <td><?php echo htmlentities($result->service);?></td>
                                    <td><?php echo htmlentities($result->issue);?></td>
                                    <td><?php echo htmlentities($result->reason);?></td>
                                    <td><?php echo htmlentities($result->art);?></td>
                                    <td><?php echo htmlentities($result->productivity);?></td>

                                </tr>
                                <?php $cnt++;} }?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>






        <div class="row">

            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Información de Dobletes</span>

                        <table id="examplee" class="display responsive-table dataTable ">
                            <thead>
                                <tr>
                                    <th>No </th>
                                    <th>Fecha y Hora</th>
                                    <th>Matricula</th>
                                    <th>Técnico</th>
                                    <th>Servicio</th>
                                    <th>Cubre</th>
                                    <th>Motivo</th>
                                    <th>Turno</th>
                                    <th>Nombre Supervisor</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
     $id=$_GET['empid'];
    $sql = "SELECT *from tbldoublets  where empid=:id order by datetime desc";
$query = $dbh -> prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);     
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                                <tr>
                                    <td> <?php echo htmlentities($cnt);?></td>
                                    <td><?php echo htmlentities($result->datetime);?></td>
                                    <td><?php echo htmlentities($result->empid);?></td>
                                    <td><?php echo htmlentities($result->technical);?></td>
                                    <td><?php echo htmlentities($result->service);?></td>
                                    <td><?php echo htmlentities($result->cover);?></td>
                                    <td><?php echo htmlentities($result->reason);?></td>
                                    <td><?php echo htmlentities($result->turn);?></td>
                                    <td><?php echo htmlentities($result->namesup);?></td>

                                </tr>
                                <?php $cnt++;} }?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        
        
 <div class="row">

            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Información de Acta administrativa</span>

                        <table id="example" class="display responsive-table dataTable ">
                            <thead>
                                <tr>
                                    <th>No </th>
                                    <th>Fecha</th>
                                    <th>Matricula</th>
                                    <th>Técnico</th>
                                    <th>Servicio</th>
                                    <th>Motivo</th>
                                    <th>Turno</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
     $id=$_GET['empid'];
    $sql = "SELECT *from tblactadmin  where empid=:id order by date desc";
$query = $dbh -> prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);     
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                                <tr>
                                    <td> <?php echo htmlentities($cnt);?></td>
                                    <td><?php echo htmlentities($result->date);?></td>
                                    <td><?php echo htmlentities($result->empid);?></td>
                                    <td><?php echo htmlentities($result->technical);?></td>
                                    <td><?php echo htmlentities($result->service);?></td>
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
        
              
<div class="row">

            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Información Anexo TESI</span>

                        <table id="examplee" class="display responsive-table dataTable ">
                            <thead>
                                <tr>
                                    <th>No </th>
                                    <th>Fecha</th>
                                    <th>Matricula</th>
                                    <th>Técnico</th>
                                    <th>Servicio</th>
                                    <th>Motivo</th>
                                    <th>Turno</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
     $id=$_GET['empid'];
    $sql = "SELECT *from tblannexedtesi  where idemp=:id order by fech desc";
$query = $dbh -> prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);     
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                                <tr>
                                    <td> <?php echo htmlentities($cnt);?></td>
                                    <td><?php echo htmlentities($result->fech);?></td>
                                    <td><?php echo htmlentities($result->idemp);?></td>
                                    <td><?php echo htmlentities($result->technical);?></td>
                                    <td><?php echo htmlentities($result->service);?></td>
                                    <td><?php echo htmlentities($result->motiv);?></td>
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










    <div class="left-sidebar-hover"></div>

    <!-- Javascripts -->
    <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
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
<?php } ?>