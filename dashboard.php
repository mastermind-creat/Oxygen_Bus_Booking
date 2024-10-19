<?php
session_start();
require 'connect.php';


// Simulating WiFi connection status
$wifi_connected = false;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="materials.css">
    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="d-flex form-control">
        <!-- Sidebar -->
        <div class="bg-light border" style="min-width: 250px; height: 100vh; padding: 20px;">
            <h4 class="text-center">OXY<span class="btn btn-danger">GEN</span></h4>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a href="user.php" class="nav-link btn btn-dark text-light " style="font-size: 16px; ">Add Staff</a>
                </li>
                <li class="nav-item mb-3">
                    <a href="addbus.php" class="nav-link btn btn-dark text-light">Add Bus</a>
                </li>
            </ul>

            <!-- WiFi Signal Indicator -->
            
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <div class="container-fluid m-2">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <img src="/Images/icon.jpeg" class="logo" alt="">
                        <a href="admindashboard.php" class="navbar-brand">ADMIN DASHBOARD</a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <div class="navbar-nav">
                                <a href="adminroombooking.php" class="nav-item nav-link">BOOKINGS</a>
                                <a href="adminpayment.php" class="nav-item nav-link">PAYMENT</a>
                                <a href="adminrooms.php" class="nav-item nav-link">BUSES</a>
                                <a href="adminstaffs.php" class="nav-item nav-link">STAFFS</a>
                                <div class="mt-0.1 text-center">
                                    <?php if ($wifi_connected): ?>
                                        <i class="bi bi-wifi mx-5" style="font-size: 2rem; color: green;"></i>
                                    <?php else: ?>
                                        <i class="bi bi-wifi mx-5" style="font-size: 2rem; color: red;"></i>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="navbar-nav ms-auto">
                                <a href="index.php" class="nav-item nav-link btn btn-danger">Log Out</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Card Section -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-primary">
                            <div class="card-body">
                                <?php
                                  $sql = "SELECT * FROM staff";
                                  $res = mysqli_query($conn, $sql);
                                  $count = mysqli_num_rows($res);
                                ?>
                                <p class="card-text">STAFF</p>
                                <h1 class="card-title">TOTAL <span><?= $count?></span></h1>
                                <a href="viewstaff.php" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-primary">
                            <div class="card-body">
                                <?php
                                  $sql = "SELECT * FROM bus";
                                  $res = mysqli_query($conn, $sql);
                                  $count = mysqli_num_rows($res);
                                ?>
                                <p class="card-text">BUSES</p>
                                <h1 class="card-title">TOTAL <span><?= $count?></span></h1>
                                <a href="viewbus.php" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-success">
                            <div class="card-body">
                                <?php
                                  $sql = "SELECT * FROM bookingdetails";
                                  $res = mysqli_query($conn, $sql);
                                  $count = mysqli_num_rows($res);
                                ?>
                                <p class="card-text">BOOKINGS</p>
                                <h1 class="card-title">TOTAL <span><?= $count?></span></h1>
                                <a href="viewbooking.php" class="btn btn-success">View</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Room Booking Chart -->
            <!-- <div class="container mt-5">
                <h2>Room Bookings by Type</h2>
                <canvas id="bookingChart" width="400" height="200"></canvas>
            </div> -->

            <!-- Room Table -->

            <!-- End Room Table -->
        </div>
    </div>

    <!-- Chart.js Script -->
    <script>
        var ctx = document.getElementById('bookingChart').getContext('2d');
        var bookingChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Luxury', 'Double', 'Single', 'Guest'],
                datasets: [{
                    label: 'Number of Bookings',
                    data: [<?= $luxury_count ?>, <?= $double_count ?>, <?= $single_count ?>, <?= $guest_count ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
