


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Details Capture</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            max-width: 800px;
            width: 100%;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
            }
            to {
                transform: translateY(0);
            }
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="password"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Staff Details Capture</h2>
        <form action="adduser.php" method="post">
            <a href="dashboard.php" class="btn btn-danger">BACK</a>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="identity">ID:</label>
            <input type="number" id="identity" name="identity" required>

            <label for="identity">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="ADD" name="add" class="btn btn-success">
        </form>
    </div>

    <!-- <script>
        // Add an event listener to the form's submit button
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting

            // Get the user details from the form inputs
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;

            // Get the necessary data from the booking overview page as query string parameters
            const urlParams = new URLSearchParams(window.location.search);
            const selectedSeats = urlParams.get('selectedSeats');
            const pickPoint = urlParams.get('pickPoint');
            const dropPoint = urlParams.get('dropPoint');
            const totalFare = urlParams.get('totalFare');

            // Redirect the user to the receipt page with the user details and booking overview data as query string parameters
            window.location.href = '/Receipt/Receipt.html?' +
                'name=' + encodeURIComponent(name) +
                '&email=' + encodeURIComponent(email) +
                '&phone=' + encodeURIComponent(phone) +
                '&selectedSeats=' + encodeURIComponent(selectedSeats) +
                '&pickPoint=' + encodeURIComponent(pickPoint) +
                '&dropPoint=' + encodeURIComponent(dropPoint) +
                '&totalFare=' + encodeURIComponent(totalFare);
        });
    </script> -->
</body>
</html>
