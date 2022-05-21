<?php
require_once 'header.php';
?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default border rounded">
				<div class="panel-heading">
					<div class="heading" style="padding: 5px;"> User Management</div>
				</div>
				<div class="panel-body">
					
					<div class="remove-messages"></div>

					<div class="div-action pull pull-left" style="padding:20px;">
						<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal">
							<i class="fa fa-plus"></i> Add User
						</button>
					</div>

					<div class="div-action pull pull-left" style="padding:20px;">
						<button class="btn btn-default button1" data-toggle="modal" id="resetPassModalBtn" data-target="#resetPassModal">
							<i class="fa fa-plus"></i> Reset Password
						</button>
					</div>	
					
					<div class="div-action pull pull-right" style="padding:20px;">
						<form class="form-inline">
						    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						</form>
					</div>	
					
					<table class="table" id="manageProductTable">							
						<tr>
							<th style="width:10%;">Username</th>						
							<th>Name</th>
							<th>Contact</th>							
							<th>Email</th>
							<th></th>
						</tr>

					</table>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
		    $.ajax({
		        type: 'GET',
		        url: 'getUsersData.php',
		        dataType: 'json',
		        success: function(data) {
		        	$.each(data, function(key, items) {
			            var userName = items.salesman_id;
			            var fullName = items.salesman_name;
			            var contactNo = items.salesman_contact;
			            var emailAddress = items.salesman_email;
			            
			            $('#manageProductTable').append('<tr>' + '<td>' + userName + '</td><td>'+ fullName + '</td><td>' + contactNo + '</td><td>' + emailAddress + '</td><td><button type="button" class="btn btn-default" onclick="delUser(\'' + userName + '\')">Delete</button></td></tr>');
			        });
		        }
		    });
		    return false;
		});
	</script>

<!-- Adding users -->
	<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">

			<form action="addUser.php" id="addUserForm" method="POST"  enctype="multipart/form-data">

			    <div class="modal-content" id="successMessage">
			    
		    		<div class="modal-header">
		    			<h5 class="title"><i class="fa fa-plus"></i> Add User</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>

				    <div class="modal-body" style="max-height:450px; overflow:auto;">
				      	<div id="add-product-messages"></div>

				        <div class="form-group">
				        	<label for="productName" class="col-sm-3 control-label">Username </label>
							    <div class="col-sm-8">
							      <input type="varchar" class="form-control" id="userName" placeholder="Username" name="userName" autocomplete="off" required>
							    </div>
				        </div>

				        <div class="form-group">
				        	<label for="productName" class="col-sm-3 control-label" style="max-width: 50%;">Full Name </label>
							    <div class="col-sm-8">
							      <input type="varchar" class="form-control" id="userFullName" placeholder="Full Name" name="userFullName" autocomplete="off" required>
							    </div>
				        </div>

				        <div class="form-group">
				        	<label for="productName" class="col-sm-3 control-label" style="max-width: 50%;">Contact No. </label>
							    <div class="col-sm-8">
							      <input type="varchar" class="form-control" id="contactNo" placeholder="Contact No." name="contactNo" autocomplete="off" required>
							    </div>
				        </div>

				        <div class="form-group">
				        	<label for="productName" class="col-sm-3 control-label" style="max-width: 50%;">Email Address </label>
							    <div class="col-sm-8">
							      <input type="varchar" class="form-control" id="emailAddress" placeholder="Email Address" name="emailAddress" autocomplete="off" required>
							    </div>
				        </div>

				        <div class="form-group">
				        	<label for="productName" class="col-sm-3 control-label">Password </label>
							    <div class="col-sm-8">
							      <input type="varchar" class="form-control" id="userPassword" placeholder="Password" name="userPassword" autocomplete="off" required>
							    </div>
				        </div>  	        	        
				    </div>
				      
			        <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        
				        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off">Save</button>
			        </div>
			    </div>
			</form>
			<script>
				$(document).ready(function (e) {
					$("#addUserForm").on('submit',(function(e) {
						e.preventDefault();
						$.ajax({
				        	url: "addUser.php",
							type: "POST",
							data:  new FormData(this),
							contentType: false,
				    	    cache: false,
							processData:false,
							success: function(data) {
								document.getElementById("successMessage").innerHTML = "";					            
					            var successMsg = "Successfully Added";						           
					            $('#successMessage').append('<span style="padding: 10px; font-weight: bold; color: green;">'+ successMsg + '</span>');
						    },error: function() {

							}
					   });
					}));
				});
			</script>
			<script>
				function delUser(user){
					$(document).ready(function (e) {

						var formData = {
							'userid': user
						};

						$.ajax({
				        	url: "delUser.php",
							type: "POST",
							data: formData,
							dataType: 'json',
							success: function(data) {
								document.getElementById("successMessage").innerHTML = "";					            
					            var successMsg = "User Deleted Successfully. Page will reload.";						           
					            alert(successMsg);
					            location.reload();
						    }	        
						});
						return false;
					});
				}
			</script>
		</div>
	</div>
	<!-- Reset password -->
	<div class="modal fade" id="resetPassModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">

			<form action="resetPass.php" id="resetPassForm" method="POST"  enctype="multipart/form-data">
				<div class="modal-content" id="successMessage2">

			    <div class="modal-content">	    
		    		<div class="modal-header">
		    			<h5 class="title"><i class="fa fa-plus"></i> Reset/Update Password</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>

				    <div class="modal-body" style="max-height:450px; overflow:auto;">
				      	<div id="add-Categories-messages"></div>

				        <div class="form-group">
				        	<label for="userName" class="col-sm-4 control-label">Username</label>
							    <div class="col-sm-8">
							      <input type="text" class="form-control" id="userName" placeholder="Username" name="userName" autocomplete="off">
							    </div>
				        </div>
				        <div class="form-group">
				        	<label for="oldPassword" class="col-sm-4 control-label">Old Password</label>
							    <div class="col-sm-8">
							      <input type="text" class="form-control" id="oldPassword" placeholder="Old Password" name="oldPassword" autocomplete="off">
							    </div>
				        </div>
				        <div class="form-group">
				        	<label for="newPassword" class="col-sm-4 control-label">New Password</label>
							    <div class="col-sm-8">
							      <input type="text" class="form-control" id="newPassword" placeholder="New Password" name="newPassword" autocomplete="off">
							    </div>
				        </div>
				     </div> <!-- /modal-body -->
			      
			    	<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
				        
				        <button type="submit" class="btn btn-primary" id="resetPassBtn" data-loading-text="Loading..." autocomplete="off">
				         Save 
				    	</button>
				    </div>	      	     
		    	</div>
		    </form>
			<script>
				$(document).ready(function (e) {
					$("#resetPassForm").on('submit',(function(e) {
						e.preventDefault();
						$.ajax({
				        	url: "resetPass.php",
							type: "POST",
							data:  new FormData(this),
							contentType: false,
				    	    cache: false,
							processData:false,
							success: function(data) {
								document.getElementById("successMessage2").innerHTML = "";					            
					            var successMsg2 = "Password reset successfully";						           
					            $('#successMessage2').append('<span style="padding: 10px; font-weight: bold; color: green;">'+ successMsg2 + '</span>');
						    },error: function() {
							} 	        
					   });
					}));
				});

			</script>  
		</div>
	</div>
<?php
require_once 'footer.php';
?>
</body>
</html>