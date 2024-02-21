<?php
//get all passengerid fname, lname from passenger
  $query='SELECT passengerid,fname,lname FROM passenger';
  $result= mysqli_query($connection,$query);
  if (!$result) {
  die("databases query failed.");
  }
//echo it as radio button with values as passenger id
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="passenger" value="';
    echo $row["passengerid"];
    echo '">' .$row["fname"]. " " .$row["lname"]. "<br>";
  }
?>
