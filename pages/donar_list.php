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
    <link rel="shortcut icon" href="images/favicon.ico" />
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
                <li class="item"><a href="user_index.php">PRODUCT</a></li>
                <li class="item"><a href="my_request.php">DONATE BLOOD</a></li>
                <li class="item"><a href="blood_index.php">BLOOD REQUEST</a></li>
                <li class="item"><a href="donar_list.php">DONAR LIST</a></li>              
                
                <li class="item profile" style="margin-left:350px;"><a href="#">
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
                                <li><a href="blood_index.php">Blood Request</a></li>
                                <li><a href="my_request.php">My Request</a></li>
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
    <section style="margin-left:400px;">
        
        <div class="home_i">
        <form action="blood_search.php" method="POST">
             <input class="btn1" type="text" name="search_text" placeholder=" Search blood ">
             <input class="btn2" type="submit" value="search" name="search">
          </form>
        </div>
 </section>

    <div class="container-fluid px-4" style="width:80%;">
   
                <div class="row g-3 my-2">
                <div class="row my-5" id="product" role="tabpanel">
                    <h3 class="fs-4 mb-3" style="text-align:center;padding-bottom:30px;text-transform:uppercase;">Donar list</h3>
                    <?php
                                      include('../config/dbconn.php');
                                      $result = mysqli_query($connection,"SELECT * FROM `donar`");
                                      ?>  
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Donar Name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Blood Group</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                          if($result){
                                            while($res = mysqli_fetch_array($result)) {     
                                              echo "<tr>";
                                                echo "<td>".$res['donar_name']."</td>";
                                                echo "<td>".$res['gender']."</td>";
                                                echo "<td>".$res['blood_group']."</td>";
                                
                                                echo "<td>".$res['address']."</td>";
                                                echo "<td>".$res['email']."</td>";
                                                echo "<td>".$res['phone']."</td>";
                                                
                                              
                                              echo "</tr>";
                                            }
                                          }?>
                            </tbody>
                        </table>
                        <br><br>
                               
                                </div>
                            </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
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




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>