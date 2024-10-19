<?php
session_start();
require('connect.php'); // Ensure this is included to connect to your database

// Initialize variables
$buses = []; // Array to hold buses for the searched route

if (isset($_POST['search'])) {
    $from = $_POST['rout_from'];
    $to = $_POST['rout_to'];
    $passengers = $_POST['passengers'];
    $date = $_POST['date'];

    // Prepare the SQL query to fetch buses for the given route
    $sql = "SELECT * FROM bus WHERE rout_from = '$from' AND rout_to = '$to'"; // Adjust this to match your table structure
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $buses[] = $row; // Add each bus to the array
        }
    } else {
        echo "<script>alert('Failed to fetch buses: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oxygen Bus Reservation Management System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            color: #333;
            animation: fadeIn 0.5s;
        }

        header {
            background-color: rgba(2, 190, 190, 0.8);
            color: #f3f6f7;
            text-align: center;
            padding: 1.5em 0;
            position: relative;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        nav {
            background-color: rgba(229, 54, 10, 0.8);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
            margin: 0;
        }

        nav ul li {
            margin: 0;
        }

        nav ul li a {
            display: block;
            color: white;
            font-size: 30px;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            text-align: center;
        }

        .hero {
            background: url('/Images/bus.jpg') no-repeat center center/cover;
            color: #f4f8f6;
            padding: 120px 20px;
            margin-bottom: 20px;
            width: 100%;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }

        .hero h2 {
            font-size: 2.8em;
            margin: 0;
            z-index: 1;
            position: relative;
            animation: fadeInDown 0.5s ease-in;
        }

        .hero p {
            font-size: 1.5em;
            color: #0fd4b6;
            margin-top: 10px;
            z-index: 1;
            position: relative;
        }

        .button {
            background-color: #ff6f61;
            color: #f5f9fd;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .button:hover {
            background-color: #ff3d3d;
            transform: translateY(-3px);
        }

        .search-container {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 90%;
            max-width: 900px;
            transition: transform 0.3s;
        }

        .search-container:hover {
            transform: scale(1.05);
        }

        .search-input {
            padding: 12px;
            border: 2px solid #02bebe;
            border-radius: 5px;
            font-size: 16px;
            min-width: 150px;
            flex: 1;
            transition: border-color 0.3s;
        }

        .search-input:focus {
            border-color: #ff6f61;
            outline: none;
        }

        .search-button {
            padding: 12px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .search-button:hover {
            background-color: #555;
            transform: translateY(-3px);
        }

        .bus-list {
            width: 90%;
            max-width: 900px;
            margin: 20px 0;
            padding: 15px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .bus-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .book-now-container {
            margin: 20px 0;
        }

        footer {
            background-color: #121414;
            color: #e6f4f4;
            text-align: center;
            padding: 1em 0;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .search-container {
                flex-direction: column;
                gap: 15px;
            }

            .search-input {
                min-width: 100%;
            }

            .hero h2 {
                font-size: 2em;
            }

            .hero p {
                font-size: 1.2em;
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Oxygen Bus Reservation System</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="admin-login.php">Admin</a></li>
        </ul>
    </nav>
    <main>
        <section class="hero">
            <h2>Find Your Next Bus Adventure</h2>
            <p>Book your bus tickets hassle-free with Oxygen Bus Reservation Management System.</p>
        </section>
        <div class="search-container">
            <form action="" method="post" id="searchForm">
                <select name="rout_from" class="search-input" required>
                    <option value="" disabled selected>From</option>
                    <!-- Add available options for routes -->
                    <option value="Nairobi">Nairobi</option>
                    <option value="Mombasa">Mombasa</option>
                    <!-- More routes -->
                </select>

                <select name="rout_to" class="search-input" required>
                    <option value="" disabled selected>To</option>
                    <!-- Add available options for routes -->
                    <option value="Nairobi">Nairobi</option>
                    <option value="Mombasa">Mombasa</option>
                    <!-- More routes -->
                </select>

                <input type="number" name="passengers" placeholder="Passengers" class="search-input" required>
                <input type="date" name="date" class="search-input" required>
                <button type="submit" name="search" class="search-button">Search Buses</button>
            </form>
        </div>

        <?php if (!empty($buses)) { ?>
            <div class="bus-list">
                <h3>Available Buses</h3>
                <?php foreach ($buses as $bus) { ?>
                    <div class="bus-item">
                        <p>Bus Number: <?php echo $bus['bus_number']; ?></p>
                        <p>From: <?php echo $bus['rout_from']; ?></p>
                        <p>To: <?php echo $bus['rout_to']; ?></p>
                        <p>Departure: <?php echo $bus['departure_time']; ?></p>
                        <p>Price: <?php echo $bus['price']; ?> KES</p>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="book-now-container">
            <a href="vehicle.php" class="button">Book Now</a>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Oxygen Bus Reservation System. All rights reserved.</p>
    </footer>
</body>

</html>
