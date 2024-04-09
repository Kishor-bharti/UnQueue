<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unqueue</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
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

        nav a,
        a {
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


        /* .................Main Body style starts here.................... */



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

        /* Other Sections */
        /* section {
            padding: 50px;
        } */

        .additional-content {
            display: none;
        /* Initially hide the additional content */
        }

        /* #read-more { */
        /* color: blue;  */
        /* color: #4CAF50;
            cursor: pointer;
        } */

        /* .read-more:hover {
            text-decoration: underline;
        } */

        /* #read-more:focus {
            outline: none; */
        /* Remove the default focus outline */
        /* } */

        /* Show additional content when "Read more" is clicked */
        /* .read-more {
            display: block;
        } */


        .heading {
            text-align: center;
            margin-bottom: 20px;
            height: 110px;
            font-size: 20px;
            font-family: serif;
            color: #127777de;
            background-image: url(Media/heading.jpg);
        }

        .heading h1 {
            margin: 0%;
            padding-top: 10px;
        }

        main {
            background-image: url("Media/new-bg-2.jpg");
            background-size: cover;
            /* This will make sure the image covers the entire background without distortion */
            background-repeat: no-repeat;
            /* Prevent the background image from repeating */
            background-position: center;
            background-attachment: fixed;
            /* background-position: fixed; */
        }

        .about,
        .services,
        .contact {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .about .container,
        .services .container,
        .services h2,
        .contact h2 {
            flex: 1;
            margin-left: 20px;
        }

        .container h2,
        .services h2,
        .contact h2 {
            font-size: 35px;
            font-family: 'Courier New', Courier, monospace;
        }

        ol li {
            /* line-height: 5px; */
            margin-bottom: 8px;
        }

        .image img {

            /* margin: 20px; */
            margin-left: 78px;
            margin-top: 20px;
            width: 400px;
        }

        .about .image,
        .service-cards {
            flex: 1;
        }

        .service-cards {
            display: flex;
            justify-content: space-between;
        }

        .card {
            text-align: center;
            padding: 20px;
            /* border: solid 4px white; */
            background-color: rgba(255, 255, 255, 0.5);
            size: 20px;
            backdrop-filter: blur(1px);
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        .card p {
            width: 160px;
        }

        .card img {
            width: 100%;
            max-width: 200px;
            height: 120px;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .card:hover,
        .card img {
            transform: scale(1.1);
            /* Enlarge the card on hover */
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 20px;
        }

        input,
        textarea {
            margin-bottom: 10px;
            padding: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        /*..................Footer Style Starts here.................... */



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
    <script>
        const textAnimationElements = document.querySelectorAll('.text-animation');
        const slides = document.querySelectorAll('.slide');

        let currentSlide = 0;

        textAnimationElements.forEach((element, index) => {
            const h2 = element.querySelector('h2');
            const h1 = element.querySelector('h1');

            setTimeout(() => {
                h2.style.animation = 'fadeInOut 3s infinite';
            }, 1000 + (index * 3000));

            setTimeout(() => {
                h1.style.animation = 'fadeInOut 3s 3s infinite';
            }, 2000 + (index * 3000));
        });

        function showSlide() {
            slides.forEach((slide, index) => {
                slide.style.transform = `translateX(-${(currentSlide * 100) / slides.length}%)`;
            });
        }

        function nextSlide() {
            currentSlide++;
            if (currentSlide >= slides.length) {
                currentSlide = 0;
            }
            showSlide();
        }

        function prevSlide() {
            currentSlide--;
            if (currentSlide < 0) {
                currentSlide = slides.length - 1;
            }
            showSlide();
        }

        setInterval(nextSlide, 3000);
        showSlide();

        // Arrow key controls
        document.addEventListener('keydown', (event) => {
            if (event.code === 'ArrowRight') {
                nextSlide();
            } else if (event.code === 'ArrowLeft') {
                prevSlide();
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            const readMoreLinks = document.querySelectorAll('.read-more');

            readMoreLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default link behavior

                    const additionalContent = this.nextElementSibling;

                    if (additionalContent.style.display === 'block') {
                        additionalContent.style.display = 'none';
                        this.innerText = 'Read more...';
                    } else {
                        additionalContent.style.display = 'block';
                        this.innerText = 'Read less';
                    }
                });
            });
        });
    </script>
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
                <li><a href="mybookings.php">Booking</a></li>
                <li><a href="myhistory.php">History</a></li>
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

        <section class="heading">
            <h1>Welcome to UnQueue: <br> Revolutionizing Queue Management</h1>
        </section>

        <!-- About Section -->
        <section class="about">
            <div class="container">
                <h2>About Us</h2>
                <p>
                <h4>What is a Queue Management System?</h4>
                A queue management system is a sophisticated solution designed to streamline and optimize the process of managing queues or waiting lines in various settings such as retail stores, hospitals, banks, airports, and more. It utilizes a combination of technology, data analysis, and strategic planning to efficiently organize, monitor, and control queues, ultimately enhancing the overall customer experience.</p>
                <div class="article">
                    <p><br>
                    <h4>The Importance of Queue Management Systems</h4>
                    In today's fast-paced world, where time is of the essence, efficient queue management is crucial for businesses and organizations to remain competitive and meet the ever-growing demands of their customers.</p>
                    <a href="#" class="read-more">Read More...</a>
                    <div class="additional-content">
                        <br><p><h4>Here's why queue management systems are essential:</h4><br>
                    <div style="margin-left: 20px;">
                    <ol>
                        <li>
                        <h5>Improved Customer Satisfaction:</h5> By reducing wait times, minimizing congestion, and providing a seamless queue experience, queue management systems enhance customer satisfaction and loyalty.
                        </li>
                        <li>
                            <h5>Increased Operational Efficiency:</h5> By optimizing queue flow, resource allocation, and staffing levels, queue management systems improve operational efficiency and productivity, leading to cost savings and revenue growth.
                        </li>
                        <li>
                            <h5>Enhanced Brand Image:</h5>
                            Providing a hassle-free queue experience reflects positively on the brand image, fostering trust, loyalty, and positive word-of-mouth recommendations.
                        </li>
                    </ol></div></p>
                        <!-- You can add more content here -->
                    </div>
                </div>
            </div>
            <div class="image">
                <img src="cool.jpg" alt="About Image">
            </div>
        </section>

        <!-- Services Section -->
        <section class="services">
            <div class="container">
                <h2 style="margin: 0px;">Our Services</h2>
                <p>
                <h4>Where Queue Management Systems Work Best?</h4>Queue management systems can be implemented effectively in various environments, including but not limited to: <br> <br>
                <div style="margin-left: 20px;">
                    <ul>
                        <li>
                            Hospitals and Clinics
                        </li>
                        <li>
                            Banks and financial institutions
                        </li>
                        <li>
                            Airports and transportation hubs
                        </li>
                        <li>
                            Food Courts and Restaurants
                        </li>
                        <li>
                            Retail stores
                        </li>
                        <li>
                            Theme parks and entertainment venues
                        </li>
                    </ul>
                </div>
                </p>
            </div>
            <div class="service-cards">
                <div class="card">
                    <img src="Media/ourservices1.png" alt="Express Way Access">
                    <h3>Express Way Access</h3>
                    <p>For clients with urgent needs or emergencies, we offer premium access options where they can bypass the queue by paying a premium price.</p>
                </div>
                <div class="card">
                    <img src="Media/ourservices2.jpg" alt=" Virtual Queuing System">
                    <h3>Virtual Queuing System</h3><p>Our virtual queuing system allows users to join queues remotely through our website, receive real-time updates on queue status, and get notified when it's their turn.</p>
                </div>
                <div class="card">
                    <img src="Media/ourservices3.jpg" alt="Digital Check-In">
                    <h3>Digital Check-In</h3>
                    <p>With our digital check-in options, users can check in remotely before arriving on-site, securing their place in line and minimizing wait times upon arrival.</p>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact">
           <div><h2>Contact Us</h2>
            <p style="margin-left: 20px;">For any Query or Partnership, contact us and our team will assist you in no time!</p></div>
            <form>
                <input type="text" placeholder="Name" required>
                <input type="email" placeholder="Email" required>
                <textarea placeholder="Message" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </section>



        <!-- <section id="home">
            <h1>Welcome to UnQueue</h1>
            <p>This Home page is on public domain!</p>
        </section> -->
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
                    <a href="aboutMe.php">About</a>
                </div>
                <div>
                    <a href="contactMe.php">Contact</a>
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