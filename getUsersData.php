<?php
header("Content-Type: application/json; charset=UTF-8");
require_once'connection.php';

$sql = "SELECT salesman_id, salesman_name, salesman_contact, salesman_email	FROM sales_manager";

?>