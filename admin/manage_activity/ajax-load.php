<?php

include '../connection2.php';

$sql2 = "SELECT * FROM activity";
$result2 = mysqli_query($conn, $sql2) or die("SQL Query Failed.");

$output = "";
if(mysqli_num_rows($result2) > 0 ){
	
  
  $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
                <th width="60px">Id</th>
				<th>Task Num</th>
				<th>Username</th>
				<th>Underline Image</th>
				<th>Q&A Image</th>
				<th>Audio</th>
				<th>Parents image</th>
				<th>Time</th>
          
                <th width="90px">Delete</th>
              </tr>';

              while($row = mysqli_fetch_assoc($result2)){
                $output .= "<tr><td align='center'>{$row["id"]}</td><td>{$row["task_qr_num"]}</td><td>{$row["username"]}</td><td><a href='../quizworld/{$row["u_image"]}'>Image 1</a></td><td><a href='../quizworld/{$row["q_a_image"]}'>Image 2</a></td><td><a href='../quizworld/{$row["audio"]}'>Audio</a></td><td><a href='../quizworld/{$row["parents_a_image"]}'>Image 3</a></td><td>{$row["time"]}</td><td align='center'><button Class='delete-btn' data-id='{$row["id"]}'>Delete</button></td></tr>";
              }
    $output .= "</table>";



    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}
?>
