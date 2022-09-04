<?php

    include '../config/dbconn.php';

    if(isset($_POST['submit'])){
        $r_name = $_POST['r_name'];
        $r_email = $_POST['r_email'];
        $r_phone = $_POST['r_phone'];
        $r_username = $_POST['r_username'];
        $r_address = $_POST['r_address'];
        $r_pass = $_POST['r_pass'];
        $r_c_pass = $_POST['r_c_pass'];
        $usertype = $_POST['usertype'];
    }

    $mobilePattern = "/(\+88)?-?01[1-9]\d{8}/";
    $insert_query = "INSERT INTO `login`(`name`, `email`, `username`, `phone`, `address`, `password`, `usertype`) VALUES ('$r_name','$r_email','$r_username', '$r_phone', '$r_address','$r_pass','$usertype')";
    $duplicate_user = mysqli_query($connection,"SELECT * FROM `login` WHERE email = '$r_email' And usertype='admin'"); 


  
    if(strlen($r_username)<3 || strlen($r_username)>20){
        echo "<script>alert('username should be more than 3 & less than 20')</script>";
        echo "<script>location.href='../pages/signup.html'</script>";
    }elseif(!filter_var($r_email, FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Invalid email')</script>";
        echo "<script>location.href='../pages/signup.html'</script>";

    }elseif(strlen($r_pass)<5 || strlen($r_pass)>20){
        echo "<script>alert('Password should be more than 5')</script>";
        echo "<script>location.href='../pages/signup.html'</script>";
    }elseif(!preg_match($mobilePattern,$r_phone)){
        echo "<script>alert('Input a valid phone number')</script>";
        echo "<script>location.href='../pages/admin_signup.php'</script>";
    }elseif($r_pass!=$r_c_pass){
        echo "<script>alert('Password not match')</script>";
        echo "<script>location.href='../pages/admin_signup.php'</script>";
    }elseif(mysqli_num_rows($duplicate_user)>0){
        echo "<script>alert('Email already registerd')</script>";
        echo "<script>location.href='../pages/admin_signup.php'</script>";
    }
    else{
        if(!mysqli_query($connection,$insert_query)){
            echo "Not inserted !!";
        }else{
            echo "<script>alert('Successfully inserted')</script>";
            echo "<script>location.href='../pages/admin_information.php'</script>";
        }
        
    }

?>