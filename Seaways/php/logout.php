<?php
// Start a session
session_start();

// Destroy the session data
session_destroy();

// Redirect the user to the login page
header("Location: http://localhost/Seaways/html/Login.html");
exit();
?>
