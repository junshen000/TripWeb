<?php
//get all the bus licensepalte and echo it as a radio button with licenseplate as it's values
  $query='SELECT * FROM bus';
  $result= mysqli_query($connection,$query);
  if (!$result) {
  die("databases query failed.");
  }
  while ($row = mysqli_fetch_assoc($result)) { 
    echo '<input type="radio" name="create" value="';
    echo $row["licenseplate"];
    echo '">' .$row["licenseplate"]. "<br>";  
  }
 mysqli_free_result($result);
?>
