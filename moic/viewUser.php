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
$error = false;
$conn = mysqli_connect('localhost:3306','root','1010');
if (!$conn){
    $error = true;
    die("Sorry server is not responding. </br> Please try again later.</br>");
}
$query = "select u_id,role_id,email,first_name,u_name from hospital.users";
$res = mysqli_query($conn,$query);
if ($res){
	$users = array();
	while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
		$tempUser = new User();
		$tempUser->setUName($row['u_name']);
		$tempUser->setRoleId($row['role_id']);
		$tempUser->setUId($row["u_id"]);
		$tempUser->setEmail($row['email']);
		$tempUser->setFirstName($row['first_name']);
		array_push($users,$tempUser);
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
			<li><a href="viewUser.php">View User</a></li>
			<li><a href="#">Menu 3</a></li>
		</ul>
		
	  </div>
	  <div class='col-md-10'>
	  <table class="table table-striped">  
    <thead>  
      <tr>  
        <th>User Name</th>  
        <th>Role</th>  
        <th>First Name</th>  
        <th>Email</th> 
		<th>Edit/Remove</th> 
      </tr>  
    </thead>  
    <tbody>
		
		<?php
			foreach( $users as $user ) {?>
				<tr>  
					<td><?php echo $user->getUName(); ?></td>   
					<td><?php switch($user->getRoleId()){
						case 0:
								echo "Admin";
								break;
						case 1:
								echo "Dispenser";
								break;
						case 2:
								echo "Inventory Manager";
								break;
								
						}; ?></td>
					<td><?php echo $user->getFirstName(); ?></td>  
					<td><?php echo $user->getEmail(); ?></td> 
					<td><a href="">Edit </a><a href="">/ Delete </a></td> 
				</tr> 
				
			<?php
			}
		/*$que = "select r_id,r_name from inventory.roles";
		$res = mysqli_query($conn,$que);
		if ($res){
		while($row = mysqli_fetch_array($res)){?>
			<option value="<?php echo $row['r_id']; ?>"> <?php echo $row['r_name']; ?></option>
		<?php } 
		}*/
	?>
      <!--<tr>  
        <td>001</td>  
        <td>Rammohan </td>  
        <td>Reddy</td>  
        <td>A+</td>  
      </tr>  
      <tr>  
        <td>002</td>  
        <td>Smita</td>  
        <td>Pallod</td>  
        <td>A</td>  
      </tr>  
      <tr>  
        <td>003</td>  
        <td>Rabindranath</td>  
        <td>Sen</td>  
        <td>A+</td>  
      </tr>  -->
    </tbody>  
  </table>  
	  <!-- Put Anything-->
	  </div>
	</div>
</div>

<script src="../assests/jquery.min.js"></script>
<script src="../assests/library/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>