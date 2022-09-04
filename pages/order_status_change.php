<?php
    session_start();
    include '../config/dbconn.php';
    date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");


    if(isset($_POST['submit']))
    {
        $order_id = $_POST['order_id'];
        $status = $_POST['status'];
        $reason = $_POST['reason'];

        $query =mysqli_query($connection,"INSERT INTO `order_tracking`(`order_id`, `status`, `reason`, `time`) VALUES ('$order_id','$status','$reason','$date')");
        
        
        $update = mysqli_query($connection,"UPDATE `order` SET `status`='$status' WHERE order_id=$order_id");

        header("Location: ../pages/admin_index.php");

    }


?>