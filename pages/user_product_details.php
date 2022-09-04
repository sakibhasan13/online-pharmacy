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
    //getting id from url
    include("../config/dbconn.php");
    $product_id=isset($_GET['product_id']) ? $_GET['product_id'] : die('ERROR: Not found.');
    //selecting data associated with this particular id

    $query = mysqli_query($connection,"SELECT * FROM product WHERE product_id=$product_id");
    while($res = mysqli_fetch_array($query))
    {
      $product_name = $res['product_name'];
      $product_details = $res['product_details'];
      $manufacturer = $res['manufacturer'];
      $category = $res['category'];
      $product_price = $res['product_price'];
      $product_qty = $res['product_qty'];
      $product_img = $res['product_img'];
    }
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Pharmacopoeia</title>

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&family=Ubuntu&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="css/product.css">

  <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->

  <link rel="shortcut icon" href="../images/favicon.ico" />
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/stylesheet.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="../css/styles.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

     <!-- navbar -->
     <nav id="navbar">
        <div id="logo">
            <img  src="../images/favicon.ico" alt="Heartbeat" >
        </div>
            <ul>
                <li class="item"><a href="user_index.php">HOME</a></li>
                <li class="item"><a href="#product">PRODUCT</a></li>
                <li class="item"><a href="#service">SERVICE</a></li>
                <li class="item"><a href="#footer">ABOUT US</a></li>
                <li class="item"><a href="a">CONTACT US</a></li>
              
                <li class="carticon"><a href="shopping-cart.php"> <i class="fas fa-shopping-cart me-2"> Cart <?php echo $count?></i></a></li>
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
                                <li><a href="edit_profile.php">Profile</a></li>
                                <li><a href="myorder.php">My Order</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                            </div>
                        </li>
            </ul>
            </ul>
        </div>
    </nav>

    <!-- nav end -->
  
    <div class="container media">
    <div class="product_img1">
    <?php if($product_img!=''): ?>
            <img src="../upload/<?php echo $product_img;?>" class="product_img1" />
            <?php else: ?>
            <img class="product_img1" src="../upload/default.png" alt="image">
            <?php endif; ?>
    </div>
  
    <div class="media-body">
      <h2 class="mt-0"><?php echo $product_name;?></h2>
      <h5 class="mt1">Medical Description:</h5>
      <p><?php echo $product_details?></p>
      <h5 class="mt1">Manufacturer:</h5>
      <p><?php echo $manufacturer?></p>
      <h5 class="mt2">Price: <?php echo $product_price;?></h5>
      <h5 class="mt2">Stock: <?php echo $product_qty;?></h5>
      <form action="add_to_cart.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
        
      <input type="number" class="btn" name="quantity" value="1" style="width:80px;border: 1px solid #00ad7c"><br>
      <button type="submit" name="buy" class="btn btn-lg add-cart" style="background-color:#20837E; color:#fff;"> Buy Now </button>
      <button type="submit" name="cart" class="btn btn-lg add-cart" style="background-color:#20837E; color:#fff;"> Add to Cart </button>
      </form>
            
    </div>
  
  </div>


<!-- show related product -->

    <div class="scrolling-wrapper">
    <?php

    $query = mysqli_query($connection,"SELECT * FROM `product` WHERE category='$category' And product_id!='$product_id'");
    while($res = mysqli_fetch_array($query)){
    
    ?>
        <div onclick="window.location.href='user_product_details.php?product_id=<?php echo $res['product_id'];?>'" class="card">
        <?php if($res['product_img'!=""]): ?>
                <img class="m1" src="../upload/<?php echo $res['product_img'];?>" class="product_img" />
                <?php else: ?>
                <img src="../upload/default.png" alt="">
                <?php endif; ?>
          <h6><?php echo $res['product_name'];?></h6>
        </div>
        <?php }?>
      </div>



<!-- footer -->
<footer class="site-footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-3 mb-5">
          <h2>About us</h2>
          <p>Online Pharmacy is the biggest digital pharmacy of Bangladesh. Currently the free home delivery service is available to residents of Dhaka city only, and throughout the country for a very nominal charge and no minimum order volume restrictions. </p>
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
            <li><a href="#"><i class="fa-brands fa-facebook"></i></span></a></li>
            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
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

  
</body>

</html>
