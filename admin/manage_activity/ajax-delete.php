<?php
include '../connection2.php';

$user_id = $_POST["id"];


$sql = "DELETE FROM activity WHERE id = {$user_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
