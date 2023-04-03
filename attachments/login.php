<?php
// Connect to the database
$servername = "localhost";
$dbname = "dblab8";
$username = "vini";
$password = "password";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Validating the user's credentials
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Start session and store user's information
  session_start();
  $row = $result->fetch_assoc();
  $_SESSION['id'] = $row['id'];
  $_SESSION['first_name'] = $row['first_name'];
  $_SESSION['last_name'] = $row['last_name'];
  $_SESSION['email'] = $row['email'];

  // Redirecting the user to welcome page
  header("Location: welcome.html");
} else {
  // Displaying the error message
  echo "Invalid email or password";
}



// Close the database connection
$conn->close();
?>

