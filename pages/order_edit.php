



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/adminstyle.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../css/form.css?v=<?php echo time();?>">
    <title>Admin Dashboard</title>
</head>
  <body>


  <div class="container-fluid px-4">
    <div class="row my-5" id="product" role="tabpanel">
                    <h3 class="fs-4 mb-3">Order Information</h3>
                    <?php
                                      include('../config/dbconn.php');

                                      
                                      $query = "SELECT * FROM `order` WHERE order_id=$_GET[order_id]";
                                      $result = mysqli_query($connection,$query);
                                      ?> 
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover" style="width:70%;margin-left:200px;">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">Serial</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    
                                    <th scope="col">Status</th>
                                    <th scope="col">Price</th>
                                    
                                    <th scope="col">Payment type</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php   
                                   
                                    while($res = mysqli_fetch_array($result)) {     
                                      echo "<tr>";
                                        echo "<td>".$res['order_id']."</td>";
                                        $query = "SELECT * FROM `product` WHERE product_id=$res[product_id]";
                                        $result1 = mysqli_query($connection,$query);
                                        $row = mysqli_fetch_array($result1);
                                        echo "<td>".$row['product_name']."</td>";
                                        echo "<td>".$res['quantity']."</td>";
                                        
                                        echo "<td>".$res['status']."</td>";
                                        echo "<td>".$res['totalprice']."</td>";
                                        
                                        echo "<td>".$res['payment_type']."</td>";

                                         echo "</tr>"; 
                                    
                                  }?>
                            </tbody>
                        </table>
                        
                                </div>
                            </div>
                                  


    <section>
      <div class="contentBx">
        <div class="formBx">
          
          <form action="order_status_change.php" method="POST">
            <div class="inputBx">
            <label for="product_name" style="font-weight:bold;margin-left: 10px;">Change Status</label>
            <!-- <input type="text" class="form-control"  name="product_name" placeholder="status" required/> -->
            <select name="status" class="form-control">
            <option value="In Progress">In Progress</option>
            <option value="Shipped">Shipped</option>
            <option value="Delivered">Delivered</option>
            <option value="Cancel">Cancel</option>
            </select>
            
        </div>
            <div class="inputBx">
            <label for="product_name" style="font-weight:bold;margin-left: 10px;">Reason</label>
            <input type="text" class="form-control" style="height:200px;"  name="reason" required>
            </div>
            
           
            <div class="inputBx">
                <input type="hidden" name="order_id" value="<?php echo $_GET['order_id']?>">
              <input type="submit" value="Change" name="submit" />
            </div>
          </form>
      </div>
    </section>
  </body>
</html>
