<?php
 // adduser.php

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
 require_once 'salt.php';
 $toHash = 'tiger';
 $salt = new Salt();
 $pass = $salt->doubleSalt($toHash,$userlogin);

 $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
 
 $adduser = "INSERT INTO myowner (id, first_name, last_name, username, address, zip, phone, email, userlogin, adminlvl, hash) 
  VALUES (myowner_sequence.NEXTVAL, '$first', '$last', '$username', '$address', '$zip', '$phone', '$email', '$pass', '0', '$hash')"; 

 $connect = new dbGeneral($adduser);
 $connect->parse();
 $connect->result;
 $connect->exe();

 $to      = $email; // Send email to our user
 $subject = 'Signup | Verification'; // Give the email a subject 
 $message = "
 
  Thanks for signing up!
  Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
  
  ------------------------
  Username: '$username'
  Password: '$userlogin'
  ------------------------
  
  Please click this link to activate your account:
  http://dnet.brigham.usu.edu/~a00916520/jonathan/project/test/verify.php?email='.$email.'&hash='.$hash.'
 
  "; // Our message above including the link
                     
 $headers = 'From:noreply@mylslpetcare.tk' . "\r\n"; // Set from headers
 mail($to, $subject, $message, $headers); // Send our email

 
 header('Location: http://dnet.brigham.usu.edu/~a00916520/jonathan/project/test/mysuccess.php');


?>