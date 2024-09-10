<?php

require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
     
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css" />
    <link rel="stylesheet" href="css/animate.css" />

    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />

    <link rel="stylesheet" href="css/aos.css" />

    <link rel="stylesheet" href="css/ionicons.min.css" />

    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="css/jquery.timepicker.css" />

    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/icomoon.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            padding: 20px;
        }
        .sidebar a {
            color: #fff;
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-white">Admin Panel</h4>
        <a href="rooms.php">Rooms</a>
        <a href="viewbooks.php">Bookings</a>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Welcome to the Admin Dashboard</h1>
        
        <!-- Cards Section -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card text-bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">Manage registered users of the website.</p>
                        <a href="viewuser.php" class="btn btn-light">View Users</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Rooms</h5>
                        <p class="card-text">Manage the Rooms listed in our resort.</p>
                        <a href="rooms.php" class="btn btn-light">View Rooms</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Orders</h5>
                        <p class="card-text">View and manage customer Bookings.</p>
                        <a href="viewbooks.php" class="btn btn-light">View Bookings</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table for managing users -->
        <h3>Manage Users</h3>
        <table class="table table-striped">
      
    <thead>

          <?php 
$sql = "SELECT * FROM  users";

        $result = $con->query($sql);
/*
image for booking

<a
                href="blog-single.html"
                class="block-20"
                style="background-image: url('images/image_1.jpg')"
              >
              </a>
              */
   if ($result->num_rows > 0) {
    echo'<th>
    <tr>
        <td>
            ID
        </td>
        <td>
            Username
        </td>
        <td>
            Email
        </td>
        <td>
            Registeration Time
        </td>
    </tr>
    </th>
    </thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
         
            echo '<tr>

            <td>
                '.$row['id'].'
            </td>
            <td>
                '.$row['username'].'
            </td>
            <td>
                '.$row['email'].'
            </td>
            <td>
                '.$row['registrated'].'
            </td>

            </tr>';
            
        }
        echo '</tbody>';

    } else {
        echo '<tr>
        <td>-</td>
        <td>-</td>
        <td>No Data Found</td>
        <td>-</td>
        </tr>';
    }

        

            ?>
        </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>