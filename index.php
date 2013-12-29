<?php
include("authenticate.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create Your Bracket</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='//fonts.googleapis.com/css?family=Droid+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="assets/css/bracket.css" type="text/css">
<link rel="stylesheet" href="assets/css/styles.css" type="text/css">
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php">Bracket Builder <img src="assets/img/bracket.png" style="height: 1em" ></a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">My Account</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
  <!-- /.navbar-collapse --> 
</nav>
<div class="container">
  <h1 id="name"></h1>
  <a href="bracket.php" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Create New Bracket</a>
  <h2>My Brackets</h2>
  <table class="table table-striped table-hover" id="brackets">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  <img src="assets/img/loading.gif" id="loading_image"  style="float: left; width: 100px"/> </div>
<script src="assets/js/jquery-1.10.2.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/index.js"></script> 

</body>
</html>
