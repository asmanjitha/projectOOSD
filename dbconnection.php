<?php
$conn = mysqli_connect('localhost:3306','root','1010');
if (!$conn){
    $error = true;
    die("Sorry server is not responding. </br> Please try again later.</br>");
}

?>