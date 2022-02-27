<?php
include '../connection2.php';

$search_value = $_POST["search"];



$sql = "SELECT * FROM activity WHERE username LIKE '%{$search_value}%' OR task_qr_num LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
   
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

              while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr><td align='center'>{$row["id"]}</td><td>{$row["task_qr_num"]}</td><td>{$row["username"]}</td><td>{$row["u_image"]}</td><td>{$row["q_a_image"]}</td><td>{$row["audio"]}</td><td>{$row["parents_a_image"]}</td><td>{$row["time"]}</td><td align='center'><button Class='delete-btn' data-id='{$row["id"]}'>Delete</button></td></tr>";
              }
    $output .= "</table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
