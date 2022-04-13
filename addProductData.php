<?php 	

require_once 'connection.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$productName = $_POST['productName'];
	$rate = $_POST['price'];
 	$quantity= $_POST['quantity'];	
	$productStatus 	= $_POST['productStatus'];

	$type = explode('.', $_FILES['productImage']['name']);
	$type = $type[count($type)-1];		
	$imgName = uniqid(rand()).'.'.$type;
	$imageLocation = 'images/'.$imgName;
	
	}		
}