<?php
 // File myuser.php

 session_start();

 require_once 'protect.php';
 require_once 'dbGeneral.php';

 $protect = new redirect();
 $id = $_SESSION['ID'];
 $username = $_SESSION['USERNAME'];
 
 $pet_name = 'pet_name "Pet Name"';
 $pet_type = 'pet_type "Pet Type"';
 $pet_breed = 'pet_breed "Pet Breed"';
 
 $getpet = "SELECT $pet_name, $pet_type, $pet_breed FROM mypets WHERE owner_id = $id";

 $connect = new dbGeneral($getpet);
 $connect->parse();


 ?>


<!DOCTYPE html>

<html>
 <head>
  <link rel="icon" type="image/png" href="CatTrack.ico" />
  <link rel="stylesheet" type="text/css" href="myStyleSheet.css" />
  <title>
   Pet Care - User Portal
  </title>
 </head>
 <body>

  <ul>
   <li>
    <a href="myabout.php">About Me</a>
   </li>
  </ul>

<!--
  <ul>
   <li>
    <a id="topright1" href="myabout.php">About Me</a>
   </li>
  </ul>
-->

  <h1>User Portal</h1>
  <div>

    
<?php
 $event = $connect->exe();
 $ncols = OCINumCols($event);
 echo "<table border='1'><th colspan='3'>Your Pets</th><tr>";
 for ($i = 1; $i <= $ncols; ++$i)
 {
  echo "<th>";
  echo OCIColumnName($event, $i);
  echo "</th>";
 }
 echo "</tr>";
 $j = 0;
 while($row = oci_fetch_assoc($event))
 {
  if ($j % 2) {echo "<tr class='d1'>";}
  else        {echo "<tr class='d2'>";}
  for ($i = 1; $i <= $ncols; ++$i)
  {
   echo "<td>";
   $columnName = OCIColumnName($event, $i);
   echo $row[$columnName];
   echo "</td>";
  }
  ++$j;
  echo "</tr>";
  }
 echo"</table>"
?>



      <form method="post" action="pet_validate.php">
       <table>
        <th colspan="2">Add a Pet</th>
        <tr>
         <td>Pet Name:</td>
         <td>
          <input type="text" name="pet_name" maxlength="10"
           required value= <?php if(isset($_SESSION['pet_name']))
           { echo $_SESSION['pet_name'];  } ?> >
         </td>
        </tr>
        <tr>
         <td>Pet Type:</td>
         <td>
          <input type="text" name="pet_type" maxlength="20"
           required value= <?php if(isset($_SESSION['pet_type']))
           {  echo $_SESSION['pet_type'];  } ?> >
         </td>
        </tr>
        <tr>
         <td>Pet Breed:</td>
         <td>
          <input type="text" name="pet_breed" maxlength="30"
           required value=<?php if(isset($_SESSION['pet_breed']))
           { echo $_SESSION['pet_breed']; } ?> >
         </td>
        </tr>
         <tr>
         <td></td>
         <td>
          <button class="button" type="reset" value="Reset">Reset</button>
          <button class="button" type="submit" value="Enter"">Add Pet</button>
         </td>
        </tr>
        <tr>
         <td></td>
         <td>
          <input class="button" onclick="location.href='logout_captcha.php'" value="Logout" />
         </td>
        </tr>
       </table>
      </form>
   <form method="post" action="">
    <table>
     <tr>
      <td></td>
      <td></td>
     </tr>
     <tr>
      <td></td>
      <td></td>
     </tr>
     <tr>
      <td></td>
      <td></td>
     </tr>   
     <tr>
      <td></td>
      <td></td>
     </tr>    
     <tr>
      <td></td>
      <td></td>
     </tr>
     <tr>
      <td></td>
      <td></td>
     </tr>
    </table>
   </form>
  </div>
 </body>
</html>
