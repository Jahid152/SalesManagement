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
</body>
</html>
