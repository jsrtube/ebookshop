<?php
include '../connection2.php';

$user_id = $_POST["id"];


$sql = "DELETE FROM user_reg WHERE id = {$user_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
