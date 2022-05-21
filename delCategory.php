<?php 	

require_once 'connection.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$catid = $_POST['catid'];

	$sql = "DELETE FROM category WHERE category_id = $catid";


}