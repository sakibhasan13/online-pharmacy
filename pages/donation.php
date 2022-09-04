<?php

    include '../config/dbconn.php';
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location: login.html');
        exit();
    }


    if(isset($_POST['submit'])){

        date_default_timezone_set('Asia/Manila');
        $date = date("Y-m-d");

        $d_name = $_POST['d_name'];
        $gender = $_POST['gender'];
        $d_email = $_POST['d_email'];
        $d_phone = $_POST['d_phone'];
        $d_address = $_POST['d_address'];
        $blood_group = $_POST['blood_group'];
        $birth_date = $_POST['birth'];
        $weight = $_POST['weight'];


        $query = "INSERT INTO `donar`(`donar_name`, `gender`, `email`, `phone`, `address`, `blood_group`, `birth_date`, `weight`) VALUES ('$d_name','$gender','$d_email','$d_phone','$d_address','$blood_group','$birth_date','$weight')";
        mysqli_query($connection,$query);
        echo "<script>alert('Information insert successfully')</script>";
        echo "<script>location.href='../pages/blood_index.php'</script>"; 

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
          <h2>Donar form</h2>
          <form action="" method="POST">
            <div class="inputBx">
              <input type="text" placeholder="Your Name" name="d_name" required/>
            </div>
            <div class="inputBx">
            <select name="gender" class="form-control">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
            </div>
            <div class="inputBx">
              <input type="text" placeholder="Email" name="d_email" required/>
            </div>
            <div class="inputBx">
                <input type="text" placeholder="Contact No." name="d_phone" required/>
              </div>
              <div class="inputBx">
                <input type="text" placeholder="Address" name="d_address" required/>
              </div>
             
              <div class="inputBx">
              <select name="blood_group" class="form-control">
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            </select>
              </div>
              <div class="inputBx">
                <input type="date" placeholder="Date of Birth " name="birth" required/>
              </div>
              <div class="inputBx">
                <input type="number" placeholder="weight" name="weight" required/>
              </div>
             
            <div class="inputBx">
              <input type="submit" value="Create" name="submit" />
            </div>
          </form>
          
      </div>
    </section>
  </body>
</html>
