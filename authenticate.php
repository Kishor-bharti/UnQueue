<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to MySQL database
    $conn = new mysqli("localhost", "root", "", "UnQueue");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($email && $password) {

    // Prepare SQL query to fetch user data
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    // Check if user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION['email'] = $email;
            // Redirect to restricted page
            header("Location: unqueue.php");
            exit;
        } else {
            // Password is incorrect, redirect back to login page with error message
            header("Location: login.php?error=Invalid password! Please try again!");
            exit;
        }
    } else {
            // User does not exist, redirect back to login page with error message
        header("Location: login.php?error=User not found! Please Signup First!");
        exit;
    }
    }
    // Close database connection
    $conn->close();
}
?>