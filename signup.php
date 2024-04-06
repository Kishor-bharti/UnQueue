<?php

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "unqueue";



try {
    // Create a connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    @$fullname = $_POST['fullname'];
    @$email = $_POST['email'];
    @$age = $_POST['age'];
    @$gender = $_POST['gender'];
    @$password = $_POST['password'];


    /*
    ADD THE CODE TO CHECK THE EXISTING USER BY EMAIL HERE:::

*/


    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL statement to insert user data into the "users" table
    $sql = "INSERT INTO users (fullname, email, age, gender, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $fullname, $email, $age, $gender, $hashedPassword);

    if ($stmt->execute()) {
        // Get the user ID of the newly inserted user
        $userID = $stmt->insert_id;

        // Create a new table for the user
        $tableName = "user_" . $userID;
        $createTableQuery = "CREATE TABLE $tableName (
        userID INT NOT NULL,
        organisation_name VARCHAR(100) NOT NULL,
        status ENUM('successful', 'failed') NOT NULL,
        current_date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

        if ($conn->query($createTableQuery) === TRUE) {
            // echo "User registered successfully, and a new table has been created for the user!";

            // Your signup logic goes here

            // Assuming signup is successful, display a JavaScript alert and redirect to the login page
            echo "<script>alert('Signup successful! Redirecting to login page.'); window.location.href = 'login.php';</script>";
            // exit(); // Stop further execution
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }
} catch (Exception $e) {
    echo "Failed to connect to the database: " . $e->getMessage();
    echo ""; //Just to keep things clean!
} finally {
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
