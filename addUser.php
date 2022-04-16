<?php 	

require_once 'connection.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$userName = $_POST['userName'];
	$userFullName = $_POST['userFullName'];
	$contactNo = $_POST['contactNo'];
	$emailAddress = $_POST['emailAddress'];
	$userPassword = md5($_POST['userPassword']);

	$sql = "INSERT INTO sales_manager (salesman_id, salesman_name, salesman_contact, salesman_email, salesman_pass) 
				VALUES ('$userName', '$userFullName', '$contactNo', '$emailAddress', '$userPassword')";

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