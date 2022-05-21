<?php
require_once 'header.php';
?>

	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-default border rounded">
				<div class="panel-heading">
					<div class="heading" style="padding: 5px;"> Orders</div>
				</div>
				<div class="panel-body">
					
					<div class="remove-messages"></div>
					
					<div class="div-action pull pull-left" style="padding:20px;">
						<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal">
							<i class="fa fa-plus"></i> Add Order
						</button>
					</div>	
					
					<div class="div-action pull pull-right" style="padding:20px;">
						<div class="form-inline">
						    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="productSearchKey">
						    <button class="btn btn-outline-success my-2 my-sm-0">Search</button>
						</div>
					</div>
					
					<table class="table" id="manageProductTable">							
						<tr>
							<th style="width:10%;">Photo</th>						
							<th>Order Id</th>
							<th>Product Name</th>							
							<th>Quantity</th>
							<th>Order Total (BDT)</th>
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
		        url: 'getOrderData.php',
		        dataType: 'json',
		        success: function(data) {
		        	$.each(data, function(key, items) {
			            var productImage = items.product_image;
			            var orderId = items.order_id;
			            var productName = items.product_name;
			            var orderQuantity = items.product_order_qty;
			            var orderTotal = items.order_total_price;
			            var orderStatus;
			            if( items.order_status == 1)
			            	orderStatus = "Paid";
			            else
			            	orderStatus = "Due";
			            $('#manageProductTable').append(

			            	'<tr>' + '<td><img src="images/' + productImage + '" width="50" height="50"></td> <td>' + orderId + '</td><td>'+ productName + '</td><td>'
			            	+ orderQuantity + '</td><td>' + orderTotal + '</td><td>' + orderStatus + '</td>' + '</tr>'

			            	);
			        });
		        }
		    });
		    return false;
		});
	</script>

	