<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('../includes/config.php');
$descripcion=$_POST['descripcion'];
$respuesta = $_POST['respuesta'];
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


$sql = "SELECT cantidad,descripcion from tblinventory where descripcion='$descripcion' and cantidad>0";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
foreach ($results as $result) {   
    $a=$result->cantidad;
    if($a>0){

        //MODIFICA LA CANTIDAD EN LA TABLA DE INVENTARIO
        $sql2 = "UPDATE tblinventory SET cantidad = (cantidad - :cantidad) where descripcion='$descripcion'";
        $query2 = $dbh->prepare($sql2);
        $query2->bindParam(':cantidad',$cantidad,PDO::PARAM_STR);
        $query2->execute();
        
        //INSERTA REGISTRO DE SALIDA DE PRODUCTO
        $sql3="INSERT INTO tblinventoryexit(folio,descripcion,respuesta,cantidad,fecha,serie,tecnico,comentario,tecnicoasig,empid,creatoruser,action) VALUES(:folio,:descripcion,:respuesta,:cantidad,:fecha,:serie,:tecnico,:comentario,:tecnicoasig,:empid,:creatoruser,:action)";
        $query3 = $dbh->prepare($sql3);
        $query3->bindParam(':folio',$folio,PDO::PARAM_STR);
        $query3->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
        $query3->bindParam(':respuesta',$respuesta,PDO::PARAM_STR);
        $query3->bindParam(':cantidad',$cantidad,PDO::PARAM_STR);  
        $query3->bindParam(':fecha',$fecha,PDO::PARAM_STR);
        $query3->bindParam(':serie',$serie,PDO::PARAM_STR);  
        $query3->bindParam(':tecnico',$tecnico,PDO::PARAM_STR);
        $query3->bindParam(':comentario',$comentario,PDO::PARAM_STR);
        $query3->bindParam(':tecnicoasig',$tecnicoasig,PDO::PARAM_STR);
        $query3->bindParam(':empid',$empid,PDO::PARAM_STR);
        $query3->bindParam(':creatoruser',$creatoruser,PDO::PARAM_STR);    
        $query3->bindParam(':action',$action,PDO::PARAM_STR);      
        $query3->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
            echo 'script> alert("EXITO"); </script>';
        }
        else 
        {
            echo '<script> alert("ERROR"); </script>';
        }



    }
    else{

        
        echo '<script> alert("ERROR"); </script>';


        
    }

 }
 }
 $query = null; // obligado para cerrar la conexión
 echo '<script> alert("ERROR"); </script>';

                                           


    ?>