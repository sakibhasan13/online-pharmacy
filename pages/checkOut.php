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

    //  Getting user information

    include('../config/dbconn.php');
    $query=mysqli_query($connection,"SELECT * FROM `login` WHERE id='".$_SESSION['id']."'");
    while($res = mysqli_fetch_array($query))
    {
      $name = $res['name'];
      $address = $res['address'];
      $email = $res['email'];
      $phone = $res['phone'];
    }
 //Getting product_id
 $total = $_GET['price'];


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
  <link rel="stylesheet" href="../css/form.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="../css/stylesheet.css?v=<?php echo time();?>">
 
  
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
 
    <div class="container" style="margin-bottom:20px;">

    <section>
      <div class="contentBx">
        <div class="formBx" style="width:70%;">
        <h2 style="padding-top:30px;">Product Checkout</h2>
          <form action="payment.php" method="POST" enctype="multipart/form-data">
              <br>
            <div class="inputBx">
            <label for="product_name" style="font-weight:bold;margin-left: 10px;">Full Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $name?>"  readonly/>
            </div>
            <div class="inputBx">
            <label for="product_name" style="font-weight:bold;margin-left: 10px;">Shipping Address</label>
            <input type="text" class="form-control" name="address" value="<?php echo $address?>" required>
            </div>
            <div class="inputBx">
            <label for="product_name" style="font-weight:bold;margin-left: 10px;">Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo $email?>" readonly>
            </div>
            <div class="inputBx">
            <label for="product_name" style="font-weight:bold;margin-left: 10px;">Phone</label>
            <input type="text" class="form-control"name="phone" value="<?php echo $phone?>" readonly>
            

					
    <div class="container" style="margin-top:30px;margin-bottom:30px;">
		<div class="row">
			<div class="space30"></div>
			<h4 class="heading">Your order</h4>
			
			<table class="table table-primary bg-white rounded shadow-sm  table-hover">
				<tbody>
					<tr>
						<th>Cart Subtotal</th>
						<td><span class="amount">Tk. <?php echo $total?></span></td>
					</tr>
					<tr>
						<th>Shipping and Handling</th>
						<td>
							Free Shipping				
						</td>
					</tr>
					<tr>
						<th>Order Total</th>
						<td><strong><span class="amount">Tk. <?php echo $total?></span></strong> </td>
					</tr>
				</tbody>
			</table>
        </div>		
        
		
	</div>
    </div>
            <div class="inputBx" style="text-align:center;">
              <input type="hidden" name="price" value="<?php echo $total?>">
              <button type="submit" class="btn btn-secondary" name="submit" style="background-color:#ff4584;width:200px;">Place Order</button>
            </div>
          </form>
      </div>
    </section>
</div>
<!-- footer start-->
<footer class="site-footer" id="footer">
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
</body>
</html>