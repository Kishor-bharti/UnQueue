<?php
session_start();
// Display error message if provided in query string
if (isset($_GET['error'])) {
    echo '<script>alert("' . $_GET['error'] . '");</script>';
}
if (isset($_SESSION['email'])) {
    // Redirect to login page
    header("Location: unqueue.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        /* Reset some default styles */
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
            margin-bottom: 100px;
        }

        .logo {
            display: inline-block;
            /* margin: 10px; */
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
            margin-top: 10px;
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
            max-width: 400px;
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

        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .password-field {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .password-field input[type="password"] {
            flex-grow: 1;
            margin-bottom: 0;
        }

        .password-field button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px;
            cursor: pointer;
            margin-left: 10px;
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

        p {
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
                    <!-- <li>
                        <a href="login.php">Login</a>
                    </li> -->
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1>Login</h1>

        <form id="loginForm" action="authenticate.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <div class="password-field">
                <input type="password" id="password" name="password" required>
                <button type="button" id="viewPasswordBtn">View</button>
            </div>

            <!-- <button type="submit" id="loginBtn">Login</button> -->
            <button type="submit" id="loginBtn">Login</button>
        </form>
        <p>New user? <a href="signup.php">Sign Up</a></p>
    </div>

    <script>
        // Get the password input and view password button
        const passwordInput = document.getElementById('password');
        const viewPasswordBtn = document.getElementById('viewPasswordBtn');

        // Add event listener to the view password button
        viewPasswordBtn.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                viewPasswordBtn.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                viewPasswordBtn.textContent = 'View';
            }
        });
    </script>
</body>

</html>