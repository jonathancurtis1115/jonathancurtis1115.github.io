<?php
 // File protect.php

 class redirect
  {
   function __construct()
    {
     if(!isset($_SESSION['ID']))
      {
       header ("location: mylogin.php"); 
      }
    }
  }
 
?>
