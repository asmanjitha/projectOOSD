<?php
session_start();
include('../User.php');

if(!isset($_SESSION['logged']) || !isset($_SESSION['user'])){
	header('location:../login.php');
}else{
	$user = unserialize($_SESSION['user']);
	if ($user->getRoleId()!=2){
		header('location:../home.php');
	}
}
function is_empty(...$paras){
	foreach ($paras as $para){
		if (($para == null) || ($para=='')){
			return true;
		}
	}
	return false;
}
$error = false;
$conn = mysqli_connect('localhost','root','1010');
if (!$conn){
	$error = true;
	die("Sorry server jam. </br> Please try again later.</br>");
}
$nameErr = $serialErr ='';

if (isset($_REQUEST["submitb"])){
	$drugname = $_REQUEST["drugname"];
	$serial = $_REQUEST["serial"];
	$type = $_REQUEST["type"];
	$description = $_REQUEST["description"];
	if (is_empty($drugname)){
		$error = true;
		$nameErr = "* Please enter an drug name";
	}else{
		$query = "select drug_name from hospital.drugs where drug_name = '$drugname'";
		$ins = mysqli_query($conn,$query);
		if (!$ins){
			die("Server error");
		}
		if (mysqli_num_rows($ins)!=0){
			$error = true;
			$nameErr = "* Drug already exits";
		}
	}
	if (is_empty($serial)){
		$error = true;
		$serialErr = "* Please enter a serial number";
	}else{
		$query = "select serial_number from hospital.drugs where serial_number = '$serial'";
		$ins = mysqli_query($conn,$query);
		if (!$ins){
			die("Server error");
		}
		if (mysqli_num_rows($ins)!=0){
			$error = true;
			$serialErr = "* Drug already used";
		}
	}
	
	
	if (!$error){
		$query = "insert into hospital.drugs (drug_name,serial_number,type,description) values ('$drugname','$serial','$type','$description')";
		$ins = mysqli_query($conn,$query);
		if ($ins){
			header('location:drugSaved.php');
		}else{
			echo "sql wrong</br>".mysqli_error($conn)."</br>";
		}
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
lbl1{
	align: right;
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
			<li><a href="addANewDrug.php">Add A New Drug</a></li>
			<li><a href="next.html">Menu 2</a></li>
			<li><a href="#">Menu 3</a></li>
		</ul>
		
	  </div>
	  <div class='col-md-10'>
	  <!-- Put Anything-->
	  <div class="container">
    <h1 class="well">Drug Details</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form method ='POST' action="addANewDrug.php">
					<div class="col-sm-12">
						<!--<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name</label>
								<input name= "first_name" type="text" placeholder="Enter First Name Here.." class="form-control">
								<label><span style = "color:red"><?php echo $first_nameErr;?></span></label>
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input name="last_name"  type="text" placeholder="Enter Last Name Here.." class="form-control">
								<label><span style = "color:red"><?php echo $last_nameErr;?></span></label>
							</div>
						</div>-->
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Serial Number <span style = "color:red"><?php echo "*";?></span>   </label>
								<input name= "serial" type="text" placeholder="Enter Serial Number Here.." class="form-control">
								<label><span style = "color:red"><?php echo $serialErr;?></span></label>
							</div>
							<div class="col-sm-6 form-group">
								<!--<label>Last Name</label>
								<input type="text" placeholder="Enter Last Name Here.." class="form-control">-->
								<div class="form-group">
									<label for="sel1">Drug Type:</label>
									<select name= "type" class="form-control" id="sel1">
									<option value="Tablet">Tablet</option>
									<option value="Spray">Spray</option>
									<option value="Syrup">Syrup</option>
									<option value="Cream">Cream</option>
									</select>
								</div>
							</div>
						</div>
						<!--
						<div class="form-group">
							<label>Address</label>
							<textarea placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text" placeholder="Enter City Name Here.." class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>State</label>
								<input type="text" placeholder="Enter State Name Here.." class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input type="text" placeholder="Enter Zip Code Here.." class="form-control">
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Title</label>
								<input type="text" placeholder="Enter Designation Here.." class="form-control">
							</div>		
							<div class="col-sm-6 form-group">
								<label>Company</label>
								<input type="text" placeholder="Enter Company Name Here.." class="form-control">
							</div>	
						</div>						
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" placeholder="Enter Phone Number Here.." class="form-control">
					</div>	
						-->
					<div class="form-group">
						<label>Drug Name<span style = "color:red"><?php echo "*";?></span></label>
						<input name="drugname"  type="text" placeholder="Enter Drug Name Here.." class="form-control">
						<label><span style = "color:red"><?php echo $nameErr;?></span></label>
					</div>	
					<div class="form-group">
						<label>Description</label>
						<input name= "description" type="text" placeholder="Enter Description.." class="form-control">
						
					</div>
					<!--
					<div class="form-group">
						<label>Confirm Password</label>
						<input name="cpassword" type="text" placeholder="Re-enter Password Here.." class="form-control">
						<label><span style = "color:red"></span></label>
					</div>-->
					<div class="row">
					<div class="col-md-10">
					<button  type="Submit" class="btn btn-lg btn-info" name="submitb" >Submit</button>
					</div>
					<div class="col-md-2">
					<label id="lbl1"><span style = "color:red; text-align:right" ><?php echo "* Required";?></span></label>
					</div>
					</div>
					</div>
				</form> 
				</div>
	</div>
	</div>
	  
	  
	  <!-- Put Anything-->
	  </div>
	</div>
</div>

<script src="../assests/jquery.min.js"></script>
<script src="../assests/library/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>