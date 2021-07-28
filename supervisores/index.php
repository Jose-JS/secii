<?php
session_start();
include('../includes/config.php');
if(isset($_POST['signin']))
{
$uname=$_POST['username'];
$password=$_POST['password'];
$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];    
$sql ="SELECT user,password,id FROM tblusers WHERE user=:uname and password=:password and (kind='supervisor' OR kind='admin' OR kind='monitorista1') and status=1";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
 foreach ($results as $result) {
    $_SESSION['eid']=$result->id;
  }    
    
$_SESSION['supervisor']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} 
else{
  
  echo "<script>alert('Contraseña y/o Usuario Invalido');</script>";

}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>S E C I I | Supervisores</title>

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
    <link rel="stylesheet" href="../assets/plugins/particles/css/style.css">
    <!--<link rel="Shortcut Icon" href="../../sim/assets/images/favicon.ico" type="image/x-icon" />-->
</head>

<body class="signin-page">
    <div id="particles-js"></div>

    <div class="mn-content valign-wrapper">

        <main class="mn-inner container">
            <h4 align="center"><a href="../index.php" bgcolor="white">Supervisor</a></h4>
            <div class="valign">
                <div class="row">

                    <div class="col s12 m6 l4 offset-l4 offset-m3">
                        <div class="card white darken-1">
                            <div class="card-content ">
                                <span class="card-title">INICIAR SESION</span>
                                <div class="row">
                                    <form class="col s12" name="signin" method="post">
                                        <div class="input-field col s12">
                                            <input id="username" type="text" name="username" class="validate" autocomplete="off" required>
                                            <label for="email">Nombre de usuario</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input id="password" type="password" class="validate" name="password" autocomplete="off" required>
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
    <!--    particulas   -->
    <script src="../assets/plugins/particles/js/particles.js"></script>
    <script src="../assets/plugins/particles/js/lib/stats.js"></script>
    <script src="../assets/plugins/particles/js/app.js"></script>

</body>

</html>
