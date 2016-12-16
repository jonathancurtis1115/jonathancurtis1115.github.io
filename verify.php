<?php
 // mysignup.php

 session_start();

 $first = $_SESSION['first'];
 $last = $_SESSION['last'];
 $username = strtolower($first . $last);
 $address = $_SESSION['address'];
 $zip = $_SESSION['zip'];
 $phone = $_SESSION['phone'];
 $email = $_SESSION['email'];
 $userlogin = $_SESSION['userlogin'];

 require_once 'dbGeneral.php';



 $query = "SELECT email, hash, active FROM myowner WHERE email='$email' AND active='0'";
 $connect = new dbGeneral($query);
 $connect->parse();
 $event = $connect->exe();
 $row = oci_fetch_assoc($event);
  
  

   

?>

<!DOCTYPE html>

<html>
 <head>
  <link rel="icon" type="image/png" href="myicon.ico"/>

  <link rel="stylesheet" type="text/css" href="myStyleSheet.css"/>

  <title>Activate</title>
 </head>
 <body>
  <div>
   <h1>Account Activated!</h1>

    <?php
     
     if ($row['email'] = $email)
      {
       if ($row['active'] = 1)
        {
         $update = "UPDATE myowner SET active='1' WHERE email='".$email."' AND active='0'";
         $connect = new dbGeneral($update);
         $connect->parse();
         $connect->result;
         $connect->exe();
         echo 'Name: ' . $first . ' ' . $last . '<br>';
         echo 'Username: ' . strtolower($first) . strtolower($last) . '<br>';
         echo 'Address: ' . $address . '<br>';
         echo 'Zip Code: ' . $zip . '<br>';
         echo 'Phone Number: ' . $phone . '<br>';
         echo 'E-mail Address: ' . $email . '<br>';
         echo 'Password: ' . $userlogin . '<br>';
         echo '<br><strong>Your account is now active!</strong><br><br>';

        }
      }

    ?> 
   <button class="resetenter" onclick="window.location.href='mylogin.php'">Login</button>
  </div>    
 </body> 
</html>