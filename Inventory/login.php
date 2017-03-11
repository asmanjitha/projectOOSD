
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
$loginErr = '';
$nameErr =$passwordErr = '';
if (isset($_SESSION['logged']) && $_SESSION['logged']){
	header('location:home.php');
}elseif (isset($_REQUEST["submitb"])){
	$error = false;
	$name = $_REQUEST["u_name"];
	$password = $_REQUEST["password"];
	$conn = mysqli_connect('localhost:3307','root','1010');
	if (!$conn){
		$error = true;
		die("Sorry server is not responding. </br> Please try again later.</br>");
	}
	if (is_empty($name)){
		$error = true;
		$nameErr = "*";
	}
	if (is_empty($password)){
		$error = true;
		$passwordErr = "*";
	}
	/*echo $nameErr."</br>";
	echo $passwordErr."</br>";*/
	if (!$error){
		$query = "select password,u_id,r_id,email from inventory.users where u_name ='$name' ";
		$res = mysqli_query($conn,$query);
		if ($res){
			$res = mysqli_fetch_array($res,MYSQLI_ASSOC);
			if($res['password']==$password){
				$_SESSION['logged'] = true;
				$_SESSION['u_name'] = $name;
				$_SESSION['email'] = $res['email'];
				$_SESSION['u_id'] = $res['u_id'];
				$_SESSION['r_id'] = $res['r_id'];
				$r_id = $res['r_id'];
				$query1 = "select r_name,r_privillage from inventory.roles where r_id ='$r_id'";
				$res1 = mysqli_query($conn,$query1);
				if($res1){
					$res1 = mysqli_fetch_array($res1,MYSQLI_ASSOC);
					$_SESSION['r_name']=$res1['r_name'];
					$_SESSION['r_privillage']=$res1['r_privillage'];
				}else{
					echo "sql wrong</br>".mysqli_error($conn)."</br>";
				}
				header('location:home.php');
			}elseif ($res['u_id']==''){
				$nameErr = "* Invalid user name";
			}else{
				$passwordErr="* password missmatch";
			}
		}else{
			echo "sql wrong</br>".mysqli_error($conn)."</br>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<body>
<form method = 'POST' action = "login.php" >
<table>
<caption> <b><big>Login</big></b> </caption>
	<tr>
	<td>User Name: </td><td><input type="text" name = "u_name"></td><td><span style = "color:red"><?php echo $nameErr;?></span></td>
	</tr>
	<tr>
	<td>Password: </td><td><input type="text" name = "password"></td><td><span style = "color:red"><?php echo $passwordErr;?></span></td>
	</tr>
	<tr>
	<td></td><td><input type=submit value = "Login" name = "submitb"></td>
	</tr>
</table>
</form>
</body>
</html>