<?php
 // validatepet.php
 class validate
 {
  function get_valid_name($pet_name)
  {
   $regex = '#^[a-zA-Z]{2,20}$#';
   return preg_match($regex,trim($pet_name));
  }
  function get_valid_type($pet_type)
  {
   $regex = '#^[a-zA-Z]{2,20}$#';
   return preg_match($regex,trim($pet_type));
  }
  function get_valid_breed($pet_breed)
  {
   $regex = '#^[a-zA-Z]{2,20}$#';
   return preg_match($regex,trim($pet_breed));
  }
 }
?>

