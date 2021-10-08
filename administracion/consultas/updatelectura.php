<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('../includes/config.php');
$folio = $_GET["f"];
$id = $_GET['id'];
$isread = 1;
$sql = "update tblinventoryexit set isread=:isread  WHERE id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->bindParam(':isread', $isread, PDO::PARAM_STR);
        if ($query->execute() == true) {
                $response_array['status'] = 'success';
            } else {
                $response_array['status'] = 'error';
            
            }
            echo json_encode($response_array);
        $msg = "Modificación de registro";
?>