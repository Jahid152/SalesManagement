<?php
require_once 'header.php';
?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default border rounded">
				<div class="page-heading" style="background-image: linear-gradient(to bottom,#CDDC39 0,#8BC34A 100%);">
					<div class="heading" style="padding: 5px;"> Manage Categories</div>
				</div>
				<div class="panel-body">

					<div class="remove-messages"></div>

					<div class="div-action pull pull-right" style="padding:20px;">
						<button class="btn btn-default button1" data-toggle="modal" id="addCategoryBtn" data-target="#addCategory">
							<i class="fa fa-plus"></i> Add Category
						</button>
					</div>			
					
					<table class="table" id="manageCategoriesTable">
						<tr>
							<th>Category Id</th>							
							<th>Categories Name</th>
							<th>Status</th>
							<!-- <th style="width:15%;">Options</th> -->
						</tr>
					</table>
				</div>
			</div>	
		</div>
	</div>


</body>
</html>