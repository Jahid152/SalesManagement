<?php
header("Content-Type: application/json; charset=UTF-8");

require_once'connection.php';

$sql = "SELECT product.product_image, orders.order_id, product.product_name, orders.product_order_qty, orders.order_total_price, orders.order_status
		FROM orders
		INNER JOIN product
		ON orders.product_id=product.product_id";

$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>