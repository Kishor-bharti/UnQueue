<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restricted page</title>
</head>

<body>
    <h2>Welcome</h2>
    <p>This is the restricted dashboard page.</p>
    <a href="logout.php">Logout</a>
</body>

</html>