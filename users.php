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
			            
			            $('#manageProductTable').append('<tr>' + '<td>' + userName + '</td><td>'+ fullName + '</td><td>' + contactNo + '</td><td>' + emailAddress + '</td></tr>');
			        });
		        }
		    });
		    return false;
		});
	</script>

<!-- Adding product -->


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
			    </div>
			</form>
		</div>
	</div>
</div>
<?php
require_once 'footer.php';
?>
</body>
</html>
