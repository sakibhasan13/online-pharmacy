
  <?php
// including the database connection file
include("../config/dbconn.php");
session_start();
if(isset($_POST['submit'])){

    $n_pass = $_POST['n_pass'];
    $c_pass = $_POST['c_pass'];


    $update = "UPDATE `login` SET `password`='$n_pass' WHERE id=$_SESSION[id]";

    if(strlen($n_pass)<5 || strlen($n_pass)>20){
        echo "<script>alert('Password should be more than 5')</script>";
        echo "<script>location.href='../pages/change_pass.php'</script>";
    }elseif($n_pass!=$c_pass){
        echo "<script>alert('Password not match')</script>";
        echo "<script>location.href='../pages/change_pass.php'</script>";
    }
    else{
        if(!mysqli_query($connection,$update)){
            echo "Not inserted !!";
        }else{
            echo "<script>alert('Successfully updated')</script>";
            echo "<script>location.href='../pages/edit_profile.php'</script>";
        }
        
    }

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
      <div class="contentBx" style="margin-top:150px;width:50%;margin-left:300px;">
        <div class="formBx">
          <h2>Change Password</h2>
          <form action="" method="POST">
            <div class="inputBx">
            <label for="password" style="font-weight:bold;margin-left: 10px;">New Password</label>
            <input type="password" class="form-control" name="n_pass" placeholder="New password" required/>
            </div>
            <div class="inputBx">
            <label for="re_password" style="font-weight:bold;margin-left: 10px;">Confirm Password</label>
            <input type="password" class="form-control" name="c_pass" placeholder="Confirm password" required>
            </div>
           
            <div class="inputBx">
              <input type="submit" value="Change" name="submit" />
            </div>
          </form>
      </div>
    </section>
      
   
  </body>
</html>
