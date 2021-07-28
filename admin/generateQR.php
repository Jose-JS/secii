<?php
session_start();
require ('../phpqrcode/qrlib.php');
error_reporting(0);
//error_reporting(E_ALL);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
// Si se presiona el boton generar, da la condicion como true.
if(isset($_POST['generar']))
{
$technical=$_POST['technical'];
$assignedservice=$_POST['assignedservice'];    
$niv=$_POST['niv'];    
$tam=$_POST['tam'];        
$dir = '../codigosQR/';
$fecha12  = date("dmy");     
$no_aleatorio12  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
//variables 
$tam =5; //tamaño de la imagen qr
$niv ='L';//nivel de seguridad
$filename = $dir.$fecha12.$no_aleatorio12.'.png'; //archivo qr donde se guardara
$frameSize = 3; // marco
//clase Qr:: funcion png
$porciones = substr($technical,0,6);

$creationqr=1;    
$creatoruser=$_SESSION['alogin'];
$action='modificación';    

$sql = "SELECT addressqr FROM tblemployees WHERE EmpId=:porciones";
$query = $dbh -> prepare($sql);
$query -> bindParam(':porciones',$porciones, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{     
unlink($result->addressqr);    
}}
$sql="update tblemployees set addressqr=:filename,creationqr=:creationqr,creatoruser=:creatoruser,action=:action where EmpId=:porciones";
$query = $dbh->prepare($sql);
$query->bindParam(':filename',$filename,PDO::PARAM_STR);
$query->bindParam(':creationqr',$creationqr,PDO::PARAM_STR);
$query->bindParam(':porciones',$porciones,PDO::PARAM_STR);
$query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);
$query->bindParam(':action',$action,PDO::PARAM_STR);    
$query->execute(); 
$msg="Código QR creado con éxito";    
QRcode::png($technical.' '.$assignedservice,$filename,$niv,$tam, $frameSize);
echo "<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>";    
//echo '<img src="'.$filename.'" align="left" />';
 }
  
    ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Admin | Generar Código QR </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
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
                <div class="page-title">Generar Código QR</div>
            </div>
            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">

                        <div class="row">
                            <form class="col s12" name="chngpwd" method="post">
                                <?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                <div class="row">
                                   
                                    <div class="input-field col s12">
                                        <select id="technical" name="technical" autocomplete="off" required>
                                            <option value="">Técnico</option>
                                            <?php $sql = "SELECT EmpId,name,firstname,lastname from tblemployees";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
                                            <option value="<?php echo htmlentities($result->EmpId);?>&nbsp;<?php echo htmlentities($result->name);?>&nbsp;<?php echo htmlentities($result->firstname);?>&nbsp;<?php echo htmlentities($result->lastname);?>" required><?php echo htmlentities($result->EmpId);?>&nbsp;<?php echo htmlentities($result->name);?>&nbsp;<?php echo htmlentities($result->firstname);?>&nbsp;<?php echo htmlentities($result->lastname);?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>


                                    <div class="input-field col s12">
                                        <select id="assignedservice" name="assignedservice" autocomplete="off" required>
                                            <option value="">Servicio Asignado</option>
                                            <?php $sql = "SELECT servicename from tblserviceassigned";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
                                            <option value="<?php echo htmlentities($result->servicename);?>"><?php echo htmlentities($result->servicename);?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                    <div class="input-field col s12">
                                        <button type="submit" name="generar" class="waves-effect waves-light btn indigo m-b-xs">GENERAR</button>

                                    </div>
                                </div>
                            </form>
                        </div>
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
    <script src="../assets/js/alpha.min.js"></script>
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