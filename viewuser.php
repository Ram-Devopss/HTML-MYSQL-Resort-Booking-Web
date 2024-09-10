<?php
session_start();
require 'connection.php'; 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin View Bookings</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div>
<!-- Main Content -->
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
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
