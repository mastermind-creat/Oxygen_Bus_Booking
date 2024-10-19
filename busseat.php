<?php
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Selection with Popup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #13b8ef;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background: rgb(175, 247, 254);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            background-color: #0a1518;
            display: flex;
            justify-content: center;
            margin: 0;
        }

        nav ul li {
            margin: 0;
        }

        nav ul li a {
            display: block;
            color: #9e05db;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #111;
        }

        .legend {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .legend div {
            display: flex;
            align-items: center;
        }

        .legend span {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 5px;
            text-align: center;
            line-height: 20px;
            border-radius: 4px;
        }

        .available-seat {
            background: white;
            border: 1px solid black;
        }

        .selected-seat {
            background: blue;
            color: white;
        }

        .booked-seat {
            background: gray;
        }

        .seating-chart {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-bottom: 10px;
        }

        .middle {
            display: flex;
            justify-content: right;
            margin-right: 200px;
            width: 100%;
            margin-bottom: 10px;
        }

        .seat {
            width: 40px;
            height: 40px;
            margin: 5px;
            text-align: center;
            line-height: 40px;
            border: 1px solid #535252;
            border-radius: 4px;
            cursor: pointer;
        }

        .available {
            background: white;
        }

        .selected {
            background: blue;
            color: white;
        }

        .booked {
            background: gray;
            color: rgb(156, 153, 153);
            cursor: not-allowed;
        }

        .details {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .details {
            display: flex;
            flex-direction: column;
        }

        /* Styled labels for route and bus selection */
        .details label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .details select {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease;
        }

        .details select:focus {
            border-color: #4CAF50; /* Change border color on focus */
            outline: none; /* Remove default outline */
        }

        /* .details label,
        .details select,
        .details span,
        .details button {
            margin-bottom: 10px;
        } */

        #fare {
            background: red;
            color: white;
            padding: 10px;
            border-radius: 4px;
        }

        #continue-button {
            display: block;
            align-content: center;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #continue-button:hover {
            background-color: #3e8e41;
        }

        #continue-button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        #confirm-button {
            padding: 10px 20px;
            background-color: #ff5722; /* Vibrant color */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #confirm-button:hover {
            background-color: #e64a19; /* Darker shade on hover */
            transform: translateY(-2px); /* Lift effect */
        }

        #confirm-button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }


        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px; 
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            max-width: 600px;
            animation: slideIn 0.5s;
        }

        @keyframes slideIn {
            from {transform: translateY(-50px);}
            to {transform: translateY(0);}
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .user-details {
            margin-top: 20px;
        }

        .user-details label,
        .user-details input {
            display: block;
            margin-bottom: 10px;
        }

        .user-details input {
            padding: 5px;
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="/Homepage/index.html">Home</a></li>
                <li><a href="/About/about.html">About</a></li>
                <li><a href="/Servicess/services.html">Services</a></li>
                <li><a href="/Contact/contact.html">Contact</a></li>
                <li><a href="/Admin/admin-login.html">Admin</a></li>
                <li><a href="/Ticket/Ticket.html">Ticket</a></li>
            </ul>
        </nav>
        <h2>Customize Your Journey</h2>
        <div class="legend">
            <div><span class="available-seat">A</span> Available Seat</div>
            <div><span class="selected-seat">S</span> Selected Seats</div>
            <div><span class="booked-seat">B</span> Booked Seats</div>
        </div>
        <div class="seating-chart">
            <div class="row">
                <div class="seat available" id="B2">B2</div>
                <div class="seat available" id="B4">B4</div>
                <div class="seat available" id="B6">B6</div>
                <div class="seat available" id="B8">B8</div>
                <div class="seat available" id="B10">B10</div>
                <div class="seat available" id="B12">B12</div>
                <div class="seat available" id="B14">B14</div>
                <div class="seat available" id="B16">B16</div>
                <div class="seat available" id="B18">B18</div>
                <div class="seat available" id="B20">B20</div>
                <div class="seat available" id="B22">B22</div>
                <div class="seat available" id="B24">B24</div>
            </div>
            <div class="row">
                <div class="seat available" id="B1">B1</div>
                <div class="seat available" id="B3">B3</div>
                <div class="seat available" id="B5">B5</div>
                <div class="seat available" id="B7">B7</div>
                <div class="seat available" id="B9">B9</div>
                <div class="seat available" id="B11">B11</div>
                <div class="seat available" id="B13">B13</div>
                <div class="seat available" id="B15">B15</div>
                <div class="seat available" id="B17">B17</div>
                <div class="seat available" id="B19">B19</div>
                <div class="seat available" id="B21">B21</div>
                <div class="seat available" id="B23">B23</div>
            </div>
            <div class="middle">
                <div class="seat available" id="25">25</div>
            </div>
            <div class="row">
                <div class="seat available" id="STF1">STF</div>
                <div class="seat available" id="A4">A4</div>
                <div class="seat available" id="A6">A6</div>
                <div class="seat available" id="A8">A8</div>
                <div class="seat available" id="A10">A10</div>
                <div class="seat available" id="A12">A12</div>
                <div class="seat available" id="A14">A14</div>
                <div class="seat available" id="A16">A16</div>
                <div class="seat available" id="A18">A18</div>
                <div class="seat available" id="A20">A20</div>
                <div class="seat available" id="A22">A22</div>
                <div class="seat available" id="A24">A24</div>
            </div>
            <div class="row">
                <div class="seat available" id="A1">A1</div>
                <div class="seat available" id="A3">A3</div>
                <div class="seat available" id="A5">A5</div>
                <div class="seat available" id="A7">A7</div>
                <div class="seat available" id="A9">A9</div>
                <div class="seat available" id="A11">A11</div>
                <div class="seat available" id="A13">A13</div>
                <div class="seat available" id="A15">A15</div>
                <div class="seat available" id="A17">A17</div>
                <div class="seat available" id="A19">A19</div>
                <div class="seat available" id="A21">A21</div>
                <div class="seat available" id="A23">A23</div>
            </div>
        </div>
        <div class="details">
            <label for="route">Select Route:</label>
            <select id="route">
                <option value="Kisumu-Nairobi" data-fare="1200">Kisumu-Nairobi</option>
                <option value="Nairobi-Mombasa" data-fare="1500">Nairobi-Mombasa</option>
                <option value="Mombasa-Kisumu" data-fare="1300">Mombasa-Kisumu</option>
                
            </select>

            <label for="bus">Bus:</label>
            <span id="bus">Bus Name</span>

            <label for="fare" id="fare-label">Fare per Seat:</label>
            <span id="fare">0</span>

            <label for="total-fare" id="total-fare-label">Total Fare:</label>
            <span id="total-fare">0</span>
        </div>
        <button id="continue-button" disabled>Continue</button>

        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" id="close-modal">&times;</span>
                <h3>User Details</h3>
                <form action="confirm.php" method="post">
                    <div class="user-details">
                        <label for="full-name">Full Name:</label>
                        <input type="text" id="full-name" name="fullname" required>
    
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
    
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" name="mobile" required>
                    </div>
                </form>
                <button id="confirm-button" type="submit">Confirm Booking</button>
            </div>
        </div>
    </div>

    <script>
        let selectedSeats = [];
        const seats = document.querySelectorAll('.seat');

        const busNames = {
            'Kisumu-Nairobi': 'Oxygen 2C',
            'Nairobi-Mombasa': 'Luxury Coach',
            'Mombasa-Kisumu': 'Comfort Ride'
        };

        document.getElementById('route').addEventListener('change', function() {
            const selectedRoute = this.value;
            document.getElementById('bus').textContent = busNames[selectedRoute] || 'Bus Name';
            const fare = this.options[this.selectedIndex].dataset.fare;
            document.getElementById('fare').textContent = fare;
            updateTotalFare();
        });

        seats.forEach(seat => {
            seat.addEventListener('click', () => {
                if (seat.classList.contains('available')) {
                    seat.classList.toggle('selected');
                    const seatId = seat.id;
                    if (selectedSeats.includes(seatId)) {
                        selectedSeats = selectedSeats.filter(s => s !== seatId);
                    } else {
                        if (selectedSeats.length < 4) {
                            selectedSeats.push(seatId);
                        } else {
                            alert('You can only select a maximum of 4 seats.');
                        }
                    }
                    updateTotalFare();
                }
            });
        });

        function updateTotalFare() {
            const farePerSeat = parseFloat(document.getElementById('fare').textContent);
            const totalFare = farePerSeat * selectedSeats.length;
            document.getElementById('total-fare').textContent = totalFare.toFixed(2);
            document.getElementById('continue-button').disabled = selectedSeats.length === 0;
        }

        document.getElementById('continue-button').addEventListener('click', () => {
            if (selectedSeats.length > 0) {
                document.getElementById('modal').style.display = 'block';
            }
        });

        document.getElementById('close-modal').addEventListener('click', () => {
            document.getElementById('modal').style.display = 'none';
        });

        document.getElementById('confirm-button').addEventListener('click', () => {
            const fullName = document.getElementById('full-name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            if (fullName && email && phone) {
                const selectedSeatsString = selectedSeats.join(',');
                const route = document.getElementById('route').value;
                const bus = document.getElementById('bus').textContent;
                const fare = parseFloat(document.getElementById('fare').textContent);
                const totalFare = parseFloat(document.getElementById('total-fare').textContent);

                // Redirect to the receipt page with the booking details
                window.location.href = `Receipt.php?route=${encodeURIComponent(route)}&bus=${encodeURIComponent(bus)}&seats=${encodeURIComponent(selectedSeatsString)}&totalFare=${encodeURIComponent(totalFare)}&farePerSeat=${encodeURIComponent(fare)}&fullName=${encodeURIComponent(fullName)}&email=${encodeURIComponent(email)}&phone=${encodeURIComponent(phone)}`;
            } else {
                alert('Please fill in all details.');
            }
        });
    </script>
</body>
</html>
