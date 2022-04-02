<?php
require_once'connection.php';

session_start();

if(isset($_SESSION['userId'])) {
	header('location: dashboard.php');		
}

$errors = array();

if($_POST){
	$user = $_POST['username'];
	$password = $_POST['password'];
	if(empty($user) || empty($password)) {
		if($user == "") {
			$errors[] = "Username is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM sales_manager WHERE salesman_id = '$user'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$password = md5($password);
			$mainSql = "SELECT * FROM sales_manager WHERE salesman_id = '$user' AND salesman_pass = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['salesman_id'];
				$_SESSION['userId'] = $user_id;

				header('location:'.$store_url.'dashboard.php');	
			} else{
				
				$errors[] = "Incorrect username/password combination";
			}
		} else {		
			$errors[] = "Username doesnot exists";		
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sales Management System</title>

	<link rel="stylesheet" href="file/bootstrap/css/bootstrap.min.css">

	<script src="file/jquery/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		
</div>
<?php
require_once 'footer.php';
?>

</body>
</html>
