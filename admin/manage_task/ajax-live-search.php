<?php
include '../connection2.php';

$search_value = $_POST["search"];



$sql = "SELECT * FROM question INNER JOIN answers ON question.ans_id=answers.aid WHERE task_qr_num LIKE '%{$search_value}%' OR question LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
  $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
                <th width="60px">Id</th>
                <th>Questions</th>
				<th>Answers</th>
				<th>Task Qr</th>
                <th width="90px">Edit</th>
                <th width="90px">Delete</th>
              </tr>';

              while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr><td align='center'>{$row["qid"]}</td><td>{$row["question"]}</td><td>{$row["answers"]}</td><td>{$row["task_qr_num"]}</td><td align='center'><button class='edit-btn' data-eid='{$row["qid"]}'>Edit</button></td><td align='center'><button Class='delete-btn' data-id='{$row["qid"]}'>Delete</button></td></tr>";
              }
    $output .= "</table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
