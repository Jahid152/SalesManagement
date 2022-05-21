<?php
header("Content-Type: application/json; charset=UTF-8");

require_once'connection.php';

$sql = "SELECT order_id, order_total_price, order_status
		FROM orders ORDER BY order_date DESC LIMIT 10";

$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>