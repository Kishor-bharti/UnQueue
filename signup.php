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
    // echo "Failed to connect to the database: " . $e->getMessage();
    echo ""; //Just to keep things clean!
} finally {
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        nav {
            border-bottom: solid 4px black;
            margin-bottom: 58px;
        }

        .logo {
            display: inline-block;
            margin: 10px;
            size: 10px;
        }

        .links ul li a {
            text-decoration: none;
            font-family: system-ui;
        }

        li {
            display: inline-block;
            font-size: 22px;
            margin: 8px;
        }

        .logo p {
            font-family: serif;
            padding: 10px;
        }

        .logo p a {
            font-size: 44px;
            text-decoration: none;
        }

        .links {
            display: inline-block;
            margin-top: 28px;
            margin-right: 10px;
            position: absolute;
            top: 0;
            right: 0;
        }

        .container {
            /* max-width: 400px; */
            max-width: 370px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .radio-group {
            margin-bottom: 15px;
        }

        .radio-group input[type="radio"] {
            margin-right: 5px;
        }

        button[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .container p {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Responsive styles */
        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <p><a href="#">UnQueue</a></p>
            </div>
            <div class="links">
                <ul>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1>Sign Up</h1>
        <form id="signupForm" action="signup.php" method="POST">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="age">Age</label>
            <input type="number" id="age" name="age" required>

            <label>Gender</label>
            <div class="radio-group">
                <input type="radio" id="male" name="gender" value="Male" required>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="Female" required>
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="Other" required>
                <label for="other">Other</label>
            </div>

            <label for="city">City</label>
            <input type="text" id="city" name="city" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>

            <button type="submit" id="signupBtn">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>

    <script>
        // Get the form and password inputs
        const form = document.getElementById('signupForm');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');

        // Add an event listener for form submission
        form.addEventListener('submit', function(event) {
            // Check if the passwords match
            if (passwordInput.value !== confirmPasswordInput.value) {
                alert('Passwords do not match!');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
</body>

</html>