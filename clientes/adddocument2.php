<?php
session_start();
error_reporting(0);
//ini_set('error_reporting', E_ALL);
include('includes/config.php');
if(strlen($_SESSION['cliente'])==0)
    {   
header('location:index.php');
}
else{
   
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Admin | Administrar Documentos</title>

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
                <div class="page-title">Administrar Documentos</div>
            </div>

            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Documentos</span>
                        <label for="foto2">SI EL ARCHIVO APARECE COMO ERRONEO, PODRIA TRATARSE DE UN ARCHIVO PDF,EXCEL U OTRA EXTENSION<font color="red">*</font></label>
                        <table id="example" class="display responsive nowrap" width="100%">
                           <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>DOCUMENTO</th>
                                    <th></th>
                   
                                  
                                </tr>
                            </thead>
                                <tbody>
                              <?php 

$sql = "SELECT * from  tbldocument where idemp='" . $_GET["empid"] . "'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>    
                    
                                    
                        
                        
                                <tr>
                       
                                    <td> <?php echo htmlentities($cnt);?></td>
                                    <td><?php echo htmlentities($result->name);?></td>
                                      <td><a name="add_document" href="<?php echo htmlentities($result->namedoc);?>" title="Mostrar" target="_blank"> <img src="<?php echo htmlentities($result->namedoc);?>"width="100" height="120"/></a></td>
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

</body>

</html>
<?php  }?>