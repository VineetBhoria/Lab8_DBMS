<?php
// Connect to MySQL
$host = "localhost";
$username = "vini";
$password = "password";
$dbname = "dblab8";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];

	// Validate user input
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Invalid email format.";
		exit();
	}
	
	// checking is password and confirm password matches or not
	if ($password != $confirm_password) {
		echo "Passwords do not match.";
		exit();
	}
	
	// checking the length of the password
	if (strlen($password) < 8) {
		echo "Password must be at least 8 characters long.";
		exit();
	}


	// Insert data into MySQL table
	$sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
	if (mysqli_query($conn, $sql)) {
		echo "Registration successful.";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

// Close MySQL connection
mysqli_close($conn);
?>


<html>


<a href="update.html">Update!</a>




</html>
