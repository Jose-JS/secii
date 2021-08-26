<?php
session_start();
//error_reporting(0);
include('../includes/config.php');
$id = $_GET['id'];
$sql = "SELECT * from tblinventory where id='$id'";
$query = $dbh->prepare($sql);

if ($query->execute() == true) {
    
    $userData = $query->fetchAll(PDO::FETCH_ASSOC);
    //$data['status'] = 'success';
    //$data1['result'] = $userData;
    //echo (json_encode($userData));
    
} else {
    //$data['status'] = 'error';
}
echo json_encode($userData,JSON_UNESCAPED_UNICODE);
