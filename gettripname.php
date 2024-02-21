<?php
//get all the trip name and output it as a radio button with tripid as it's values
  $query="SELECT * FROM trip";
  $result= mysqli_query($connection,$query);
  if (!$result) {
  die("databases query failed.");
  }
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="modify" value="';
    echo $row["tripid"];
    echo '">' .$row["tripname"]. "<br>";
  }
   mysqli_free_result($result);
?>
