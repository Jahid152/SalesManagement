<?php 	
header("Content-Type: application/json; charset=UTF-8");
require_once 'connection.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$productId = $_POST['productId'];
	$quantity = $_POST['quantity'];

	$prodPriceSql = "SELECT product_price, product_qty FROM product WHERE product_id='$productId'";

	$prodPrice = $connect->query($prodPriceSql);
	$prodTotalPrice = $prodPrice->fetch_assoc();
	$orderPrice = $prodTotalPrice["product_price"];
	$orderTotalPrice = $orderPrice*$quantity;

	$productGetQty = $prodTotalPrice["product_qty"];
	$productNewQty = $productGetQty-$quantity;
	$prodQtySql = "UPDATE product SET product_qty='$productNewQty' WHERE product_id='$productId'";
	$prodQtyUpdate = $connect->query($prodQtySql);


	$sql = "INSERT INTO orders (product_id, order_date, order_total_price, product_order_qty, order_status) 
			VALUES ('$productId', NOW(), '$orderTotalPrice', '$quantity', 1)";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error";
	}

	$connect->close();

	echo json_encode($valid);
}