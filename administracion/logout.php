<?php
session_start(); 
include('../includes/config.php');
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );

}
$eid=intval($_GET['i']);   
$started=0;
$sql = "update tblusers set started=:started  WHERE id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> bindParam(':started',$started, PDO::PARAM_STR);
$query -> execute();
unset($_SESSION['ei']);
unset($_SESSION['alogin']);


session_destroy(); // destroy session
header("location:../index.php"); 




?>

