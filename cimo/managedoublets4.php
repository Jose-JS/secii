<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['supervisor'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_GET['d']))
{


}

    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Supervisores | Formatos FAR y FBR</title>
        
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
                        <div class="page-title">Lista de Formatos</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
								<script>
			function Function2() {
							
      <?php  $id=$_GET['d'];
$sql = "delete from  tbldoubletsa  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();

$sql44 = "delete from  tbldoublets  WHERE idrf=:id";
$query44 = $dbh->prepare($sql44);
$query44 -> bindParam(':id',$id, PDO::PARAM_STR);
$query44 -> execute();	
?>
	

												}
								</script>
                                <span class="card-title">Informaci??n de Formato FAR</span>
                                 <?php if($msg){?><div class="succWrap content"><strong>EXITO</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                			<script>
												function myFunction() {
													window.open("../supervisores/adddoublets4.php?f=<?php echo $folio=$_GET['i'];?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}

												
									function Function3() {

    <?php   $id1=$_GET['d'];
$sql1 = "delete from  tbldoubletsb  WHERE id=:id1";
$query1 = $dbh->prepare($sql1);
$query1 -> bindParam(':id1',$id1, PDO::PARAM_STR);
$query1 -> execute();
$sql33 = "delete from  tbldoublets  WHERE idfr=:id1";
$query33 = $dbh->prepare($sql33);
$query33 -> bindParam(':id1',$id1, PDO::PARAM_STR);
$query33 -> execute();	
?>
												}



											</script>
                                 		<a onclick='myFunction()'><i class="material-icons">person_add</i></a>
                                <table id="example" class="compact cell-border display responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Folio</th> 
                                            <th>Fecha</th>
                                            <th>Sede Origen</th>
                                            <th>Tesi Reacci??n</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                    
<?php 
$folio=$_GET['i'];	
$sql = "SELECT * from tbldoubletsa where folio=:folio order by id desc";
$query = $dbh -> prepare($sql);
$query->bindParam(':folio',$folio,PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{              
$fecha=$result->fecha;
$fechaEntera = strtotime($fecha);
$anio = date("Y", $fechaEntera);
$mes = date("m", $fechaEntera);
$dia = date("d", $fechaEntera);										
										
										?>  
                                        <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <td> <?php echo htmlentities($result->folio);?></td>
                                            <td><?php echo htmlentities($dia);?>-<?php echo htmlentities($mes);?>-<?php echo htmlentities($anio);?></td>
                                            <td><?php echo htmlentities($result->sedeorig);?></td>
                                            <td><?php echo htmlentities($result->tesireac);?></td>
                                            <td>

                                            
                                            <a href="editdoublets4.php?i=<?php echo htmlentities($result->folio);?>&d=<?php echo htmlentities($result->id);?>"><i class="material-icons">create</i></a>
                                            
                                            <a href="managedoublets4.php?i=<?php echo htmlentities($result->folio);?>&d=<?php echo htmlentities($result->id);?>" onclick="return confirm('Quieres borrar');Function2()">
 <i class="material-icons">delete_forever</i></a>
                                            
                                            
                                            </td>
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Informaci??n de Formato FBR</span>
                                 <?php if($msgg){?><div class="succWrap content"><strong>EXITO</strong> : <?php echo htmlentities($msgg); ?> </div><?php }?>
                                 <script>
												function myFunction2() {
													window.open("../supervisores/adddoublets5.php?f=<?php echo $folio=$_GET['i'];?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=1000,height=800");
												}


											</script>
                                 		<a onclick='myFunction2()'><i class="material-icons">person_add</i></a>
                                <table id="example" class="compact cell-border display responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Folio</th> 
                                            <th>Fecha</th>
                                            <th>Sede Origen</th>
                                            <th>Tesi Reacci??n</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                    
<?php 
$folio=$_GET['i'];	
$sql = "SELECT * from tbldoubletsb where folio=:folio order by id desc";
$query = $dbh -> prepare($sql);
$query->bindParam(':folio',$folio,PDO::PARAM_STR);	
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{              
$fecha=$result->fecha;
$fechaEntera = strtotime($fecha);
$anio = date("Y", $fechaEntera);
$mes = date("m", $fechaEntera);
$dia = date("d", $fechaEntera);										
										
										?>  
                                        <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <td> <?php echo htmlentities($result->folio);?></td>
                                            <td><?php echo htmlentities($dia);?>-<?php echo htmlentities($mes);?>-<?php echo htmlentities($anio);?></td>
                                            <td><?php echo htmlentities($result->sedeorig);?></td>
                                            <td><?php echo htmlentities($result->tesireac);?></td>
                                            <td>
                                            
                                            <a href="editdoublets5.php?i=<?php echo htmlentities($result->folio);?>&d=<?php echo htmlentities($result->id);?>"><i class="material-icons">create</i></a>
                                            
                                            <a href="managedoublets4.php?i=<?php echo htmlentities($result->folio);?>&d=<?php echo htmlentities($result->id);?>" onclick="return confirm('Quieres borrar'); Function3()">
 <i class="material-icons">delete_forever</i></a>
                                            
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