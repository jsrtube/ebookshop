<?php
session_start(); 
include 'connection2.php';


	$task = mysqli_real_escape_string($conn, $_POST['task']);
    $query = "SELECT * FROM question WHERE task_qr_num = '$task'";
	$data = mysqli_query($conn,$query);
    $_SESSION['task']= $task;
	
	$total = mysqli_num_rows($data);
	//echo $total;
	if($total == 1)
	{
		
		$_SESSION['task']= $task;
	     //redirect page location
	}
	else
	{
		
	}
	

?>