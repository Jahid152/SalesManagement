<?php
require_once 'header.php';
?>

	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default border rounded">
				<div class="panel-heading">
					<div class="heading" style="padding: 5px;"> Manage Product</div>
				</div>
				<div class="panel-body">
					
					<div class="remove-messages"></div>
					
					<div class="div-action pull pull-left" style="padding:20px;">
						<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal">
							<i class="fa fa-plus"></i> Add Product
						</button>
					</div>	
					
					<div class="div-action pull pull-right" style="padding:20px;">
						<div class="form-inline">
						    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="productSearchKey">
						    <button class="btn btn-outline-success my-2 my-sm-0" id="productSearchBtn" onclick="searchByNameLoad()">Search</button>
						</div>
					</div>

					<!-- Product search query by Ajax -->

					<script>
						var searchByName;

						function searchByNameLoad() {
							$(document).ready(function(){
								jQuery('#manageProductTable').html('');
								searchByName = document.getElementById('productSearchKey').value;
								searchByName = searchByName.replace("'", "''");

								var formData = {
									'searchByName': searchByName
								};

							    $.ajax({
							        type: 'POST',
							        url: 'productSearch.php',
							        data: formData,
									dataType: 'json',
							        success: function(data) {
							        	$.each(data, function(key, items) {
								            var productImage = items.product_image;
								            var productId = items.product_id;
								            var productName = items.product_name;
								            var productQuantity = items.product_qty;
								            var productPrice = items.product_price;
								            var productStatus;
								            if( items.product_status == 1)
								            	productStatus = "Available";
								            else
								            	productStatus = "Not Available";
								            $('#manageProductTable').append(

								            	'<tr>' + '<td><img src="images/' + productImage + '" width="50" height="50"></td> <td>' + productId + '</td><td>'+ productName + '</td><td>'
								            	+ productQuantity + '</td><td>' + productPrice + '</td><td>' + productStatus + '</td>' + '</tr>'

								            	);
								        });
							        }
							    });
							    return false;
							});
						}
					</script>
					
					<table class="table" id="manageProductTable">							
						<tr>
							<th style="width:10%;">Photo</th>						
							<th>Product Id</th>
							<th>Product Name</th>							
							<th>Stock</th>
							<th>Price (BDT)</th>
							<th>Status</th>
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
		        url: 'getProductData.php',
		        dataType: 'json',
		        success: function(data) {
		        	$.each(data, function(key, items) {
			            var productImage = items.product_image;
			            var productId = items.product_id;
			            var productName = items.product_name;
			            var productQuantity = items.product_qty;
			            var productPrice = items.product_price;
			            var productStatus;
			            if( items.product_status == 1)
			            	productStatus = "Available";
			            else
			            	productStatus = "Not Available";
			            $('#manageProductTable').append(

			            	'<tr>' + '<td><img src="images/' + productImage + '" width="50" height="50"></td> <td>' + productId + '</td><td>'+ productName + '</td><td>'
			            	+ productQuantity + '</td><td>' + productPrice + '</td><td>' + productStatus + '</td><td><button type="button" class="btn btn-default" id="' + productId + '" onclick="delProductData(' + productId + ')">Delete</button></td>' + '</tr>'

			            	);
			        });
		        }
		    });
		    return false;
		});
	</script>

<!-- Adding product -->

	<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">

			<form action="addProductData.php" id="addProductForm" method="POST"  enctype="multipart/form-data">

			    <div class="modal-content" id="successMessage">
			    
		    		<div class="modal-header">
		    			<h5 class="title"><i class="fa fa-plus"></i> Add Product</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>

				    <div class="modal-body" style="max-height:450px; overflow:auto;">
				      	<div id="add-product-messages"></div>

				      	<div class="form-group">
				        	<label for="productImage" class="col-sm-3 control-label" style="max-width: 50%;">Product Image </label>
							    <div class="col-sm-8">
										<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
								    <div class="kv-avatar center-block">					        
								        <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="productImage" class="file-loading" style="width:auto;" required/>
								    </div>
							      
							    </div>
				        </div>

				        <div class="form-group">
				        	<label for="productName" class="col-sm-3 control-label" style="max-width: 50%;">Product Name </label>
							    <div class="col-sm-8">
							      <input type="varchar" class="form-control" id="productName" placeholder="Product Name" name="productName" autocomplete="off" required>
							    </div>
				        </div>        	 

				        <div class="form-group">
				        	<label for="quantity" class="col-sm-3 control-label" style="max-width: 50%;">Quantity </label>
							    <div class="col-sm-8">
							      <input type="int" class="form-control" id="quantity" placeholder="Quantity" name="quantity" autocomplete="off" required>
							    </div>
				        </div>	     	        

			        	<div class="form-group">
			        		<label for="price" class="col-sm-3 control-label" style="max-width: 50%;">Price </label>
						    <div class="col-sm-8">
						    	<input type="double" class="form-control" id="price" name="price" autocomplete="off">
						    </div>
				        </div>	

				        <div class="form-group">
				        	<label for="productStatus" class="col-sm-3 control-label" style="max-width: 50%;">Status </label>
							    <div class="col-sm-8">
							      <select class="form-control" id="productStatus" name="productStatus">
							      	<option value="">--SELECT--</option>
							      	<option value="1">Available</option>
							      	<option value="2">Not Available</option>
							      </select>
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
					$("#addProductForm").on('submit',(function(e) {
						e.preventDefault();
						$.ajax({
				        	url: "addProductData.php",
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
				function delProductData(prodid){
					
				}
			</script>
		</div>
	</div>
</div>
<?php
require_once 'footer.php';
?>
</body>
</html>
