<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'connect.php';
session_start();

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string( $conn, $_POST['password']);

    if($email == "" || $password == ""){
      echo "
          <script>
            alert('All fields are required!');
            window.location.href = 'index.php';
          </script>

        ";
           
    } else{
      $sql = "SELECT * FROM staff WHERE email = '$email' AND password = '$password'";
    $res = mysqli_query($conn, $sql);
    //print_r($res);
    if(mysqli_num_rows($res) > 0){
        echo "
          <script>
            alert('Login Success!');
            window.location.href = 'dashboard.php';
          </script>

        ";
    } else{
      
        die(mysqli_error($conn));
    }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Oxygen Bus Reservation System</title>
    <link rel="stylesheet" href="/Admin/alogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
</head>
<body>
    <div class="container form-control mt-5">
        <h2 class="text-center text-light mt-1 md-1 bg-dark">Admin Login</h2>
        <form id="loginForm" method="POST" class="form-control form-container">
            <div class="form-group">
                <label for="username">Email:</label>
                <input type="text" class="form-control" id="username" name="email" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control md-3" id="password" name="password" autocomplete="off" required>
            </div>
            <button type="submit" name="login" class="btn btn-success text-align-center mt-5 ">Login</button>
            <p id="errorMessage" style="color: red;"></p>
        </form>
        <button onclick="window.location.href='index.php'" class="back-button btn btn-primary mt-2">Back to Home</button>
        <button onclick="window.location.href='forgotpass.php'" class="forgot-password-button btn btn-secondary mt-2 mx-5 align-content-lg-end ">Forgot Password?</button>
    </div>
    <script src="/Admin/script.js"></script>
    <script src="/Admin/logout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
