
  
<?php
//including the database connection file
include('../config/dbconn.php');
//getting id of the data from url
$id = $_GET['product_id'];
//deleting the row from table
$result = mysqli_query($connection, "DELETE FROM product WHERE product_id=$id");
//redirecting to the display page (index.php in our case)
header("Location:admin_index.php");
?>
    