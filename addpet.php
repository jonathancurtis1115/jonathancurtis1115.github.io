<?php
 // addpet.php

 session_start();

 require_once 'dbGeneral.php';

 $owner_id = $_SESSION['ID'];
 $pet_name = $_SESSION['pet_name'];
 $pet_type = $_SESSION['pet_type'];
 $pet_breed = $_SESSION['pet_breed']; 


 
 $addpet = "INSERT INTO mypets (id, pet_name, pet_type, pet_breed, owner_id) 
  VALUES (mypets_sequence.NEXTVAL, '$pet_name', '$pet_type', '$pet_breed', '$owner_id')"; 

 $connect = new dbGeneral($addpet);
 $connect->parse();
 $connect->result;
 $connect->exe();
 
 header('Location: http://dnet.brigham.usu.edu/~a00916520/jonathan/project/test/myuser.php');


?>