<?php
session_start();
session_destroy();
$_SESSION['login_cookie'] = -1; 
header("Location: login.php");
?>