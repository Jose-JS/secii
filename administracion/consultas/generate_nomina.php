<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('../includes/config.php');

$obj = json_decode($_POST['datoss'], true);
var_dump($obj);
print $obj->{'name'};
foreach ($obj as $data) {
    //extraer data
     $name = $data->name;
     
        $sql = "insert into tblgeneratenomina(nombre) VALUES (:name)";        
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