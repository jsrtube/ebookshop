<?php

include '../connection2.php';

$sql2 = "SELECT * FROM user_reg";
$result2 = mysqli_query($conn, $sql2) or die("SQL Query Failed.");

$output = "";
if(mysqli_num_rows($result2) > 0 ){
	
  
 $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
                <th width="60px">Id</th>
                <th>Full Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Mobile</th>
                <th width="90px">Edit</th>
                <th width="90px">Delete</th>
              </tr>';

              while($row = mysqli_fetch_assoc($result2)){
                $output .= "<tr><td align='center'>{$row["id"]}</td><td>{$row["fullname"]}</td><td>{$row["username"]}</td><td>{$row["email"]}</td><td>{$row["mobile"]}</td><td align='center'><button class='edit-btn' data-eid='{$row["id"]}'>Edit</button></td><td align='center'><button Class='delete-btn' data-id='{$row["id"]}'>Delete</button></td></tr>";
              }
    $output .= "</table>";


    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}
?>
