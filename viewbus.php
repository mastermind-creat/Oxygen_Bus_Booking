<?php
    require ('connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bus</title>
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
        <button class="btn btn-primary mt-5"><a href="addbus.php" class="text-light">Add Bus</a></button>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Bus Name</th>
                <th scope="col">Bus Number</th>
                <th scope="col">Capacity</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Driver Name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql = "SELECT * FROM bus";
                    $res = mysqli_query($conn,$sql);
                    if($res){
                        while ($row = mysqli_fetch_assoc($res)){
                            $id = $row["id"];
                            $Bname =$row["name"];
                            $Bnum =$row["number"];
                            $Cap =$row["capacity"];
                            $from =$row["rout_from"];
                            $to =$row["rout_to"];
                            $Driver =$row["driver"];

                            echo '<tr>
                                    <th scope="row">'.$id.'</th>
                                    <td>'.$Bname.'</td>
                                    <td>'.$Bnum.'</td>
                                    <td>'.$Cap.'</td>
                                    <td>'.$from.'</td>
                                    <td>'.$to.'</td>
                                    <td>'.$Driver.'</td>
                                    <td>
                                        <button class="btn btn-primary"><a href="updatebus.php?updatebusid='.$id.'" class="text-light">EDIT</a></button>
                                        <button class="btn btn-danger"><a href="deletebus.php?deleteid='.$id.'" class="text-light">DELETE</a></button>
                                    </td>
                                  </tr>';
                        }
                    }

                ?>


                
            </tbody>
        </table>
        <button class="btn btn-danger mt-5"><a href="dashboard.php" class="text-light">Return to Dashboard</a></button>
    </div>
</body>
</html>