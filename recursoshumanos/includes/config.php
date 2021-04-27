<?php 
date_default_timezone_set('America/Mexico_City');//ESTAS DOS LIBRERIAS PARA PONER FECHA Y HORA EN LA QUE SE IMPRIME
setlocale(LC_TIME, 'es_MX.UTF-8');
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','SIM');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>