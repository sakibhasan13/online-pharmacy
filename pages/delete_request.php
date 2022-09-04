<?php
     include('../config/dbconn.php');
    $requester_id = $_GET['requester_id'];

    $query = "DELETE FROM `requester` WHERE requester_id=$requester_id";
    mysqli_query($connection,$query);
    header('Location: my_request.php');

?>