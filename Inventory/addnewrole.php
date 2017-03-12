<?php
session_start();
$r_nameErr=$r_privilageErr="";
if(isset($_SESSION['logged']) && ($_SESSION['r_privillage']==0)){
	if(isset($_REQUEST["submitb"])){
		$r_name = $_REQUEST['r_name'];
		$r_privilage = $_REQUEST['r_privilage'];
		$error = false;
		if ($r_name==""){
			$r_nameErr = "* Required";
		}
		if ($r_privilage==""){
			$r_privilageErr = "* Required";
		}elseif(intval($r_privilage)==0){
			$error = true;
			$r_privilageErr = "* Enter a valid number";
		}
		$conn = mysqli_connect('localhost:3307','root','1010');
		if($conn){
			$res = mysqli_query($conn,"select * from inventory.roles where r_name='$r_name'");
			if ((mysqli_num_rows($res)>0)){
				$error = true;
				$r_nameErr = "* Role already exists";
			}elseif($res && !$error){
				$res = mysqli_query($conn,"insert into inventory.roles (r_name,r_privilage) values ('$r_name','$r_privilage')");
				if(!$res){
					die("Error");
				}
			}
		}
	}
}else{
	header("location:home.php");
}
?>

<html>
<body>
<form method="POST" action="addnewrole.php">
<table>
<tr><td>Role name</td><td> <input type="text" name = "r_name"></td><td><span style = "color:red"><?php echo $r_nameErr; ?></span></td> </tr>
<tr><td>Privilage level</td><td> <input type="text" name = "r_privilage"></td><td><span style = "color:red"><?php echo $r_privilageErr; ?></span></td> </tr>
<tr><td></td><td><input type=submit value = "Create" name="submitb"></td></tr>
</table>
</form>
</body>
</html>
