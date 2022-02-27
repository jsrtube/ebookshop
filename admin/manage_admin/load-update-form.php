<?php
include '../connection2.php';

$user_id = $_POST["id"];

$sql = "SELECT * FROM admin WHERE id = '$user_id'";
//$sql = "SELECT * FROM question WHERE qid = {$task_id}";




$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){

  while($row = mysqli_fetch_assoc($result)){
    $output .= "<tr>
      <td width='90px'>Full Name</td>
      <td><input type='text' id='edit-fullname' value='{$row["fullname"]}'>
          <input type='text' id='edit-id' hidden value='{$row["id"]}'>
      </td>
    </tr>
    <tr>
      <td>Username</td>
      <td><input type='text' id='edit-username' value='{$row["username"]}'></td>
    </tr>
 <tr>
      <td>Password</td>
      <td><input type='text' id='edit-password' value='{$row["password"]}'></td>
    </tr>
	<tr>
      <td>Mobile</td>
      <td><input type='text' id='edit-mobile' value='{$row["mobile"]}'></td>
    </tr>
	<tr>
      <td>Email</td>
      <td><input type='text' id='edit-email' value='{$row["email"]}'></td>
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
