<?php
    
session_start();
// Database connection details
$servername = "localhost";  // Change this if your database is hosted elsewhere
$username = "root";     // Your MySQL username
$password = "";     // Your MySQL password
$dbname = "resort";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"]=='POST' && isset($_POST['Check-in']))
{
// Prepare data for insertion
$check_in = $_POST['Check-in'];

$check_out = $_POST['Check-out'];

$rooms_type = $_POST['rooms'];

$customers = $_POST['members'];

$amount=0;

                          
                          
                          
switch($rooms_type)
{

    case $rooms_type=='Suite':
        $amount = 1500*$customers;
        break;

    case $rooms_type=='FamilyRoom':
        $amount = 2500*$customers;
        break;

    case $rooms_type=='DeluxeRoom':
        $amount = 3500*$customers;
        break;

    case $rooms_type=='ClassicRoom':
        $amount = 4500*$customers;
        break;

    case $rooms_type=='SuperiorRoom':
        $amount = 7500*$customers;
        break;

    case $rooms_type=='LuxuryRoom':
        $amount = 10500*$customers;
        break;
    
}

                             $user_id = $_SESSION['id'];
                            $sql = 'select * from user_books where user_id='.$user_id.'';
                            $result=$conn->query($sql);

                            if($result->num_rows>0)
                            {
                                $temp=$result->num_rows;
                                switch($temp)
                                {
                                    case $temp>=10:

                                        $amount -= 10000;
                                        
                                        break;
                                    case $temp>=5:

                                        $amount -= 5000;
                                        
                                        break;
                                    case $temp>=3:

                                        $amount -= 3000;
                                       
                                        break;
                                    case $temp>=1:

                                        $amount -= 1000;
                                       
                                        break;

                                  
                                    
                                }
                            }
                        

$booking=[
    "check_in" => $check_in,
    "check_out" =>$check_out,
    "rooms_type" =>$rooms_type,
    "total_amount" =>$amount,
    "members" =>$customers
];

}

