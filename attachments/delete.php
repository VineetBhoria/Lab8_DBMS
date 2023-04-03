<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["email"])) {
  header("Location: welcome.html");
  exit();
}

// Connect to the database
$servername = "localhost";
$username = "vini";
$password = "password";
$dbname = "dblab8";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Delete the user from the database
$email = $_SESSION["email"];
$sql = "DELETE FROM users WHERE email='$email'";
$conn->query($sql);

// Close the database connection
$conn->close();

echo "Account deleted successfully";

// Destroy the session and redirect to the login page
session_destroy();
header("Location: login.html");
exit();
?>

