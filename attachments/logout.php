<?php
session_start();
session_destroy();
// Destroy the session and redirect to the login page

header("Location: login.html");
exit();

?>

