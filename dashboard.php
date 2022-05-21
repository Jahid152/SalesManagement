<?php require_once 'header.php'; ?>

<?php 

$sql = "SELECT * FROM product WHERE product_status = 1";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM orders WHERE order_status = 1";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$lowStockSql = "SELECT * FROM product WHERE product_qty <= 3 AND product_status = 1";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$connect->close();
?>


	<style type="text/css">
		.ui-datepicker-calendar {
			display: none;
		}
	</style>
    <link rel="stylesheet" href="file/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="file/fullcalendar/fullcalendar.print.css" media="print">

	<div class="row" style = "margin-top: 30px">
		<div class="col-sm-4">
			<div style="padding: 10px 10px; background-color: lightblue">
				<span style="float:left; font-weight: bold;">Total Product</span><span style="float:right"><?php echo $countProduct; ?></span>
				<div style="clear: both;"></div>
			</div>
		</div>
		
		<div class="col-sm-4">
			<div style="padding: 10px 10px; background-color: lightblue">
				<span style="float:left; font-weight: bold;">Low Stock</span><span style="float:right"><?php echo $countLowStock; ?></span>
				<div style="clear: both;"></div>
			</div>
		</div>
		 
			
		<div class="col-sm-4">
			<div style="padding: 10px 10px; background-color: lightblue">
				<span style="float:left; font-weight: bold;">Total Order</span><span style="float:right"><?php echo $countOrder; ?></span>
				<div style="clear: both;"></div>
			</div>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-sm-4">

			<div class="card" style="text-align: center">
			  <div class="cardHeader" style = "background-color: #ffffff">
				<form name = "form1">
				  <br>
				  <input id = "calc" type ="text" name = "answer"><br><br>
				  <input type = "button" value = "1" onclick = "form1.answer.value += '1' ">
				  <input type = "button" value = "2" onclick = "form1.answer.value += '2' ">
				  <input type = "button" value = "3" onclick = "form1.answer.value += '3' ">
				  <input type = "button" value = "+" onclick = "form1.answer.value += '+' ">
				  <br><br>
				  
				  <input type = "button" value = "4" onclick = "form1.answer.value += '4' ">
				  <input type = "button" value = "5" onclick = "form1.answer.value += '5' ">
				  <input type = "button" value = "6" onclick = "form1.answer.value += '6' ">
				  <input type = "button" value = "-" onclick = "form1.answer.value += '-' ">
				  <br><br>
				  
				  <input type = "button" value = "7" onclick = "form1.answer.value += '7' ">
				  <input type = "button" value = "8" onclick = "form1.answer.value += '8' ">
				  <input type = "button" value = "9" onclick = "form1.answer.value += '9' ">
				  <input type = "button" value = "*" onclick = "form1.answer.value += '*' ">
				  <br><br>
				  
				  
				  <input type = "button" value = "/" onclick = "form1.answer.value += '/' ">
				  <input type = "button" value = "0" onclick = "form1.answer.value += '0' ">
				  <input type = "button" value = "." onclick = "form1.answer.value += '.' ">
				  <input type = "button" value = "=" onclick = "form1.answer.value = eval(form1.answer.value) ">
				  <br><br> 
				  <input type = "button" value = "Clear All" onclick = "form1.answer.value = ' ' " id= "clear" >
				  <br> 
				</form>
			  </div><br>
			  <div class="cardHeader" style = "background-color: #87ceeb">
			    <h1><?php echo date('d'); ?></h1>
			  </div>

			  <div class="cardContainer">
			    <p><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>
			  </div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="panel panel-success border rounded">
				<div class="panel-heading" style="padding: 10px; font-weight: bold;">Recent Orders</div>
				<table class="table" id="manageOrderTable">
					<tr>
						<th style = "width: 33%">Order ID</th>
						<th style = " width: 34%">Total Price</th>
						<th style = "width: 33%">Order Status</th>
					</tr>
				</table>

				<script>
					$(document).ready(function(){
					    $.ajax({
					        type: 'GET',
					        url: 'recentOrders.php',
					        dataType: 'json',
					        success: function(data) {
					        	$.each(data, function(key, items) {
						            var orderId = items.order_id;
						            var orderTotal = items.order_total_price;
						            var orderStatus;
						            if( items.order_status == 1)
						            	orderStatus = "Paid";
						            else
						            	orderStatus = "Due";
						            $('#manageOrderTable').append(

						            	'<tr>' + '<td>' + orderId + '</td><td>' + orderTotal + '</td><td>' + orderStatus + '</td>' + '</tr>'

						            	);
						        });
					        }
					    });
					    return false;
					});
				</script>
			</div>
		</div>
	</div>
</div>

<?php
require_once 'footer.php';
?>
</body>
</html>