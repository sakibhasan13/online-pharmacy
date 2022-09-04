<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>index</title>
    <link rel="stylesheet" href="../css/form.css?v=<?php echo time();?>">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>

  <?php
// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['submit'])){

    $supp_name=$_POST['supp_name'];
    $supp_address=$_POST['supp_address'];
    $supp_contact=$_POST['supp_contact'];
    $supp_email=$_POST['supp_email'];


        $query = "INSERT INTO supplier (supp_name, supp_address, supp_contact, supp_email) 
        VALUES ('$supp_name','$supp_address','$supp_contact','$supp_email')";  

        $result = mysqli_query($connection,$query);
        
        if($result){
            //redirecting to the display page. In our case, it is index.php
        header("Location: supplier_information.php");
        }
        
}

?>


    <section>
      <div class="contentBx">
        <div class="formBx">
          <h2>Add product item</h2>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="inputBx">
            <input type="text" class="form-control" id="supp_name" name="supp_name" placeholder="Supplier Name" required/>
            </div>
            <div class="inputBx">
            <input type="text" class="form-control" id="supp_address" name="supp_address" placeholder="Address" required/>
            </div>
            <div class="inputBx">
            <input type="text" class="form-control" id="supp_contact" name="supp_contact" placeholder="Contact No" required/>
            </div>
            <div class="inputBx">
            <input type="text" class="form-control" id="supp_email" name="supp_email" placeholder="Email@email.com" required/>
            </div>
           
            <div class="inputBx">
              <input type="submit" value="Add Supplier" name="submit" />
            </div>
          </form>
      </div>
    </section>
  </body>
</html>
