<?php
 // File adminprotect.php

session_start();



 class redirect
  {
   function __construct()
    {
     if ($row['ADMINLVL'] !== 1)
      {
       header ("location: myuser.php");
      }


/*
     if($_SESSION['ADMINLVL'] !== 1)
      {
       header ("location: myuser.php"); 
      }
*/

    }
  }


?>
