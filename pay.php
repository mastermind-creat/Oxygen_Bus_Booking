<?php
require 'connect.php';

if(isset($_POST['proceed'])){
    $fullname = mysqli_real_escape_string($conn, $_POST['full-name']);
    $reference = mysqli_real_escape_string($conn, $_POST['reference']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone-number']);
    $bus = mysqli_real_escape_string($conn, $_POST['bus']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $route = mysqli_real_escape_string($conn, $_POST['route']);
    $selected_seats = mysqli_real_escape_string($conn, $_POST['selected-seats']);
    $total_fare = mysqli_real_escape_string($conn, $_POST['total-fare']);

    $sql = "INSERT INTO bookingdetails (booking_reference, fullname, phone, bus, email, route,
    selected_seats, total_fare) VALUES ('$reference', '$fullname', '$phone', '$bus', '$email', '$route',
    '$selected_seats', '$total_fare')";
    $res = mysqli_query($conn, $sql);
    if($res){
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
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

        .animated-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
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

        #payment-options {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin: 20px 0;
        }

        .left {
            flex: 1;
            text-align: left;
            padding-right: 20px;
            border-right: 1px solid #ccc;
        }

        .left img {
            max-width: 100px;
            margin-bottom: 10px;
        }

        .left p {
            font-size: 18px;
            margin: 10px 0;
        }

        #mpesa-payment-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            animation: pulse 2s infinite;
            margin: 20px 0;
        }

        @keyframes pulse {
            0% {
                background-color: #4CAF50;
            }
            50% {
                background-color: #3e8e41;
            }
            100% {
                background-color: #4CAF50;
            }
        }

        #mpesa-payment-button:hover {
            background-color: #3e8e41;
        }

        .right {
            flex: 2;
            text-align: left;
            padding-left: 20px;
        }

        .right h3 {
            margin-top: 0;
            color: #333;
        }

        .right ol {
            padding-left: 20px;
        }

        .right li {
            margin-bottom: 10px;
            font-size: 16px;
        }

        /* Exit Button */
        #exit-button {
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        #exit-button:hover {
            background-color: #d32f2f;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }

            #payment-options {
                flex-direction: column;
                align-items: center;
            }

            .left, .right {
                padding: 0;
                text-align: center;
                border: none;
            }

            .right ol {
                padding-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="animated-container">
        <div class="container">
            <h2>Payment</h2>
            <div id="payment-options">
                <div class="left">
                    <img src="/Images/mpesa.png" alt="M-Pesa Logo">
                    <p>Till Number: <span id="till-number">344006</span></p>
                    <button id="mpesa-payment-button">Confirm</button>
                </div>
                <div class="right">
                    <h3>Steps for Paying via M-Pesa Till:</h3>
                    <ol>
                        <li>Dial *334# on your phone.</li>
                        <li>Select 1 for "Send Money" or 2 for "Withdraw Cash".</li>
                        <li>Select 6 for "Lipa na M-Pesa".</li>
                        <li>Select 2 for "Buy Goods and Services".</li>
                        <li>Enter the till number, 344006.</li>
                        <li>Enter the amount.</li>
                        <li>Enter your M-Pesa PIN.</li>
                        <li>Confirm the transaction.</li>
                    </ol>
                </div>
            </div>
            <button id="exit-button" onclick="exitPage()">Exit to Homepage</button>
        </div>
    </div>

    <script>
        // Add an event listener to the M-Pesa payment button
        document.getElementById('mpesa-payment-button').addEventListener('click', function() {
            // Redirect the user to the M-Pesa payment gateway
            window.location.href = 'completepay.php';
        });

        // Function to redirect to the homepage
        function exitPage() {
            window.location.href = 'index.php';
        }
    </script>
</body>
</html>

        <?php
    } else{
        echo "
         <script>
           alert('Could not store Booking details Try again!!');
           window.location.href = 'Receipt.php';
         </script>
        ";
    }
}
?>
