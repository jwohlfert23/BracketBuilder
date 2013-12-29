<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="templates/assets/css/bootstrap.css" type="text/css">
<!-- Only using basic features such as buttons and formatting (ie. float right and left) -->
<link rel="stylesheet" href="templates/assets/css/bracket.css" type="text/css">
<!-- Bracket Styles - positioning for each matchup, round, etc. -->
<link rel="stylesheet" href="templates/assets/css/styles.css" type="text/css">
<!-- Any additional styles -->
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#">Bracket Builder</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      	<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" id="change">My Brackets <b class="caret"></b></a>
        <ul id="bracket_list" class="dropdown-menu">
        </ul>
        <li><a href="templates/index.php">My Account</a></li>
        <li><a href="templates/logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
  <!-- /.navbar-collapse --> 
</nav>