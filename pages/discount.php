<?php
    include ('../config/dbconn.php');
    if(isset($_POST['submit']))
    {
        $cupon_name = $_POST['cupon_name'];
        $subtotal = $_POST['subtotal'];


        $query = "SELECT * FROM `discount` WHERE cupon_name='$cupon_name'";
        $result = mysqli_query($connection,$query);
        $res = mysqli_fetch_array($result);
        $min_value = $res['min_value'];
        if($subtotal>=$min_value)
        {
            $discount = $res['cupon_value'];
            echo "<script>location.href='../pages/shopping-cart.php?discount=$discount'</script>";
        }
        else
        {
            echo "<script>alert('Add min value')</script>";
            echo "<script>location.href='../pages/shopping-cart.php'</script>";
        }
    }   
    
?>