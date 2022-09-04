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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online pharmacy</title>
    <link rel="shortcut icon" href="../images/favicon.ico" />
    <link rel="stylesheet" href="css/font-awesome.min.css?v=<?php echo time();?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylesheet.css?v=<?php echo time();?>" rel='stylesheet'>
    <link rel="stylesheet" href="../css/cart.css?vecho time();?>" rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <!-- navbar -->
    <nav id="navbar">
        <div id="logo">
            <img  src="../images/favicon.ico" alt="Heartbeat" >
        </div>
            <ul>
                <li class="item"><a href="index.html">HOME</a></li>
                <li class="item"><a href="#product">PRODUCT</a></li>
                <li class="item"><a href="#product">SERVICE</a></li>
                <li class="item"><a href="#about">ABOUT US</a></li>
                <li class="item"><a href="a">CONTACT US</a></li>

                <li class="item carticon"><a href="shopping-cart.php"> <i class="fas fa-shopping-cart me-2"> Cart <?php echo $count ?></i></a></li>
                <li class="item profile"><a href="#">
                <?php
                                 include('../config/dbconn.php');
                                 $query=mysqli_query($connection,"SELECT * FROM `login` WHERE id='".$_SESSION['id']."'");
                                 $row=mysqli_fetch_array($query);
                                 echo $row['name'].'';
                                ?>  
                <i class="fas fa-user me-2"></i></a>
                            <div class="sub-menu">
                            <ul>
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Settings</a></li>
                                <li><a href="shoping-cart.php">My cart(0)</a></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                            </div>
                        </li>
            </ul>
        </div>
    </nav>
 <!-- navbar -->

<!-- Shoping Cart Section Begin -->

    <div class="container">
        
    </div>


<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                include('../config/dbconn.php');    
                                $query = mysqli_query($connection,"SELECT * FROM `order`  WHERE user_id=$_SESSION[id]");
                                    while($res = mysqli_fetch_array($query))
                                    
                                    {
                                    $product_id = $res['product_id'];
                                    $quantity = $res['quantity'];
                                    $price = $res['totalprice'];
                                    $status = $res['status'];
                                    
                                    $query1 = mysqli_query($connection,"SELECT * FROM `product` WHERE product_id='$product_id'");
                                   $res1 = mysqli_fetch_array($query1);
                                    
                                    $product_img = $res1['product_img'];
                                    $product_name = $res1['product_name'];
                                  
                            ?>

                            <tr>
                                <td class="shoping__cart__item">
                                <?php if($product_img!=''): ?>
                                    <img class="imageSize" src="../upload/<?php echo $product_img;?>" class="product_img" />
                                    <?php else: ?>
                                    <img class="imageSize" src="../upload/default.png" alt="">
                                    <?php endif; ?>
                                    <h5><?php echo $product_name;?></h5>
                                </td>
                                <td class="shoping__cart__price">
                                   <?php echo $quantity;?>
                                </td>
                                <td class="shoping__cart__price">
                                   <?php echo $price;?>
                                </td>
                                </td>
                                <td class="shoping__cart__total">
                                <?php echo $status;?>
                                </td>
                                
                            </tr>
                            <?php } ?>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

<!-- footer start-->
<footer class="site-footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-3 mb-5">
          <h2>About us</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi explicabo recusandae, officiis magnam at illum minus hic ratione quia nemo! Ad, molestiae harum error incidunt ullam doloribus laudantium iusto eos?</p>
          <p><a href="#">Click here to learn more</a></p>
        </div>
        <div class="col-md-3 mb-5">
          <h2>Contact &amp; Address</h2>
          <ul class="list-unstyled footer-link">
            <li class="d-flex">
              <span class="me-3">Address: </span><span class="text-white">Bangladesh Sylhet</span>
            </li>
            <li class="d-flex">
              <span class="me-3">Phone: </span><span class="text-white">+8801711223344</span>
            </li>
            <li class="d-flex">
              <span class="me-3">Email: </span><span class="text-white">onlinepharmacy@gmail.com</span>
            </li>
          </ul>
        </div>

        <div class="col-md-3 mb-5">
          <h2>Quick link</h2>
          <ul class="list-unstyled footer-link">
            <li><a href="#">About us</a></li>
            <li><a href="#">Our product</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">Contact us</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h2>Our social media</h2>
          <ul class="list-unstyled footer-link d-flex footer-social">
            <li><a href="#"><span class="fas fa-facebook"></span></a></li>
            <li><a href="#"><span class="fas fa-twitter"></span></a></li>
            <li><a href="#"><span class="fas fa-instagram"></span></a></li>
            <li><a href="#"><span class="fas fa-linkedin"></span></a></li>
          </ul>
        </div>

      </div>

      <!-- <div class="row">
        <div class="col-12 text-md-center text-left">
          <p>This template is made with <i class="fa fa-heart-o"></i>by online pharmacy</p>
        </div>
      </div> -->
    </div>
  </footer>

<!-- footer end -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>