<?php
    require ('connect.php');
//     // Initialize the variables to avoid undefined variable warnings
// $id = $BusName = $BusNumber = $Capacity = $Route = $Driver = "";
            $id=$_GET['updatebusid'];
            $sql = "SELECT * FROM bus WHERE id=$id";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $Name =$row['name'];
            $Number =$row['number'];
            $capacity =$row['capacity'];
            $fro =$row['rout_from'];
            $To =$row['rout_to'];
            $driver =$row['driver'];

            if(isset($_POST['update'])){
                $BusName =$_POST['name'];
                $BusNumber =$_POST['number'];
                $Capacity =$_POST['capacity'];
                $to =$_POST['rout_to'];
                $from =$_POST['rout_from'];
                $Driver =$_POST['driver'];
            }

        $sql = "UPDATE bus SET id=$id,name='$BusName',number='$BusNumber',capacity='$Capacity',rout_to='$to',rout_from='$from',driver='$Driver'
         WHERE id='$id'";

        $res = mysqli_query($conn,$sql);
        if($res){
            echo "<script>
                alert ('Bus Updated Successfully!');
                window.location.href = 'viewbus.php';
                </script>";
        }else{
            die(mysqli_error($conn));
        }

