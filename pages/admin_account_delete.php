
    <!-- dynamic content will be here -->
    <?php
//including the database connection file
include '../config/dbconn.php';
//getting id of the data from url
$id = $_GET['user_id'];
//deleting the row from table
$result = mysqli_query($connection, "DELETE FROM login WHERE id=$id And usertype='admin'");
//redirecting to the display page (index.php in our case)
header("Location: admin_inforamtion.php");
?>
    