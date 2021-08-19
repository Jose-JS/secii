<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('../includes/config.php');
 $id = $_GET['del'];
        $sql = "delete from  tblinventoryexit  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Registro de departamento eliminado";
?>