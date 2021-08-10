<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('../includes/config.php');
$folio=$_POST['folio'];
$talla=$_POST['talla'];
$descripcion=$_POST['descripcion'];
$condicion=$_POST['estado'];
$cantidad=$_POST['cantidad'];
$fecha=$_POST['fecha'];

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
        $sql3="INSERT INTO tblinventoryexit(folio,descripcion,talla,condicion,cantidad,fecha,creatoruser,action) VALUES(:folio,:descripcion,:talla,:condicion,:cantidad,:fecha,:creatoruser,:action)";
        $query3 = $dbh->prepare($sql3);
        $query3->bindParam(':folio',$folio,PDO::PARAM_STR);
        $query3->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
        $query3->bindParam(':talla',$talla,PDO::PARAM_STR);
        $query3->bindParam(':condicion',$condicion,PDO::PARAM_STR);    
        $query3->bindParam(':cantidad',$cantidad,PDO::PARAM_STR);  
        $query3->bindParam(':fecha',$fecha,PDO::PARAM_STR);  
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