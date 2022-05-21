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
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['productImage']['tmp_name'], $imageLocation)) {
				
				$sql = "INSERT INTO product (product_image, product_name, product_price, product_qty, product_status) 
				VALUES ('$imgName', '$productName', '$rate', '$quantity', '$productStatus')";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error";
				}

			}	else {
				return false;
			}	
		}
	}		

	$connect->close();

	echo json_encode($valid);
}