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
        <title>Incidencia</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
            
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
<style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body>
       <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Incidencias</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Información de Incidencias</span>
                                 <?php if($msg){?><div class="succWrap content"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example2" class="display responsive-table dataTable">
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
<?php $sql = "SELECT * from tblincidents order by datetime desc";
$query = $dbh -> prepare($sql);
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
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
                  <script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },6000);

});

</script> 
    </body>
</html>
<?php } ?>