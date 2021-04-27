<?php
session_start(); 
if(isset($_SESSION['cliente'])){
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
unset($_SESSION['cliente']);
    unset($_SESSION['eid']);
session_destroy(); // destroy session
header("location:../index.php"); 
}
else{
    header("location:dashboard.php"); 
    
    
}
?>

