<?php
header("Content-Type: application/json; charset=UTF-8");

require_once'connection.php';
$sql = "SELECT category.category_id, category.category_name, category.category_status FROM category
		 		WHERE category.category_status = 1";
$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>