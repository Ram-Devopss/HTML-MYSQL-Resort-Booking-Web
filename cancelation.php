<?php

require 'connection.php';

session_start();

if(isset($_GET['book_id']))
{

$bookid = $_GET['book_id'];

$sql = "DELETE FROM user_books WHERE id = $bookid";
$request = $con->query($sql);

if($request===true)
{
 echo"Booking Was Canceled";
 ?>
        
        <meta http-equiv="refresh" content="1;url=books.php" />
        <?php
}
else{
     echo"Booking Not";
 ?>
        
        <meta http-equiv="refresh" content="1;url=books.php" />
        <?php
}

}

?>