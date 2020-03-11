<?php 
require_once("includes/config.php");
// code for empid availablity
if(!empty($_POST["empcode"])) {
	$empid=$_POST["empcode"];
	
$sql ="SELECT EmpId FROM tblemployees WHERE EmpId=:empid";
$query= $dbh->prepare($sql);
$query-> bindParam(':empid',$empid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
echo "<span style='color:red'class='content6'> La identificación del empleado ya existe .</span>";
 echo "<script>$('#add').prop('disabled',true);</script>";
    echo"<script type='text/javascript'>
$(document).ready(function() {
    setTimeout(function() {
        $('.content6').fadeOut(1500);
    },3000);

});</script>";
} else{
	
echo "<span style='color:green' class='content'> Identificación del empleado disponible para el registro .</span>";
echo "<script>$('#add').prop('disabled',false);</script>";
echo"<script type='text/javascript'>
$(document).ready(function() {
    setTimeout(function() {
        $('.content').fadeOut(1500);
    },3000);

});</script>";    
    
    
    
}
}

// code for emailid availablity
if(!empty($_POST["emailid"])) {
$empid= $_POST["emailid"];
$sql ="SELECT EmailId FROM tblemployees WHERE EmailId=:emailid";
$query= $dbh -> prepare($sql);
$query-> bindParam(':emailid',$empid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo "<span style='color:red'class='content2'> La identificación del correo electrónico ya existe.</span>";
 echo "<script>$('#add').prop('disabled',true);</script>";
    echo "<script>$('#add').prop('disabled',false);</script>";
    echo"<script type='text/javascript'>
$(document).ready(function() {
    setTimeout(function() {
        $('.content2').fadeOut(1500);
    },3000);

});</script>"; 
} else{
	
echo "<span style='color:green' class='content3'> Identificación de correo electrónico disponible para registro .</span>";
echo "<script>$('#add').prop('disabled',false);</script>";
    echo"<script type='text/javascript'>
$(document).ready(function() {
    setTimeout(function() {
        $('.content3').fadeOut(1500);
    },3000);

});</script>"; 
}
}




?>
