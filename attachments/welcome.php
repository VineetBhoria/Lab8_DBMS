<?php
// Start session
session_start();
                                                    
// Check if user is logged in, redirect to login form if not
if (!isset($_SESSION['first_name']) || !isset($_SESSION['last_name'])) {
	header("Location: welcome.html");
	exit();
}

// Get user data from session variables
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
?>

