<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Receipt</title>
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

        #receipt {
            margin: 0 auto;
            width: 100%;
            border-collapse: collapse;
        }

        #receipt th,
        #receipt td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        #payment-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #payment-button:hover {
            background-color: #3e8e41;
        }

        #download-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        #download-link:hover {
            background-color: #0056b3;
        }
        input{
            border: none;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Booking Receipt</h2>
        <div id="receipt-content">
            <table id="receipt">
                <tbody>
                <form action="pay.php" method="POST">
                    <tr>
                        <th>Booking Reference:</th>
                        <td >
                            <input type="text" id="booking-reference" name="reference" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Full Name:</th>
                        <td>
                            <input type="text" id="full-name" name="full-name" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Phone Number:</th>
                        <td>
                            <input type="text" id="phone-number" name="phone-number" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>
                            <input type="text" id="email" name="email" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Route:</th>
                        <td>
                            <input type="text" id="route" name="route" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Bus:</th>
                        <td>
                            <input type="text" id="bus" name="bus" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Selected Seats:</th>
                        <td>
                            <input type="text" id="selected-seats" name="selected-seats" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Fare:</th>
                        <td>
                            <input type="text" id="total-fare" name="total-fare" readonly>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
            <button id="payment-button" style="margin-top: 15px;" type="submit" name="proceed">Complete Booking</button>
        </form>
        <br>
        <a href="#" id="download-link">Download Receipt</a>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);

            function sanitizeInput(input) {
                const element = document.createElement('div');
                element.innerText = input;
                return element.innerHTML;
            }

            document.getElementById('booking-reference').value = generateBookingReference();
            document.getElementById('full-name').value = sanitizeInput(urlParams.get('fullName') || 'N/A');
            document.getElementById('phone-number').value = sanitizeInput(urlParams.get('phone') || 'N/A');
            document.getElementById('email').value = sanitizeInput(urlParams.get('email') || 'N/A'); // Added email
            document.getElementById('route').value = sanitizeInput(urlParams.get('route') || 'N/A');
            document.getElementById('bus').value = sanitizeInput(urlParams.get('bus') || 'N/A');
            document.getElementById('selected-seats').value = sanitizeInput(urlParams.get('seats') || 'N/A');
            document.getElementById('total-fare').value = 'Ksh ' + sanitizeInput(urlParams.get('totalFare') || '0.00');

            function generateBookingReference() {
                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                let reference = '';
                for (let i = 0; i < 8; i++) {
                    reference += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                return reference;
            }

            // document.getElementById('payment-button').addEventListener('click', function() {
            //     const queryString = `?fullName=${encodeURIComponent(urlParams.get('fullName'))}&phone=${encodeURIComponent(urlParams.get('phone'))}&email=${encodeURIComponent(urlParams.get('email'))}&route=${encodeURIComponent(urlParams.get('route'))}&bus=${encodeURIComponent(urlParams.get('bus'))}&seats=${encodeURIComponent(urlParams.get('seats'))}&totalFare=${encodeURIComponent(urlParams.get('totalFare'))}`;
            //     window.location.href = 'pay.php' + queryString;
            // });

            document.getElementById('download-link').addEventListener('click', function() {
                const receiptContent = document.getElementById('receipt-content').outerHTML;
                const blob = new Blob([receiptContent], { type: 'text/html' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'receipt.html';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            });
        });
    </script>
</body>
</html>
