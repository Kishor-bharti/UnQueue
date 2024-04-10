<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['email'])) {
    // Redirect to login page
    header("Location: contactMe.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact UnQueue</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f2f2f2;
            background-image: url("Media/new-bg-2.jpg");
            background-size: cover;
            /* This will make sure the image covers the entire background without distortion */
            background-repeat: no-repeat;
            /* Prevent the background image from repeating */
            background-position: center;
            background-attachment: fixed;
            /* background-position: fixed; */
        }

        header {
            /* background-color: white; */
            /* background-color: #257174; */
            background-color: #201919;
            /* color: #fff; */
            /* padding: 6px; */
            /* padding-top: 0px; */
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

        /* ..................Main Body Styles........................ */

        /* Banner Section */
        .banner {
            position: relative;
            height: 500px;
            overflow: hidden;
        }

        .slider {
            display: flex;
            width: 300%;
            animation: slide 10s infinite;
        }

        .slide {
            flex: 1;
            position: relative;
        }

        .slide img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .text-animation {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: rgb(24, 19, 19);
            /* font-family: 'Times New Roman', Times, serif; */
            animation: textAnimation 9s infinite;
        }

        .text-animation h2 {
            font-size: 2rem;
            opacity: 0;
            animation: fadeInOut 3s infinite;
        }

        .text-animation h1 {
            font-size: 3rem;
            opacity: 0;
            animation: fadeInOut 3s infinite;
        }

        @keyframes slide {
            0% {
                transform: translateX(0);
            }

            33.33% {
                transform: translateX(-33.33%);
            }

            66.66% {
                transform: translateX(-66.66%);
            }

            100% {
                transform: translateX(0);
            }
        }

        @keyframes fadeInOut {

            0%,
            100% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }
        }


        .container {
            max-width: 600px;
            min-height: 40vh;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .contact-details {
            display: flex;
            margin-top: 20px;
        }

        .contact-details p {
            margin-bottom: 10px;
            color: #666;
        }

        .contact-details strong {
            color: #333;
        }

        



        /* .......................Footer Part styles........................ */


        footer p {
            color: #4CAF50;
        }

        .content {
            display: flex;
            flex-direction: row;
            height: 280px;
            /* background-color: #201919; */
            background-image: linear-gradient(to right, #7cc18b, #6bb6b9);
        }


        .content div {
            display: inline-block;
            /* height: 280px; */
            width: 260px;
            margin-left: 50px;
            /* background: bisque; */
            /* border-right: solid 6px black; */
            /* border-radius: 6px; */
            /* border-image: linear-gradient(to bottom, #7cc18b, #6bb6b9); */
        }

        .content p {
            color: #201919;
            font-size: 18px;
            margin-top: 50px;
            margin-left: 20px;
        }

        .copyright {
            background-color: black;
        }

        .copyright p {
            /* display: inline; */
            text-align: center;
        }

        .pages div,
        .social-pages div {
            display: block;
            margin-top: 14px;
            margin-left: 20px;
            height: 20px;
            width: 20px;
            font-size: 20px;
            /* font-family: Arial, sans-serif; */
            font-family: serif;
            /* background-color: black; */
        }

        .pages div a,
        .social-pages div a {
            display: inline-block;
            /* display: flex;
            flex-direction: column; */
            text-decoration: none;
            color: black;
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
                <li><a href="login.php">Login</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <!-- Banner Section -->
        <section class="banner">
            <div class="slider">
                <div class="slide">
                    <img src="Media/banner1.jpg" alt="Banner 1">
                    <div class="text-animation">
                        <h2>Welcome to</h2>
                        <h1>Our Website</h1>
                    </div>
                </div>
                <div class="slide">
                    <img src="Media/banner2.jpg" alt="Banner 2">
                    <div class="text-animation">
                        <h2>Explore</h2>
                        <h1>Our Services</h1>
                    </div>
                </div>
                <div class="slide">
                    <img src="Media/banner3.jpg" alt="Banner 3">
                    <div class="text-animation">
                        <h2>Join</h2>
                        <h1>Our Community</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <h1>Contact The Developer!</h1>
            <div class="contact-details">
                <div style="margin-left: 26px; margin-top: 20px">
                    <p><strong>Name:</strong> Kishor Bharti</p>
                    <p><strong>Email:</strong> kishorbharti010@gmail.com</p>
                    <p><strong>Phone:</strong> +91 7481973574</p>
                    <p><strong>Address:</strong> Patna, Bihar, India</p>
                </div>
                <div><img src="media/dp.jpg" width="160" height="200" style="margin-left: 60px; border-radius: 6%;" alt="dp"></div>
            </div>
        </div>


    </main>
    <footer>
        <div class="content">
            <div> <!--style="border-right: solid 10px bisque;" -->
                <p style="font-size: 38px;
            font-family: serif; margin-left: 20px; margin-top: 28px;">UnQueue</p>
            </div>
            <div class="pages">
                <p>Go to Pages</p>
                <div>
                    <a href="login.php">Login</a>
                </div>
                <div>
                    <a href="signup.php">Signup</a>
                </div>
                <div>
                    <a href="about.php">About</a>
                </div>
                <div>
                    <a href="index.php">Home</a>
                </div>

            </div>
            <div class="social-pages">
                <p>Find me on Socials</p>
                <div>
                    <a href="#"><img style="width: 25px; margin-right: 0px;" src="Media/facebook.png" alt="fb"></a>
                    <!-- <a href="#">Facebook</a> -->
                </div>
                <div>
                    <a href="#"><img style="width: 25px; margin-right: 0px;" src="Media/github.png" alt="git"></a>
                    <!-- <a href="#">Github</a> -->
                </div>
                <div>
                    <a href="#"><img style="width: 25px; margin-right: 0px;" src="Media/instagram.png" alt="ig"></a>
                    <!-- <a href="#">Instagram</a> -->
                </div>
                <div>
                    <a href="#"><img style="width: 25px; margin-right: 0px;" src="Media/linkedin.png" alt="ln"></a>
                    <!-- <a href="#">LinkedIn</a> -->
                </div>
                <div>
                    <a href="#"><img style="width: 25px; margin-right: 0px;" src="Media/twitter.png" alt="tw"></a>
                    <!-- <a href="#">Twitter</a> -->
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy;UnQueue: All Rights Reserved</p>
        </div>
    </footer>
</body>

</html>