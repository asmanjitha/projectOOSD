<?php
session_start();
include('User.php');

if(!isset($_SESSION['logged']) || !isset($_SESSION['user'])){
	header('location:login.php');
}else{
	$user = unserialize($_SESSION['user']);
	if ($user->getRoleId()==0){
		header('location:moic/home.php');
	}elseif($user->getRoleId()==1){
		header('location:dispenser/home.php');
	}elseif($user->getRoleId()==2){
		header('location:inventory_manager/home.php');
	}else{
		echo $user->getRoleId();
	}
}

?>