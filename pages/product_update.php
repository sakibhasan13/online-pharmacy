<?php
// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['update'])){

    $id = mysqli_real_escape_string($connection, $_POST['product_id']);
    $product_name=mysqli_real_escape_string($connection, $_POST['product_name']);
    $product_details=mysqli_real_escape_string($connection, $_POST['product_details']);
    $product_qty=mysqli_real_escape_string($connection, $_POST['product_qty']);
    $category=mysqli_real_escape_string($connection, $_POST['category']);
    $product_price=mysqli_real_escape_string($connection, $_POST['product_price']);
    // $product_img=$_FILES['product_img'];
    
    // $imageTempLocation=$_FILES['product_img']['tmp_name'];
    // $imageName=$_FILES['product_img']['name'];

    // $imageLocalLocation ="../upload/.$imageName";
    // move_uploaded_file($imageTempLocation,$imageLocalLocation);

    // move_uploaded_file($_FILES["product_img"]["tmp_name"],"../upload/" . $_FILES["product_img"]["name"]);         
    // $product_img=$_FILES["product_img"]["name"];

    //     $query = "INSERT INTO `product`(`product_name`, `product_details`, `product_qty`, `category`, `product_price`, `product_img`) VALUES ('$product_name','$product_details','$product_qty','$category','$product_price','$product_img')";
    //     $result = mysqli_query($connection,$query);
    //     header("Location: ../pages/admin_index.php");
            
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
    //   } 
      

    $query = "UPDATE `product` SET `product_name`='$product_name',`product_details`='$product_details',`product_qty`='$product_qty',`category`='$category',`product_price`='$product_price' WHERE product_id=$id";
    $result = mysqli_query($connection,$query);
    if($result){
        header("Location: admin_index.php");
    }
}
?>

<?php
    //getting id from url
    $id=isset($_GET['product_id']) ? $_GET['product_id'] : die('ERROR: Record ID not found.');
    //selecting data associated with this particular id
    $result = mysqli_query($connection, "SELECT * FROM product WHERE product_id=$id");
        while($res = mysqli_fetch_array($result))
        {
            $product_name = $res['product_name'];
            $product_details = $res['product_details'];
            $product_qty = $res['product_qty'];
            $category = $res['category'];
            $product_price = $res['product_price'];
        }
?>




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
    <section>
      <div class="contentBx">
        <div class="formBx">
          <h2>Update product item</h2>
          <form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" id="product_id" name="product_id" value="<?php echo $_GET['product_id'];?>" >
            <div class="inputBx">
            <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product_name;?>" />
            </div>
            <div class="inputBx">
            <input type="text" class="form-control" id="product_details" name="product_details" value="<?php echo $product_details;?>" >
            </div>
            <div class="inputBx">
            <input type="text" class="form-control" id="product_qty" name="product_qty"  value="<?php echo $product_qty;?>" />
            </div>
            <div class="inputBx">
            <input type="text" class="form-control" id="category" name="category" value="<?php echo $category;?>" />
            </div>
            <div class="inputBx">
            <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $product_price;?>" />
            </div>
           
            <div class="inputBx">
              <input type="submit" value="Update" name="update" />
            </div>
          </form>
      </div>
    </section>
  </body>
</html>
