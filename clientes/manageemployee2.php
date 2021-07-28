<?php
session_start();
error_reporting(0);
//ini_set('error_reporting', E_ALL);
include('../includes/config.php');
if(strlen($_SESSION['cliente'])==0)
    {   
header('location:index.php');
}
else{
// codigo para inactivar Técnico    
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$status=0;
$sql = "update tblemployees set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:manageemployee2.php');
}



//codigo para activar Técnico
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=1;
$sql = "update tblemployees set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:manageemployee2.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Administrar Técnicos</title>
        
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
    div.container { max-width: 1200px; }
        </style>
    </head>
    <body>
       <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Administrar Técnicos</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Información de Técnicos</span>
                                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example"class="display responsive nowrap" width="100%">
                                    <thead>
                                        <tr>
                                           <th></th>
                                             <th>NOMBRE </th>
                                            <th>MATRICULA </th>
                                            <th>FOTO </th>
                                             <th>ESTADO </th>
                                            <th>ACCIONES </th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php 
$service=$_GET['s'];    
$sql = "SELECT * from  tblemployees where assignedservice='$service'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                        <tr>
                                            <td></td>
                                            <!--    <td><img id="foto" name="foto"  target="_blank" onclick="javascript:this.width=100;this.height=120" ondblclick="javascript:this.width=350;this.height=400" autocomplete="off" src="<?php echo htmlentities($result->imagehalfbody);?>" width="100" height="120" required></td> -->
                                            <td><?php echo htmlentities($result->name);?>&nbsp;<?php echo htmlentities($result->FirstName);?>&nbsp;<?php echo htmlentities($result->LastName);?></td>
                                            <td><?php echo htmlentities($result->EmpId);?></td>
                                               <td><a href ="<?php echo htmlentities($result->imagehalfbody);?>" target="_blank"><img id="foto" name="foto"  target="_blank" onclick="javascript:this.width=100;this.height=120" ondblclick="javascript:this.width=350;this.height=400" autocomplete="off" src="<?php echo htmlentities($result->imagehalfbody);?>" width="100" height="120" required></a></td>
                                             <td><?php $stats=$result->Status;
if($stats){
                                             ?>
                                                 <a class="waves-effect waves-green btn-flat m-b-xs">Activo</a>
                                                 <?php } else { ?>
                                                 <a class="waves-effect waves-red btn-flat m-b-xs">Inactivo</a>
                                                 <?php } ?>


                                             </td>
                                          
                                              
                                            <td>

<!--<a name="add_document" href="adddocument.php?empid=<?php echo htmlentities($result->id);?>"title="Agregar documentos"><i class="material-icons">note_add</i></a>-->

<!--<a href="editemployee2.php?empid=<?php echo htmlentities($result->id);?>" title="Modificar datos"><i class="material-icons">edit</i></a>-->
                                                <!--<a href="editemployee.php?empid=<?php echo htmlentities($result->id);?>"><i class="material-icons">how_to_reg</i></a>-->

<a name="look_documents" href="adddocument2.php?empid=<?php echo htmlentities($result->id);?>" title="Visualizar documentos e imagenes"><i class="material-icons">visibility</i></a>  
       
<a name="add_bitacora" href="binnacle.php?empid=<?php echo htmlentities($result->EmpId);?>" title="Bitácora"><i class="material-icons">assessment</i></a>         
    
<a name="create_pdf" href="reporte_usuarios_pdf.php?empid=<?php echo htmlentities($result->id);?>"target="_blank" title="PDF de Técnico"><i class="material-icons">picture_as_pdf</i></a>        
        
    <?php if($result->Status==1)
 {?>
<!--<a href="manageemployee.php?inid=<?php echo htmlentities($result->id);?>" onclick="return confirm ('¿Estás seguro de que quieres inactivar a este Técnico?');" title="Inactivar Técnico"/> <i class="material-icons" title="Inactivar">lock</i>--> 
<?php } else {?>
<!--<a href="manageemployee.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('¿Seguro que quieres activar a este Técnico?');" title="Activar Técnico"/><i class="material-icons" title="Activar">lock_open</i>-->
    <?php } ?> 


  
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
        <script src="../assets/js/jquery.dataTables.min.js"></script><!-- nuevo- -->
        
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../boot/dataTables.responsive.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
        
    </body>
</html>
<?php } ?>