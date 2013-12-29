<?php
session_start();
if( $_COOKIE['logged_in'] ==  sha1($_SESSION['user_name'] . $_SERVER['REMOTE_ADDR'] . $_SESSION['authsalt']) )	{
	header("Location: index.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login | Build-A-Bracket</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='//fonts.googleapis.com/css?family=Droid+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="assets/css/bracket.css" type="text/css">
<link rel="stylesheet" href="assets/css/styles.css" type="text/css">
</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
                <?php if(isset($_GET['url'])): ?>
      <div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  Please Login or Create an Account
  </div>
      
      <?php endif; ?>
      <h1 class="text-center login-title">Sign in to continue to build your bracket</h1>
      <div class="account-wall">

       <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                    
        <form class="form-signin">
          <input type="text" class="form-control" placeholder="Email" name="email" required autofocus>
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit"> Sign in</button>
          <label class="checkbox pull-left">
            <input type="checkbox" id="remember" value="remember-me">
            Remember me </label>
          <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
        </form>
      </div>
        <a href="register.php" class="text-center new-account">Create an account </a> </div>
  </div>
</div>


<script src="assets/js/jquery-1.10.2.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="assets/js/noty/jquery.noty.js"></script> 
<script type="text/javascript" src="assets/js/noty/layouts/topRight.js"></script> 
<script type="text/javascript" src="assets/js/noty/themes/default.js"></script> 
<script type="text/javascript" src="assets/js/login.js"></script> 
</body>
</html>
