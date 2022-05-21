<?php
header("Content-Type: application/json; charset=UTF-8");

require_once'connection.php';
$sql = "SELECT product_image, product_id, product_name, product_price, product_qty, product_status FROM product
		WHERE product_status = 1 AND product_qty>0";
$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>