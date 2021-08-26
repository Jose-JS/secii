<?php
session_start();
//error_reporting(0);
include('../includes/config.php');
$id = $_POST["id"];
$talla = $_POST['talla'];
$descripcion = $_POST['descripcion'];
$condicion = $_POST['estado'];
$cantidad = $_POST['cantidad'];
$fecha = $_POST['fecha'];
$creatoruser = $_SESSION['recursos'];
$action = 'modificación';
$sql = "UPDATE tblinventory SET descripcion=:descripcion,talla=:talla,condicion=:condicion,cantidad=:cantidad,fecha=:fecha,creatoruser=:creatoruser,action=:action where id='$id'";
$query = $dbh->prepare($sql);
$query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
$query->bindParam(':talla', $talla, PDO::PARAM_STR);
$query->bindParam(':condicion', $condicion, PDO::PARAM_STR);
$query->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
$query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
$query->bindParam(':creatoruser', $creatoruser, PDO::PARAM_STR);
$query->bindParam(':action', $action, PDO::PARAM_STR);
if ($query->execute() == true) {
    $response_array['status'] = 'success';
} else {
    $response_array['status'] = 'error';

}
echo json_encode($response_array);
?>
