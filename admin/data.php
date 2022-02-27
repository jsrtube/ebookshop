<?php
session_start();
header('Content-Type: application/json');

$name_search = $_SESSION['search'];
$q_date = $_SESSION['search'];
include 'connection.php';

$sqlQuery = "SELECT u_score,task_qr_num,t_date,username FROM quiz_result WHERE username = '$name_search' or q_date = '$q_date'";


$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>