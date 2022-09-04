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

        $p_name = $_POST['p_name'];
        $gender = $_POST['gender'];
        $r_email = $_POST['r_email'];
        $r_phone = $_POST['r_phone'];
        $r_address = $_POST['r_address'];
        $hospital = $_POST['hospital'];
        $blood_group = $_POST['blood_group'];
        $unit = $_POST['unit'];
        $reason = $_POST['reason'];
        $user_id = $_SESSION['id'];


        $query = "INSERT INTO `requester`(`patient_name`, `gender`, `blood_group`, `unit_blood`, `hospital_name`, `date`, `address`, `email`, `contact_no`, `reason`, `user_id`) VALUES ('$p_name','$gender','$blood_group','$unit','$hospital','$date','$r_address','$r_email','$r_phone','$reason','$user_id')";
        mysqli_query($connection,$query);
        echo "<script>alert('Request submitted')</script>";
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
          <h2>Blood Request form</h2>
          <form action="" method="POST">
            <div class="inputBx">
              <input type="text" placeholder="Patient Name" name="p_name" required/>
            </div>
            <div class="inputBx">
            <select name="gender" class="form-control">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
            </div>
            <div class="inputBx">
              <input type="text" placeholder="Email" name="r_email" required/>
            </div>
            <div class="inputBx">
                <input type="text" placeholder="Contact No." name="r_phone" required/>
              </div>
              <div class="inputBx">
                <input type="text" placeholder="Address" name="r_address" required/>
              </div>
              <div class="inputBx">
              <input type="text" placeholder="Hospitam Name" name="hospital" required/>
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
                <input type="number" placeholder="Required Unit" name="unit" required/>
              </div>
              <div class="inputBx">
                <input type="text" placeholder="Reason" name="reason" required/>
              </div>
            <div class="inputBx">
              <input type="submit" value="Create" name="submit" />
            </div>
          </form>
          
      </div>
    </section>
  </body>
</html>
