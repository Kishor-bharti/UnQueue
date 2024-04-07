<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();
header("Location: login.php?error=logout successfully");
exit;

// Redirect to the login page
header("Location: login.php");
exit;
?>