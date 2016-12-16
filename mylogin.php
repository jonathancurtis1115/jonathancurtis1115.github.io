<?php
 // mylogin.php

 session_start();

 if(!isSet($_SESSION['captcha']))
  { $_SESSION['captcha'] = 0; }

?>

<!DOCTYPE html>

<html>
 <head>
  <link rel="icon" type="image/png" href="myicon.ico" />
  
  <link rel="stylesheet" type="text/css" href="myStyleSheet.css" />
  <title>
   Pet Care - Login
  </title>
 </head>
 <body>
  <ul>
   <li>
    <a href="myabout.php">About Me</a>
   </li>
  </ul>
  <h1>London Lucus Pet Care</h1>
  <form method="post" action="myverify.php">
   <table class="center">
    <tr>
     <td></td>
     <td>
      <a class="button" href="mylogin.php">
       Login
      </a>
      <a class="button" href="mysignup.php">
       Signup
      </a>
     </td>
    </tr>
    <tr>
     <td>User:</td>
     <td><input type="text" name="username" maxlength="40"
      placeholder="username" required/></td>
    </tr>
    <tr>
     <td>Password:</td>
     <td>
      <input type="password" name="userlogin" maxlength="40"
       placeholder="password" required/>
     </td>
    </tr>
    <tr>
     <td></td>

      <?php
       if($_SESSION['captcha']>= 5)
        {
         echo "<td><img id=\"captcha\" src=\"securimage/securimage_show.php\" ";
         echo "alt=\"CAPTCHA Image\" /></td></tr>";
         echo "<tr><td></td>";
         echo "<td><input type=\"text\" name=\"captcha_code\" ";
         echo "size=\"10\" maxlength=\"6\" placeholder=\"Enter Code\" required /></td></tr><tr><td></td>";
         echo "<td><a href=\"#\" onclick=\"document.getElementById('captcha').src ";
         echo "= 'securimage/securimage_show.php?' + Math.random(); ";
         echo "return false\">New Image</a></td></tr><tr><td></td>";
        }
       ?>

     <td>
      <button class="button" type="submit" value="Login">
       Login
      </button>
     </td>
    </tr>
    <tr>
     <td></td>
    </tr>
   </table>
  </form>
 </body>
</html>
