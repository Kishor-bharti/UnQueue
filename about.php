<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['email'])) {
    // Redirect to login page
    header("Location: aboutMe.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
</head>
<body>
    <h1>Hey there!</h1>
    <h2>Its our About Page.</h2>
</body>
</html>