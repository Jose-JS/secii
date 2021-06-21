<?php
session_start();
error_reporting(0);
//error_reporting(E_ALL);

include('includes/config.php');
if(strlen($_SESSION['recursos'])==0)
    {   
header('location:index.php');
}
else{


//agregar boleta de baja	
if(isset($_POST['add']))
{
$id=$_GET['id']	;
$idemp=$_GET['idemp'];	
$ultimodia=$_POST['ultimodia'];
$fechabaja=$_POST['fechabaja'];
$motivo=$_POST['motivo'];
$ultimosueldo=$_POST['ultimosueldo'];	
$vacaciones=$_POST['vacaciones'];		
$finiquito=$_POST['finiquito'];			
$observaciones=$_POST['observaciones'];
$creatoruser=$_SESSION['recursos'];
$action='inserción';     
$sql="INSERT INTO tblboletbaja(idempleado,idmatricula,ultimodia,fechabaja,motivo,observaciones,creatoruser,action,ultimosueldo,vacaciones,finiquito) VALUES(:id,:idemp,:ultimodia,:fechabaja,:motivo,:observaciones,:creatoruser,:action,:ultimosueldo,:vacaciones,:finiquito)";
$query = $dbh->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->bindParam(':idemp',$idemp,PDO::PARAM_STR);	
$query->bindParam(':ultimodia',$ultimodia,PDO::PARAM_STR);
$query->bindParam(':fechabaja',$fechabaja,PDO::PARAM_STR);
$query->bindParam(':motivo',$motivo,PDO::PARAM_STR);
$query->bindParam(':ultimosueldo',$ultimosueldo,PDO::PARAM_STR);	
$query->bindParam(':vacaciones',$vacaciones,PDO::PARAM_STR);		
$query->bindParam(':finiquito',$finiquito,PDO::PARAM_STR);			
$query->bindParam(':observaciones',$observaciones,PDO::PARAM_STR);  
$query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);    
$query->bindParam(':action',$action,PDO::PARAM_STR);      
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Boleta de baja creada con éxito";

// codigo para inactivar Técnico    	
$id=$_GET['id'];
$status=0;
$sql = "update tblemployees set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:manageemployee.php');	
	
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
    <title>Recursos Humanos | Boleta de baja</title>

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



        #map {
            width: 60%;
            height: 50%;
            margin: 0 0 20px 0;
        }
    </style>
</head>

<body>
    <?php include('includes/header.php');?>

    <?php include('includes/sidebar.php');?>

    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Boleta de baja</div>
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
                                       <label for="fechabaja">Fecha de Baja</label><br>
                                        <input id="fechabaja" type="date" name="fechabaja" class="validate" autocomplete="off" required>
                                        
                                    </div>
                                   
                                    <div class="input-field col s12">
                                       <label for="ultimodia">Ultimo día laborado</label><br>
                                        <input id="ultimodia" type="date" name="ultimodia" class="validate" autocomplete="off" required>
                                        
                                    </div>
                                    
                                    


                                    <div class="input-field col s12">
                                        <input id="motivo" type="text" class="validate" autocomplete="off" name="motivo" required>
                                        <label for="motivo">Motivo de baja</label>
                                    </div>
                                    
                                    

                                    <div class="input-field col s12">
                                        <input id="ultimosueldo" type="text" class="validate" autocomplete="off" name="ultimosueldo" required>
                                        <label for="ultimosueldo">Ultimo Sueldo Percibido</label>
                                    </div>
                                    
                                    <div class="input-field col s12">
                                        <input id="finiquito" type="text" class="validate" autocomplete="off" name="finiquito" required>
                                        <label for="finiquito">Solicitud de finiquito</label>
                                    </div>
                                    
                                    
                                    
                                    <div class="input-field col s12">
                                        <input id="vacaciones" type="text" class="validate" autocomplete="off" name="vacaciones" required>
                                        <label for="ultimosueldo">Vacaciones Pendientes</label>
                                    </div>
                                    
                                    <div class="input-field col s12">
                                        <input id="observaciones" type="text" class="validate" autocomplete="off" name="observaciones" required>
                                        <label for="observaciones">Observaciones</label>
                                    </div>


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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcL6t1TsFCjirxTvGrYv7zv-OrUH-GMGg&callback=initMap"></script>
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