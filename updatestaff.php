<?php
require('connect.php');

// Initialize the variables to avoid undefined variable warnings
$id = isset($_GET['updatestaffid']) ? $_GET['updatestaffid'] : null;
$Name = $Email = $Phone = $ID = $Pass = "";

if ($id) {
    // Fetch existing staff details from the database
    $sql = "SELECT * FROM staff WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $Name = $row['name'];
        $Email = $row['email'];
        $Phone = $row['phone'];
        $ID = $row['identity'];
        $Pass = $row['password'];
    } else {
        die("Error fetching staff details: " . mysqli_error($conn));
    }

    // Update the staff details if the form is submitted
    if (isset($_POST['update'])) {
        $Name = mysqli_real_escape_string($conn, $_POST['name']);
        $Email = mysqli_real_escape_string($conn, $_POST['email']);
        $Phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $ID = mysqli_real_escape_string($conn, $_POST['identity']);
        $Pass = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "UPDATE staff SET 
                    name='$Name',
                    email='$Email',
                    phone='$Phone',
                    identity='$ID',
                    password='$Pass'
                WHERE id='$id'";

        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "<script>
                alert('Staff Updated Successfully!');
                window.location.href = 'viewstaff.php';
            </script>";
        } else {
            die("Error updating staff: " . mysqli_error($conn));
        }
    }
} else {
    echo "<script>alert('Invalid staff ID'); window.location.href = 'viewstaff.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Details Capture</title>
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
        }

        .container {
            max-width: 800px;
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
        input[type="number"],
        input[type="password"] {
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
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }

        .btn-danger {
            margin-bottom: 15px;
            background-color: #d9534f;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn-danger:hover {
            background-color: #c9302c;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            margin-top: -10px;
        }

        .checkbox-wrapper label {
            margin-left: 5px;
            font-weight: normal;
        }
    </style>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <h2>Staff Details Capture</h2>
        <form action="" method="post">
            <a href="dashboard.php" class="btn btn-danger">BACK</a>
            <label for="name">Staff Name:</label>
            <input type="text" value="<?php echo htmlspecialchars($Name); ?>" name="name" required>
            <label for="email">Email:</label>
            <input type="text" value="<?php echo htmlspecialchars($Email); ?>" name="email" required>
            <label for="phone">Phone:</label>
            <input type="number" value="<?php echo htmlspecialchars($Phone); ?>" name="phone" required>
            <label for="identity">Identity:</label>
            <input type="text" value="<?php echo htmlspecialchars($ID); ?>" name="identity" required>
            <label for="password">Password:</label>
            <input type="password" id="password" value="<?php echo htmlspecialchars($Pass); ?>" name="password" required>
            <div class="checkbox-wrapper">
                <input type="checkbox" id="showPassword" onclick="togglePassword()">
                <label for="showPassword">Show Password</label>
            </div>
            <input type="submit" value="UPDATE" name="update" class="btn btn-success">
        </form>
    </div>
</body>

</html>