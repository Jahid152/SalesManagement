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
		<div class="row justify-content-md-center align-items-center"  style="height:100vh;">
		    <div class="col col-lg-2"></div>
		    <div class="col-md-auto border border-primary rounded" style="padding:15px; background-color: white; border: 2px solid gray !important; border-radius: 5px;">
		    	<div class="panel-heading" style="padding-top: 10px">
		    		<br><hr>
					<h6 class="panel-title">Sign in</h6>
				</div>
				<div class="messages">
					<?php if($errors) {
						foreach ($errors as $key => $value) {
							echo '<div class="alert alert-warning" role="alert">
							'.$value.'</div>';										
							}
						}
					?>
				</div>
				<style>
					.col-sm-9 {
					    -ms-flex: 0 0 100% !important;
					    flex: 0 0 100% !important;
					    max-width: 100% !important;
					}
					.btn-primary {
					    color: #fff;
					    background-color: #4CAF50;
					    border-color: #4CAF50;
					}
				</style>
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" style="margin-top: 20px; width: 300px">
					<div class="form-group row">
				    	<div class="col-sm-9">
				    		<input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username">
				    	</div>
				    </div>
					<div class="form-group row">
					    <div class="col-sm-9">
					    	<input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
					    </div>
					</div>
					<div class="form-group row">
					    <div class="col-sm-10">
					    	<button type="submit" class="btn btn-primary">Sign in</button>
					    </div>
					</div>
				</form>
		    </div>
		    <div class="col col-lg-2"></div>
	    </div>				
	</div>
</div>
<?php
require_once 'footer.php';
?>

</body>
</html>
