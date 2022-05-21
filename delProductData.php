<?php 	

require_once 'connection.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$prodid = $_POST['prodid'];

	$sql = "DELETE FROM product WHERE product_id = $prodid";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Product Deleted Successfully";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error";
	}

	$connect->close();

	echo json_encode($valid);
}