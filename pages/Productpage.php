<?php
    session_start();
    include '../config/dbconn.php';
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

  <link rel="shortcut icon" href="images/favicon.ico" />
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/stylesheet.css">
  <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>

<body>

    <!-- navbar -->
    <nav id="navbar">
        <div id="logo">
            <img  src="../images/favicon.ico" alt="Heartbeat" >
        </div>
        <ul>
            <li class="item"><a href="a">HOME</a></li>
            <li class="item"><a href="a">PRODUCT</a>
                  
            </li>
                </div>
              </div></li>
            <li class="item"><a href="a">ABOUT US</a></li>
            <li class="item"><a href="a">CONTACT US</a></li>
        </ul>

        <!-- <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>
                               
                            </p>
                        </a>
                    </li>
          </div> -->


    </nav>
      <?php

        include '../config/dbconn.php';
        $allData = mysqli_query($connection,"SELECT * FROM `product`");
        while($res = mysqli_fetch_array($allData)){
         
      
      ?>

 <div class="media">
    <div class="media-body" class="img-zoom-result">
      <h2 class="mt-0"><?php echo $res['product_name'];?></h2>
      <h5 class="mt1">Medical Description:</h5>
      <p><?php echo $res['product_details'];?></p>
      <h5 class="mt1">Category:</h5>
      <p><?php echo $res['category'];?></p>
      <h6 class="mt2">Price: Tk. <?php echo $res['product_price'];?></h6>
      <h6 class="mt2">Stock: 25</h6>
      <a href="shoping-cart.html" class="btn btn-lg add-cart" style="background-color:#00ad7c; color:#fff;">Add to Cart</a>
    </div>
  </div>

  <?php }?> 
  <div class="media">
    <img class="medpic" src="images/combiflame.jpg" alt="...">
    <div class="media-body" class="img-zoom-result">
      <h2 class="mt-0">Combiflam - Strip of 20 Tablets</h2>
      <h5 class="mt1">Medical Description:</h5>
      <p>Combiflam Strip Of 20 Tablets is a combination of Ibuprofen and Paracetamol, a pain-relieving medicine.</p>
      <h5 class="mt1">Composition:</h5>
      <p>Ibuprofen(400.0 Mg) + Paracetamol / Acetaminophen(325.0 Mg)</p>
      <h5 class="mt1">Category:</h5>
      <p>Analgesic/antipyretic</p>
      <h6 class="mt2">Price: Tk. 34.00</h6>
      <h6 class="mt2">Stock: 25</h6>
      <a href="shoping-cart.html" class="btn btn-lg add-cart" style="background-color:#00ad7c; color:#fff;">Add to Cart</a>
    </div>
  </div>
  <div class="media">
    <img class="medpic" id="img1" src="images/azee.jpg" alt="...">
    <div class="media-body">
      <h2 class="mt-0">Azee-500 - Strip of 5 Tablets</h2>
      <h5 class="mt1">Medical Description:</h5>
      <p>Azee 500 Tablet contains azithromycin. It is a higher antibiotic.</p>
      <h5 class="mt1">Composition:</h5>
      <p>Azithromycin(500.0 Mg)</p>
      <h5 class="mt1">Category:</h5>
      <p>Antibiotic</p>
      <h6 class="mt2">Price: Tk. 101.05</h6>
      <h6 class="mt2">Stock: 15</h6>
      <a href="#" class="btn btn-lg add-cart" style="background-color:#00ad7c; color:#fff;">Add to Cart</a>
    </div>
  </div>
  <div class="media">
    <img class="medpic" onmouseover="increase()" onmouseout="decrease()" width="100" id="img1" src="images/pantosec.jpg" alt="...">
    <div class="media-body">
      <h2 class="mt-0">Pantosec - Strip of 10 Tablets</h2>
      <h5 class="mt1">Medical Description:</h5>
      <p>Pantosec Tablet contains Pantoprazole. It is a medicine that reduces the amount of acid produced in your stomach and prevent hyper acidity.</p>
      <h5 class="mt1">Composition:</h5>
      <p>Pantoprazole(40.0 Mg)</p>
      <h5 class="mt1">Category:</h5>
      <p>Antacid</p>
      <h6 class="mt2">Price: Tk. 100.85</h6>
      <h6 class="mt2">Stock: 45</h6>
      <a href="#" class="btn btn-lg add-cart" style="background-color:#00ad7c; color:#fff;">Add to Cart</a>
    </div>
  </div>
  <div class="media">
    <img class="medpic" id="img1" src="images/aldactone.jpg" alt="...">
    <div class="media-body">
      <h2 class="mt-0">Aldactone 100mg - Strip of 15 Tablets</h2>
      <h5 class="mt1">Medical Description:</h5>
      <p>Aldactone 100mg Tab is classified as a diuretic. Diuretics are the medicines which prevent the absorption of excess salt and water by your body.</p>
      <h5 class="mt1">Composition:</h5>
      <p>Spironolactone(100.0 Mg)</p>
      <h5 class="mt1">Category:</h5>
      <p>Diuretics</p>
      <h6 class="mt2">Price: Tk. 163.13</h6>
      <h6 class="mt2">Stock: 15</h6>
      <a href="#" class="btn btn-lg add-cart" style="background-color:#00ad7c; color:#fff;">Add to Cart</a>
    </div>
  </div>
  <div class="media">
    <img class="medpic" id="img1" src="images/ascoril.jpg" alt="...">
    <div class="media-body">
      <h2 class="mt-0">Ascoril Expectorant</h2>
      <h5 class="mt1">Medical Description:</h5>
      <p>The Ascoril Expectorant 120ml is a combination of medicine. It is used as an expectorant and mucolytic. This syrup is also used to relieve one from common cold, cough, chest tightness, influenza, and other respiratory-related infections.</p>
      <h5 class="mt1">Composition:</h5>
      <p>Terbutaline(1.25 Mg) + Menthol(0.5 Mg) + Bromhexine(2.0 Mg) + Guaiphenesin / Guaifenesin(50.0 Mg)</p>
      <h5 class="mt1">Category:</h5>
      <p>Expectorant</p>
      <h6 class="mt2">Price: Tk. 155.13</h6>
      <h6 class="mt2">Stock: 10</h6>
      <a href="#" class="btn btn-lg add-cart" style="background-color:#00ad7c; color:#fff;">Add to Cart</a>
    </div>
  </div>
  <div class="media">
    <img class="medpic" id="img1" src="images/xylocaine.jpg" alt="...">
    <div class="media-body">
      <h2 class="mt-0">Xylocain 2% Jelly 30gm</h2>
      <h5 class="mt1">Medical Description:</h5>
      <p>The Ascoril Expectorant is a combination of medicine. It is used as an expectorant and mucolytic. This syrup is also used to relieve one from common cold, cough, chest tightness, influenza, and other respiratory-related infections.</p>
      <h5 class="mt1">Composition:</h5>
      <p>Lidocaine / Lignocaine(2.0 %)</p>
      <h5 class="mt1">Category:</h5>
      <p>Local Anaesthetic</p>
      <h6 class="mt2">Price: Tk. 28.85</h6>
      <h6 class="mt2">Stock: 12</h6>
      <a href="#" class="btn btn-lg add-cart" style="background-color:#00ad7c; color:#fff;">Add to Cart</a>
    </div>
  </div>
  <div class="media">
    <img class="medpic" id="img1" src="images/okacet.jpg" alt="...">
    <div class="media-body">
      <h2 class="mt-0">Okacet L - Strip of 10 Tablets</h2>
      <h5 class="mt1">Medical Description:</h5>
      <p>This tablet consists of levocetirizine which belongs to the antihistaminic and anti-allergic class of medicine.</p>
      <h5 class="mt1">Composition:</h5>
      <p>Levocetirizine(5.0 Mg)</p>
      <h5 class="mt1">Category:</h5>
      <p>Anti-allergic</p>
      <h6 class="mt2">Price: Tk. 48.45</h6>
      <h6 class="mt2">Stock: 35</h6>
      <a href="#" class="btn btn-lg add-cart" style="background-color:#00ad7c; color:#fff;">Add to Cart</a>
    </div>
  </div>
  <div class="media">
    <img class="medpic" id="img1" src="images/crocin.jpg" alt="...">
    <div class="media-body">
      <h2 class="mt-0">Crocin Advance 500mg - Strip of 15 Tablets</h2>
      <h5 class="mt1">Medical Description:</h5>
      <p>Crocin Advance Tablet contains paracetamol which is also known as Acetaminophen. Crocin Advance Tablet is used to reduce fever and relieve pain.</p>
      <h5 class="mt1">Composition:</h5>
      <p>Paracetamol / Acetaminophen(500.0 Mg)</p>
      <h5 class="mt1">Category:</h5>
      <p>Analgesic/antipyretic</p>
      <h6 class="mt2">Price: Tk. 12.99</h6>
      <h6 class="mt2">Stock: 55</h6>
      <a href="#" class="btn btn-lg add-cart" style="background-color:#00ad7c; color:#fff;">Add to Cart</a>
    </div>
  </div>


<!-- footer -->
<footer class="footer">
  <h1 class="footer_h">ONLINE PHARMACY</h1>
  </div>
  <p class="footer_p">Our Social media handles</p>
  <div class="sm">
      <a class="icon" href="https://www.facebook.com" target="_blank">
          <i class="fa  fa-facebook"></i>
      </a>
      <a class="icon" href="https://www.instagram.com" target="_blank">
          <i class="fa  fa-instagram"></i>
      </a>
      <a class="icon" href="https://twitter.com" target="_blank">
          <i class="fa  fa-twitter"></i>
      </a>
      <a class="icon" href="https://twitter.com" target="_blank">
          <i class="fa  fa-linkedin"></i>
      </a>
      
  </div>
  
</footer>

  
</body>

</html>
