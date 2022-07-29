<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('../includes/config.php');
$keyword = '%'.$_POST['palabra'].'%';
$sql = "SELECT EmpId,name,firstname,lastname FROM tblemployees WHERE firstname LIKE (:keyword) ORDER BY firstname ASC LIMIT 0, 7";
$query = $dbh->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	// Colocaremos negrita a los textos
	$pais_nombre = str_replace($_POST['palabra'], '<b>'.$_POST['palabra'].'</b>', $milista['EmpId'].'&nbsp;'.$milista['firstname'].'&nbsp;'.$milista['lastname'].'&nbsp;'.$milista['name']);
	// Aquì, agregaremos opciones
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $milista['EmpId'].' '.$milista['firstname'].'&nbsp;'.$milista['lastname'].'&nbsp;'.$milista['name']).'\')">'.$pais_nombre.'</li>';
}
?>