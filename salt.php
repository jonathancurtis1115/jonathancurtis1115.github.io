<?php
 // File salt.php
 Class Salt
 {
  function doubleSalt($toHash,$password)
  {
   if(strlen($password) < 40)
   {
    $arr_pass = str_split($toHash, (strlen($toHash) / 2) + 1);
    
    foreach($arr_pass as $key => $value)
     {
      $arr_pass[$key] = round($value,0,PHP_ROUND_HALF_ODD);
     }
    $hash = hash('sha1', $password.$arr_pass[0] . 'centerSalt' . $arr_pass[1]);
    return $hash;
   }
  }
 }
?>
