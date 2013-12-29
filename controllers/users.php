<?php
include("../orm/User.php");
session_start();
$data = explode('/',$_SERVER['PATH_INFO']);

if($data[1] == 'login')	{
	$user = User::getByEmail($_POST['email']);
	if($user == null)
		$return = false;
	else	{
		$return = $user->checkPassword($_POST['password']);
		if($return)	{
			setLoggedIn($user);
		}	
	}
	echo json_encode($return);
}
else if($data[1] == 'register')	{
	//Validate Data
	$first = false;
    if (isset($_POST['first'])) {
      $first = trim($_POST['first']);
      if ($first == "") {
			header("HTTP/1.0 400 Bad Request");
			print("Bad first name");
			exit();
      }
    }
	$last = false;
    if (isset($_POST['last'])) {
      $last = trim($_POST['last']);
      if ($last == "") {
			header("HTTP/1.0 400 Bad Request");
			print("Bad last name");
			exit();
      }
    }
	$email = false;
    if (isset($_POST['email'])) {
      $email = trim($_POST['email']);
      if ($email == "") {
			header("HTTP/1.0 400 Bad Request");
			print("Bad email");
			exit();
      }
    }
	$password = false;
    if (isset($_POST['password'])) {
      $password = trim($_POST['password']);
      if ($password == "") {
			header("HTTP/1.0 400 Bad Request");
			print("Bad password");
			exit();
      }
    }
	
	//Save User and Start Session
	$user = User::save($first,$last,$email,$password);
	if($user == null)	{
		header("HTTP/1.0 500 Server Error");
      print("There is already an account for that email.");
      exit();

	}
	else	{
		setLoggedIn($user);
	}
	echo json_encode($user->toArray());
	
}
else if($data[1] == 'info')	{
	$user = User::getById($_SESSION['user_id']);
	echo json_encode($user->toArray());
}
else	{
	header("HTTP/1.0 400 No Data Provided");
	echo 'No Data Provided';
}
function setLoggedIn($user)	{
	$_SESSION['user_id'] = $user->getId();
	$_SESSION['user_name'] = $user->getName();
	$_SESSION['user_email'] = $user->getEmail();
	$_SESSION['authsalt'] = md5("asdgrwsdb", "bra".time()."ck416ets");
	$auth_cookie_val = sha1($_SESSION['user_name'] . $_SERVER['REMOTE_ADDR'] . $_SESSION['authsalt']);
	setcookie('logged_in', $auth_cookie_val, time() + 3600,'/', 'wwwp.cs.unc.edu', 1);
}

?>