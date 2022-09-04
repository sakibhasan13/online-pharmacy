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
    if(!isset($_GET['discount'])){
        $discount="0.0";
    }else{
        $discount = $_GET['discount'];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
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
                            <li><a href="edit_profile.php">Profile</a></li>
                                <li><a href="myorder.php">My Order</a></li>
                                <li><a href="logout.php">Logout</a></li>
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
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $subtotal = 0;
                                foreach($cart as $key => $value)
                                {
                                    // echo $key ." : ". $value['quantity'] . "<br>";
                                    $_SESSION['c_key']=$key;
                                    $_SESSION['qty'] = $value['quantity'];
                                    $query = mysqli_query($connection,"SELECT * FROM product WHERE product_id=$key");
                                    while($res = mysqli_fetch_array($query))
                                    {
                                    $product_name = $res['product_name'];
                                    $product_price = $res['product_price'];
                                    $product_img = $res['product_img'];
                                    }
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
                                    Tk <?php echo $product_price;?>
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="number" value="<?php echo $value['quantity']?>" name="quantity">
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    <?php
                                        echo $value['quantity'] * $product_price;
                                    ?>
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="deleteCart.php?id=<?php echo $key;?>"><span><i class="fas fa-times"></i></span></a>
                                </td>
                            </tr>
                            <?php 
                        $subtotal = $subtotal + ($value['quantity'] * $product_price);
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="user_index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="discount.php" method="POST">
                            <input type="hidden" name="subtotal" value="<?php echo $subtotal?>">
                            <input type="text" placeholder="Enter your coupon code" name="cupon_name">
                            <button type="submit" name="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Sub Total <span>Tk <?php echo $subtotal?></span></li>
                        <li>Discount <span>Tk 
                        <?php
                            echo $discount;
                        ?>
                        </span></li>
                        <li>Delevery Fee:<span>Tk 0.0</span></li>
                        <?php $total = $subtotal-$discount?>
                        <li>Total: <span>Tk <?php echo $total?></span></li>
                    </ul>
                    <a href="checkOut.php?price=<?php echo $total?>" class="primary-btn">PROCEED TO CHECKOUT</a>
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

<!-- footer end -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>