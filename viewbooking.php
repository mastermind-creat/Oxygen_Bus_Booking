<?php
    require ('connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <button class="btn btn-primary mt-5"><a href="dashboard.php" class="text-light">Back to Dashboard</a></button>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Booking Reference</th>
                <th scope="col">Full Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email Address</th>
                <th scope="col">Route</th>
                <th scope="col">Bus</th>
                <th scope="col">Selected Seats</th>
                <th scope="col">Total Fare</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql = "SELECT * FROM bookingdetails";
                    $res = mysqli_query($conn,$sql);
                    if($res){
                        while ($row = mysqli_fetch_assoc($res)){
                            $id = $row["id"];
                            $BookingRef =$row["booking_reference"];
                            $FullName =$row["fullname"];
                            $Phone =$row["phone"];
                            $Email =$row["route"];
                            $Route =$row["email"];
                            $Bus =$row["bus"];
                            $Selected =$row["selected_seats"];
                            $TotalFare =$row["total_fare"];
                            // $Status =$row[""];

                            echo '<tr>
                                    <th scope="row">'.$id.'</th>
                                    <td>'.$BookingRef.'</td>
                                    <td>'.$FullName.'</td>
                                    <td>+254 '.$Phone.'</td>
                                    <td>'.$Route.'</td>
                                    <td>'.$Email.'</td>
                                    <td>'.$Bus.'</td>
                                    <td>'.$Selected.'</td>
                                    <td>'.$TotalFare.'</td>
                                    <td></td>
                                    <td><button class="btn btn-danger"><a href="deletebus.php?deleteid='.$id.'" class="text-light">cancel</a></button></td>
                                  </tr>';
                        }
                    }

                ?>


                
            </tbody>
        </table>
    </div>
</body>
</html>