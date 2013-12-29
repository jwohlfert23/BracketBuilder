<?php
if (empty($_SERVER['HTTPS'])) {
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register | Build-A-Bracket</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="assets/css/bracket.css" type="text/css">
<link rel="stylesheet" href="assets/css/styles.css" type="text/css">
</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <h1 class="text-center login-title">Register for your account</h1>
      <div class="well">
        <form class="form-register">
          <div class="form-group">
            <div class="row">
              <div class="col-md-6" style="padding-right: 0">
                <input type="text" class="form-control" placeholder="First" style="border-top-right-radius: 0" name="first" >
              </div>
              <div class="col-md-6" style="padding-left: 0">
                <input type="text" class="form-control" placeholder="Last" style="border-top-left-radius: 0" name="last" >
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Email" style="border-radius: 0" name="email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword">
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit"> Register</button>
          <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
        </form>
      </div>
      <a href="login.php" class="text-center new-account">Already have an account? </a> </div>
  </div>
</div>
<script src="assets/js/jquery-1.10.2.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="assets/js/noty/jquery.noty.js"></script> 
<script type="text/javascript" src="assets/js/noty/layouts/topRight.js"></script> 
<script type="text/javascript" src="assets/js/noty/themes/default.js"></script> 
<script src="assets/js/validation/jquery.validate.min.js"></script> 
<script src="assets/js/register.js"></script>
</body>
</html>
