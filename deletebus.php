<?php

require ('connect.php');

if(isset($_GET['deleteid'])){
    $id =$_GET['deleteid'];

    $sql = "DELETE FROM bus WHERE id=$id";
    $res = mysqli_query($conn,$sql);

    if($res){
        echo "<script>
            alert('Deleted successfully');
            window.location.href = 'viewbus.php';
            </script>";
    }else{
        die(mysqli_error($conn));
    }
}
