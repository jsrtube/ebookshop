<?php
include '../connection2.php';

$task_id = $_POST["id"];

$sql = "SELECT * FROM question INNER JOIN answers ON question.ans_id=answers.aid WHERE question.qid = '$task_id'";
//$sql = "SELECT * FROM question WHERE qid = {$task_id}";




$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){

  while($row = mysqli_fetch_assoc($result)){
    $output .= "<tr>
      <td width='90px'>Question</td>
      <td><input type='text' id='edit-question' value='{$row["question"]}'>
          <input type='text' id='edit-id' hidden value='{$row["qid"]}'>
      </td>
    </tr>
    <tr>
      <td>Answer</td>
      <td><input type='text' id='edit-answers' value='{$row["answers"]}'></td>
    </tr>
    <tr>
	<tr>
      <td>Task Qr</td>
      <td><input type='text' id='edit-task_qr_num' value='{$row["task_qr_num"]}'></td>
    </tr>
    <tr>
      <td></td>
      <td><input type='submit' id='edit-submit' value='save'></td>
    </tr>";

  }

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
