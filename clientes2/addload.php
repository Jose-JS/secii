<?php
session_start();

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
//error_reporting(E_ALL);
 
// Motrar todos los errores de PHP
//ini_set('error_reporting', E_ALL);

include('includes/config.php');
if(strlen($_SESSION['user'])==0)
    {   
header('location:index.php');
}
else{
$eid=intval($_GET['empid']);    
$sql = "SELECT businessname,paymentcondition from  tblclientsadd where id=:eid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $resul)
{  
$cliente=$resul->businessname;
$paymentcondition=$resul->paymentcondition;    
}}
$fecha_actual = date("Y-m-d");
$fechlimit2=date("Y-m-d",strtotime($fecha_actual."+". "$paymentcondition"."days"));

if(isset($_POST['add']))
{
        
$idcliente=$eid;
$invoicenumber=$_POST["invoicenumber"];
$fech=$_POST["fech"];
$description=$_POST["description"];
$monto=$_POST["monto"];
$fechlimit=$_POST["fechlimit"];    
$movement=cargo;
$creatoruser=$_SESSION['user'];
$action=inserción;
    
$sql2="INSERT INTO tblmovements(idcliente,cliente,invoicenumber,fech,description,monto,fechlimit,movement,balance,creatoruser,action) VALUES(:idcliente,:cliente,:invoicenumber,:fech,:description,:monto,:fechlimit,:movement,:monto,:creatoruser,:action)";

    $query2 = $dbh->prepare($sql2);
    $query2->bindParam(':idcliente',$idcliente,PDO::PARAM_STR);
    $query2->bindParam(':cliente',$cliente,PDO::PARAM_STR);    
    $query2->bindParam(':invoicenumber',$invoicenumber,PDO::PARAM_STR);
    $query2->bindParam(':fech',$fech,PDO::PARAM_STR);
    $query2->bindParam(':description',$description,PDO::PARAM_STR);
    $query2->bindParam(':monto',$monto,PDO::PARAM_STR);
    $query2->bindParam(':fechlimit',$fechlimit,PDO::PARAM_STR);
    $query2->bindParam(':movement',$movement,PDO::PARAM_STR);
    $query2->bindParam(':monto',$monto,PDO::PARAM_STR);
    $query2->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);
    $query2->bindParam(':action',$action,PDO::PARAM_STR);
$query2->execute();
$lastInsertId = $dbh->lastInsertId();

$sql3="INSERT INTO tblfacture(idcliente,cliente,invoicenumber,fech,description,monto,fechlimit,movement,balance,creatoruser,action) VALUES(:idcliente,:cliente,:invoicenumber,:fech,:description,:monto,:fechlimit,:movement,:monto,:creatoruser,:action)";

    $query3 = $dbh->prepare($sql3);
    $query3->bindParam(':idcliente',$idcliente,PDO::PARAM_STR);
    $query3->bindParam(':cliente',$cliente,PDO::PARAM_STR);    
    $query3->bindParam(':invoicenumber',$invoicenumber,PDO::PARAM_STR);
    $query3->bindParam(':fech',$fech,PDO::PARAM_STR);
    $query3->bindParam(':description',$description,PDO::PARAM_STR);
    $query3->bindParam(':monto',$monto,PDO::PARAM_STR);
    $query3->bindParam(':fechlimit',$fechlimit,PDO::PARAM_STR);
    $query3->bindParam(':movement',$movement,PDO::PARAM_STR);
    $query3->bindParam(':monto',$monto,PDO::PARAM_STR);
    $query3->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);
    $query3->bindParam(':action',$action,PDO::PARAM_STR);
$query3->execute();
if($lastInsertId)
{

$msg="Registro de cargo, agregado con éxito";
    echo "<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>";
}
else 
{
$error="Algo salió mal. Inténtalo de nuevo";
}

}
    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Administración | Cargo de clientes</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />


    <style type="text/css">
        #AUTO fieldset {
            display: none
        }

        #AUTO fieldset:first-child {
            display: block;
        }
    </style>
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

        label:hover,
        label:hover~label {
            color: orange;
        }
    </style>

    <script type="text/javascript">
        function valid() {

            var txtinvoicenumber = document.getElementById('invoicenumber').value;
            var txtfech = document.getElementById('fech').value;
            var txtdescription = document.getElementById('description').value;
            var txtmonto = document.getElementById('monto').value;
            var txtfechlimit = document.getElementById('fechlimit').value;

            if (txtinvoicenumber == null || txtinvoicenumber == 0 || /^\s+$/.test(txtinvoicenumber)) {
                alert('[ERROR] Por favor ingrese Numero de factura');
                return false;
            } else if (txtdescription == null || txtdescription == 0 || /^\s+$/.test(txtdescription)) {
                alert('[ERROR] Por favor ingrese una Descripcion');
                return false;
            } else if (txtmonto == null || txtmonto == 0 || /^\s+$/.test(txtmonto)) {
                alert('[ERROR] Por favor ingrese un Monto');
                return false;
            } else if (!isNaN(txtfech)) {
                alert('ERROR: Debe elegir una fecha');
                return false;
            } else if (!isNaN(txtfechlimit)) {
                alert('ERROR: Debe elegir una fecha de limite');
                return false;
            }



            return true;
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".content").fadeOut(1500);
            }, 6000);

        });
    </script>
</head>

<body>
    <?php include('includes/header.php');?>

    <?php include('includes/sidebar.php');?>
    <main class="mn-inner">
        <div class="row">
            <div class="col s12">

            </div>
            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        
                        <div class="row">
                            <div class="row">

                                <div class="col s12 m12 l12">
                                    <div class="card">
                                        <div class="card-content">
                                            <form id="AUTO" method="post" name="addemp" enctype="multipart/form-data">
                                                <?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                                <div class="row">
                                                    <h5>Cargo de Cliente</h5>

                                                    <div class="input-field col s12">
                                                        <label for="invoicenumber">Numero de factura</label>
                                                        <br><input id="invoicenumber" name="invoicenumber" type="text" autocomplete="off" required>
                                                    </div>


                                                    <div class="input-field col s12">
                                                        <label for="fech">Fecha</label><br>
                                                        <input id="fech" name="fech" type="date" autocomplete="off">
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <label for="description">Descripción</label>
                                                        <input id="description" name="description" type="text" autocomplete="off" required>
                                                    </div>



                                                    <div class="input-field col s12">
                                                        <label for="monto">Monto</label>
                                                        <input id="monto" name="monto" type="text" autocomplete="off" required>
                                                    </div>

                                                    <div class="input-field col s12">
                                                        <label for="fechlimit">Fecha limite de pago</label><br>
                                                        <input id="fechlimit" name="fechlimit" type="date" value="<?php echo htmlentities($fechlimit2);?>" autocomplete="off">
                                                    </div>



                                                </div>

                                                <button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>

                                        </div>






                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
    </main>
    <div class="left-sidebar-hover"></div>

    <script>
        window.navigator = window.navigator || {};
        if (navigator.vibrate === undefined) {
            ['add'].forEach(function(elementId) {
                document.getElementById(elementId).setAttribute('disabled', 'disabled');
            });
        } else {
            document.getElementById('add').addEventListener('click', function() {
                navigator.vibrate([1000, 500, 1000, 500, 2000]);
            });
        }
    </script>
    <!-- Javascripts -->
    <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="../assets/js/alpha.min.js"></script>
    <script src="../assets/js/pages/form_elements.js"></script>

</body>

</html>
<?php } ?>