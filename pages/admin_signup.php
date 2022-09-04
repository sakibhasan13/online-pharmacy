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
          <h2>Add Admin Account</h2>
          <form action="adminSignAction.php" method="post">
            <div class="inputBx">
              <input type="text" placeholder="Full Name" name="r_name" required/>
            </div>
            <div class="inputBx">
              <input type="text" placeholder="Email" name="r_email" required/>
            </div>
            <div class="inputBx">
                <input type="text" placeholder="Contact No." name="r_phone" required/>
              </div>
              <div class="inputBx">
                <input type="text" placeholder="Username" name="r_username" required/>
              </div>
              <div class="inputBx">
                <input type="text" placeholder="Address" name="r_address" required/>
              </div>
              <div class="inputBx">
                <input type="text" value="admin" name="usertype"/>
              </div>
              <div class="inputBx">
                <input type="password" placeholder="Password" name="r_pass" required/>
              </div>
            <div class="inputBx">
              <input type="password" placeholder="Re-Password" name="r_c_pass" required/>
            </div>
            <div class="inputBx">
              <input type="submit" value="Add Admin" name="submit" />
            </div>
          </form>
          
      </div>
    </section>
  </body>
</html>
