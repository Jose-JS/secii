<?php
session_start();
//error_reporting(0);
include('../includes/config.php');
$descripcion = $_GET['descripcion'];
$sql = "SELECT descripcion,talla from tblinventory where descripcion='$descripcion'";
$query = $dbh->prepare($sql);
if ($query->execute() == true) {
        
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    //$row['status']= 'success';
    //$data1['result'] = $userData;
    //echo (json_encode($userData));
    //echo json_encode($row,JSON_UNESCAPED_UNICODE);   
    
} else {
    $row['status']= 'error';
}
echo json_encode($row,JSON_UNESCAPED_UNICODE);   

