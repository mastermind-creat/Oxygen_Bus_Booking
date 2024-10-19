<?php

require('connect.php');

if(isset($_POST['add'])){
    $Name =mysqli_real_escape_string($conn, $_POST['name']);
    $Email =mysqli_real_escape_string($conn, $_POST['email']);
    $Phone =mysqli_real_escape_string($conn, $_POST['phone']);
    $ID =mysqli_real_escape_string($conn, $_POST['identity']);
    $Pass = mysqli_real_escape_string($conn,$_POST['password']);
}


$sql = "INSERT INTO staff (name,email,phone,identity,password)
VALUES ('$Name','$Email','$Phone','$ID','$Pass')";
$res = mysqli_query($conn, $sql);

if($res){
    echo " <script>
              alert('Staff Added Successfully!');
              window.location.href = 'user.php';
            </script>";
}else{
    echo "<script>
            alert('Staff Not Added!');
            window.location.href = 'user.php
        </script>";
        
}