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
    <title>UnQueue</title>
    <style>
        /* Reset styles and basic styling */
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
            text-decoration: none;
        }

        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        section {
            margin-bottom: 2rem;
        }

        .socials {
            display: block;
            text-align: right;
            background: #6bb6b9;
            background-image: linear-gradient(to right, #7cc18b, #6bb6b9);
        }

        .logo {
            font-size: 38px;
            font-family: serif;
        }

        .booking-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .booking-item {
            background-color: #f4f4f4;
            padding: 1rem;
            text-align: center;
        }

        .booking-item img {
            max-width: 30%;
            height: auto;
        }

        .book-btn {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }

        .history-list {
            list-style: none;
        }

        .booking-entry {
            background-color: #f4f4f4;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .booking-entry button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }

        .popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .popup-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            position: relative;
        }

        .close-button {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-button:hover,
        .close-button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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
                socials here...
            </div>
            <div>
                <a href="#" class="logo">UnQueue</a>
            </div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#booking">Booking</a></li>
                <li><a href="#history">History</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="home">
            <h1>Welcome to UnQueue</h1>
            <p>Effortlessly manage your queues with our innovative solution.</p>
        </section>

        <section id="booking">
            <h2>Book Your Virtual Queue Token</h2>
            <div class="booking-grid">
                <div class="booking-item">
                    <img src="cool.jpg" alt="CARE-WELL">
                    <h3>CARE-WELL</h3>
                    <p>Waiting List: 4</p>
                    <p>Token Number: 55</p>
                    <button class="book-btn">Book Virtual Queue Token</button>
                </div>
                <div class="booking-item">
                    <img src="cool.jpg" alt="CARE-WELL">
                    <h3>CARE-WELL</h3>
                    <p>Waiting List: 4</p>
                    <p>Token Number: 55</p>
                    <button class="book-btn">Book Virtual Queue Token</button>
                </div>
                <div class="booking-item">
                    <img src="cool.jpg" alt="CARE-WELL">
                    <h3>CARE-WELL</h3>
                    <p>Waiting List: 4</p>
                    <p>Token Number: 55</p>
                    <button class="book-btn">Book Virtual Queue Token</button>
                </div>
                <div class="booking-item">
                    <img src="cool.jpg" alt="CARE-WELL">
                    <h3>CARE-WELL</h3>
                    <p>Waiting List: 5</p>
                    <p>Token Number: 55</p>
                    <button class="book-btn">Book Virtual Queue Token</button>
                </div>
                <div class="booking-item">
                    <img src="cool.jpg" alt="CARE-WELL">
                    <h3>CARE-WELL</h3>
                    <p>Waiting List: 4</p>
                    <p>Token Number: 55</p>
                    <button class="book-btn">Book Virtual Queue Token</button>
                </div>
                <div class="booking-item">
                    <img src="cool.jpg" alt="CARE-WELL">
                    <h3>CARE-WELL</h3>
                    <p>Waiting List: 4</p>
                    <p>Token Number: 55</p>
                    <button class="book-btn">Book Virtual Queue Token</button>
                </div>
                <!-- Add more booking items here -->
            </div>
        </section>

        <section id="history">
            <h2>Your Bookings</h2>
            <div class="history-list">
                <!-- Bookings will be added here dynamically -->
            </div>
        </section>
    </main>

    <div id="tokenPopup" class="popup">
        <div class="popup-content">
            <span class="close-button">&times;</span>
            <p id="tokenMessage"></p>
        </div>
    </div>
    <a href="logout.php">Logout</a>

    <script>
        // Get booking buttons and history list
        const bookingButtons = document.querySelectorAll('.book-btn');
        const historyList = document.querySelector('.history-list');

        // Get token popup elements
        const tokenPopup = document.getElementById('tokenPopup');
        const closeButton = document.querySelector('.close-button');
        const tokenMessage = document.getElementById('tokenMessage');

        // Track the last token number
        let lastTokenNumber = 55;

        // Function to display the token popup
        function showTokenPopup(tokenNumber) {
            const waitingTime = 4 * 5; // Waiting list * 5 minutes
            tokenMessage.textContent = `Your token number is ${tokenNumber}. Your turn in ${waitingTime} mins.`;
            tokenPopup.style.display = 'block';
        }

        // Function to hide the token popup
        function hideTokenPopup() {
            tokenPopup.style.display = 'none';
        }

        // Event listener for booking buttons
        bookingButtons.forEach((button) => {
            button.addEventListener('click', () => {
                lastTokenNumber++;
                showTokenPopup(lastTokenNumber);

                // Create a new booking entry
                const bookingEntry = document.createElement('div');
                bookingEntry.className = 'booking-entry';
                bookingEntry.innerHTML = `
            <span>Token Number: ${lastTokenNumber}</span>
            <button class="cancel-btn">Cancel</button>
        `;

                // Append the booking entry to the history list
                historyList.appendChild(bookingEntry);

                // Add event listener for cancel button
                const cancelButton = bookingEntry.querySelector('.cancel-btn');
                cancelButton.addEventListener('click', () => {
                    cancelButton.textContent = 'Processing';
                    cancelButton.disabled = true;

                    // After 1 minute, mark the booking as successful
                    setTimeout(() => {
                        cancelButton.textContent = 'Successful';
                        cancelButton.style.backgroundColor = 'green';
                    }, 60000); // 1 minute in milliseconds
                });
            });
        });

        // Event listener for close button
        closeButton.addEventListener('click', hideTokenPopup);

        // Event listener for clicking outside the popup
        window.addEventListener('click', (event) => {
            if (event.target === tokenPopup) {
                hideTokenPopup();
            }
        });
    </script>
</body>

</html>