if (isset($_GET['Amount']))
                          {
$amount = $_GET['Amount'];
$rooms_type=$_GET['rooms'];


                             $user_id = $_SESSION['id'];
                            $sql = 'select * from user_books where user_id='.$user_id.'';
                            $result=$conn->query($sql);

                            if($result->num_rows>0)
                            {
                                $temp=$result->num_rows;
                                switch($temp)
                                {
                                    case $temp>=10:

                                        $amount -= 10000;
                                        
                                        break;
                                    case $temp>=5:

                                        $amount -= 5000;
                                        
                                        break;
                                    case $temp>=3:

                                        $amount -= 3000;
                                       
                                        break;
                                    case $temp>=1:

                                        $amount -= 1000;
                                       
                                        break;

                                  
                                    
                                }
                            }
                          }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Registration</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .form-container, .summary-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"], button {
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 4px;
        }
        input[type="submit"]:hover, button:hover {
            background-color: #218838;
        }
        .card-header {
            background-color: #007bff;
        }
        .card-header h4 {
            color: #fff;
            margin: 0;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <!-- Booking Form -->
        <div class="col-md-6">
            <div class="form-container">
                <h2>Booking Registration Form</h2>
                <form action="confirmbook.php" method="post">
                    <label for="name">Customer Name:</label>
                    <input type="text" id="name" name="customer_name" placeholder="Enter your name" required value="<?php echo($_SESSION['username']) ?>">

                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required value="<?php echo($_SESSION['email']) ?>">

                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" maxlength="10" name="phone" placeholder="+91 0000000000" required>

                    <label for="checkin_date">Check-in Date:</label>
                    <input type="text" name="Check-in" class="form-control checkin_date" placeholder="Check-in date" value="<?php echo isset($check_in) ? $check_in : ''; ?>">


                    <label for="checkout_date">Check-out Date:</label>
                    <input type="text" name="Check-out" class="form-control checkout_date" placeholder="Check-out date" value="<?php echo isset($check_out) ? $check_out : ''; ?>">

                    <label for="time_slot">Time Slot:</label>
                    <select id="time_slot" name="time_slot" required>
                        <option value="" disabled selected>Select a time slot</option>
                        <option value="morning">Morning (9 AM - 12 PM)</option>
                        <option value="afternoon">Afternoon (12 PM - 3 PM)</option>
                        <option value="evening">Evening (3 PM - 6 PM)</option>
                        <option value="night">Night (6 PM - 9 PM)</option>
                    </select>
<?php if(isset($rooms_type)) {?>
                    <label for="rooms">Room:</label>
                    <select name="rooms" id="rooms" class="form-control" required>
                        <option value="Suite" <?php echo($rooms_type=='Suite') ? 'selected' : '';?>>Suite</option>
                        <option value="FamilyRoom" <?php echo($rooms_type=='FamilyRoom') ? 'selected' : '';?>>Family Room</option>
                        <option value="DeluxeRoom" <?php echo($rooms_type=='DeluxeRoom') ? 'selected' : '';?>>Deluxe Room</option>
                        <option value="ClassicRoom" <?php echo($rooms_type=='ClassicRoom') ? 'selected' : '';?>>Classic Room</option>
                        <option value="SuperiorRoom" <?php echo($rooms_type=='SuperiorRoom') ? 'selected' : '';?>>Superior Room</option>
                        <option value="LuxuryRoom" <?php echo($rooms_type=='LuxuryRoom') ? 'selected' : '';?>>Luxury Room</option>
                    </select>
<?php } else {?>

      <label for="rooms">Room:</label>
                    <select name="rooms" id="rooms" class="form-control" required>
                        <option value="Suite" >Suite</option>
                        <option value="FamilyRoom">Family Room</option>
                        <option value="DeluxeRoom">Deluxe Room</option>
                        <option value="ClassicRoom">Classic Room</option>
                        <option value="SuperiorRoom">Superior Room</option>
                        <option value="LuxuryRoom" >Luxury Room</option>
                    </select>

                    <?php } ?>

<?php if(isset($customers)) {?>
    
                    <label for="members">Customer:</label>
                    <select name="members" id="members" class="form-control" required>
                        <option value="1" <?php echo ($customers == 1) ? 'selected' : ''; ?>>1 Adult</option>
                        <option value="2" <?php echo ($customers == 2) ? 'selected' : ''; ?>>2 Adults</option>
                        <option value="3" <?php echo ($customers == 3) ? 'selected' : ''; ?>>3 Adults</option>
                        <option value="4" <?php echo ($customers == 4) ? 'selected' : ''; ?>>4 Adults</option>
                        <option value="5" <?php echo ($customers == 5) ? 'selected' : ''; ?>>5 Adults</option>
                        <option value="6" <?php echo ($customers == 6) ? 'selected' : ''; ?>>6 Adults</option>
                    </select>

<?php } else{?>

      <label for="members">Customer:</label>
                    <select name="members" id="members" class="form-control" required>
                        <option value="1" >1 Adult</option>
                        <option value="2" >2 Adults</option>
                        <option value="3" >3 Adults</option>
                        <option value="4" >4 Adults</option>
                        <option value="5" >5 Adults</option>
                        <option value="6" >6 Adults</option>
                    </select>

<?php }?>
                    <input type="number" name="amount" id="amount"  value="<?php echo($amount)?>" hidden>

            </div>
        </div>

        <!-- Booking Summary -->
        <div class="col-md-6">
            <div class="summary-container">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Booking Summary</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Respected Person</strong>
                                <span><?php echo htmlspecialchars($_SESSION['username']); ?></span><br>
                                <span><?php echo htmlspecialchars($_SESSION['email']); ?></span>
                            </li>
                           
                          
                            
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <h5>Total Amount:</h5>
                            <h5 class="text-success">₹<?php echo isset($amount)? number_format($amount, 2):"Pay By Corresponding Packages"; ?></h5>
                            <?php 
                            if(isset($amount)){
                             $user_id = $_SESSION['id'];
                            $sql = 'select * from user_books where user_id='.$user_id.'';
                            $result=$conn->query($sql);

                            if($result->num_rows>0)
                            {
                                $temp=$result->num_rows;
                                switch($temp)
                                {
                                    case $temp>=10:

                                        $amount -= 10000;
                                        echo '<br>';  
                                        echo '<br>';  
                                        echo '<small>Congrats Your More Acrossing 10 Booking<br>Now <mark style="color:red">10000k Reduced</mark></small>';  
                                        break;
                                    case $temp>=5:

                                        $amount -= 5000;
                                        echo '<br>';  
                                        echo '<br>';  
                                        echo '<small>Congrats Your More Acrossing 5 Booking<br>Now <mark style="color:red">5000k Reduced</mark></small>';  
                                        break;
                                    case $temp>=3:

                                        $amount -= 3000;
                                        echo '<br>';  
                                        echo '<br>';  
                                        echo '<small>Congrats Your More Acrossing 3 Booking<br>Now <mark style="color:red">3000k Reduced</mark></small>';  
                                        break;
                                    case $temp>=1:

                                        $amount = 1000;
                                        echo '<br>';  
                                        echo '<br>';  
                                        echo '<small>Congrats Your More Acrossing 1 Booking<br>Now <mark style="color:red">1000k Reduced</mark></small>';  
                                        break;

                                    default:

                                        echo '<small>New offer More Than One booking Are Discounted</small>';  

                                        break;
                                    
                                }
                            }
                        }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit">Book Now</button>
                </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php

?>
