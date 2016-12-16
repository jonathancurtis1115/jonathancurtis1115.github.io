<?php
 // File mysuccess.php

 session_start();



 $first = $_SESSION['first'];
 $last = $_SESSION['last'];
 $address = $_SESSION['address'];
 $zip = $_SESSION['zip'];
 $phone = $_SESSION['phone'];
 $email = $_SESSION['email'];
 $userlogin = $_SESSION['userlogin'];

?>

<html>
 <head>
  <link rel="icon" type="image/png" href="myicon.ico"/>

  <link rel="stylesheet" type="text/css" href="myStyleSheet.css"/>
  <title>Success</title>
 </head>
 <body>
  <div>
   <h1>User Added</h1>

<?php
 echo 'Name: ' . $first . ' ' . $last . '<br>';
 echo 'Username: ' . strtolower($first) . strtolower($last) . '<br>';
 echo 'Address: ' . $address . '<br>';
 echo 'Zip Code: ' . $zip . '<br>';
 echo 'Phone Number: ' . $phone . '<br>';
 echo 'E-mail Address: ' . $email . '<br>';
 echo 'Password: ' . $userlogin . '<br>';
 echo '<br> Your account has been made, please verify it by clicking the activation link that has been sent to your email.<br>';
 

?>

   <button class="resetenter" onclick="window.location.href='mylogin.php'">Login</button>

  </div>
 </body>
</html>
