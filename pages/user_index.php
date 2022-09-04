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
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylesheet.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../css/styles.css?v=<?php echo time();?>">
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
            <img  src="../images/favicon.ico" alt="Heartbeat" >
        </div>
            <ul>
                <li class="item"><a href="user_index.php">HOME</a></li>
                <li class="item"><a href="#product">PRODUCT</a></li>
                <li class="item"><a href="#service">SERVICE</a></li>
                <li class="item"><a href="#footer">ABOUT US</a></li>
                <li class="item"><a href="#footer">CONTACT US</a></li>              
                <li class="item carticon"><a href="shopping-cart.php"> <i class="fas fa-shopping-cart me-2"> Cart <?php echo $count?></i></a></li>
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
        <!-- <div class="Login">
            <button class="log" type="submit"  onclick="window.location.href='pages/login.html'">Log in</button>
            <button class="sign" type="submit" onclick="window.location.href='pages/signup.html'">Sign up</button>
        </div> -->
       
    </nav>
    <section id="home">
        <h1 class="home_h1">ONLINE &nbsp; PHARMACY</h1>
        <p class="para1">As reliable as your family.</p>
        <div class="home_i">
          <form action="user_search.php" method="POST">
             <input class="btn1" type="text" name="search_text" placeholder=" Search your medicine " required>
             <input class="btn2" type="submit" value="search" name="search">
          </form>
        </div>
 </section>
<!-- Collections -->
<div class="slideshow-container">

    <div class="mySlides fade1">
      <div class="numbertext">1 / 4</div>
      <img src="../images/home4.png" style="width:100%"  >
      
    </div>
    
    <div class="mySlides fade1">
      <div class="numbertext">2 / 4</div>
      <img src="../images/home1.jpg" style="width:100%">
      
    </div>
    
    <div class="mySlides fade1">
      <div class="numbertext">3 / 4</div>
      <img src="../images/home2.jpg" style="width:100%">
      
    </div>
    <div class="mySlides fade1">
      <div class="numbertext">4 / 4</div>
      <img src="../images/home3.jpg" style="width:100%">
      
    </div>
    
    </div>
    <br>
    
    <div style="text-align:center">
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
    </div>
    
    <script>
    var slideIndex = 0;
    showSlides();
    
    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
           slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 3000); // Change image every 2 seconds
    }
    </script>
<!-- ORDER NOW -->
 <section class="ordernow " id="product">
    <h2 class="order_h">ORDER NOW</h2>
    <p class="order_p">Bringing the medicine at your door</p>
    <div class="order_cont">
        <div class="row1">
            <div class="order" id=order1 onclick="window.location.href='../pages/user_product.php?category=covid'">Covid-19 Essentials</div>
            <div class="order" id=order2 onclick="window.location.href='../pages/user_product.php?category=babycare'">Baby Care </div>
            <div class="order" id=order3 onclick="window.location.href='../pages/user_product.php?category=nutrition'">Nutrition</div>
            <div class="order" id=order4 onclick="window.location.href='../pages/user_product.php'">Himalaya</div>
        </div>
        <div class="row2">
        <div class="order" id=order5 onclick="window.location.href='../pages/user_product.php?category=p_care'">Personal Care</div>
        <div class="order" id=order6 onclick="window.location.href='../pages/user_product.php?category=ayurvedic'">Ayurvedic</div>
        <div class="order" id=order7 onclick="window.location.href='../pages/user_product.php?category=skin_care'">Skin & Hair</div>
        <div class="order" id=order8 onclick="window.location.href='../pages/user_product.php?category=human_m'">Human Wellness</div>
        </div>
      
    </div>

</section>

<!-- cards -->



<!-- Service -->
<div class="scrolling-wrapper" id="service">
    <div onclick="window.location.href='blood_index.php'" class="card">
           <img src="../images/blood.jpg" alt="">
      <h4>Blood Bank</h4>
    </div>
  </div>

    

<!-- service section end -->

<!-- footer start-->
        <footer class="site-footer" id="footer">
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