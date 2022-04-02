<?php 	
header("Content-Type: application/json; charset=UTF-8");
require_once 'connection.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$categoriesName = $_POST['categoriesName'];
	$categoriesStatus = $_POST['categoriesStatus'];

}