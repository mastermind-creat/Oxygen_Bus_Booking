<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Selection with Popup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            display: flex;
            flex-direction: row;
        }

        h2 {
            text-align: center;
            width: 100%;
        }

        .seating-chart {
            display: flex;
            flex-direction: column;
            margin-right: 20px;
        }

        .row {
            display: flex;
            margin-bottom: 10px;
        }

        .seat {
            width: 40px;
            height: 40px;
            border: 1px solid #000;
            margin-right: 5px;
            text-align: center;
            line-height: 40px;
            cursor: pointer;
        }

        .seat.selected {
            background-color: blue;
            color: white;
        }

        .available {
            background: white;
        }

        .booked {
            background: gray;
            color: rgb(156, 153, 153);
            cursor: not-allowed;
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

        /* .details {
            display: flex;
            flex-direction: column;
        } */

        /* .details label,
        .details select,
        .details div {
            margin-bottom: 10px;
        } */

        .fare {
            background-color: red;
            padding: 10px;
            color: white;
        }

        #continue-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
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
            background-color: rgba(0, 0, 0, 0.4); 
            padding-top: 60px; 
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            max-width: 600px;
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
        <div class="seating-chart">
            <h2>Select Your Seats</h2>
            <div class="row">
                <div class="seat available" id="1XL">1XL</div>
                <div class="seat available" id="4L">4L</div>
                <div class="seat available" id="7L">7L</div>
                <div class="seat available" id="10L">10L</div>
                <div class="seat available" id="13L">13L</div>
            </div>
            <div class="row">
                <div class="seat available" id="1L">1L</div>
                <div class="seat available" id="3L">3L</div>
                <div class="seat available" id="6L">6L</div>
                <div class="seat available" id="9L">9L</div>
                <div class="seat available" id="12L">12L</div>
            </div>
            <div class="row">
                <div class="seat available" id="2L">2L</div>
                <div class="seat available" id="5L">5L</div>
                <div class="seat available" id="8L">8L</div>
                <div class="seat available" id="11L">11L</div>
            </div>
        </div>
        <div class="details">
            <label for="route">Select Route:</label>
            <select id="route">
                <option value="" data-fare="0">Select a Route</option>
                <option value="Kisumu-Nairobi" data-fare="1200">Kisumu-Nairobi</option>
                <option value="Nairobi-Mombasa" data-fare="1500">Nairobi-Mombasa</option>
                <option value="Mombasa-Kisumu" data-fare="1300">Mombasa-Kisumu</option>
                <option value="Mombasa-Kisumu" data-fare="2000">Mombasa-Kisumu</option>
                <!-- Add more routes and their fares here -->
            </select>

            <label for="bus-name">Bus Name:</label>
            <select id="bus-name" disabled>
                <option value="">Select a Bus</option>
                <option value="">Oxygen Mini</option>
                <option value="">Oxygen Mini 2</option>
                <option value="">Oxygen Mini 1</option>
                <option value="">Oxygen Ultra</option>
                <option value="">Oxygen Metro</option>
            </select>

            <div>
                <span>Selected Seats:</span>
                <span id="selected-seats"></span>
            </div>
            <div class="fare">
                <span>Fare:</span>
                <span id="fare">0</span>
            </div>
            <button id="continue-button" disabled>Continue</button>
        </div>
    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-modal">&times;</span>
            <h3>User Details</h3>
            <div class="user-details">
                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" required>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" required>
            </div>
            <button id="confirm-button">Confirm Booking</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seats = document.querySelectorAll('.seat.available');
            const selectedSeats = document.getElementById('selected-seats');
            const fareDisplay = document.getElementById('fare');
            const continueButton = document.getElementById('continue-button');
            const routeSelect = document.getElementById('route');
            const busNameSelect = document.getElementById('bus-name');
            const modal = document.getElementById('modal');
            const closeModal = document.getElementById('close-modal');
            const confirmButton = document.getElementById('confirm-button');

            let selectedSeatIds = [];

            // Define bus names for each route
            const busNames = {
                "Kisumu-Nairobi": ["Oxygen Mini", "Oxygen Luxury"],
                "Nairobi-Kisumu": ["Oxygen Mini", "Oxygen Luxury"],
                "Kisumu-Mombasa": ["Oxygen Shuttle", "Oxygen Luxury"],
                "Mombasa-Kisumu": ["Oxygen Shuttle", "Oxygen Luxury"]
            };

            // Event listener for route selection to update bus names and fare
            routeSelect.addEventListener('change', function() {
                const selectedRoute = this.value;
                updateBusNames(selectedRoute);
                updateFare();
            });

            function updateBusNames(route) {
                // Clear existing options
                busNameSelect.innerHTML = '<option value="">Select a Bus</option>';
                if (route in busNames) {
                    busNames[route].forEach(bus => {
                        const option = document.createElement('option');
                        option.value = bus;
                        option.textContent = bus;
                        busNameSelect.appendChild(option);
                    });
                    busNameSelect.disabled = false; // Enable bus name select
                } else {
                    busNameSelect.disabled = true; // Disable if no route is selected
                }
            }

            seats.forEach(seat => {
                seat.addEventListener('click', function() {
                    const seatId = this.id;
                    if (selectedSeatIds.includes(seatId)) {
                        this.classList.remove('selected');
                        selectedSeatIds = selectedSeatIds.filter(id => id !== seatId);
                    } else if (selectedSeatIds.length < 4) {
                        this.classList.add('selected');
                        selectedSeatIds.push(seatId);
                    }
                    selectedSeats.textContent = selectedSeatIds.join(', ');
                    updateFare();
                });
            });

            function updateFare() {
                const selectedRoute = routeSelect.value;
                const fare = parseInt(routeSelect.options[routeSelect.selectedIndex].dataset.fare) || 0;
                const totalFare = fare * selectedSeatIds.length;
                fareDisplay.textContent = totalFare;
                continueButton.disabled = selectedSeatIds.length === 0 || !selectedRoute;
            }

            continueButton.addEventListener('click', function() {
                modal.style.display = 'block';
            });

            closeModal.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });

            confirmButton.addEventListener('click', function() {
                const fullName = document.getElementById('full-name').value;
                const email = document.getElementById('email').value;
                const phone = document.getElementById('phone').value;
                const selectedRoute = routeSelect.value;
                const selectedBus = busNameSelect.value;

                if (fullName && email && phone) {
                    // Create a query string with the booking details
                    const queryString = new URLSearchParams({
                        fullName: fullName,      // Ensure this matches receipt's expected parameter
                        phone: phone, 
                        email: email,           // Ensure this matches receipt's expected parameter
                        route: selectedRoute,    // Ensure this matches receipt's expected parameter
                        bus: selectedBus,        // Ensure this matches receipt's expected parameter
                        seats: selectedSeatIds.join(', '), // Ensure this matches receipt's expected parameter
                        totalFare: fareDisplay.textContent // Ensure this matches receipt's expected parameter
                    }).toString();

                    // Redirect to the receipt page with the booking details
                    window.location.href = `Receipt.php?${queryString}`;
                }
            });
        });
    </script>
</body>
</html>
