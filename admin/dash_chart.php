<?php

header('Content-Type: application/json');
include 'connection2.php';

$sqlQuery = "SELECT u_score,task_qr_num,t_date,username FROM quiz_result";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>