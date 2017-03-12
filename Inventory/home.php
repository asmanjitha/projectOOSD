<?php
session_start();
if (!isset($_SESSION['logged'])){
	header('location:login.php');
}
echo "<b><big>Welcome </big></b></br> </br>";
if($_SESSION['r_privillage']==0){
	echo "<a href='newuser.php'>Create a new user</a></br>";
	echo "<a href='addnewrole.php'>Add a new role</a></br>";
}
?>

<html>
<body>
<a href = "logout.php">Log Out</a>
</body>
</html>