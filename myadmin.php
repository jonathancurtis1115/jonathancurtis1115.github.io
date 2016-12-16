<?php
 // myadmin.php

 session_start();
 
 require_once 'protect.php';
/*
 require_once 'adminprotect.php';
*/
 $protect = new redirect();
 $id = $_SESSION['ID'];
 $username = $_SESSION['USERNAME'];


?>

<!DOCTYPE html>

<html>
 <head>
  <link rel="icon" type="image/png" href="myicon.ico"/>
  <link rel="stylesheet" type="text/css" href="myStyleSheet.css" />
  <title>
   Pet Care - Admin Portal
  </title>
 </head>
 <body>

  <ul>
   <li>
    <a href="myuser.php">User Portal</a>
   </li>
   <li>
    <a href="myabout.php">About Me</a>
   </li>
  </ul>

  <h1>Admin Portal</h1>
  <div>

   <form method="POST" action="getTbl.php">
    <font size=+1>View a Report:&nbsp;&nbsp;</font>
    <select name="rpt" onchange="submit()"; >
     <option value=999 selected="SELECTED">CHOOSE BELOW</option>
     <option value=1>Owners Report</option>
     <option value=2>Pets Report</option>
     <option value=3>Pricing Report</option>
    </select>
   </form>
   <p></p> 
   <input class="button" type=button 
    onClick="location.href='logout_captcha.php'" value="logout">
  </div>
 </body>
</html>





