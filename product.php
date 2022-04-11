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
						    <button class="btn btn-outline-success my-2 my-sm-0" onclick="searchByNameLoad()">Search</button>
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
			            	+ productQuantity + '</td><td>' + productPrice + '</td><td>' + productStatus + '</td>' + '</tr>'

			            	);
			        });
		        }
		    });
		    return false;
		});
	</script>
</body>
</html>
