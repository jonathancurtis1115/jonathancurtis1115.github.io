<?php
 // File myverify.php

 session_start();

 require_once 'dbGeneral.php';
 require_once 'salt.php';


 if($_SESSION['captcha'] >= 5)
  {
   include_once ('securimage/securimage.php');
   $securimage = new Securimage();
   if($securimage->check($_POST['captcha_code']) == false)
    {
     die('The code you entered was incorrect. Go back and try again.'); 
    }
  }


 $user = htmlentities(substr(trim($_POST['username']),0,40));
 $pass = htmlentities(substr(trim($_POST['userlogin']),0,40));
 $toHash = 'tiger';
 $salt = new Salt();
 $pass = $salt->doubleSalt($toHash,$pass);
 $query = "SELECT * FROM myowner WHERE username=:a AND userlogin=:b";
 $connect = new dbGeneral($query);
 $connect->parse();
 $connect->bind(':a',$user,20);
 $connect->bind(':b',$pass,50);
 $event = $connect->exe();

 if ($row = oci_fetch_assoc($event))
  {
   $_SESSION['ID'] = $row['ID'];
   $_SESSION['USERNAME'] = $row['USERNAME'];

   if ($row['ACTIVE'] == 1)
    {
     if ($row['ADMINLVL'] == 1)
      {
       header ("location: myadmin.php");
      }
     else
      {
       header ("location: myuser.php");
      }
    }
   else
    {
     header ("location: mylogin.php");
    }
  }
 else
  {
   $_SESSION['captcha'] += 1;
   header ("location: mylogin.php");
  }

?>
