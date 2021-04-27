<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['signin']))
{
$name=$_POST['name'];
$firstname=$_POST['firstname'];
    
if (isset($_POST['signin'])) {
    if (($_POST['service'])) {
        $selected = '';
        $num_countries = count($_POST['service']);
        $current = 0;
        foreach ($_POST['service'] as $key => $value) {
            if ($current != $num_countries-1)
                $selected .= $value.', ';
            else
                $selected .= $value.'.';
            $current++;
        }
    }
}   
$lastname=$_POST['lastname'];
$user=$_POST['user'];
$password=md5($_POST['password']); 
$status=1;
//$fotos=$_POST['foto'];
$fecha  = date("dmy");
$no_aleatorio  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta = '../ImagenesClientes/'.$fecha.$no_aleatorio.$_FILES['foto']['name'];//foto perfil
opendir($ruta);
copy($_FILES['foto']['tmp_name'],$ruta);
$nombre=$ruta;
 

$sql="INSERT INTO tblclients(name,firstname,lastname,user,password,service,status,image) VALUES(:name,:firstname,:lastname,:user,:password,:selected,:status,:nombre)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':firstname',$firstname,PDO::PARAM_STR);    
$query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
$query->bindParam(':user',$user,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':selected',$selected,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':nombre',$nombre,PDO::PARAM_STR);
$query->execute();
    
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Registro de Técnico, agregado con éxito";
//echo "<script type='text/javascript'> document.location = 'index.php'; </script>";    
}
else 
{
$error="Algo salió mal. Inténtalo de nuevo";
//echo "<script>alert('Ocurrio un error intentelo de nuevo');</script>";    

}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>Recursos Humanos | Agregar cliente</title>

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
            <div class="valign">
                <div class="row">
<div class="col s12">
                        <div class="page-title">Agregar Cuenta de Cliente</div>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class="card">
                            <div class="card-content ">
                                <span class="card-title">INGRESA TUS DATOS</span>
                                <div class="row">
                                    <form class="col s12" name="signin" method="post" enctype="multipart/form-data">
                                                         <?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                        <div class="input-field col s12">
                                            <input id="name" type="text" name="name" class="validate" autocomplete="off" required>
                                            <label for="email">Nombre</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input id="firstname" type="text" class="validate" name="firstname" autocomplete="off" required>
                                            <label for="password">Apellido Paterno</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input id="lastname" type="text" class="validate" name="lastname" autocomplete="off" required>
                                            <label for="password">Apellido Materno</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <label for="foto">Imagen</label><br><br>
                                            <input id="foto" name="foto" type="file" maxlength="30" autocomplete="off" required>
                                        </div>
                                        <div class="input-field col s12">
                                            <input id="user" type="text" class="validate" name="user" autocomplete="off" required>
                                            <label for="password">Usuario</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input id="password" type="password" class="validate" name="password" autocomplete="off" required>
                                            <label for="password">Contraseña</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <select id="service" name="service[]" tabindex="3" onchange="services();" autocomplete="off" multiple>
                                                <option value="">Servicio</option>
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
                                        <div class="col s12 right-align m-t-sm">

                                            <input type="submit" name="signin" value="Iniciar" class="waves-effect waves-light btn teal">
                                        </div>
                                    </form>
                                </div>
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
<?php  ?>