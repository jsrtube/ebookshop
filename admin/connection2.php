<?php
session_start();
if(!isset($_SESSION['admin_login'])){
	header('location:login.php');
}

//$servername = "localhost";
//$username = "root";
//$password = "";
//$db_name = "quizdb"; 

$servername = "fdb32.awardspace.net";
$username = "3868820_bg";
$password = "Govind@1+2";
$db_name = "3868820_bg";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "";

?>