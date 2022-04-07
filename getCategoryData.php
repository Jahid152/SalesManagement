<?php
header("Content-Type: application/json; charset=UTF-8");

require_once'connection.php';
$sql = "SELECT category.category_id, category.category_name, category.category_status FROM category
		 		WHERE category.category_status = 1";

?>