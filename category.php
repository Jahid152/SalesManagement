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
							<th></th>
							<!-- <th style="width:15%;">Options</th> -->
						</tr>
					</table>
				</div>
			</div>	
		</div>
	</div>


<!-- add categories -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog">
	<div class="modal-dialog">

		<form action="addCategory.php" id="addCatForm" method="POST"  enctype="multipart/form-data">
			<div class="modal-content" id="successMessage">

		    <div class="modal-content">	    
	    		<div class="modal-header">
	    			<h5 class="title"><i class="fa fa-plus"></i> Add Category</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      	</div>

			    <div class="modal-body" style="max-height:450px; overflow:auto;">
			      	<div id="add-Categories-messages"></div>

			        <div class="form-group">
			        	<label for="categoriesName" class="col-sm-4 control-label">Categories Name</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="categoriesName" placeholder="Categories Name" name="categoriesName" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	         	        
			        <div class="form-group">
			        	<label for="categoriesStatus" class="col-sm-4 control-label">Status</label>
						    <div class="col-sm-8">
						      <select class="form-control" id="categoriesStatus" name="categoriesStatus">
						      	<option value="">--SELECT--</option>
						      	<option value="1">Available</option>
						      	<option value="2">Not Available</option>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	         	        
			     </div> <!-- /modal-body -->
		      
		    	<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
			        
			        <button type="submit" class="btn btn-primary" id="createCategoriesBtn" data-loading-text="Loading..." autocomplete="off">
			         Save 
			    	</button>
			    </div>	      	     
	    	</div>
	    </form>
		<script>
			$(document).ready(function (e) {
				$("#addCatForm").on('submit',(function(e) {
					e.preventDefault();
					$.ajax({
			        	url: "addCategory.php",
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
	</div>
</div> 

<script>
		$(document).ready(function(){
		    $.ajax({
		        type: 'GET',
		        url: 'getCategoryData.php',
		        dataType: 'json',
		        success: function(data) {
		        	$.each(data, function(key, items) {
			            var categoryId = items.category_id;
			            var categoryName = items.category_name;
			            var categoryStatus;
			            if( items.category_status == 1)
			            	categoryStatus = "Available";
			            else
			            	categoryStatus = "Not Available";
			            // var productStatus = items.product_status;
			            $('#manageCategoriesTable').append(
			            	'<tr>' + '<td>' + categoryId + '</td><td>'+ categoryName + '</td><td>' + categoryStatus + '</td><td><button type="button" class="btn btn-default" onclick="delCategory(' + categoryId + ')">Delete</button></td></tr>'
			            );
			        });
		        }
		    });
		    return false;
		});
	</script>
	<script>
		function delCategory(catid){
			$(document).ready(function (e) {

				var formData = {
					'catid': catid
				};

				$.ajax({
		        	url: "delCategory.php",
					type: "POST",
					data: formData,
					dataType: 'json',
					success: function(data) {
						document.getElementById("successMessage").innerHTML = "";					            
			            var successMsg = "Category Deleted Successfully. Page will reload.";						           
			            alert(successMsg);
			            location.reload();
				    }	        
				});
				return false;
			});
		}
	</script>
</div>
<?php
require_once 'footer.php';
?>
</body>
</html>