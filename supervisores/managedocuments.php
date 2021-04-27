<?php
session_start();
//error_reporting(E_ALL);
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['supervisor'])==0)
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
        <script type="text/javascript">
	window.onload=function(){
 
		img = document.getElementsByTagName("img1");
 
		for(var i=0;i <img.length; i++){
			img[i].onclick = function (){
				this.width=200;
			}
		}
 
	}
	</script>
    </head>
    <body>
       <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                    <div class="row">
                    <div class="col s12">
    <div class="page-title">DOCUMENTOS</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Entrega de Servicio</span>
                                 <?php if($msg){?><div class="succWrap content"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                         <th>No.</th>
                                         <th>Folio</th>
                                         <th>Fecha</th>         
                                         <th>Acciones</th>                                       
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                    
<?php
 $eid=intval($_GET['i']);    
$sql = "SELECT * from tblservicedelivery where invoice='$eid'";    
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
                                            <td><?php echo htmlentities($result->invoice);?></td>
                                            <td><?php echo htmlentities($result->date);?></td>
                                            <td><a href="creator_pdf_entreserv.php?i=<?php echo htmlentities($result->id);?>" target="_blank"><i class="material-icons">picture_as_pdf</i></a></td>                                      
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>    
                             
                                 <div class="row">
                    <div class="col s12">
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Anexo A</span>
                                 <?php if($msg){?><div class="succWrap content"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                         <th>No.</th>
                                         <th>Folio</th>
                                         <th>Fecha</th>
                                         <th>Sede</th>         
                                         <th>Acciones</th>                                       
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                    
<?php
 $eid=intval($_GET['i']);    
$sql = "SELECT * from tbldoublets where invoice='$eid' order by id desc limit 1";
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
                                            <td><?php echo htmlentities($result->invoice);?></td>
                                            <td><?php echo htmlentities($result->datetime);?></td>
                                            <td><?php echo htmlentities($result->service);?></td>
                                            <td><a href="creator_pdf_a.php?i=<?php echo htmlentities($result->invoice);?>&d=<?php echo htmlentities($result->id);?>" target="_blank"><i class="material-icons">picture_as_pdf</i></a></td>                                      
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>                               
                              
                              
                              
                              
                              
                               <!--<div class="row">
                    <div class="col s12">

                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">BOLETA DE AMONESTACION</span>
                                 <?php if($msg){?><div class="succWrap content"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                         <th>No.</th>
                                         <th>Folio</th>
                                         <th>Fecha</th>         
                                         <th>Acciones</th>                                       
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                    
<?php
 $eid=intval($_GET['i']);    
$sql = "SELECT * from tblnovelties where invoice='$eid'";    
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
                                            <td><?php echo htmlentities($result->invoice);?></td>
                                            <td><?php echo htmlentities($result->date);?></td>
                                            <td><a href="creator_pdf_noveds.php?i=<?php echo htmlentities($result->id);?>" target="_blank"><i class="material-icons">picture_as_pdf</i></a></td>                                      
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>  -->
                
                <div class="row">
                    <div class="col s12">
                    
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Anexo B</span>
                                 <?php if($msg){?><div class="succWrap content"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                         <th>No.</th>
                                         <th>Folio</th>
                                         <th>Fecha</th>
                                         <th>Sede</th>         
                                         <th>Imagenes</th> 
                                         <th>Acciones</th>                                       
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                    
<?php
 $eid=intval($_GET['i']);    
$sql = "SELECT * from tblactadmin where invoice='$eid'";
$query = $dbh -> prepare($sql);
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
                                            <td><?php echo htmlentities($result->invoice);?></td>
                                            <td><?php echo htmlentities($result->date);?></td>
                                            <td><?php echo htmlentities($result->service);?></td>
                                            <td>
                                            <?php if($results->img1==null){}else{?>
                                            <a target="_blank" href="<?php echo htmlentities($result->img1);?>"><img  width="120" height="100" src="<?php echo htmlentities($result->img1);?>" /></a>&nbsp;
                                            <?php } ?>
                                            <?php if($results->img2==null){}else{?>
                                            <a target="_blank" href="<?php echo htmlentities($result->img2);?>"><img  width="120" height="100" src="<?php echo htmlentities($result->img2);?>" /></a>&nbsp;
                                            <?php } ?>
                                            <?php if($results->img3==null){}else{?>
                                            <a target="_blank" href="<?php echo htmlentities($result->img3);?>"><img  width="120" height="100" src="<?php echo htmlentities($result->img3);?>" /></a>
                                            <?php } ?>                                            
                                            </td>
                                            <td><a href="creator_pdf_b2.php?i=<?php echo htmlentities($result->id);?>" target="_blank"><i class="material-icons">picture_as_pdf</i></a>
                                            
												</td>                                      
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                                                                     
                    <div class="row">
                    <div class="col s12">
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Anexo C</span>
                                 <?php if($msg){?><div class="succWrap content"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                         <th>No.</th>
                                         <th>Folio</th>
                                         <th>Fecha</th>         
                                         <th>Acciones</th>                                       
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                    
<?php
 $eid=intval($_GET['i']);    
$sql = "SELECT * from tblnoteinformative where invoice='$eid'";
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
                                            <td><?php echo htmlentities($result->invoice);?></td>
                                            <td><?php echo htmlentities($result->fech);?></td>
                                            <td><a href="creator_pdf_annexedc.php?i=<?php echo htmlentities($result->id);?>" target="_blank"><i class="material-icons">picture_as_pdf</i></a></td>                                      
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                                                                             
                                                                             
                            <div class="row">
                    <div class="col s12">
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Anexo TESI</span>
                                 <?php if($msg){?><div class="succWrap content"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                         <th>No.</th>
                                         <th>Folio</th>
                                         <th>Fecha</th>        
                                         <th>Acciones</th>                                       
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                    
<?php
 $eid=intval($_GET['i']);    
$sql = "SELECT * from tblannexedtesi where invoice='$eid'";
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
                                            <td><?php echo htmlentities($result->invoice);?></td>
                                            <td><?php echo htmlentities($result->fech);?></td>
                                            <td><a href="creator_pdf_annexedtesi.php?i=<?php echo htmlentities($result->id);?>" target="_blank"><i class="material-icons">picture_as_pdf</i></a></td>                                      
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