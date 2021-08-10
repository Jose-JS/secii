<?php
$descripcion=$_GET['var'];

$sql = "SELECT cantidad from tblinventory where descripcion='$descripcion'";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $result) {   }
}
$query = null; // obligado para cerrar la conexión


?>