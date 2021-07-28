<?php
session_start();
include('../includes/config.php');
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
$fotos=$_POST['foto'];
var_dump($fotos);    
$fecha  = date("dmy");
$no_aleatorio  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta = '../ImagenesClientes/'.$fecha.$no_aleatorio.$_FILES['foto']['name'];//foto perfil
    echo"$ruta";
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
//$msg="Registro de Técnico, agregado con éxito";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";    
}
else 
{
//$error="Algo salió mal. Inténtalo de nuevo";
echo "<script>alert('Ocurrio un error intentelo de nuevo');</script>";    

}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>S I M | Registro</title>

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
    <!--<link rel="Shortcut Icon" href="../../sim/assets/images/favicon.ico" type="image/x-icon" />-->
    <script type="text/javascript">
        function services() {
            var d = document.getElementById("service");
            var displaytext = d.options[d.selectedIndex].text;
            document.getElementById("txtvalue").value = displaytext;
            for (i = 0; i < displaytext; i++) {
                document.f1.provincia.options[i].value = displaytext[i]

            }


        }
    </script>
</head>

<body class="signin-page">

    <div class="mn-content valign-wrapper">

        <main class="mn-inner container">
            <h4 align="center"><a href="../index.php" bgcolor="white">Registro</a></h4>
            <div class="valign">
                <div class="row">

                    <div class="col s12 m6 l4 offset-l4 offset-m3">
                        <div class="card white darken-1">
                            <div class="card-content ">
                                <span class="card-title">INGRESA TUS DATOS</span>
                                <div class="row">
                                    <form class="col s12" name="signin" method="post" enctype="multipart/form-data">
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
                                        <div class="input-field col s12">
                                            <input id="txtvalue" type="text" class="validate" name="txtvalue" autocomplete="off" required>
                                            <label for="password">Contraseña</label>
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
    </div>

    <!-- Javascripts -->
    <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
    <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
    <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
    <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="../assets/js/alpha.min.js"></script>

</body>

</html>