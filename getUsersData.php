<?php
header("Content-Type: application/json; charset=UTF-8");
require_once'connection.php';

$sql = "SELECT salesman_id, salesman_name, salesman_contact, salesman_email	FROM sales_manager";
$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>