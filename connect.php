<?php

    $severname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "oxygen";

    // Create a connection
    $conn = new mysqli($severname,$username,$password,$dbName);

    // Check connection

    if($conn->connect_error){
        die("Connection Failed!".$conn->connect_error);
    }
    // echo "Connected Successfully";

    
?>