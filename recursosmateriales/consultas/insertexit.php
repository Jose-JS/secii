<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('../includes/config.php');
$descripcion=$_POST['descripcion'];
$talla=$_POST['talla'];
$condicion = $_POST['condicion'];
$cantidad=$_POST['cantidad'];
$fecha=$_POST['fecha'];
$serie=$_POST['serie'];
$tecnico=$_POST['technical'];
$folio=$_POST['folio'];
$comentario=$_POST['comentario'];
$tecnicoasig=substr($_POST['tecnicoasig'],6);   
$empid = substr($_POST['tecnicoasig'],0,6); 



//$tesi=substr($_POST['technical'],6);   
//$empid = substr($_POST['technical'],0,6);
$creatoruser=$_SESSION['recursos'];
$action='inserción';


$sql = "SELECT cantidad,descripcion,talla,id_responsiva from tblinventory where descripcion='$descripcion' and talla='$talla' and cantidad>0";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
foreach ($results as $result) {   
    $a=$result->cantidad;
    $responsiva=$result->id_responsiva;
    
}
if($a>0){

    //MODIFICA LA CANTIDAD EN LA TABLA DE INVENTARIO
    $sql2 = "UPDATE tblinventory SET cantidad = (cantidad - :cantidad) where descripcion='$descripcion' and talla='$talla'";
    $query2 = $dbh->prepare($sql2);
    $query2->bindParam(':cantidad',$cantidad,PDO::PARAM_STR);
    if ($query2->execute() == true) {
    //$query2->execute();
    
    //INSERTA REGISTRO DE SALIDA DE PRODUCTO
    $sql3="INSERT INTO tblinventoryexit(folio,descripcion,condicion,cantidad,fecha,serie,tecnico,comentario,tecnicoasig,empid,creatoruser,action,talla,id_responsiva) VALUES(:folio,:descripcion,:condicion,:cantidad,:fecha,:serie,:tecnico,:comentario,:tecnicoasig,:empid,:creatoruser,:action,:talla,'$responsiva')";
    $query3 = $dbh->prepare($sql3);
    $query3->bindParam(':folio',$folio,PDO::PARAM_STR);
    $query3->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
    $query3->bindParam(':condicion',$condicion,PDO::PARAM_STR);
    $query3->bindParam(':cantidad',$cantidad,PDO::PARAM_STR);  
    $query3->bindParam(':fecha',$fecha,PDO::PARAM_STR);
    $query3->bindParam(':serie',$serie,PDO::PARAM_STR);  
    $query3->bindParam(':tecnico',$tecnico,PDO::PARAM_STR);
    $query3->bindParam(':comentario',$comentario,PDO::PARAM_STR);
    $query3->bindParam(':tecnicoasig',$tecnicoasig,PDO::PARAM_STR);
    $query3->bindParam(':empid',$empid,PDO::PARAM_STR);
    $query3->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);    
    $query3->bindParam(':action',$action,PDO::PARAM_STR); 
    $query3->bindParam(':talla',$talla,PDO::PARAM_STR);      
    if ($query3->execute() == true) {
        $response_array['status'] = 'success';
    } else {
        $response_array['status'] = 'error';
    
    }
    $response_array['status'] = 'success';
    echo json_encode($response_array);
} else {
    $response_array['status'] = 'error';
}
}
}
$query = null; // obligado para cerrar la conexión
$query2 = null; // obligado para cerrar la conexión
 $query3 = null; // obligado para cerrar la conexión
?>