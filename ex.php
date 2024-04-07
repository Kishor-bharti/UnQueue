<?php
session_start();

// Check if user is already logged in
if (isset($_SESSION['email'])) {
    header("Location: unqueue.php");
    exit;
}

$host = "localhost";
$username = "root";
$password = "";
$database = "UnQueue";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check login credentials
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Your authentication logic here
    // For example, authenticate against a database
    // If authentication is successful, redirect to dashboard.php
    // Otherwise, display an error message
}
?>

<?php
// session_start();
// Database connection details
// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "UnQueue";

// // Create a connection
// $conn = new mysqli($host, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Check if user is already logged in
// if (isset($_SESSION['email'])) {
//     header("Location: unqueue.php");
//     exit;
// }


// Check login credentials
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    @$email = $_POST['email'];
    @$password = $_POST['password'];



    if ($email && $password) {
        //SQL statement to check if the user exists
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                // Password is correct, handle user login
                $userID = $row['id'];
                $tableName = "user_" . $userID;
                // session_start();

                // echo "Login successful! User ID: ";
                echo '<script>alert("Login successful! Redirecting to the home page.");</script>';
                // header("Location: unqueue.php");
                $_SESSION['email'] = $email;
                header("Location: unqueue.php");
                exit();
            } else {
                // echo "Invalid password.";
                echo '<script>alert("Invalid password! Please try again!");</script>';
            }
        } else {
            // echo "User not found.";
            echo '<script>alert("User not found! Please Register First!");</script>'; // just to keep things clean!
        }
    }
}
// Close the statement and connection
// @$stmt->close();
$conn->close();
// echo @$_SESSION['email'];
?>