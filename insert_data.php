<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page
    header("Location: login.php");
    exit;
}
else {
    $user_email = $_SESSION['email'];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "UnQueue";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement to get the user ID
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a row is returned
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row["id"];
        $table_name = "user_" . $user_id; // Table name based on user ID

        // Get the data from the AJAX request
        $data = json_decode(file_get_contents('php://input'), true);
        $organisation_name = $data['organisation_name'];
        $Token_no = $data['Token_no'];
        $status = $data['status'];

        // Prepare and execute the SQL statement with parameter binding
        $sql = "INSERT INTO $table_name (organisation_name, Token_no, status) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $organisation_name, $Token_no, $status);

        if ($stmt->execute()) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "No user found with email: " . $user_email;
    }

    // Close the database connection
    $conn->close();
}