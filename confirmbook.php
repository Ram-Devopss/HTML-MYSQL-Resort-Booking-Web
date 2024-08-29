<?php
session_start();

require 'connection.php';


if($_SERVER['REQUEST_METHOD']=='POST')
{




 if(!isset($_SESSION['id'])){
 ?>
         <script> 
             window.alert("Something Went Wrong Pls Login Again And Book!");
         </script>
  <meta http-equiv="refresh" content="1;url=logout.php" /> 
          <?php 
     }

 //id
 $user_id = $_SESSION['id'];
 $customer_name = $_POST['customer_name'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $check_in = $_POST['Check-in'];
 $check_out = $_POST['Check-out'];
 $time_slot = $_POST['time_slot'];
 $rooms = $_POST['rooms'];
 $members = $_POST['members'];
 
 $total_amount = $_POST['amount'];


  //SQL query to insert data into the dishes table
 $sql = "INSERT INTO user_books (user_id, customer_name, email,  phone,check_in,check_out,time_slot,rooms,members,total_amount) VALUES ($user_id, '$customer_name', '$email', $phone,'$check_in','$check_out','$time_slot','$rooms','$members',$total_amount)";

 if ($con->query($sql) === TRUE) {
    //  Record inserted successfully
     echo "Sucessfully Registered Your Booking";

      //Redirect to navigation.php after 2 seconds
     header("refresh:2; url=index.php");
 } else {
     echo "Error: " . $sql . "<br>" . $con->error;
 }



}
 $con->close();
?>