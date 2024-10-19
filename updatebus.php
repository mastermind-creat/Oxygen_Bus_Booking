<?php
require ('connect.php');

// Initialize the variables to avoid undefined variable warnings
$id = isset($_GET['updatebusid']) ? $_GET['updatebusid'] : null;
$BusName = $BusNumber = $Capacity = $fro = $To = $Driver = "";

if ($id) {
    // Fetch existing bus details from the database
    $sql = "SELECT * FROM bus WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $BusName = $row['name'];
        $BusNumber = $row['number'];
        $Capacity = $row['capacity'];
        $fro = $row['rout_from'];
        $To = $row['rout_to'];
        $Driver = $row['driver'];
    } else {
        die("Error fetching bus details: " . mysqli_error($conn));
    }

    // Update the bus details if the form is submitted
    if (isset($_POST['update'])) {
        $BusName = mysqli_real_escape_string($conn, $_POST['name']);
        $BusNumber = mysqli_real_escape_string($conn, $_POST['number']);
        $Capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
        $fro = mysqli_real_escape_string($conn, $_POST['rout_from']);
        $To = mysqli_real_escape_string($conn, $_POST['rout_to']);
        $Driver = mysqli_real_escape_string($conn, $_POST['driver']);

        $sql = "UPDATE bus SET 
                    name='$BusName',
                    number='$BusNumber',
                    capacity='$Capacity',
                    rout_to='$To',
                    rout_from='$fro',
                    driver='$Driver'
                WHERE id='$id'";

        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "<script>
                alert('Bus Updated Successfully!');
                window.location.href = 'viewbus.php';
            </script>";
        } else {
            die("Error updating bus: " . mysqli_error($conn));
        }
    }
} else {
    echo "<script>alert('Invalid bus ID'); window.location.href = 'viewbus.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Details Capture</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
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
        input[type="number"] {
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
        <h2>Bus Details Capture</h2>
        <form action="" method="post">
            <a href="dashboard.php" class="btn btn-danger">BACK</a>
            <label for="name">Bus Name:</label>
            <input type="text" value="<?php echo htmlspecialchars($BusName); ?>" name="name" required>

            <label for="number">Bus Number:</label>
            <input type="text" value="<?php echo htmlspecialchars($BusNumber); ?>" name="number" required>

            <label for="capacity">Capacity:</label>
            <input type="number" value="<?php echo htmlspecialchars($Capacity); ?>" name="capacity" required>

            <label for="rout_from">Route From:</label>
            <input type="text" value="<?php echo htmlspecialchars($fro); ?>" name="rout_from" required>

            <label for="rout_to">Route To:</label>
            <input type="text" value="<?php echo htmlspecialchars($To); ?>" name="rout_to" required>

            <label for="driver">Driver Name:</label>
            <input type="text" value="<?php echo htmlspecialchars($Driver); ?>" name="driver" required>

            <input type="submit" value="UPDATE" name="update" class="btn btn-success">
        </form>
    </div>
</body>
</html>
