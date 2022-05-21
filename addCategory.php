<?php 	
header("Content-Type: application/json; charset=UTF-8");
require_once 'connection.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$categoriesName = $_POST['categoriesName'];
	$categoriesStatus = $_POST['categoriesStatus'];

	$sql = "INSERT INTO category (category_name, category_status) 
			VALUES ('$categoriesName', '$categoriesStatus')";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} 

	echo json_encode($valid);
}