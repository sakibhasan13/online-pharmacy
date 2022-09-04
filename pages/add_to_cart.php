<?php

    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location: login.html');
        exit();
    }
    
    if(isset($_POST['buy']))
    {
        if(isset($_POST['product_id']))
        {
            if(isset($_POST['quantity']))
            {
                $quantity = $_POST['quantity'];
            }
            else
            {
                $quantity = 1;
            }

            $id = $_POST['product_id'];

            $_SESSION['cart'][$id] = array('quantity' => $quantity);
            header('Location: shopping-cart.php');
        }
    }
    elseif(isset($_POST['cart']))
    {
        if(isset($_POST['product_id']))
        {
            if(isset($_POST['quantity']))
            {
                $quantity = $_POST['quantity'];
            }
            else
            {
                $quantity = 1;
            }

            $id = $_POST['product_id'];

            $_SESSION['cart'][$id] = array('quantity' => $quantity);
            echo "<script>alert('Added to cart')</script>"; 
            echo "<script>location.href='user_product_details.php?product_id=$id'</script>";
        }
    }


   
?>

