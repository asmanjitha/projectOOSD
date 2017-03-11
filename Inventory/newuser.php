
<?php
session_start();
function is_empty(...$paras){
	foreach ($paras as $para){
		if (($para == null) || ($para=='')){
			return true;
		}
	}
	return false;
}
$nameErr = $emailErr = $passwordErr = $cpasswordErr = $first_nameErr = $last_nameErr = $r_idErr= $genderErr='';
if (!isset($_SESSION['logged']) || ($_SESSION['r_privillage']!=0)){
	header('location:home.php');
}elseif (isset($_REQUEST["submitb"])){
	$error = false;
	$name = $_REQUEST["u_name"];
	$password = $_REQUEST["password"];
	$cpassword = $_REQUEST["cpassword"];
	$email = $_REQUEST["email"];
	$conn = mysqli_connect('localhost:3307','root','1010');
	$first_name = $_REQUEST["first_name"];
	$last_name = $_REQUEST["last_name"];
	$r_id = $_REQUEST["r_id"];
	$gender = $_REQUEST["gender"];
	if (!$conn){
		$error = true;
		die("Sorry server jam. </br> Please try again later.</br>");
	}
	if (is_empty($name)){
		$nameErr = "* Please enter an user name";
	}else{
		$query = "select u_name from inventory.users where u_name = '$name'";
		$ins = mysqli_query($conn,$query);
		if (!$ins){
			die("Server error");
		}
		if (mysqli_num_rows($ins)!=0){
			$error = true;
			$nameErr = "* User name already exits";
		}
	}
	if (is_empty($email)){
		$emailErr = "* Please enter an email";
	}else{
		$query = "select u_name from inventory.users where email = '$email'";
		$ins = mysqli_query($conn,$query);
		if (!$ins){
			die("Server error");
		}
		if (mysqli_num_rows($ins)!=0){
			$error = true;
			$emailErr = "* User email already used";
		}
	}
	if (is_empty($password)){
		$error = true;
		$passwordErr = "* Please enter a password";
	}elseif(strlen($password)<8){
		$error = true;
		$passwordErr = "* Atleast 8 characters!";
	}
	if (is_empty($cpassword)){
		$error = true;
		$cpasswordErr = "* Please confirm the password";
	}elseif($cpassword!=$password){
		$error = true;
		$cpasswordErr = "* password miss match!";
	}
	if (is_empty($first_name)){
		$error = true;
		$first_nameErr = "* Required";
	}
	if (is_empty($last_name)){
		$error = true;
		$last_nameErr = "* Required";
	}
	if (is_empty($r_id)){
		$error = true;
		$r_idErr = "* Required";
	}
	if(is_empty($gender)){
		$gender = 1;
	}
	/*echo $nameErr."</br>";
	echo $emailErr."</br>";
	echo $passwordErr."</br>";
	echo $cpasswordErr."</br>";
	echo $first_nameErr."</br>";
	echo $last_nameErr."</br>";*/
	if (!$error){
		$query = "insert into inventory.users (u_name,f_name,l_name,email,password,r_id,gender) values ('$name','$first_name','$last_name','$email','$password','$r_id','$gender')";
		$ins = mysqli_query($conn,$query);
		if ($ins){
			header('location:home.php');
		}else{
			echo "sql wrong</br>".mysqli_error($conn)."</br>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<body>
<form method = 'POST' action = "newuser.php" >
<table>
<caption> <b><big>Register</big></b> </caption>
	<tr>
	<td>First Name: </td><td><input type="text" name = "first_name"></td><td><span style = "color:red"><?php echo $first_nameErr;?></span></td>
	</tr>
	<tr>
	<td>Last Name: </td><td><input type="text" name = "last_name"></td><td><span style = "color:red"><?php echo $last_nameErr;?></span></td>
	</tr>
	<tr>
	<td>User Name: </td><td><input type="text" name = "u_name"></td><td><span style = "color:red"><?php echo $nameErr;?></span></td>
	</tr>
	<tr>
	<td>Email: </td><td><input type="text" name = "email"></td><td><span style = "color:red"><?php echo $emailErr;?></span></td>
	</tr>
	<tr>
	<td>Gender: </td><td><select name="gender"><option value=1>Male</option><option value=0>Female</option></select></td><td><span style = "color:red"><?php echo $genderErr;?></span></td>
	</tr>
	<tr>
	<td>Role: </td><td><select name="r_id"><option value=1>Admin</option><option value=2>MOIC</option><option value=3>Inventory Manager</option><option value=4>General Doctor</option><option value=5>Dispensary Clerk</option></select></td><td><span style = "color:red"><?php echo $r_idErr;?></span></td>
	</tr>
	<tr>
	<td>Password: </td><td><input type="text" name = "password"></td><td><span style = "color:red"><?php echo $passwordErr;?></span></td>
	</tr>
	<tr>
	<td>Password Confirm </td><td><input type="text" name = "cpassword"></td><td><span style = "color:red"><?php echo $cpasswordErr;?></span></td>
	</tr>
	<tr>
	<td></td><td><input type=submit value = "create new user" name = "submitb"></td>
	</tr>
</table>
</form>
</body>
</html>