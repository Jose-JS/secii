<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('../includes/config.php');
$folio=$_POST['folio'];
$fecha=$_POST['fecha'];
$tecnico=substr($_POST['technical'],6);   
$empid = substr($_POST['technical'],0,6);
$creatoruser=$_SESSION['recursos'];
$action='inserción';

        
        //INSERTA REGISTRO DE FOLIO
        $sql3="INSERT INTO tblinventoryfol(folio,empid,tecnico,fecha,creatoruser,action) VALUES(:folio,:empid,:tecnico,:fecha,:creatoruser,:action)";
        $query3 = $dbh->prepare($sql3);
        $query3->bindParam(':folio',$folio,PDO::PARAM_STR);
        $query3->bindParam(':tecnico',$tecnico,PDO::PARAM_STR);
        $query3->bindParam(':empid',$empid,PDO::PARAM_STR);
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






 $query = null; // obligado para cerrar la conexión


                                           


    ?>