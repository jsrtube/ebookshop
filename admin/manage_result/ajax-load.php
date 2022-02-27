<?php

include '../connection2.php';

$sql2 = "SELECT * FROM quiz_result";
$result2 = mysqli_query($conn, $sql2) or die("SQL Query Failed.");

$output = "";
if(mysqli_num_rows($result2) > 0 ){
	
  
 $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
                <th width="60px">Id</th>
				<th>Username</th>
				<th>Question Attended</th>
				<th>Total Marks</th>
				<th>Task</th>
				<th>Date&Time</th>
          
                <th width="90px">Delete</th>
              </tr>';

              while($row = mysqli_fetch_assoc($result2)){
                $output .= "<tr><td align='center'>{$row["id"]}</td><td>{$row["username"]}</td><td>{$row["u_q_attend"]}</td><td>{$row["u_score"]}</td><td>{$row["task_qr_num"]}</td><td>{$row["t_date"]}</td><td align='center'><button Class='delete-btn' data-id='{$row["id"]}'>Delete</button></td></tr>";
              }
    $output .= "</table>";


    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}
?>
