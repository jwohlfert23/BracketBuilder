<?php
session_start();
include("authenticate.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create Your Bracket</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
<!-- Only using basic features such as buttons and formatting (ie. float right and left) -->
<link rel="stylesheet" href="assets/css/bracket.css" type="text/css">
<!-- Bracket Styles - positioning for each matchup, round, etc. -->
<link rel="stylesheet" href="assets/css/styles.css" type="text/css">
<!-- Any additional styles -->
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1391090381136074";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php">Bracket Builder <img src="assets/img/bracket.png" style="height: 1em" ></a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      	<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" id="change">My Brackets <b class="caret"></b></a>
        <ul id="bracket_list" class="dropdown-menu">
        </ul>
        <li><a href="index.php">My Account</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
  <!-- /.navbar-collapse --> 
</nav>
<div id="container">
<a class="btn btn-success pull-left" id="create"><i class="glyphicon glyphicon-plus"></i> Create New Bracket</a>
   <div class="pull-right"> 
    <a class="btn btn-primary" id="save"><i class="glyphicon glyphicon-floppy-disk"></i> Save</a>
    <div class="fb-share-button" data-type="button"></div>
   </div>
  <div class="content">
    <h3 style="text-align: center" id="bracket_name"></h3>
    <h4 class="pull-left">User: <span id="user_name"><?php echo $_SESSION['user_name']; ?></span></h4>
    <h4 class="pull-right">Score: <span id="bracket_score"></span></h4>
    <div class="clearfix"></div>
    <ul class="list-inline round-heading">
      <li>Round of 64</li>
      <li>Round of 32</li>
      <li>Sweet Sixteen</li>
      <li>Elite Eight</li>
      <li>Elite Eight</li>
      <li>Sweet Sixteen</li>
      <li>Round of 32</li>
      <li>Round of 64</li>
    </ul>
    <div id="bracket">
      <div id="round1" class="round">
        <h3> Round One (2012 NCAA Men's Basketball Tournament) </h3>
        <div class="region region1">
          <h4 class="region1 first_region"> MIDWEST </h4>
          <div  class="match m1"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m2"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m3"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m4"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m5"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m6"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m7"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m8"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
        </div>
        <!-- start region2 -->
        <div class="region region2">
          <h4 class="region2 first_region"> WEST </h4>
          <div  class="match m1"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m2"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m3"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m4"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m5"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m6"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m7"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m8"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
        </div>
        <!-- /.region2 --> 
        <!-- start region3 -->
        <div class="region region3">
          <h4 class="region3 first_region"> EAST </h4>
          <div  class="match m1"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m2"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m3"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m4"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m5"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m6"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m7"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m8"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
        </div>
        <!-- /.region3 --> 
        <!-- start region4 -->
        <div class="region region4">
          <h4 class="region4 first_region"> SOUTH </h4>
          <div  class="match m1"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m2"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m3"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m4"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m5"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m6"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m7"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m8"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
        </div>
      </div>
      <!-- /#round1 -->
      <div id="round2" class="round">
        <h3> Round Two (2010 NCAA Men's Basketball Tournament) </h3>
        <div class="region region1">
          <h4 class="region1"> MIDWEST </h4>
          <div  class="match m1"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m2"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m3"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m4"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
        </div>
        <!-- /.region1 -->
        <div class="region region2">
          <h4 class="region2"> WEST </h4>
          <div  class="match m1"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m2"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m3"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m4"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
        </div>
        <div class="region region3">
          <h4 class="region3"> East </h4>
          <div  class="match m1"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m2"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m3"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m4"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
        </div>
        <!--/.region3-->
        <div class="region region4">
          <h4 class="region4"> South </h4>
          <div  class="match m1"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m2"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m3"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m4"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
        </div>
        <!--/.region4--> 
      </div>
      <div id="round3" class="round">
        <h3> Round Three (2010 NCAA Men's Basketball Tournament) </h3>
        <div class="region region1">
          <h4 class="region1"> Midwest </h4>
          <div  class="match m1"><div class="slot slot1" ><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m2"><div class="slot slot1" ><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
        </div>
        
        <!-- /.region1 -->
        <div class="region region2">
          <h4 class="region2"> West </h4>
          <div  class="match m1"><div class="slot slot1" ><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m2"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <!--/#match56--> 
        </div>
        <div class="region region3">
          <h4 class="region3"> East </h4>
          <div  class="match m1"><div class="slot slot1" ><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m2"><div class="slot slot1" ><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <!--/#match50--> 
        </div>
        <!-- /.region3 -->
        <div class="region region4">
          <h4 class="region4"> South </h4>
          <div  class="match m1"><div class="slot slot1" ><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <div  class="match m2"><div class="slot slot1" ><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <!--/#match52--> 
        </div>
        <!-- /.region4 --> 
      </div>
      <div id="round4" class="round">
        <h3> Round Four (2010 NCAA Men's Basketball Tournament) </h3>
        <div class="region region1">
          <h4 class="region1"> Midwest </h4>
          <div  class="match m1"><div class="slot slot1" ><span class="seed"></span> </div><div class="slot slot2"><span class="seed"></span> </div></div>
          <!-- /#match60 --> 
        </div>
        <!-- /.region1 -->
        <div class="region region2">
          <h4 class="region2"> West </h4>
          <div  class="match m1"><div class="slot slot1"><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
          <!-- /#match61 --> 
        </div>
        <!-- /.region2 -->
        <div class="region region3">
          <h4 class="region3"> East </h4>
          <div  class="match m1"><div class="slot slot1" ><span class="seed"></span> </div><div class="slot slot2"><span class="seed"></span> </div></div>
          <!-- /#match58 --> 
        </div>
        <!--/.region3-->
        <div class="region region4">
          <h4 class="region4"> South </h4>
          <div  class="match m1"><div class="slot slot1" ><span class="seed"></span> </div><div class="slot slot2"><span class="seed"></span> </div></div>
          <!--/#match59--> 
        </div>
        <!--/#match59--> 
      </div>
      <div id="round5" class="round">
        <h3> Round Five (2010 NCAA Men's Basketball Tournament) </h3>
        <div class="region">
          <div  class="match m1"><div class="slot slot1"><span class="seed"> </span> </div><div class="slot slot2"><span class="seed"></span> </div></div>
          <div  class="match m2"><div class="slot slot1" ><span class="seed"></span> </div><div class="slot slot2"><span class="seed"></span> </div></div>
        </div>
      </div>
      <div id="round6" class="round">
        <h3> Round Six (2010 NCAA Men's Basketball Tournament) </h3>
        <div class="region">
          <div  class="match m1"><div class="slot slot1" ><span class="seed"></span> </div><div class="slot slot2" ><span class="seed"></span> </div></div>
        </div>
      </div>
       <div id="round7" class="round">
        <h3> Round Six (2010 NCAA Men's Basketball Tournament) </h3>
        <div class="region">
        <div class="text">Champion</div>
          <div  class="match m1"><div class="slot slot1" ><span class="seed"></span> </div></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="compareModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Compare Teams</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6" id="team1">
            <h3>Team 1</h3>
          </div>
          <div class="col-lg-6" id="team2">
            <h3>Team 2</h3>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
  </div>
</div>
<!-- /.modal --> 
<!--Loading Indicator-->
<div class="modal" id="loading">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h3>Loading Bracket</h3>
        <img src="assets/img/loading.gif" style="height: 75px" >
      </div>
      <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
  </div>
</div>
<script src="assets/js/jquery-1.10.2.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/bracket.js"></script> 
<script type="text/javascript" src="assets/js/noty/jquery.noty.js"></script>
<script type="text/javascript" src="assets/js/noty/layouts/topRight.js"></script>
<script type="text/javascript" src="assets/js/noty/themes/default.js"></script>
</body>
</html>
