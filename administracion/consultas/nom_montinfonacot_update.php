<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('../includes/config.php');
$empid = $_GET["empid"];
$cantidad = $_GET['cantidad'];
$isread = 1;
$sql = "update tblemployees set fonacotmon=:cantidad  WHERE id=:empid";
$query = $dbh->prepare($sql);
$query->bindParam(':empid', $empid, PDO::PARAM_STR);
$query->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
        if ($query->execute() == true) {
                $response_array['status'] = 'success';
            } else {
                $response_array['status'] = 'error';
            
            }
            echo json_encode($response_array);
        $msg = "Modificación de registro";
?>