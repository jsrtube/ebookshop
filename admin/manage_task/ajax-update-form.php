<?php
include '../connection2.php';

$task_id = $_POST["id"];
$question = $_POST["question"];
$answers = $_POST['answers'];
$task_qr_num = $_POST['task_qr_num'];

$sql = "UPDATE question INNER JOIN answers ON question.ans_id=answers.aid SET question.question = '{$question}',answers.answers = '{$answers}',question.task_qr_num = '{$task_qr_num}' WHERE question.qid = '{$task_id}'";


//$sql = "UPDATE admin1 SET username = '{$firstName}',password = '{$lastName}' WHERE id = {$student_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
