<?php
session_start();
error_reporting(0);
//error_reporting(E_ALL);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
$datetime=$_POST['datetime'];

$service=$_POST['service'];

$technical=substr($_POST['technical'],6);
   
$empid = substr($_POST['technical'],0,6); 
    
$cover=$_POST['cover'];

$reason=$_POST['reason'];

$turn=$_POST['turn'];

$namesup=$_POST['namesup'];    

    
$sql="INSERT INTO tbldoublets(datetime,empid,technical,service,cover,reason,turn,namesup) VALUES(:datetime,:empid,:technical,:service,:cover,:reason,:turn,:namesup)";
$query = $dbh->prepare($sql);
$query->bindParam(':datetime',$datetime,PDO::PARAM_STR);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->bindParam(':technical',$technical,PDO::PARAM_STR);
$query->bindParam(':service',$service,PDO::PARAM_STR);
$query->bindParam(':cover',$cover,PDO::PARAM_STR);
$query->bindParam(':reason',$reason,PDO::PARAM_STR);    
$query->bindParam(':turn',$turn,PDO::PARAM_STR);    
$query->bindParam(':namesup',$namesup,PDO::PARAM_STR);    
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Doblete creado con éxito";
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
        <title>Admin | Agregar Dobletes</title>
        
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
        
        <script type="text/javascript">
 function valid()
{

var txtservice = document.getElementById('service').selectedIndex;
var txttechnical =document.getElementById('technical').selectedIndex; 
var txtdate = document.getElementById('date').value;
var txttime = document.getElementById('time').value; 
var txtissue = document.getElementById('issue').value;    
var txtreason = document.getElementById('reason').value;
var txtproductivity = document.getElementById('productivity').value;     
var txtart = document.getElementById('art').value;
   
    
    
 
  if (txtservice == null || txtservice == 0 ) {
    // Si no se cumple la condicion...
    alert('[ERROR] Por favor seleccione un servicio');
    return false;
  }
  else if (txttechnical == null || txttechnical == 0) {
    // Si no se cumple la condicion...
    alert('[ERROR] Por favor seleccione un Técnico');
    return false;
  }
    else if(!isNaN(txtdate)){
      alert('ERROR: Debe elegir una fecha de registro');
      return false;
    }
    else if(!isNaN(txttime)){
      alert('ERROR: Debe elegir una hora de registro');
      return false;
    }
  else if (txtissue == null || txtissue == 0 || /^\s+$/.test(txtissue)) {
    // Si no se cumple la condicion...
    alert('[ERROR] Por favor ingrese un número de incidencia');
    return false;
  }    
  else if (txtreason == null || txtreason == 0 || /^\s+$/.test(txtreason)) {
    // Si no se cumple la condicion...
    alert('[ERROR] Por favor ingrese un motivo');
    return false;
  }
else if (txtart == null || txtart == 0 || /^\s+$/.test(txtart)) {
    // Si no se cumple la condicion...
    alert('[ERROR] Por favor seleccione un opción');
    return false;
  }    
  else if (txtproductivity == null || txtproductivity == 0) {
    // Si no se cumple la condicion...
    alert('[ERROR] Por favor ingrese productividad');
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
                        <div class="page-title">Agregar Doblete</div>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class="card">
                            <div class="card-content">
                              
                                <div class="row">
                                    <form class="col s12"  method="post">
                                          <?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<div class="row">
<label for="date">Fecha y Hora de doblete</label><br>
<input id="datetime" name="datetime" type="datetime-local"  autocomplete="off" required>
</div>

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
<select id="service" name="service" autocomplete="off" required>
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
<option value="<?php echo htmlentities($result->servicename);?>" required><?php echo htmlentities($result->servicename);?></option>
<?php }} ?>
</select>
 </div>
 

 
<div class="input-field col s12">
<label for="issue">Técnico cubre</label>
<input id="cover" type="text"  class="validate" autocomplete="off" name="cover"  required>
</div>

<div class="input-field col s12">
<label for="reason">Motivo</label>
<input id="reason" type="text"  class="validate" autocomplete="off" name="reason"  required>
</div>
                                            
<div class="input-field col s12"> 
<select id="turn" name="turn" autocomplete="off" required>
<option value="">Turno</option>
<option value="24X24">24X24</option>
<option value="12X12">12X12</option>
</select>
 </div>
                                          
<div class="input-field col s12">
<label for="productivity">Nombre de Supervisor</label>
<input id="namesup" type="text"  class="validate" autocomplete="off" name="namesup"  required>

</div>                                          
                                           
                                            

<div class="input-field col s12">
<button type="submit" name="add" onclick="return valid();" class="waves-effect waves-light btn indigo m-b-xs">AÑADIR</button>

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