<?php
// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['update'])){

    $id = mysqli_real_escape_string($connection, $_POST['user_id']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']); 
    $uname = mysqli_real_escape_string($connection, $_POST['username']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']); 
    $address = mysqli_real_escape_string($connection, $_POST['address']); 


    $query = "UPDATE `login` SET `name`='$name',`email`='$email',`username`='$uname',`phone`='$phone',`address`='$address' WHERE id=$id";
    $result = mysqli_query($connection,$query);
    
    if($result){
        //redirecting to the display page. In our case, it is index.php
    header("Location: admin_information.php");
    }
        
}

?>

<?php
//getting id from url
$id=isset($_GET['user_id']) ? $_GET['user_id'] : die('ERROR: Record ID not found.');
//selecting data associated with this particular id
$result = mysqli_query($connection, "SELECT * FROM login WHERE id=$id");
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $email = $res['email'];
    $uname = $res['username'];
    $phone = $res['phone'];
    $address = $res['address'];
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
          <h2>Update Supplier</h2>
          <form action="" method="post">
            <div class="inputBx">
            <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $_GET['user_id'];?>">
            <label class="label1" for="name">Full Name:</label>  
            <input type="text" name="name" value="<?php echo $uname;?>"/>
            </div>
            <div class="inputBx">
            <label class="label1" for="email"> Email:</label>
              <input type="text" name="email" value="<?php echo $email;?>"/>
            </div>
            <div class="inputBx">
            <label class="label1" for="Username">User Name:</label>
                <input type="text" name="username" value="<?php echo $uname;?>"/>
              </div>
              <div class="inputBx">
              <label class="label1" for="phone">Contact No:</label>
                <input type="text" name="phone" value="<?php echo $phone;?>"/>
              </div>
              <div class="inputBx">
              <label class="label1" for="address">Address:</label>
                <input type="text" name="address" value="<?php echo $address;?>"/>
              </div>
            <div class="inputBx">
              <input type="submit" value="Update Account" name="update" />
            </div>
          </form>
      </div>
    </section>
  </body>
</html>
