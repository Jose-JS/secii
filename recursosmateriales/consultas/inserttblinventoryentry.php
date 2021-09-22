<?php
session_start();
//error_reporting(0);
include('../includes/config.php');
$empresa = $_POST['empresa'];
$talla = $_POST['talla'];
$descripcion = $_POST['descripcion'];
$condicion = $_POST['estado'];
$cantidad = $_POST['cantidad'];
$fecha = $_POST['fecha'];
$creatoruser = $_SESSION['recursos'];
$action = 'inserción';
$sql = "INSERT INTO tblinventoryentry(descripcion,talla,condicion,cantidad,fecha,creatoruser,action,empresa) VALUES (:descripcion,:talla,:condicion,:cantidad,:fecha,:creatoruser,:action,:empresa)";
$query = $dbh->prepare($sql);
$query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
$query->bindParam(':empresa', $empresa, PDO::PARAM_STR);
$query->bindParam(':talla', $talla, PDO::PARAM_STR);
$query->bindParam(':condicion', $condicion, PDO::PARAM_STR);
$query->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
$query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
$query->bindParam(':creatoruser', $creatoruser, PDO::PARAM_STR);
$query->bindParam(':action', $action, PDO::PARAM_STR);
if ($query->execute() == true) {
     
     $sql2 = "UPDATE tblinventory SET cantidad = (cantidad + :cantidad) where descripcion='$descripcion' and talla='$talla'";
     $query2 = $dbh->prepare($sql2);
     $query2->bindParam(':cantidad',$cantidad,PDO::PARAM_STR);
     $query2->execute();
     $response_array['status'] = 'success';
} else {
    $response_array['status'] = 'error';

}
echo json_encode($response_array);
?>
