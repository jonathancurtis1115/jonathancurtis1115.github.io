<?php
 // File pet_validate.php

 session_start();

 require_once 'validatepet.php';
 
 $validate = new validate();
 $pet_name = $_POST["pet_name"];
 $pet_type = $_POST["pet_type"];
 $pet_breed = $_POST["pet_breed"];
 

 if($validate->get_valid_name($pet_name))
 {
  $_SESSION['pet_name'] = $pet_name;
  unset($_SESSION['err_name']);
 }
 else
 { $_SESSION['err_name'] = 'Enter a valid pet name'; }
 
 if($validate->get_valid_type($pet_type))
 {
  $_SESSION['pet_type'] = $pet_type;
  unset($_SESSION['err_type']);
 }
 else
 { $_SESSION['err_type'] = 'Enter a valid pet type'; }
 
 if($validate->get_valid_breed($pet_breed))
 {
  $_SESSION['pet_breed'] = $pet_breed;
  unset($_SESSION['err_breed']);
 }
 else
 { $_SESSION['err_breed'] = 'Enter a valid pet breed'; }
 
 if(
    isSet($_SESSION['err_name'])|isSet($_SESSION['err_type'])|
    isSet($_SESSION['err_breed'])
   )
 { header('Location: http://dnet.brigham.usu.edu/~a00916520/jonathan/project/test/myuser.php'); }
 else { header('Location: http://dnet.brigham.usu.edu/~a00916520/jonathan/project/test/addpet.php'); }
?>
