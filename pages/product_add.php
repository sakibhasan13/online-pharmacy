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

    $product_name=$_POST['product_name'];
    $product_title=$_POST['product_title'];
    $product_details=$_POST['product_details'];
    $manufacturer = $_POST['manufacturer'];
    $product_qty=$_POST['product_qty'];
    $category=$_POST['category'];
    $product_price=$_POST['product_price'];
    $product_img=$_FILES['product_img'];
    
    // $imageTempLocation=$_FILES['product_img']['tmp_name'];
    // $imageName=$_FILES['product_img']['name'];

    // $imageLocalLocation ="../upload/.$imageName";
    // move_uploaded_file($imageTempLocation,$imageLocalLocation);

    move_uploaded_file($_FILES["product_img"]["tmp_name"],"../upload/" . $_FILES["product_img"]["name"]);         
    $product_img=$_FILES["product_img"]["name"];

        $query = "INSERT INTO `product`(`product_name`, `product_title`, `product_details`, `manufacturer`, `product_qty`, `category`, `product_price`, `product_img`) VALUES ('$product_name', '$product_title','$product_details', '$manufacturer','$product_qty','$category','$product_price','$product_img')";
        $result = mysqli_query($connection,$query);
        header("Location: ../pages/product_information.php");
            
      //   if($result){
            
      //       $prod_name = $_POST['prod_name'];
      //       $prod_qty = $_POST['prod_qty'];
            
      //       date_default_timezone_set('Asia/Manila');

      //       $date = date("Y-m-d H:i:s");
      //       $id=$_SESSION['id'];
            
      //       $query=mysqli_query($dbconn,"SELECT prod_name FROM products WHERE prod_id='$prod_name'")or die(mysqli_error());
          
      //           $row=mysqli_fetch_array($query);
      //           $product=$row['prod_name'];
      //           $remarks="added a new product $prod_qty of $prod_name";  
            
      //           mysqli_query($dbconn,"INSERT INTO logs (user_id,action,date) VALUES ('$id','$remarks','$date')")or die(mysqli_error($dbconn));

      //   //redirecting to the display page.
      //   header("Location: admin_panel.php");
      //   }
      } 

?>


    <section>
      <div class="contentBx">
        <div class="formBx">
          <h2>Add product item</h2>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="inputBx">
            <label for="product_name" style="font-weight:bold;margin-left: 10px;">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" required/>
            </div>
            <div class="inputBx">
            <label for="product_name" style="font-weight:bold;margin-left: 10px;">Product Title</label>
            <input type="text" class="form-control" id="product_title" name="product_title" placeholder="Product title" required>
            </div>
            <div class="inputBx">
            <label for="product_name" style="font-weight:bold;margin-left: 10px;">Product Decreption</label>
            <input type="text" class="form-control" style="height:200px;" id="product_details" name="product_details" placeholder="Product Description" required>
            </div>
            <div class="inputBx">
            <label for="product_name" style="font-weight:bold;margin-left: 10px;">Product Manufacturer</label>
            <input type="text" class="form-control" id="manufacturer" name="manufacturer" placeholder="Product manufacturer" required>
            </div>
            <div class="inputBx">
            <label for="product_name" style="font-weight:bold;margin-left: 10px;">Product Quantity</label>
            <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Product Quantity" required/>
            </div>
            <div class="inputBx">
            <label for="product_name" style="font-weight:bold;margin-left: 10px;">Product Category</label>
            <input type="text" class="form-control" id="category" name="category" placeholder="Medicine" required/>
            </div>
            <div class="inputBx">
            <label for="product_name" style="font-weight:bold;margin-left: 10px;">Product Price</label>
            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Tk. 100.00" required/>
            </div>
            <div class="inputBx">
            <label for="product_name" style="font-weight:bold;margin-left: 10px;">Product Image</label>
            <input type="file" class="form-control" id="product_img" name="product_img" required/>
            </div>
           
            <div class="inputBx">
              <input type="submit" value="Add" name="submit" />
            </div>
          </form>
      </div>
    </section>
  </body>
</html>
