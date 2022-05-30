<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('../includes/config.php');
$folio=$_POST['folio'];
$fecha=$_POST['fecha'];

$img1 = $_POST['base641'];
$img1 = str_replace('data:image/png;base64,', '', $img1);
$fileData1 = base64_decode($img1);
$fileName1 = uniqid().'.png';
$fecha1  = date("dmy");
$no_aleatorio1  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta1 = '../supervisores/firmas/'.$fecha1.$no_aleatorio1.$fileName1;//foto medio cuerpo
opendir($ruta1);
//copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
$contractresponsable=$ruta1;    
file_put_contents($ruta1, $fileData1);

$img = $_POST['base64'];
$img = str_replace('data:image/png;base64,', '', $img);
$fileData = base64_decode($img);
$fileName = uniqid().'.png';
$fecha  = date("dmy");
$no_aleatorio  = rand(0,100)* rand(0,100); //Generamos dos Digitos aleatorios        
$ruta1 = '../supervisores/firmas/'.$fecha.$no_aleatorio1.$fileName;
opendir($ruta);
//copy($_FILES[$fileName.'']['tmp_name'],$ruta2);
$contracttesi=$ruta;    
file_put_contents($ruta, $fileData);

$creatoruser=$_SESSION['recursos'];
$action='inserción';

        
        //INSERTA REGISTRO DE FOLIO
        $sql3="INSERT INTO tblinventoryfol(folio,servicio,fecha,creatoruser,action,firm2,firm1) VALUES(:folio,:servicio,:fecha,:creatoruser,:action,:contracttesi,:contractresponsable)";
        $query3 = $dbh->prepare($sql3);
        $query3->bindParam(':folio',$folio,PDO::PARAM_STR);
        $query3->bindParam(':contracttesi',$contracttesi,PDO::PARAM_STR);
        $query3->bindParam(':contractresponsable',$contractresponsable,PDO::PARAM_STR);
        $query3->bindParam(':servicio',$servicio,PDO::PARAM_STR);
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






 $query3 = null; // obligado para cerrar la conexión


                                           


    ?>