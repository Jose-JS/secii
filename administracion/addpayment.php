<?php
session_start();
error_reporting(0);
//error_reporting(E_ALL);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
$id=$_GET['empid'];     
if(isset($_POST['add']))
{
$idcliente=$_POST['idcliente'];
$cliente=$_POST['cliente'];
$fech=$_POST['fech'];
$invoicenumber=$_POST['invoicenumber'];
$monto=$_POST['monto'];
$cargo=$_POST['cargo'];
$balance=$cargo-$monto;    
$namecomp=$_POST['namecomp'];
$movement='abono';    
$fecha  = date("dmy");
$no_aleatorio  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta = '../administracion/Comprobantes/'.$fecha.$no_aleatorio.$_FILES['foto']['name'];//foto medio cuerpo
opendir($ruta);
copy($_FILES['foto']['tmp_name'],$ruta);
$nombre=$ruta;
$creatoruser=$_SESSION['alogin'];
$action='inserción';    
$action2='modificación';        
 
$sql2="INSERT INTO tblmovements(idcliente,cliente,invoicenumber,fech,monto,movement,namecomp,document,balance,creatoruser,action) VALUES(:idcliente,:cliente,:invoicenumber,:fech,:monto,:movement,:namecomp,:nombre,:balance,:creatoruser,:action)";

    $query2 = $dbh->prepare($sql2);
    $query2->bindParam(':idcliente',$idcliente,PDO::PARAM_STR);
    $query2->bindParam(':cliente',$cliente,PDO::PARAM_STR);    
    $query2->bindParam(':invoicenumber',$invoicenumber,PDO::PARAM_STR);
    $query2->bindParam(':fech',$fech,PDO::PARAM_STR);
    $query2->bindParam(':monto',$monto,PDO::PARAM_STR);
    $query2->bindParam(':movement',$movement,PDO::PARAM_STR);
    $query2->bindParam(':namecomp',$namecomp,PDO::PARAM_STR);
    $query2->bindParam(':nombre',$nombre,PDO::PARAM_STR);
    $query2->bindParam(':balance',$balance,PDO::PARAM_STR);
    $query2->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);
    $query2->bindParam(':action',$action,PDO::PARAM_STR);
$query2->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
    
$sql="UPDATE tblfacture SET balance=balance-:monto,creatoruser=:creatoruser,action=:action WHERE idcliente=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR); 
$query->bindParam(':monto',$monto,PDO::PARAM_STR);     
$query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);     
$query->bindParam(':action',$action,PDO::PARAM_STR);     
$query->execute();    
$msg="Registro de Abono, agregado con éxito";
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
    <title>Administración | Abono</title>

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
        <script type="text/javascript">
        function valid() {

            
            var txtfech = document.getElementById('fech').value;
            var txtnamecomp = document.getElementById('namecomp').value;
            var txtmonto = document.getElementById('monto').value;
            var txtFoto = document.getElementById('foto').value;
            

            if (!isNaN(txtfech)) {
                alert('ERROR: Debe elegir una fecha');
                return false;
            } else if (txtmonto == null || txtmonto == 0 || /^\s+$/.test(txtmonto)) {
                alert('[ERROR] Por favor ingrese un Abono');
                return false;
            }
            
             else if (txtdescription == null || txtdescription == 0 || /^\s+$/.test(txtdescription)) {
                alert('[ERROR] Por favor ingrese un tipo de comprobante');
                return false;
            } else if (!isNaN(txtfechlimit)) {
                alert('ERROR: Debe elegir una fecha de limite');
                return false;
            } else if (txtFoto == null || txtFoto == 0) {
                // Si no se cumple la condicion...
                alert('[ERROR] Por favor seleccione una foto de medio cuerpo');
                return false;
            }



            return true;
        }
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
 <span class="card-title">Agregar Abono</span>
                        <div class="row">
                            <?php 
$eid=intval($_GET['empid']);
$sql = "SELECT * from  tblfacture where idcliente=:eid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $resul)
{           // var_dump($resul); //Se obtienen los resultados de todas las variables
                    ?>
                            <form class="col s12"  method="post" name="add" enctype="multipart/form-data">
                                <?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="fech">Fecha</label><br>
                                        <input id="fech" name="fech" type="date" autocomplete="off"required>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="invoicenumber" type="text" value="<?php echo htmlentities($resul->invoicenumber);?>" name="invoicenumber" readonly="readonly" autocomplete="off" required>
                                        <label for="invoicenumber">Número de Factura</label>
                                    </div>


                                    <div class="input-field col s12">
                                        <input id="cargo" type="text" value="<?php echo htmlentities($resul->balance);?>" autocomplete="off" name="cargo"  readonly="readonly" >
                                        <label for="monto">Cargo</label>
                                    </div>
                                    
                                    
                                    <div class="input-field col s12">
                                        <input id="monto" type="text" class="validate" autocomplete="off" name="monto"  required>
                                        <label for="monto">Abono</label>
                                    </div>
                                    
                                    <div class="input-field col s12">
                                        <input id="idcliente" type="hidden" value="<?php echo htmlentities($resul->idcliente);?>" class="validate" autocomplete="off" name="idcliente" required>
                                    </div>
                                    
                                    
                                    <div class="input-field col s12">
                                        <input id="cliente" type="hidden" value="<?php echo htmlentities($resul->cliente);?>" class="validate" autocomplete="off" name="cliente" required>
                                    </div>
                                    
                                    
                                    <div class="input-field col s12">
                                        <input id="namecomp" type="text" class="validate" autocomplete="off" name="namecomp" required>
                                        <label for="namecomp">Tipo de comprobante</label>
                                    </div>


                                    <div class="input-field col m6 s12">
                                        <label for="foto">Comprobante</label><br><br>
                                        <input id="foto" name="foto" type="file" maxlength="30" autocomplete="off" required>
                                    </div>

                                    <?php } }?>
                                    <div class="input-field col s12">
                                        <button type="submit" name="add" class="waves-effect waves-light btn indigo m-b-xs">Guardar</button>

                                    </div>

                                </div>

                            </form>
                        </div>
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