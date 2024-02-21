<?php
//php code to get the country and echo it as radio button
  $query='SELECT country FROM trip GROUP BY country';
  $result= mysqli_query($connection,$query);
  if (!$result) {
  die("databases query failed.");
  }
//use country as it's values
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="buscountry" value="';
    echo $row["country"];
    echo '">' .$row["country"]. "<br>";
  }
   mysqli_free_result($result);
?>
