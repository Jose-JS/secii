<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('../includes/config.php');

$descripcion=$_POST['valor'];

$sql = "SELECT descripcion,cantidad FROM tblinventory WHERE descripcion='$descripcion'";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {
foreach ($results as $result) {   
$existencia=$result->cantidad;

echo $existencia;
}
}   
$query = null; // obligado para cerrar la conexión
?>