<?php 	

require_once 'connection.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$userName = $_POST['userName'];
	$userFullName = $_POST['userFullName'];
	$contactNo = $_POST['contactNo'];
	$emailAddress = $_POST['emailAddress'];
	$userPassword = md5($_POST['userPassword']);

	
}