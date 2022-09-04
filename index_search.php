<?php
include('config/dbconn.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online pharmacy</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesheet.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time();?>">
    <!-- <link rel="stylesheet" href="/css/skeleton.css"> -->
    <!-- <link rel="stylesheet" href="css/cart.css"> -->
    <!-- <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
     <!-- <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" > -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
<body>
    <!-- navbar -->
    <nav id="navbar">
        <div id="logo">
            <img  src="images/favicon.ico" alt="Heartbeat" >
        </div>
            <ul>
                <li class="item"><a href="index.php">HOME</a></li>
                <li class="item"><a href="#product">PRODUCT</a></li>
                <li class="item"><a href="#service">SERVICE</a></li>
                <li class="item"><a href="#footer">ABOUT US</a></li>
                <li class="item"><a href="a">CONTACT US</a></li>
            </ul>
        </div>
        <div class="Login">
            <button class="log" type="submit"  onclick="window.location.href='pages/login.html'">Log in</button>
            <button class="sign" type="submit" onclick="window.location.href='pages/signup.html'">Sign up</button>

        </div>
    </nav>
    <section id="home">
        <h1 class="home_h1">ONLINE &nbsp; PHARMACY</h1>
        <p class="para1">As reliable as your family.</p>
        <div class="home_i">
        <form action="index_search.php" method="POST">
             <input class="btn1" type="text" name="search_text" placeholder=" Search your medicine ">
             <input class="btn2" type="submit" value="search" name="search">
          </form>
        </div>
 </section>

<!-- poruct show -->

<div id="product_section">
      <div class="product_card">
<?php

if(isset($_POST['search'])){
    $search = $_POST['search_text'];
    $result = mysqli_query($connection,"SELECT * FROM `product` WHERE category LIKE '%$search%' OR product_name LIKE '%$search%' OR product_details LIKE '%$search%'");
    while($res = mysqli_fetch_array($result)){
        $product_id = $res['product_id'];
?>

    
        <div class="product_item">
          <div class="product_img">
          <?php if($res['product_img'!=""]): ?>
            <img src="upload/<?php echo $res['product_img'];?>" class="product_img" />
            <?php else: ?>
            <img src="upload/default.png" alt="">
            <?php endif; ?>
          </div>
          
            <div class="product_info">
              <h5 style="padding-top:15px;"><?php echo $res['product_name'];?> </h5>
                <h6><?php echo $res['product_title'];?></h6>
                <!-- <h5 class="mt1">Category:</h5>
                <p><?php echo $res['category'];?></p> -->
              <p>
                <span class="price">Tk. <?php echo $res['product_price'];?></span>
              </p>
              <a href="pages/singleProduct.php?product_id=<?php echo $res['product_id'];?>" class="product_button">View</a>
            </div>
          <!--.card-->
        </div>
        <?php }?>
        <?php }?> 
        </div>
        
      </div>
    </div>
  


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