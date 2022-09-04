<?php
// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['update'])){

    $supp_id = mysqli_real_escape_string($connection, $_POST['supp_id']);
    $supp_name = mysqli_real_escape_string($connection, $_POST['supp_name']);
    $supp_address = mysqli_real_escape_string($connection, $_POST['supp_address']);
    $supp_contact = mysqli_real_escape_string($connection, $_POST['supp_contact']);
    $supp_email = mysqli_real_escape_string($connection, $_POST['supp_email']); 


    $query = "UPDATE supplier SET supp_name='$supp_name',supp_address='$supp_address',supp_contact='$supp_contact',supp_email='$supp_email' WHERE supp_id=$supp_id";
    $result = mysqli_query($connection,$query);
    
    if($result){
        //redirecting to the display page. In our case, it is index.php
    header("Location: supplier_information.php");
    }
        
}

?>

<?php
//getting id from url
$id=isset($_GET['supp_id']) ? $_GET['supp_id'] : die('ERROR: Record ID not found.');
//selecting data associated with this particular id
$result = mysqli_query($connection, "SELECT * FROM supplier WHERE supp_id=$id");
while($res = mysqli_fetch_array($result))
{
    $supp_name = $res['supp_name'];
    $supp_address = $res['supp_address'];
    $supp_contact = $res['supp_contact'];
    $supp_email = $res['supp_email'];
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
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="inputBx">
            <input type="hidden" class="form-control" id="supp_id" name="supp_id" value=<?php echo $_GET['supp_id'];?>>
            <input type="text" class="form-control" id="supp_name" name="supp_name" value="<?php echo $supp_name;?>" required/>
            </div>
            <div class="inputBx">
            <input type="text" class="form-control" id="supp_address" name="supp_address" value="<?php echo $supp_address;?>" required/>
            </div>
            <div class="inputBx">
            <input type="text" class="form-control" id="supp_contact" name="supp_contact" value="<?php echo $supp_contact;?>" required/>
            </div>
            <div class="inputBx">
            <input type="text" class="form-control" id="supp_email" name="supp_email" value="<?php echo $supp_email;?>" required/>
            </div>
           
            <div class="inputBx">
              <input type="submit" value="Update Supplier" name="update" />
            </div>
          </form>
      </div>
    </section>
  </body>
</html>
