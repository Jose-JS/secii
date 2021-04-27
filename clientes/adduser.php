<?php
session_start();
error_reporting(0);

include('includes/config.php');
if(strlen($_SESSION['cliente'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
$empid=$_POST['empid'];    

$name=$_POST['name'];

$firstname=$_POST['firstname'];

$lastname=$_POST['lastname'];

$user=$_POST['user'];

$password=$_POST['password'];


$fecha2  = date("dmy");    
$no_aleatorio2  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios     
$ruta2 ='../Perfil/'.$fecha2.$no_aleatorio2.$_FILES['image']['name'];//Acta de nacimiento
opendir($ruta2);
move_uploaded_file($_FILES['image']['tmp_name'],"$ruta2");
$nombre2=$ruta2; 
    
$kind=$_POST['kind'];
  
    
$sql="INSERT INTO tblusers(empid,name,firstname,lastname,user,password,image,kind) VALUES(:empid,:name,:firstname,:lastname,:user,:password,:nombre2,:kind)";
$query = $dbh->prepare($sql);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
$query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
$query->bindParam(':user',$user,PDO::PARAM_STR);    
$query->bindParam(':password',$password,PDO::PARAM_STR);    
$query->bindParam(':nombre2',$nombre2,PDO::PARAM_STR);    
$query->bindParam(':kind',$kind,PDO::PARAM_STR);    
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Usuario creado con éxito";
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
        <title>Admin | Agregar Usuario</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
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
                        <div class="page-title">Agregar Usuario</div>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class="card">
                            <div class="card-content">
                              
                                <div class="row">
                                    <form class="col s12"  method="post" name="addemp" enctype="multipart/form-data">
                                          <?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                        <div class="row">
                                           
                                              <div class="input-field col s12">
<input id="empid" type="text"  class="validate" autocomplete="off" name="empid" maxlength="6" required>
                                                <label for="name">Matrícula</label>
                                            </div>
                                             <div class="input-field col s12">
<input id="kind" type="text"  class="validate" autocomplete="off" name="kind"  required>
                                                <label for="name">Tipo</label>
                                            </div>
                                           
                                           
                                            <div class="input-field col s12">
<input id="name" type="text"  class="validate" autocomplete="off" name="name"  required>
                                                <label for="name">Nombre</label>
                                            </div>


          <div class="input-field col s12">
<input id="firstname" type="text"  class="validate" autocomplete="off" name="firstname"  required>
                                                <label for="firstname">Apellido Paterno</label>
                                            </div>
  <div class="input-field col s12">
 <input id="lastname" type="text" name="lastname" class="validate" autocomplete="off" required>
                                                <label for="lastname">Apellido Materno</label>
                                            </div>
                                            
                                              <div class="input-field col s12">
 <input id="user" type="text" name="user" class="validate" autocomplete="off" required>
                                                <label for="user">Usuario</label>
                                            </div>
                                            
                                              <div class="input-field col s12">
 <input id="password" type="text" name="password" class="validate" autocomplete="off" required>
                                                <label for="password">Contraseña</label>
                                            </div>
                                            
                                              <div class="input-field col s12">
<label for="imagen">Imagen</label><br><br>
<input id="image" name="image" type="file"  autocomplete="off" required> 
                                            </div>
                                            




<div class="input-field col s12">
<button type="submit" name="add" class="waves-effect waves-light btn indigo m-b-xs">AÑADIR</button>

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
        <script src="../assets/js/pages/form_elements.js"></script>
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