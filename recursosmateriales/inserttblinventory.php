<?php
session_start();
//error_reporting(0);
include('../includes/config.php');
$talla=$_POST['talla'];
$descripcion=$_POST['descripcion'];
$condicion=$_POST['estado'];
$cantidad=$_POST['cantidad'];
$fecha=$_POST['fecha'];
$creatoruser=$_SESSION['recursos'];
$action='inserción';     
$sql="INSERT INTO tblinventory(descripcion,talla,condicion,cantidad,fecha,creatoruser,action) VALUES(:descripcion,:talla,:condicion,:cantidad,:fecha,:creatoruser,:action)";
$query = $dbh->prepare($sql);
$query->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
$query->bindParam(':talla',$talla,PDO::PARAM_STR);
$query->bindParam(':condicion',$condicion,PDO::PARAM_STR);    
$query->bindParam(':cantidad',$cantidad,PDO::PARAM_STR);  
$query->bindParam(':fecha',$fecha,PDO::PARAM_STR);  
$query->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);    
$query->bindParam(':action',$action,PDO::PARAM_STR);      
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
    echo 'script> alert("EXITO"); </script>';
}
else 
{
    echo '<script> alert("ERROR"); </script>';
}
