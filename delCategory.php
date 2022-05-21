<?php 	

require_once 'connection.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$catid = $_POST['catid'];

	$sql = "DELETE FROM category WHERE category_id = $catid";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Category Deleted Successfully. Page will reload.";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error";
	}

}