<?php
require ('connect.php');

if (isset($_POST['add'])) {
    $BusName = $_POST['name'];
    $BusNumber = $_POST['number'];
    $Capacity = $_POST['capacity'];
    $to = $_POST['rout_to'];
    $from = $_POST['rout_from'];
    $Driver = $_POST['driver'];

    // Check if the bus number already exists
    $checkSql = "SELECT * FROM bus WHERE number = '$BusNumber'";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        // Bus number already exists
        echo "<script>
            alert('Bus number already exists! Please use a different number.');
            window.location.href = 'addbus.php';
        </script>";
    } else {
        // Proceed to insert the new bus
        $sql = "INSERT INTO bus (name, number, capacity, rout_to, rout_from, driver)
        VALUES ('$BusName', '$BusNumber', '$Capacity', '$to','$from', '$Driver')";

        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "<script>
                alert('Bus Added Successfully!');
                window.location.href = 'viewbus.php';
            </script>";
        } else {
            echo "<script>
                alert('Failed to Add bus 😥!');
                window.location.href = 'addbus.php';
            </script>";
        }
    }
}
