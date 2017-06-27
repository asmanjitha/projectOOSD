<?php
session_start();
include('../User.php');

if(!isset($_SESSION['logged']) || !isset($_SESSION['user'])){
	header('location:../login.php');
}else{
	$user = unserialize($_SESSION['user']);
	if ($user->getRoleId()!=0){
		header('location:../home.php');
	}
}
?>


<html>
<head>
<title>home page</title>
<link rel="stylesheet" href="../assests/library/bootstrap-3.3.7-dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../assests/library/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
<style type='text/css'>
.col-md-2-height1 {
	height: 1200px;
    text-align: left;
	background-color: #f8f8f8;
	<!--background-color: #f8f8f8;-->
}
.navbar-default-nopaddingup{
	padding-bottom: 0px;
	margin-bottom: 0px;
}
</style>

</head>
<body>
<header>
<nav class="navbar navbar-default navbar-default-nopaddingup">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand1" href="#">
	  <img alt="Bitz" src="../images/logo.png" style="width:50px;height:50px;">
        
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
        <li><a href="home.php">Home</a></li>
        <!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>-->
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Requests</a></li>
		<li><a href="#">Notifications</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Edit Profile</a></li>
            <!--<li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>-->
            <li role="separator" class="divider"></li>
            <li><a href="../logout.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<div class='container-fluid'>
	<div class='row'>
	  <div class='col-md-2 col-md-2-height1'>
	    <!--<div class='panel panel-default'>
		<div class='panel-heading'> <a href='next.html'>Next</a> </div>
		</div>-->
		<ul class="nav nav-pills nav-stacked">
			<!--<li class="active"><a href="#">Home</a></li>-->
			<li><a href="createUser.php">Create A New User</a></li>
			<li><a href="viewUser.php">View Users</a></li>
			<li><a href="#">Menu 3</a></li>
		</ul>
		
	  </div>
	  <div class='col-md-10'>
	  <!-- Put Anything-->
	  
	  
	  
	  <!-- Put Anything-->
	  </div>
	</div>
</div>

<script src="../assests/jquery.min.js"></script>
<script src="../assests/library/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>