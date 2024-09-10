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

<!-- Main Content -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Customer Bookings</h2>

    <?php
    $sql = "SELECT * FROM user_books";
    $result = $con->query($sql);

    if ($result === false) {
    ?>
        <div class="alert alert-danger" role="alert">
            Booking data not fetched. Please log in again.
        </div>
        <meta http-equiv="refresh" content="1;url=logout.php" />
    <?php
    }

    if ($result->num_rows > 0) {
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="images/bg_1.jpg" class="card-img-top" alt="Room Image">
                    <div class="card-body">
                        <h5 class="card-title">Room: '.$row['rooms'].'</h5>
                        <p class="card-text">
                            <strong>Customer Name:</strong> '.$row['customer_name'].'<br>
                            <strong>Email ID:</strong> '.$row['email'].'<br>
                            <strong>Contact Number:</strong> '.$row['phone'].'<br>
                            <strong>Check-in Date:</strong> '.$row['check_in'].'<br>
                            <strong>Check-Out Date:</strong> '.$row['check_out'].'<br>
                            <strong>Members:</strong> '.$row['members'].'<br>
                            <strong>Total Amount:</strong> $'.$row['total_amount'].'
                        </p>
                    </div>
                </div>
            </div>';
        }
        echo '</div>';
    } else {
        echo '
        <div class="alert alert-warning" role="alert">
            No Bookings Are Available. <a href="index.php" class="alert-link">Book a Room</a>
        </div>';
    }
    ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
