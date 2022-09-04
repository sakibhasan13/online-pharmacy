<?php
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location: login.html');
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/adminstyle.css" />
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><h5>Online Pharmacy</h5></div>
            <div class="list-group list-group-flush my-3">
                <a href="../pages/admin_index.php" role="tablist" class="list-group-item list-group-item-action bg-transparent second-text"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="product_information.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Product Information</a>
                <a href="activity.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-circle-notch me-2"></i>All Activity</a>
                <a href="supplier_information.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i
                        class="fas fa-solid fa-truck me-2"></i>Supplier</a>
                <a href="user_information.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-user me-2"></i>User Information</a>
                <a href="admin_information.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-user me-2"></i>Admin Information</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>
                                <?php
                                 include('../config/dbconn.php');
                                 $query=mysqli_query($connection,"SELECT * FROM `login` WHERE id='".$_SESSION['id']."'");
                                 $row=mysqli_fetch_array($query);
                                 echo 'Admin '.$row['name'].'';
                                ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                <div class="row my-5" id="product" role="tabpanel">
                    <h3 class="fs-4 mb-3">Supplier Information</h3>
                    <?php
                                      include('../config/dbconn.php');

                                      $action = isset($_GET['action']) ? $_GET['action'] : "";
                                      if($action=='deleted'){
                                          echo "<div class='alert alert-success'>Record was deleted.</div>";
                                      }
                                      $query = "SELECT * FROM supplier ORDER BY supp_name ASC";
                                      $result = mysqli_query($connection,$query);
                                      ?>  
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Supplier Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact No:</th>
                                    <th scope="col">Email</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                          if($result){
                                            while($res = mysqli_fetch_array($result)) {     
                                              echo "<tr>";
                                                echo "<td>".$res['supp_name']."</td>";
                                                echo "<td>".$res['supp_address']."</td>";
                                                echo "<td>".$res['supp_contact']."</td>";
                                                echo "<td>".$res['supp_email']."</td>";  
                                                echo "<td><a href=\"supplier_update.php?supp_id=$res[supp_id]\">Edit</a> | <a href=\"supplier_delete.php?supp_id=$res[supp_id]
                                                \" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                              echo "</tr>"; 
                                            }
                                          }?>
                            </tbody>
                        </table>
                        <br><br>
                        <a class="btn btn-success btn-round" href="supplier_add.php"><i class="now-ui-icons ui-1_simple-add"></i> Add Supplier</a>
                                </div>
                            </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>