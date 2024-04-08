<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page
    header("Location: about.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My template</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9e9d1;
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


        /* BODY MAIN <tag> */


        section {
            width: 70vw;
            height: 30vh;
            padding: 4px;
            background-color: #8cffb4;
            margin: auto;
            border-radius: 150px;
        }

        section p {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            /* transform: perspective(400px) rotateY(20deg); */
            text-align: justify;
            font-size: 18px;
            font-family: serif;
        }

        /* section h2 { */
        /* margin-left: 24px; */
        /* } */

        /* section ul {
            ul { */
        /* list-style: none; */
        /* Remove default list styles */
        /* padding-left: 20px; */
        /* Add padding to create space for custom marker */
        /* } */
        /* } */

        section ul li {
            /* position: relative; */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            text-align: justify;
            font-size: 18px;
            font-family: serif;
            margin-top: 12px;
        }

        li::marker {
            content: none;
            /* margin-top: 40px; */
        }

        section h2 {
            /* margin-left: 24px; */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            transform: perspective(400px) rotateY(20deg);
            font-size: 20px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        /* Footer CSS */
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
                <a href="#" class="logo">UnQueue</a>
            </div>
            <ul>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="#">Booking</a></li>
                <li><a href="#">History</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home">
            <p style="text-align: center;
            font-size: 30px;
            font-family: serif;">Welcome to UnQueue</p>
            <p style="border-bottom: 2px solid white;text-align: center;
            font-size: 30px;
            font-family: serif;">learn About Us</p>
        </section>
        <section>
            <h2>About UnQueue</h2>
            <p>Welcome to UnQueue, your premier destination for revolutionizing queue management systems. At UnQueue, we're dedicated to redefining the way businesses and organizations handle queues, making waiting in line a thing of the past.</p>
        </section>
        <section>
            <h2>Our Mission</h2>
            <p>At UnQueue, our mission is simple: to streamline and optimize queue management processes for businesses and organizations across various industries. We believe that efficient queue management is essential for enhancing customer satisfaction, increasing operational efficiency, and driving business success.</p>
        </section>
        <section>
            <h2>Our Vision</h2>
            <p>Our vision is to become the leading provider of innovative queue management solutions, empowering businesses to deliver exceptional customer experiences while maximizing efficiency and productivity. We strive to be the go-to resource for organizations seeking to eliminate the hassle of waiting in queues.</p>
        </section>
        <section>
            <h2>Our Approach</h2>
            <p>At UnQueue, we take a customer-centric approach to queue management, focusing on the needs and preferences of both businesses and their customers. Our solutions are designed to be intuitive, flexible, and customizable, ensuring a seamless and tailored experience for all users.</p>
        </section>
        <section>
            <h2>What Sets Us Apart</h2>

            <ul>
                <!-- <li>
                    Innovative Technology: We leverage cutting-edge technology and advanced algorithms to optimize queue flow, minimize wait times, and enhance the overall queue experience.
                </li> -->
                <li>
                    Innovative Technology: We leverage cutting-edge technology and advanced algorithms to optimize queue flow, minimize wait times, and enhance the overall queue experience.
                </li>
                <li>
                    Security and Reliability: Our systems are built with robust security measures and redundant infrastructure to ensure the highest level of data protection and system reliability.
                </li>
                <!-- <li>
                    Continuous Improvement: We are committed to ongoing research, development, and innovation to stay ahead of the curve and continuously improve our queue management solutions. 
                </li> -->
            </ul>

        </section>

        <!-- <section>
            <h2>Our Team</h2>
            <p>Behind UnQueue is a team of dedicated professionals with expertise in queue management, technology, and customer service. We are passionate about helping businesses succeed and delivering solutions that exceed expectations.</p>
        </section> -->
        <section>
            <h2>Get in Touch</h2>
            <p>Ready to revolutionize your queue management experience? Contact us today to learn more about our solutions and how we can help your business thrive.</p>
        </section>
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
                    <a href="mybookings.php">Booking</a>
                </div>
                <div>
                    <a href="myhistory.php">History</a>
                </div>
                <div>
                    <a href="about2.php">About</a>
                </div>
                <div>
                    <a href="contact2.php">Contact</a>
                </div>
                <div>
                    <a href="logout.php">logout</a>
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
            <p>&copy;UnQueue: Rights Reserved</p>
        </div>
    </footer>
</body>

</html>