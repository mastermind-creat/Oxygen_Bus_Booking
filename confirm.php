<?php

require ('connect.php');

if(isset($_POST['submit'])){
    $fullName = $_POST['fullname'];
    $email = $_POST['email'];
    $Phone = $_POST['mobile'];

    $sql = "INSERT INTO `userdetails` (fullname, email, mobile)
    VALUES ('$fullName','$email','$Phone')";
    $result = mysqli_query($conn,$sql);
    if ($result){
        echo "data captured";
    }else{
        die(mysqli_error($conn));
    }

}
