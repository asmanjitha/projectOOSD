<?php
session_start();
if (!isset($_SESSION['logged'])){
	header('location:login.php');
}
echo "<b><big>Welcome </big></b></br> </br>";
?>

<html>
<body>
<a href = "logout.php">Log Out</a>
</body>
</html>