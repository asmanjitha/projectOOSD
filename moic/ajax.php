<?php
$conn = mysqli_connect('localhost:3306','root','1010');
if (!$conn){
    $error = true;
    die("Sorry server is not responding. </br> Please try again later.</br>");
}
$query = "select u_id,role_id,email,first_name,u_name,last_name from hospital.users where deleted=0";
$res = mysqli_query($conn,$query);
if(isset())

?> 