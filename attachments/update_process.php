<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["email"])) {
  header("Location: login.php");
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

// Check if the form has been submitted
if (isset($_POST["submit"])) {
  // Get the updated user information
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_SESSION["email"];

  // Update the user in the database
  $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name' WHERE email='$email'";
  $conn->query($sql);

  // Store the updated user information in the session
  $_SESSION["first_name"] = $first_name;
  $_SESSION["last_name"] = $last_name;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update User Information</title>
</head>

