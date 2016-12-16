<?php
 // File validate_form.php

 session_start();

 require_once 'validate.php';
 $validate = new validate();
 $first = $_POST["first"];
 $last = $_POST["last"];
 $address = $_POST["address"];
 $zip = $_POST["zip"];
 $phone = $_POST["phone"];
 $email = $_POST["email"];
 $userlogin = $_POST["userlogin"];
 $petname = $_POST["petname"];

 if($validate->get_valid_first($first))
 {
  $_SESSION['first'] = $first;
  unset($_SESSION['err_first']);
 }
 else
 { $_SESSION['err_first'] = 'Enter a valid first name'; }
 if($validate->get_valid_last($last))
 {
  $_SESSION['last'] = $last;
  unset($_SESSION['err_last']);
 }
 else
 { $_SESSION['err_last'] = 'Enter a valid last name'; }
 if($validate->get_valid_address($address))
 {
  $_SESSION['address'] = $address;
  unset($_SESSION['err_address']);
 }
 else
 { $_SESSION['err_address'] = 'Enter a valid address'; }
 if($validate->get_valid_zip($zip))
 {
  $_SESSION['zip'] = $zip;
  unset($_SESSION['err_zip']);
 }
 else
 { $_SESSION['err_zip'] = 'Enter a valid zip code'; }
 if($validate->get_valid_phone($phone))
 {
  if(strlen($phone)==7)
 { $phones = substr($phone,0,3) . '-' . substr($phone,3,4); }
  elseif(strlen($phone)==10)
  {
   $p1 = '(' . substr($phone,0,3) . ')' . substr($phone,3,3);
   $phones = $p1 . '-' . substr($phone,6,4);
  }
  $_SESSION['phone'] = $phone;
  unset($_SESSION['err_phone']);
 }
 else
 { $_SESSION['err_phone'] = 'Enter a valid phone number of 7 or 10 digits'; }
 if($validate->get_valid_email($email))
 {
  $_SESSION['email'] = $email;
  unset($_SESSION['err_email']);
 }
 else
 { $_SESSION['err_email'] = 'Enter a valid email'; }
 if($validate->get_valid_userlogin($userlogin))
 {
  $_SESSION['userlogin'] = $userlogin;
  unset($_SESSION['err_userlogin']);
 }
 else
 { $_SESSION['err_userlogin'] = 'Enter a valid password'; }
  if(
    isSet($_SESSION['err_first'])|isSet($_SESSION['err_last'])|
    isSet($_SESSION['err_address'])|isSet($_SESSION['err_zip'])|
    isSet($_SESSION['err_phone'])|isSet($_SESSION['err_email'])|
    isSet($_SESSION['err_userlogin'])   )
 { header('Location: http://dnet.brigham.usu.edu/~a00916520/jonathan/project/test/mysignup.php'); }
 else { header('Location: http://dnet.brigham.usu.edu/~a00916520/jonathan/project/test/adduser.php'); }
?>
