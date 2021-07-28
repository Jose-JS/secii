<?php
session_start();
error_reporting(0);
//error_reporting(E_ALL);
 
include('../includes/config.php');
if(strlen($_SESSION['supervisor'])==0)
    {   
header('location:index.php');
}
else{ 
// codigo para inactivar Técnico    
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$invoice=$_GET['in'];	
$status=0;
$sql = "update tblservicedelivery set status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
$sql2 = "update tbldoublets set status=:status  WHERE invoice=:invoice";
$query2 = $dbh->prepare($sql2);
$query2 -> bindParam(':invoice',$invoice, PDO::PARAM_STR);
$query2 -> bindParam(':status',$status, PDO::PARAM_STR);
$query2 -> execute();	
$sql3 = "update tblactadmin set status=:status  WHERE invoice=:invoice";
$query3 = $dbh->prepare($sql3);
$query3 -> bindParam(':invoice',$invoice, PDO::PARAM_STR);
$query3 -> bindParam(':status',$status, PDO::PARAM_STR);
$query3 -> execute();			
$sql4 = "update tblnoteinformative set status=:status  WHERE invoice=:invoice";
$query4 = $dbh->prepare($sql4);
$query4 -> bindParam(':invoice',$invoice, PDO::PARAM_STR);
$query4 -> bindParam(':status',$status, PDO::PARAM_STR);
$query4 -> execute();				
$sql5 = "update tblannexedtesi set status=:status  WHERE invoice=:invoice";
$query5 = $dbh->prepare($sql5);
$query5 -> bindParam(':invoice',$invoice, PDO::PARAM_STR);
$query5 -> bindParam(':status',$status, PDO::PARAM_STR);
$query5 -> execute();					
header('location:managepdf.php');
}



//codigo para activar Técnico
if(isset($_GET['id']))
{
$id=$_GET['id'];
$invoice=$_GET['in'];	
$status=1;
$sql = "update tblservicedelivery set status=:status  WHERE invoice=:invoice";
$query = $dbh->prepare($sql);
$query -> bindParam(':invoice',$invoice, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
$sql2 = "update tbldoublets set status=:status  WHERE invoice=:invoice";
$query2 = $dbh->prepare($sql2);
$query2 -> bindParam(':invoice',$invoice, PDO::PARAM_STR);
$query2 -> bindParam(':status',$status, PDO::PARAM_STR);
$query2 -> execute();	
$sql3 = "update tblactadmin set status=:status  WHERE invoice=:invoice";
$query3 = $dbh->prepare($sql3);
$query3 -> bindParam(':invoice',$invoice, PDO::PARAM_STR);
$query3 -> bindParam(':status',$status, PDO::PARAM_STR);
$query3 -> execute();			
$sql4 = "update tblnoteinformative set status=:status  WHERE invoice=:invoice";
$query4 = $dbh->prepare($sql4);
$query4 -> bindParam(':invoice',$invoice, PDO::PARAM_STR);
$query4 -> bindParam(':status',$status, PDO::PARAM_STR);
$query4 -> execute();				
$sql5 = "update tblannexedtesi set status=:status  WHERE invoice=:invoice";
$query5 = $dbh->prepare($sql5);
$query5 -> bindParam(':invoice',$invoice, PDO::PARAM_STR);
$query5 -> bindParam(':status',$status, PDO::PARAM_STR);
$query5 -> execute();	
header('location:managepdf.php');
}

    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Actas Administrativas</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/css/responsive.dataTables.min.css" />
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

            
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
                        <div class="page-title">Administrar Actas Administrativas</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Entrega de servicio de supervision</span>
                                 <?php if($msg){?><div class="succWrap content"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                         <th>No.</th>
                                         <th>Folio</th>
                                         <th>Fecha</th>
                                         <th>Estado</th>         
                                         <th>Acciones</th>                                       
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                    
<?php $sql = "SELECT * from tblservicedelivery order by invoice desc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{           
$source =$result->date;
$date = new DateTime($source);
//echo $date->format('d.m.Y'); // 31.07.2012 FORMATO DE LA FECHA
	

										
						?>  
                                        <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->invoice);?></td>
                                            <td><?php echo htmlentities($date->format('d-m-Y'));?></td>
                                            <td><?php $stats=$result->status;
if($stats){
                                             ?>
                                        <a class="waves-effect waves-green btn-flat m-b-xs">Activo</a>
                                        <?php } else { ?>
                                        <a class="waves-effect waves-red btn-flat m-b-xs">Cancelado</a>
                                        <?php } ?>


                                    </td>

                                            <td><a href="managedocuments.php?i=<?php echo htmlentities($result->invoice);?>"><i class="material-icons">remove_red_eye</i></a> 

                                 <?php if($result->status==1)
                                           {?>
                                        <a href="managepdf.php?inid=<?php echo htmlentities($result->id);?>&in=<?php echo htmlentities($result->invoice);?>" onclick="return confirm ('¿Estás seguro de que quieres cancelar a este folio?');" title="Cancelar Folio" /> <i class="material-icons" title="Cancelar">lock</i>
                                        <?php } else {?>
                                        <a href="managepdf.php?id=<?php echo htmlentities($result->id);?>&in=<?php echo htmlentities($result->invoice);?>" onclick="return confirm('¿Seguro que quieres activar este folio?');" title="Activar Folio" /><i class="material-icons" title="Activar">lock_open</i>
                                        <?php } ?>                                  
                                        </td>   
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
    },6000);

});

</script> 
    </body>
</html>
<?php } ?>