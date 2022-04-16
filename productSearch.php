<?php
header("Content-Type: application/json; charset=UTF-8");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$searchByName = $_POST["searchByName"];
}
require_once'connection.php';

$sql = "SELECT product_image, product_id, product_name, product_price, product_qty, product_status	FROM product
		 		WHERE product_qty>0 AND product_name LIKE '%$searchByName%'";
$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);
$connect->close();
echo json_encode($outp);
?>