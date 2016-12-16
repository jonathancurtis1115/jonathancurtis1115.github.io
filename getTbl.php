<?php
 // File getTbl.php

?>

<html>
 <head>
  <link rel="icon" type="image/png" href="myicon.ico" />
  <link rel="stylesheet" type="text/css" href="myStyleSheet.css" />
  <title>
   Reports
  </title>
 </head>
  <body>

<?php

 require_once 'dbGeneral.php';

 $rpt = $_POST["rpt"];
 $first_name = 'first_name "FIRST NAME"';
 $last_name = 'last_name "LAST NAME"';
 $pet_name = 'pet_name "Pet Name"';
 $pet_type = 'pet_type "Pet Type"';
 $pet_breed = 'pet_breed "Pet Breed"';
 $care_type = 'care_type "Care Type"';
 $pet_num = 'pet_num "Number of Pets"';
 $care_price = 'care_price "Price of Care"';




 if ($rpt == 1)
 { $query = "SELECT $first_name, $last_name, address, zip, phone, email FROM myowner ORDER BY id"; }
 else if ($rpt == 2)
 { $query = "SELECT $pet_name, $pet_type, $pet_breed FROM mypets ORDER BY id"; }
 else if ($rpt == 3)
 { $query = "SELECT $care_type, $pet_num, $care_price FROM mypricing ORDER BY care_type"; }

 $connect = new dbGeneral($query);
 $connect->parse();
 $event = $connect->exe();
 $ncols = OCINumCols($event);
 
 echo "<table border='1'><tr>";

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
 echo "<form action='myadmin.php'>";
 echo "<input class='button' type='submit' value='back' /></form></div>";

?>

 </body>
</html>
