<?php
    session_start();
    include '../config/dbconn.php';
    if(isset($_POST['l_submit'])){
        $l_username = $_POST['l_username'];
        $l_pass = $_POST['l_pass'];

        date_default_timezone_set('Asia/Manila');
        $date = date("Y-m-d H:i:s");

        $result = mysqli_query($connection,"SELECT * FROM `login` WHERE username='$l_username' And password='$l_pass'");
        $res=mysqli_fetch_array($result);
        $id=$res['id'];

        if(mysqli_num_rows($result) && $res['usertype']=='user'){
            $_SESSION['id']=$id;
            header('Location: ../pages/user_index.php');

            $_SESSION['id']=$id;
            $remarks="has logged in the system at ";  
            mysqli_query($connection,"INSERT INTO logs(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($connection));
        
        }else if(mysqli_num_rows($result) && $res['usertype']=='admin'){
    
            $_SESSION['id']=$id;
            header('Location: ../pages/admin_index.php');

            $_SESSION['id']=$id;
            $remarks="has logged in the system at ";  
            mysqli_query($connection,"INSERT INTO logs(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($connection));
        }
        
        else{
            echo "<script>alert('Incorrect username & pass')</script>";
            echo "<script>location.href='../pages/login.html'</script>";
        }
    }


?>