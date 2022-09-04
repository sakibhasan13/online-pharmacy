
<?php
// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['submit']))
{   
    $product_id = mysqli_real_escape_string($connection, $_POST['product_id']);

            $product_name = $_POST['product_name'];
            $product_details = $_POST['product_details'];
            $product_qty = $_POST['product_qty'];
            $category = $_POST['category'];
            $product_price = $_POST['product_price'];
    // checking empty field
   
        if(empty($product_qty)) {
            echo "<font color='red'>Product Quantity field is empty!</font><br/>";
        
        } else {    

        //updating the table
        $query = "UPDATE product SET product_qty=product_qty+'$product_qty' WHERE product_id=$product_id";

        $result = mysqli_query($connection,$query);
       
       if($result){
            
            $product_name = $_POST['product_name'];
            $product_qty = $_POST['product_qty'];
            
          
            $id=$_SESSION['id'];
            
            $query=mysqli_query($connection,"SELECT * FROM product WHERE product_id='$product_id'")or die(mysqli_error());
          
                while($res=mysqli_fetch_array($query)){
                $product_name=$res['product_name'];
                $remarks="added $product_qty of $product_name";  
            }
                mysqli_query($connection,"INSERT INTO logs (user_id,action) VALUES ('$id','$remarks')")or die(mysqli_error($connection));

        //redirecting to the display page.
        header("Location: ../pages/admin_index.php");
        }
        
    }
}
?>
    

<?php
    //getting id from url
    $product_id=isset($_GET['product_id']) ? $_GET['product_id'] : die('ERROR: Record ID not found.');
    //selecting data associated with this particular id
    $result = mysqli_query($connection, "SELECT * FROM product WHERE product_id=$product_id");
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
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Electricks</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>

    <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<body class="index-page sidebar-collapse">

    <!-- End Navbar -->
    <div class="wrapper">

<br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                      <h2>Product Information</h2>
                      <hr color="orange">
                      <a href='admin_index.php' class='btn btn-warning btn-round'>Back to Index</a>
                <br>
                <div class="col-md-12">

    <div class="panel panel-success panel-size-custom">
  <div class="panel-heading"><h3>Add Product Quantity</h3></div>
  <div class="panel-body">
    <form action="" method="post">
        <div class="form group">
            <input type="hidden" class="form-control" id="product_id" name="product_id" value=<?php echo $_GET['product_id'];?>>
            <label for="product_name">Name: &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $product_name;?></label><br><br>
            <label for="product_details">Description: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $product_details;?></label><br><br>
            <label for="category">Product Category: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $category;?></label><br><br>
            <label for="product_price">Product Price: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $product_price;?></label><br><br>
            <label for="qty">Available Quantity: &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $product_qty;?></label><br><br>
            <label for="product_qty">Number of Quantity/Volume to be added:</label>
            <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Value e.g. 1234">
        </div>
        <br/>
        <div class="form group">
            <button type="submit" class="btn btn-success btn-round" id="submit" name="submit">
            <i class="now-ui-icons ui-1_check"></i> Add Quantity
            </button> 
        </div>
    </form>
  
  </div>
</div>
</div>
</div>
</div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</html>