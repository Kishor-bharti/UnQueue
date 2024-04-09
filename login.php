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
            /* background-color: #f2f2f2; */
            line-height: 1.6;
        }


        header {
            background-color: #201919;
            border-bottom: solid 2px black;
        }

        nav {
            /* display: flex; */
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            /* display: flex; */
            display: inline-block;
            position: absolute;
            /* top: 0; */
            right: 0;
            margin-right: 14px;
            margin-top: 18px;
            font-size: 20px;
            /* list-style: none; */
        }

        nav div {
            display: inline-block;
            padding-left: 10px;
        }

        nav ul li {
            margin-left: 5px;
            display: inline-block;
        }

        nav a {
            color: #4CAF50;
            cursor: pointer;
            text-decoration: none;
        }

        .socials {
            display: block;
            text-align: right;
            /* background: #6bb6b9; */
            background-image: linear-gradient(to right, #7cc18b, #6bb6b9);
        }

        .socials-icon {
            /* display: inline-block; */
            padding-top: 10px;
            padding-right: 10px;
        }


        .logo {
            font-size: 38px;
            font-family: serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
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

        /* Responsive styles */
        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            nav {

                /* flex-direction: column; */
                align-items: flex-start;
            }

            nav ul {
                margin-top: 1rem;
            }

            .popup-content {
                width: 80%;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="socials">
                <!-- socials here... -->
                <div class="socials-icon">
                    <a href="#"><img style="width: 25px; margin-right: 10px;" src="Media/facebook.png" alt="fb"></a>
                    <a href="#"><img style="width: 25px; margin-right: 10px;" src="Media/github.png" alt="git"></a>
                    <a href="#"><img style="width: 25px; margin-right: 10px;" src="Media/instagram.png" alt="ig"></a>
                    <a href="#"><img style="width: 25px; margin-right: 10px;" src="Media/linkedin.png" alt="ln"></a>
                    <a href="#"><img style="width: 25px; margin-right: 10px;" src="Media/twitter.png" alt="tw"></a>
                </div>
            </div>
            <div>
                <a href="index.php" class="logo">UnQueue</a>
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
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