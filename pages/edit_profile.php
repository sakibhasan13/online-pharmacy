<?php
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location: login.html');
        exit();
    }

    if (!isset($_SESSION['cart'])) {
      $count = 0;
  }
  else
  {
    $cart = $_SESSION['cart'];
    $count = count($cart);
  }
    
?>



<?php

    include('../config/dbconn.php');

    $action = isset($_GET['action']) ? $_GET['action'] : "";
    if($action=='deleted'){
        echo "<div class='alert alert-success'>Record was deleted.</div>";
    }
    $result = mysqli_query($connection,"SELECT * FROM `login` WHERE id=$_SESSION[id]");
    while($res = mysqli_fetch_array($result)) {  
        $name = $res['name'];
        $email = $res['email'];
        $username = $res['username'];
        $address = $res['email'];
        $phone = $res['phone'];
        

    }    

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/profile.css">
    <title>Online pharmace</title>
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  </head>
  <body>

    <!-- navbar -->
    <nav id="navbar">
        <div id="logo">
            <img  src="../images/favicon.ico" alt="Heartbeat" >
        </div>
            <ul>
                <li class="item"><a href="user_index.php">HOME</a></li>
                <li class="item"><a href="user_index.php">PRODUCT</a></li>
                <li class="item"><a href="user_index.php">SERVICE</a></li>
                <li class="item"><a href="#footer">ABOUT US</a></li>
                <li class="item"><a href="#footer">CONTACT US</a></li>
               
                    
                <li class="carticon"><a href="shopping-cart.php"> <i class="fas fa-shopping-cart me-2"> Cart </i></a></li>
                <li class="item profile"><a href="#">
                <?php
                                 include('../config/dbconn.php');
                                 $query=mysqli_query($connection,"SELECT * FROM `login` WHERE id='".$_SESSION['id']."'");
                                 $row=mysqli_fetch_array($query);
                                 echo $row['name'].'';
                                ?>  
                <i class="fas fa-user me-2"></i></a>
                            
                        </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="main">
            
            <div class="row">
                <div class="col-md-4 mt-1">
                    <div class="card text-center sidebar">
                        <div class="card-body">
                            <img src="../images/profile.png" class="rounded-circle" width="150"  alt="">
                            <div class="mt-3">
                                <h3><?php echo $name; ?></h3>
                                <h4 style="margin-top:100px;"><a href="">Edit profile</a></h4>
                                <h4 style="margin-top:10px;"><a href="change_pass.php" >Change password</a></h4>
                                <h4 style="margin-top:10px;"><a href="">Setting</a></h4>
                                <h4 style="margin-top:10px;"><a href="logout.php" style="color:red;">Logout</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-1">
                    <div class="card mb-3 content">
                        <h1 class="m-3 pt-3">About</h1>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Full Name</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <h5><?php echo $name; ?></h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Email</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <h5><?php echo $email; ?></h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Username</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <h5><?php echo $username; ?></h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Address</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <h5><?php echo $address; ?></h5>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function openwindow(){
            window.open()
        }
    
    </script>
    
</body>
</html>