<?php 	

require_once 'connection.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$userName = $_POST['userName'];
	$oldPassword = md5($_POST['oldPassword']);
	$newPassword = md5($_POST['newPassword']);

	$sql = "UPDATE sales_manager SET salesman_pass = '$newPassword' WHERE salesman_id = '$userName' AND salesman_pass = '$oldPassword'";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Password reset successfully.";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error resetting password. Try again.";
	}

	$connect->close();

	echo json_encode($valid);
}