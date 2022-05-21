<?php
session_start();

if(!isset($_SESSION['userId'])) {
	header('location: index.php');		
}
require_once'connection.php';
?>
<html>
<head>
	<link rel="stylesheet" href="file/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="file/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="file/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="file/font-awesome/css/font-awesome.css">
	
	<script src="file/jquery/jquery.min.js"></script>
	  <!-- jquery ui -->  
    <link rel="stylesheet" href="file/jquery-ui/jquery-ui.min.css">
    <script src="file/jquery-ui/jquery-ui.min.js"></script>
    
	<script src="file/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="margin-bottom: 10px; background-color: #e39d00 !important;">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	    	<li class="nav-item active">
	    		<a class="nav-link" href="dashboard.php"><i class="fa fa-tachometer"></i> Dashboard <span class="sr-only">(current)</span></a>
	    	</li>
	    	<li class="nav-item">
		        <a class="nav-link" href="category.php"><i class="fa fa-tasks"></i> Category</a>
		    </li>
		    <li class="nav-item">
		        <a class="nav-link" href="product.php"><i class="fa fa-product-hunt"></i> Product</a>
		    </li>
		    <li class="nav-item dropdown" style="padding-right: 8px">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		        	<i class="fa fa-shopping-cart"></i> Order</a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
		          <a class="dropdown-item" href="orders.php"><i class="fa fa-pencil-square-o"></i>Manage Order</a>
		        </div>
		    </li>
		    <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <i class="fa fa-user"></i> Users
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <a class="dropdown-item" href="users.php"><i class="fa fa-wrench"></i> All Users</a>
		          <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
		        </div>
		    </li>
	    </ul>
	  </div>
	</nav>	 

	<div class="container">