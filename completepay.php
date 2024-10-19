<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complete Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: azure;
        }

        .card {
            margin-top: 50px;
        }

        .confirmation-msg {
            font-size: 1.0rem;
        }

        .btn-back {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h4 class="text-center">Booking Confirmed</h4>
                    </div>
                    <div class="card-body">
                        <p class="confirmation-msg text-center">
                            Thank you for booking with us! <br>
                            Your ticket is ready.
                        </p>
                        <div class="alert alert-success text-center">
                            <h5>Booking Successful! <br> Enjoy Your Ride</h5>
                        </div>
                        <div class="booking-details">
                            <button class="btn btn-danger justify-content-center" id="exit-button" onclick="exitPage()">Exit to Homepage</button>
                            <script>
                                // Function to redirect to the homepage
                                function exitPage() {
                                    window.location.href = 'index.php';
                                }
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>