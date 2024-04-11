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
    <title>UnQueue: My History</title>
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


        .data-row {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .data-row p {
            margin: 0;
        }

        .data-row p span {
            font-weight: bold;
        }

        .successful {
            color: green;
        }

        .cancelled {
            color: red;
        }

        #home {
            text-align: center;
        }

        #home h1 {
            margin: 10px;
            font-family: sans-serif;
        }

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
                <a href="unqueue.php" class="logo">UnQueue</a>
            </div>
            <ul>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="mybookings.php">Booking</a></li>
                <li><a href="myhistory.php">History</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home">
            <h1>Your Booking History</h1>
            <?php
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
            $resultstmt = $stmt->get_result();

            // Check if a row is returned
            if ($resultstmt->num_rows > 0) {
                $row = $resultstmt->fetch_assoc();
                $user_id = $row["id"];
                $table_name = "user_" . $user_id;

                $sql = "SELECT * FROM $table_name";

                $result = $conn->query($sql);

                // Check if any rows were returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        // Output each column value within HTML tags
                        echo "<div class='data-row'>";
                        echo "<p>Organisation Name: <span>" . $row["organisation_name"] . "</span></p>";
                        echo "<p>Token No: <span>" . $row["Token_no"] . "</span></p>";
                        // Apply different CSS classes based on the status
                        if ($row["status"] == "successful") {
                            echo "<p>Status: <span class='successful'>" . $row["status"] . "</span></p>";
                        } elseif ($row["status"] == "cancelled") {
                            echo "<p>Status: <span class='cancelled'>" . $row["status"] . "</span></p>";
                        }
                        echo "<p>Date & Time: <span>" . $row["current_date_time"] . "</span></p>";
                        echo "</div>";
                    }
                } else {
                    echo "No data found";
                }

                // Close the connection
                $conn->close();
            }
            ?>
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
            <p>&copy;UnQueue: All Rights Reserved</p>
        </div>
    </footer>
</body>

</html>