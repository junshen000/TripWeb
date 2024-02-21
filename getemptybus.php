<?php
//get all the bus without a trip 
  $query="SELECT * FROM trip WHERE NOT EXISTS(SELECT * FROM book WHERE book.tripid=trip.tripid);";
  $result= mysqli_query($connection,$query);
  if (!$result) {
  die("databases query failed.");
  }
//echo it as a table
  echo "<table>";
  echo "<tr>";
  echo "<th>Trip Name</th>";
  echo "<th>Trip ID</th>";
  echo "<th>Start Date</th>";
  echo "<th>End Date</th>";
  echo "<th>Country</th>";
  echo "<th>License Plate</th>";
  echo "</tr>";
  while ($row = mysqli_fetch_assoc($result)) {
   echo "<tr>";
   echo "<td>" .$row["tripname"]. "</td>";
   echo "<td>" .$row["tripid"]. "</td>";
   echo "<td>" .$row["startdate"]. "</td>";
   echo "<td>" .$row["enddate"]. "</td>";
   echo "<td>" .$row["country"]. "</td>";
   echo "<td>" .$row["licenseplate"]. "</td>";
   echo "</tr>";
  }
   mysqli_free_result($result);
?>


