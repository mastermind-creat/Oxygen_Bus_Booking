<?php
    require ('connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Staff</title>
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
        <a href="addbus.php" class="text-light btn btn-success  mt-5">Add Staff</a>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Staff Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Phone number</th>
                <th scope="col">ID</th>
                <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql = "SELECT * FROM staff";
                    $res = mysqli_query($conn,$sql);
                    if($res){
                        while ($row = mysqli_fetch_assoc($res)){
                            $id = $row["id"];
                            $Name =$row["name"];
                            $Email =$row["email"];
                            $Phone =$row["phone"];
                            $ID =$row["identity"];
                            $Pass =$row["password"];

                            echo '<tr>
                                    <th scope="row">'.$id.'</th>
                                    <td>'.$Name.'</td>
                                    <td>'.$Email.'</td>
                                    <td>'.$Phone.'</td>
                                    <td>'.$ID.'</td>
                                    <td>'.$Pass.'</td>
                                    <td>
                                        <a href="updatestaff.php?updatestaffid='.$id.'" class="text-light btn btn-primary">EDIT</a>
                                        <a href="deletebus.php?deleteid='.$id.'" class="text-light btn btn-danger">DELETE</a>
                                    </td>
                                  </tr>';
                        }
                    }

                ?>


                
            </tbody>
        </table>
        <a href="dashboard.php" class="text-light btn btn-danger mt-5">Return to Dashboard</a>
    </div>
</body>
</html>