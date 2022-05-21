<?php 	

require_once 'connection.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$userid = $_POST['userid'];

	$sql = "DELETE FROM sales_manager WHERE salesman_id = '$userid'";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "User Deleted Successfully. Page will reload.";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error";
	}

	$connect->close();

	echo json_encode($valid);
}