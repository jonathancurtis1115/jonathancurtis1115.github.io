<?php
 // mysignup.php

 session_start();

?>

<!DOCTYPE html>

<html>
 <head>
  <link rel="icon" type="image/png" href="myicon.ico" />

  <link rel="stylesheet" type="text/css" href="myStyleSheet.css" />

  <title>
   Pet Care - Signup
  </title>
 </head>
 <body>
  <ul>
   <li>
    <a href="myabout.php">About Me</a>
   </li>
  </ul>
  <h1>Enter User Info</h1>
  <div>
   
   <form id="signupForm" method="post" action="validate_form.php">
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
      <td>First Name:</td>
      <td>
       <input type="text" name="first" maxlength="15"
        required value= <?php if(isset($_SESSION['first'])) 
        { echo $_SESSION['first'];  } ?> >
      </td>
     </tr>
     <tr>
      <td>Last Name:</td>
      <td>
       <input type="text" name="last" maxlength="20"
        required value= <?php if(isset($_SESSION['last']))  
        { echo $_SESSION['last'];  } ?> >
      </td>
     </tr>
     <tr>
      <td>Address:</td>
      <td>
       <input type="text" name="address" maxlength="30"
        required value=<?php if(isset($_SESSION['address'])) 
        { echo $_SESSION['address']; } ?> >
      </td>
     </tr>
     <tr><td>Zip Code:</td>
     <td><input type="text" name="zip" maxlength="10"
      required value=<?php if(isset($_SESSION['zip'])) 
      { echo $_SESSION['zip']; } ?> >
     </td>
    </tr>
    <tr>
     <td>Phone:</td>
     <td><input type="text" name="phone" maxlength="10"
      required value=<?php if(isset($_SESSION['phone'])) 
      { echo $_SESSION['phone']; } ?> >
     </td>
    </tr>
    <tr>
     <td>Email:</td>
     <td><input type="text" name="email" maxlength="35"
      required value=<?php if(isset($_SESSION['email'])) 
      { echo $_SESSION['email']; } ?> >
     </td>
    </tr>
    <tr>
     <td>Password:</td>
     <td>
      <input type="password" name="userlogin" maxlength="25"
       required value=<?php if(isset($_SESSION['userlogin'])) 
       { echo $_SESSION['userlogin']; } ?> >
     </td>
    </tr>

<!--
    <tr>
     <td>Reenter Password:</td>
     <td>
      <input type="password" name="repassword"  maxlength="25"
       required value=<?php if(isset($_SESSION['repassword']))
       { echo $_SESSION['repassword']; } ?> >
     </td>
    </tr>
-->

    <tr>
     <td></td>
     <td>
      <img id="captcha" src="securimage/securimage_show.php"
       alt="CAPTCHA Image" />
     </td>
    </tr>
    <tr>
     <td></td>
     <td>
      <input type="text" name="captcha_code" size="10"
       maxlength="6" placeholder="Enter Code" required/>
     </td>
    </tr>
    <tr>
     <td></td>
     <td>
      <a href="#" onclick="document.getElementById(
       'captcha').src = 'securimage/securimage_show.php?'
       + Math.random(); return false">
         Different Image
      </a>
     </td>
    </tr>

    <tr>
     <td></td>
     <td>

      <button class="resetenter" type="reset" value="Reset">Reset</button>
      <button class="resetenter" type="submit" value="Enter">Enter</button>
     </td>
     </tr>
   </table>
  </form>
 </div>
 <table class="center">
  <tr>
   <td>

<?php
 
 if(isset($_SESSION['err_first']))
 { echo $_SESSION['err_first'] . '<br />'; }
 if(isset($_SESSION['err_last']))
 { echo $_SESSION['err_last'] . '<br />'; }
 if(isset($_SESSION['err_address']))
 { echo $_SESSION['err_address'] . '<br />'; }
 if(isset($_SESSION['err_zip']))
 { echo $_SESSION['err_zip'] . '<br />'; }
 if(isset($_SESSION['err_phone']))
 { echo $_SESSION['err_phone'] . '<br />'; }
 if(isset($_SESSION['err_email']))
 { echo $_SESSION['err_email'] . '<br />'; }
 if(isset($_SESSION['err_userlogin']))
 { echo $_SESSION['err_userlogin'] . '<br />'; }

?>

   </td>
  </tr>
 </table>
</html>

