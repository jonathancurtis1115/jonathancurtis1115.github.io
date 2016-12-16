<?php
 //File: logout_captcha.php

 class logOutCP
  {
   public function __construct()
    {
     session_start();
     unset($_SESSION);
     session_destroy();
    }
  }
 
 $logout = new logOutCP();

?>

<html>
 <head>
  <link rel="icon" type="image/png"
   href="https://cdn0.iconfinder.com/data/icons/toys/128/teddy_bear_toy_4.png"/>
  <link rel="stylesheet" type="text/css" href="myStyleSheet.css" />
  <script type="text/javascript">
   function delayer(){ window.location = "mylogin.php" }
  </script>
 </head>
 <body onLoad="setTimeout('delayer()', 2000)">
  <h2 style="text-align:center;">Logging Out...</h2>
 </body>
</html>

