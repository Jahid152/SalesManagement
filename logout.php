<?php 

session_start();

require_once 'connection.php';

// echo $_SESSION['userId'];

if(!$_SESSION['userId']) {
	header('location: index.php');	
} 

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

header('location: index.php');	

?>