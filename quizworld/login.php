<?php
error_reporting(0);
include 'connection2.php';
session_start(); 
    if(!isset($_POST['user'])){
		header('location:../index.html');
	}
	$username = mysqli_real_escape_string($conn, $_POST['user']);
	
	$query = "SELECT * FROM user_reg WHERE username = '$username'";
	$data = mysqli_query($conn,$query);
   
	
	$total = mysqli_num_rows($data);
	//echo $total;
	if($total == 1)
	{
		echo $username;
		$_SESSION['username']= $username;
		//header('location:welcome.php');     //redirect page location
	}
	else
	{
		
	}

?>