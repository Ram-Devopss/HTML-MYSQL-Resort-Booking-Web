<?php

$email = $_POST['email'];

$password = $_POST['password'];

    if($password=='admin@123'&&$email=='admin'){
        //no user
        //redirecting to same login page

         $_SESSION['email']=$email;
        // $_SESSION['username']= $row['username'];
        // $_SESSION['id']=$row['id'];  //user id

        header('location: admin-page.php');
        
    }else{
        ?>
        <script>
            window.alert("Wrong username or password");
        </script>
        <meta http-equiv="refresh" content="1;url=admin.php" />
        <?php
        //header('location: login');
        //echo "Wrong email or password.";
    }
    
 ?>