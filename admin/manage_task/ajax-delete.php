<?php
include '../connection2.php';

$task_id = $_POST["id"];


$sql = "DELETE FROM question WHERE qid = {$task_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
