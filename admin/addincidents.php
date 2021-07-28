<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
$date=$_POST['date'];

$time=$_POST['time'];

$service=$_POST['service'];

$technical=$_POST['technical'];

$issue=$_POST['issue'];

$reason=$_POST['reason'];

$art=$_POST['art'];

$productivity=$_POST['productivity'];    

    
$sql="INSERT INTO tblincidents(date,time,service,technical,issue,reason,art,productivity) VALUES(:date,:time,:service,:technical,:issue,:reason,:art,:productivity)";
$query = $dbh->prepare($sql);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':time',$time,PDO::PARAM_STR);
$query->bindParam(':service',$service,PDO::PARAM_STR);
$query->bindParam(':technical',$technical,PDO::PARAM_STR);
$query->bindParam(':issue',$issue,PDO::PARAM_STR);
$query->bindParam(':reason',$reason,PDO::PARAM_STR);    
$query->bindParam(':art',$art,PDO::PARAM_STR);    
$query->bindParam(':productivity',$productivity,PDO::PARAM_STR);    
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Incidencia creada con éxito";
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
        <title>Admin | Agregar Incidencia</title>
        
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
                        <div class="page-title">Agregar Incidencia</div>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class="card">
                            <div class="card-content">
                              
                                <div class="row">
                                    <form class="col s12"  method="post">
                                          <?php if($error){?><div class="errorWrap content"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap content"><strong>ÉXITO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<div class="row">
<label for="date">Fecha de incidencia</label><br>
<input id="date" name="date" type="date"  autocomplete="off" required>
</div>

<div class="input-field col s12">
<label for="time">Hora</label><br>
<input id="time" name="time" type="time"  autocomplete="off" required>
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
<label for="issue">No. de Incidencia</label>
<input type="number" id="issue" name="issue" min="1" max="3" required>

</div>

<div class="input-field col s12">
<label for="reason">Motivo</label>
<input id="reason" type="text"  class="validate" autocomplete="off" name="reason"  required>
</div>
                                            
<div class="input-field col  s12">
<!--<label for="homex1">El hogar donde habita es:</label><br><br>-->
<input type="radio" id="homex1p" name="art" value="bono" class="check" required/> <label for="homex1p">Bono</label>
<input type="radio" id="homex1r" name="art" value="retardo"   class="check" required/> <label for="homex1r">Retardo</label>
<input type="radio" id="homex1o" name="art" value="falta"   class="check" required/> <label for="homex1o">Falta</label>
</div>
                                          
<div class="input-field col s12">
<label for="productivity">Productividad</label>
<input id="productivity" type="text"  class="validate" autocomplete="off" name="productivity"  required>

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