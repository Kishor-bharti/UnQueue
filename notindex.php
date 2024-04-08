<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['email'])) {
    // Redirect to login page
    header("Location: unqueue.php");
    exit;
}
?>