<?php
session_start();
$auth_cookie_val = sha1($_SESSION['user_name'] . $_SERVER['REMOTE_ADDR'] . $_SESSION['authsalt']);

if( $_COOKIE['logged_in'] != $auth_cookie_val || !isset($_COOKIE['logged_in']))	{
	header("Location: login.php?url=".$_SERVER['REQUEST_URI']);
}


?>