<?php
include '../connection2.php';
$user_id = $_POST["id"];
$fullname = $_POST["fullname"];
$username = $_POST["username"];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

$sql = "UPDATE user_reg SET username = '{$username}', fullname = '{$fullname}', email = '{$email}', mobile = '{$mobile}' WHERE id = '$user_id'";


//$sql = "UPDATE admin1 SET username = '{$firstName}',password = '{$lastName}' WHERE id = {$student_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
