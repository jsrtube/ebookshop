<?php

session_start();
header('location:index.php');
include'connection2.php';


	$username = $_POST['user'];
	$password = $_POST['pass'];
	

	// echo $username;
	// echo $password;

	$check = "select * from quizregistration where user='$username' && pass='$password' ";
	$resultcheck = mysqli_query($conn,$check);	

	 $row = mysqli_num_rows($resultcheck);
			if($row == 1){
			
				
			}	else{

				$q = "insert into quizregistration(user, pass) values ('$username', '$password')"  ;

				$result = mysqli_query($conn,$q);

			}



?>


