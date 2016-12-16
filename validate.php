<?php
 // validate.php
 class validate
 {
  function get_valid_first($first)
  {
   $regex = '#^[a-zA-Z]{2,10}$#';
   return preg_match($regex,trim($first));
  }
  function get_valid_last($last)
  {
   $regex = '#^[a-zA-Z]{1}\'?[a-zA-Z]{2,20}$#';
   return preg_match($regex,trim($last));
  }
  function get_valid_address($address)
  {
   $regex = '#^[a-zA-Z0-9]{1,}\s[a-zA-Z0-9]{1,}+#';
   return preg_match($regex,trim($address));
  }
  function get_valid_zip($zip)
  {
   $pattern = '#^([0-9]{5})(-[0-9]{4})?$#';
    return preg_match($pattern,trim($zip));
  }
  function get_valid_phone($phone)
  {
   $regex = '#^[0-9]{7}$|^[0-9]{10}$#';
   return preg_match($regex,trim($phone));
  }
  function get_valid_email($email)
  {
   $regex = '#^[0-9A-Za-z._%+-]{2,}@[0-9A-Za-z.-]+\.[A-Za-z]{2,6}$#';
   return preg_match($regex,trim($email));
  }
  function get_valid_userlogin($userlogin)
  {
   $regex = '#^.{8,25}$#';
   return preg_match($regex,trim($userlogin));
  }
  function get_valid_petname($petname)
  {
   $regex = '#^[a-zA-Z0-9]\w{2,15}$#';
   return preg_match($regex,trim($petname));
  }

/*
  function get_valid_url($url)
  {
   $filtered = filter_var($url,FILTER_VALIDATE_URL,FILTER_FLAG_HOST_REQUIRED);
   return $filtered;
  }
*/
 }
?>

