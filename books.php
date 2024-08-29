<?php
require 'connection.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Deluxe - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

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
  </head>
  <body>
    <nav
      class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light"
      id="ftco-navbar"
    >
      <div class="container">
        <a class="navbar-brand" href="index.php">Deluxe</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#ftco-nav"
          aria-controls="ftco-nav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="  rooms.php" class="nav-link">Rooms</a>
            </li>
            <li class="nav-item">
              <a href="restaurant.html" class="nav-link">Restaurant</a>
            </li>
            <li class="nav-item">
              <a href="about.html" class="nav-link">About</a>
            </li>
            <li class="nav-item active">
              <a href="blog.html" class="nav-link">Blog</a>
            </li>
            <li class="nav-item">
              <a href="contact.html" class="nav-link">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div
          class="row no-gutters slider-text d-flex align-itemd-end justify-content-center"
        >
          <div
            class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center"
          >
            <div class="text">
              <p class="breadcrumbs mb-2">
                <span class="mr-2"><a href="index.php">Home</a></span>
                <span>Blog</span>
              </p>
              <h1 class="mb-4 bread">Booking</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">

      <?php
      if(isset($_SESSION['email'])&&(isset($_SESSION['username']))&&(isset($_SESSION['id'])))
      {

        $user_id = $_SESSION['id'];
        
$sql = "SELECT * FROM  user_books where user_id=$user_id";

        $result = $con->query($sql);
 if($result===false)
 {
        ?>
         <script>
             window.alert("Booking Not Fetchup Pls Login Again");
         </script>
         <meta http-equiv="refresh" content="1;url=logout.php" />
         <?php
 }


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
        echo '<div class="row d-flex">';
        while ($row = $result->fetch_assoc()) {
          $data=http_build_query([
'book_id' => $row['id']]);
            echo '
            <div class="col-md-3 d-flex ftco-animate blog-entry" data-id="'.$row['id'].'" 
                data-customer-name="'.$row['customer_name'].'"
                data-email="'.$row['email'].'"
                data-phone="'.$row['phone'].'"
                data-check-in="'.$row['check_in'].'"
                data-check-out="'.$row['check_out'].'"
                data-time-slot="'.$row['time_slot'].'"
                data-rooms="'.$row['rooms'].'"
                data-members="'.$row['members'].'"
                data-total-amount="'.$row['total_amount'].'">
                <div class="blog-entry align-self-stretch">
                    <div class="text mt-3 d-block">
                        <h3 class="heading mt-3">
                            <a href="#">'.$row['rooms'].'</a>
                        </h3>
                        <div class="meta mb-3">
                        <div><p>Customer Name '.$row['customer_name'].'</p></div>    
                        <div><p>Email ID '.$row['email'].'</p></div>
                        <div><p>Contact Number '.$row['phone'].'</p></div>
                        <div><p>Check-in Date '.$row['check_in'].'</p></div>
                            <div><p>Check-Out Date '.$row['check_out'].'</p></div>
                            <div><p>Members Stay '.$row['members'].'</p></div>    
                            <div><strong>Total Amount '.$row['total_amount'].'</strong></div>
                        </div>
                        <button class="btn btn-primary">Pay Online</button>
                        <br>
<button class="btn btn-danger"><a style="color:white;" href="cancelation.php?'.$data.'"> Cancel Booking</a> </button>
                        
                    </div>
                </div>
            </div>';
            
        }
        echo '</div>';
    } else {
        echo '<div class="row d-flex">
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <div class="text mt-3 d-block">
                        <h3 class="heading mt-3">
                            <p>No Bookings Are Available <a style="color:red;" href="index.php">Book Room </a></p>
                        </h3>
                    </div>
                </div>
            </div>
        </div>';
    }
}
        

            ?>
            
          </div>
    
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Deluxe Hotel</h2>
              <p>
                Far far away, behind the word mountains, far from the countries
                Vokalia and Consonantia, there live the blind texts.
              </p>
              <ul
                class="ftco-footer-social list-unstyled float-md-left float-lft mt-5"
              >
                <li class="ftco-animate">
                  <a href="#"><span class="icon-twitter"></span></a>
                </li>
                <li class="ftco-animate">
                  <a href="#"><span class="icon-facebook"></span></a>
                </li>
                <li class="ftco-animate">
                  <a href="#"><span class="icon-instagram"></span></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Useful Links</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Blog</a></li>
                <li><a href="#" class="py-2 d-block">Rooms</a></li>
                <li><a href="#" class="py-2 d-block">Amenities</a></li>
                <li><a href="#" class="py-2 d-block">Gift Card</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Privacy</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Career</a></li>
                <li><a href="#" class="py-2 d-block">About Us</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                <li><a href="#" class="py-2 d-block">Services</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li>
                    <span class="icon icon-map-marker"></span
                    ><span class="text"
                      >203 Fake St. Mountain View, San Francisco, California,
                      USA</span
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="icon icon-phone"></span
                      ><span class="text">+2 392 3929 210</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="icon icon-envelope"></span
                      ><span class="text">info@yourdomain.com</span></a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row"></div>
      </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px">
        <circle
          class="path-bg"
          cx="24"
          cy="24"
          r="22"
          fill="none"
          stroke-width="4"
          stroke="#eeeeee"
        />
        <circle
          class="path"
          cx="24"
          cy="24"
          r="22"
          fill="none"
          stroke-width="4"
          stroke-miterlimit="10"
          stroke="#F96D00"
        />
      </svg>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
  </body>
  <script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on a blog-entry, open the modal
  document.querySelectorAll(".blog-entry").forEach(function(entry) {
    entry.onclick = function() {
      // Get the data from the clicked element
      var roomType = this.querySelector("h3.heading a").textContent;
      var checkIn = this.querySelector(".meta div:nth-child(1)").textContent;
      var checkOut = this.querySelector(".meta div:nth-child(2)").textContent;
      var members = this.querySelector(".meta div:nth-child(3)").textContent;
      var totalAmount = this.querySelector(".meta div:nth-child(4)").textContent;

      // Populate the modal with data
      var modalBody = document.getElementById("modal-body");
      modalBody.innerHTML = `
        <p><strong>Room Type:</strong> ${roomType}</p>
        <p><strong>Check-in Date:</strong> ${checkIn}</p>
        <p><strong>Check-out Date:</strong> ${checkOut}</p>
        <p><strong>Members Stay:</strong> ${members}</p>
        <p><strong>Total Amount:</strong> ${totalAmount}</p>
      `;

      // Show the modal
      modal.style.display = "block";
    };
  });

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  };

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
</script>

</html>
