<?php
include 'connection2.php';
session_start(); 
if(isset($_POST['login']))
{
	$username = mysqli_real_escape_string($conn, $_POST['user']);
	$password = mysqli_real_escape_string($conn, $_POST['pass']);
	
	$query = "SELECT * FROM quizregistration WHERE username = '$username' && password = '$password'";
	$data = mysqli_query($conn,$query);
   
	
	$total = mysqli_num_rows($data);
	//echo $total;
	if($total == 1)
	{
		echo 'success';
		$_SESSION['username']= $username;
		header('location:home.php');     //redirect page location
	}
	else
	{
		echo "<font color='red'>Login Failed</font>";
	}
}
?>