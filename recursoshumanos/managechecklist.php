<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['recursos'])==0)
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
        <title>Supervisores | Checklist</title>
        
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
            
         <link href="../assets/plugins/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
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
                        <div class="page-title">Checklist</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Checklist</span>
                                 <?php if($msg){?><div class="succWrap content"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="cell-border display responsive nowrap" width="100%" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>TESI</th>
                                            <th>FOTO</th>
                                            <th>DOCUMENTOS</th> 
                                            <th>INTRODUCCION</th>
                                            <th>AVISO</th>
                                            <th>REGLAMENTO</th>
                                            <th>ALTA</th>
                                            <th>FICHA TECNICA</th>
                                            <th>HUELLAS</th>
                                            <th>CONTRATO</th>
                                            <th>CREDENCIAL</th>
                                            <th>ACUERDO</th>
                                         
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php $sql = "SELECT * from tblchecklist order by id desc";
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
                                            <td><?php echo htmlentities($result->tesi);?></td>
                                            <td>
										<?php
 $ejemplo=$result->id;
 $sql22 = "SELECT id,foto from  tblchecklist where id='$ejemplo'";
$query22 = $dbh -> prepare($sql22);
$query22->execute();
$results22=$query22->fetchAll(PDO::FETCH_OBJ);
$cnt22=1;
if($query22->rowCount() > 0)
{
foreach($results22 as $result22)
{            
	

										?>
										<?php if($result22->foto==null){}else{?>
										<img loading="lazy" id="foto" name="foto" class="materialboxed" autocomplete="off" src="<?php echo htmlentities($result22->foto);?>" width="100" height="100" required>
										
										<?php } ?>
										<?php $cnt22++;} }?>
									    </td>
                                           <td><?php echo htmlentities($result->documentos);?></td>
                                            <!--<td>
                                            <?php if($result->introduccion=='no'){?>
	                                         <a class="waves-effect waves-red btn-flat m-b-xs"><i class="material-icons">close</i></a>
                                             <?php }else{?>
                                            <a class="waves-effect waves-green btn-flat m-b-xs"><i class="material-icons">done</i></a>
                                            <?php } ?>
                                           </td>-->
                                           <td><?php echo htmlentities($result->introduccion);?></td>
                                            <td><?php echo htmlentities($result->aviso);?></td>
                                            <td><?php echo htmlentities($result->reglamento);?></td>
                                            <td><?php echo htmlentities($result->alta);?></td>
                                            <td><?php echo htmlentities($result->boleta);?></td>
                                            <td><?php echo htmlentities($result->huellas);?></td>
                                            <td><?php echo htmlentities($result->contrato);?></td>
                                            <td><?php echo htmlentities($result->credencial);?></td>
                                            <td><?php echo htmlentities($result->acuerdo);?></td>
                                  
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
    },6000);

});

</script> 
    </body>
</html>
<?php } ?>