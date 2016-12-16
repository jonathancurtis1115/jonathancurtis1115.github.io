<?php
 // File encrypt.php

session_start();

 require_once 'dbGeneral.php';
 require_once 'salt.php';
 $query = "SELECT USERLOGIN FROM myowner WHERE id = '1001'";
 $connect = new dbGeneral($query);
 $connect->parse();
 $event = $connect->exe();
 $row = oci_fetch_assoc($event);
 $name = $row['USERLOGIN'];
 $id = $row['ID'];
 $toHash = 'tiger';
 $salt = new Salt();
 

if (strlen($name) < 40)
  {
   $pass = $salt->doubleSalt($toHash,$name);
   $sql = "UPDATE myowner SET userlogin = '$pass'";
   $connect = new dbGeneral($sql);
   $connect->parse();
   $event = $connect->exe();
  }
 
?>

