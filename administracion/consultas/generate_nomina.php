<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('../includes/config.php');

$obj = json_encode($_POST['datoss'], true);

$obj2=json_decode($obj, true);
var_dump($obj2);
foreach ($obj2 as $data) {
    $name=$data['name'];
    var_dump($name);
    $sql = "INSERT INTO tblgeneratenomina(nombre) VALUES(:name)";        
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    if ($query->execute() == true) {
        $response_array['status'] = 'success';
    } else {
        $response_array['status'] = 'error';
    }
    echo json_encode($response_array);
    $msg = "Modificación de registro";

   
}
    ?>