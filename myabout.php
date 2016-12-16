<?php
 // myabout.php

?>

<!DOCTYPE html>

<html>
 <head>
  <link rel="icon" type="image/png" href="myicon.ico" />
  <link rel="stylesheet" type="text/css" href="myStyleSheet.css" />
  <title>
   About Page
  </title>
 </head>
 <body>
  <ul>
   <li>
    <a href="mylogin.php">Login</a>
   </li>
   <li>
    <a href="mysignup.php">Signup</a>
   </li>
<!--
   <li>
    <a href="myadmin.php">Admin Portal</a>
   </li>
-->
   <li>
    <a href="myuser.php">User Portal</a>
   </li>
   <li></li>
   <li></li>
  </ul>
  <h1>About Me</h1>

   <div>
   <table>
    <th>
     <img src="myaboutpic.jpeg" alt="London's Picture" 
      style="width:640px;height:427px;">
    </th>
    <tr><td></td></tr>
    <tr> 
     <td>
      <p>
       <strong>
        Hi!  My name is London Lucus.  I am 16 years old, and I have 
        a passion for loving and caring for animals.  Since a young 
        age I have always loved animals.  I have grown up with three cats 
        in my home that I love and enjoy everyday.  I have been caring 
        for other peoples pets since I was 12.  I am responsible, 
        reliable, and trustworthy.  You can have peace of mind that 
        your family pets are being well cared for and given the attention 
        they need all from their own home.  I also specialize in caring 
        for animals with special needs.  I try my best to get to know 
        your pet and their specific needs beforehand so I am well prepared 
        to care for them how you would while you are away.  Besides caring 
        for animals I love photography, softball, playing the piano, 
        and I am also learning to play the guitar.  Feel free to contact 
        me, I would love to help you with your pet care needs!
       </strong>
      </p>
     </td>
    </tr>
    <tr><td>
        
     <?php
        
      require_once 'dbGeneral.php';
       
      $first_name = 'first_name "FIRST NAME"';
      $last_name = 'last_name "LAST NAME"';
      $pet_name = 'pet_name "Pet Name"';
      $pet_type = 'pet_type "Pet Type"';
      $pet_breed = 'pet_breed "Pet Breed"';
      $care_type = 'care_type "Care Type"';
      $pet_num = 'pet_num "Number of Pets"';
      $care_price = 'care_price "Price of Care"';
              
      $query = "SELECT $care_type, $pet_num, $care_price FROM mypricing ORDER BY care_type";
                 
      $connect = new dbGeneral($query);
      $connect->parse();
      $event = $connect->exe();
      $ncols = OCINumCols($event);
      
      echo "<table border='1'><th colspan='3'>Pricing</th><tr>"; 
         
      for ($i = 1; $i <= $ncols; ++$i)
       {
        echo "<th class='c1'>";
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
          
      echo "</table><p><div>";
      echo "<form action='mylogin.php'>";
      echo "<input class='button' type='submit' value='back' /></form></div>";
        
     ?>
          
         
        
    </td></tr>
    <tr><td></td></tr>
   </table>
   <p></p> 
  </div>
 </body>
</html>





