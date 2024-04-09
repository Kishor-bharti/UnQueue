<?php
session_start();

// Check if user is logged in
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
    <title>Not Index page</title>
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

        .about .container, .services .container,
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
            border-radius: 5px;
            transition: transform 0.3s ease;
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
                <li><a href="login.php">Login</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor, magna a eleifend sollicitudin,
                    turpis massa bibendum augue, a commodo metus eros non augue. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic non ab error tempora ut consequatur rerum eius temporibus assumenda sapiente mollitia quae quaerat amet, ipsum ea laborum provident velit molestias. Dolor eaque quas, corporis inventore recusandae asperiores assumenda quis ea aperiam quasi perferendis, iste quidem! Suscipit, hic. Porro aut animi ut error, quam deleniti architecto! Velit cumque voluptas totam consectetur modi ducimus sapiente labore id! Ipsa alias rerum sint repellendus excepturi aperiam laborum labore adipisci, dolore animi necessitatibus accusamus illo ut possimus eligendi id autem natus cupiditate cum! Excepturi quaerat quis earum, eaque maiores omnis vero veritatis dolor enim temporibus eius neque distinctio voluptatem sapiente facilis fugiat fugit iste quos. Inventore ut unde animi magnam deserunt deleniti placeat fugit, quia explicabo sint, voluptatum laboriosam a consequuntur, earum eveniet pariatur similique mollitia aliquid praesentium esse reiciendis doloremque. Voluptatum esse a hic aliquam nihil praesentium nam animi maxime labore officia, tempora eos! At officia, nihil ab nobis ratione reprehenderit, minima esse culpa illo sapiente expedita. Adipisci esse temporibus illum saepe eum eaque provident corrupti quis! Voluptatem dolorum iusto sequi vel quas molestias. Atque consequatur iusto illo eaque nemo nulla repellat, magnam, ipsa veniam illum, quos rerum ipsum dolorem repudiandae consequuntur officia itaque.</p>
                <a href="#" class="btn">Learn More</a>
            </div>
            <div class="image">
                <img src="cool.jpg" alt="About Image">
            </div>
        </section>

        <!-- Services Section -->
        <section class="services">
            <div class="container">
                <h2 style="margin: 0px;">Our Services</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi eligendi at officiis accusamus similique tempore a, adipisci quas quam maiores fugiat ut illum libero earum eos tempora quibusdam est laboriosam dignissimos aliquid laborum obcaecati dolor, nihil quidem? Necessitatibus, rerum. Cumque et, iste, odio qui vitae laboriosam veritatis mollitia accusantium animi voluptates fuga non totam porro! Debitis soluta, voluptas deserunt rerum cumque, architecto voluptatibus unde, quia quos sed porro consequatur atque aperiam? Mollitia quidem asperiores soluta ad provident debitis illum quas officia cum est ex et, nisi possimus illo explicabo. Enim pariatur reiciendis perferendis aliquam nisi dolor voluptatum voluptas soluta cupiditate obcaecati numquam hic ex eum, illum neque minima excepturi, magnam corrupti, eaque ad illo! Voluptas praesentium reiciendis repellendus dicta quia aliquam nulla adipisci aliquid, quod dolorum itaque atque! Repellendus, corporis animi repudiandae consequuntur in, non laborum nemo quis eius culpa impedit atque voluptatibus deserunt obcaecati! Dolorum beatae natus necessitatibus quia qui? Sunt, quod dolorum quibusdam deleniti perferendis ullam autem consequuntur nulla qui minima sapiente quaerat dolorem omnis nemo pariatur minus illum. Tempore numquam similique asperiores voluptate quas ad aperiam repellendus, sunt voluptatem cumque ex minus nostrum at dolorem porro non voluptas illo perspiciatis incidunt, aliquam impedit vel optio voluptatum? Quibusdam ipsam ullam expedita, nulla pariatur sed eos magni eligendi voluptatum officiis doloribus iure molestiae mollitia omnis facere vero, quam nisi animi veritatis reiciendis impedit distinctio temporibus dolorum beatae. Deleniti provident consequatur molestias, ipsa cumque accusantium mollitia vero inventore nesciunt ad, aut omnis voluptatem suscipit impedit, voluptates dolore quisquam itaque. Libero at atque maiores. Velit aliquam numquam facere corporis quidem vero expedita, debitis recusandae pariatur atque, perspiciatis distinctio dolorem possimus excepturi? Consequatur amet hic mollitia itaque facilis sequi eum distinctio ipsa unde deserunt commodi quod vel, nobis dolores eaque vitae impedit suscipit praesentium saepe quidem incidunt dolore odit corporis. Aperiam, eaque.</p>
            </div>
            <div class="service-cards">
                <div class="card">
                    <img src="Media/ourservices1.png" alt="Service 1">
                    <h3>Service 1</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="card">
                    <img src="Media/ourservices2.jpg" alt="Service 2">
                    <h3>Service 2</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="card">
                    <img src="Media/ourservices3.jpg" alt="Service 3">
                    <h3>Service 3</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact">
            <h2>Contact Us</h2>
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