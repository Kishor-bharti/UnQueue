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
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$password = $_POST['password'];

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
        echo "User registered successfully, and a new table has been created for the user!";
    } else {
        echo "Error creating table: " . $conn->error;
    }
} 

}

catch (Exception $e) {
    echo "Failed to connect to the database: " . $e->getMessage();
}
// else {
//     echo "Error: " . $stmt->error;
// }

finally {
// Close the statement and connection
$stmt->close();
$conn->close();
}



/*
try {
    // Connect to the database
    $conn= mysqli_connect($servername,$username,$password,$database);


    // Get form data
    if ($_SERVER['REQUEST_METHOD']=='POST'){

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    }


    // // Check if a user with the same email already exists
    // $sql = "SELECT * FROM users WHERE email = $email";
    // $existingUser=mysqli_query($conn,$sql);


    // if ($existingUser) {
    //     echo "User with the same email already exists.";
    // } else {
        // Insert the new user into the database
        $sql = "INSERT INTO `users` (`fullname`, `email`, `age`, `gender`, `password`) VALUES ($fullname, $email, $age, $gender, $city, $password)";

        // Get the newly inserted user's ID
        $userId= mysqli_insert_id($conn);

        // Create a new table for the user
        $tableName = "user_" . $userId;
        $createTableQuery = "CREATE TABLE $tableName (
            id INT AUTO_INCREMENT PRIMARY KEY,
            users_id INT NOT NULL,
            organisation_name VARCHAR(100) NOT NULL,
            status ENUM('Successful', 'Failed') NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        
        mysqli_query($conn,$createTableQuery);

        echo "Signup successful! Redirecting to login page...";
        // header("refresh:3;url=login.html");
    }
}
} catch (Exception $e) {
    echo "Failed to connect to the database: " . $e->getMessage();
} finally {

    if ($conn)
    {
        mysqli_close($conn);
    }
}
*/




















































// // Database connection details
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

// // Get form data
// $fullname = $_POST['fullname'];
// $email = $_POST['email'];
// $age = $_POST['age'];
// $gender = $_POST['gender'];
// $password = $_POST['password'];

// // Hash the password for security
// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// // Prepare and execute the SQL statement
// $sql = "INSERT INTO users (fullname, email, age, gender, password) VALUES (?, ?, ?, ?, ?)";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("ssiss", $fullname, $email, $age, $gender, $hashedPassword);

// if ($stmt->execute()) {
//     echo "User registered successfully!";
// } else {
//     echo "Error: " . $stmt->error;
// }

// // Close the statement and connection
// $stmt->close();
// $conn->close();



?>