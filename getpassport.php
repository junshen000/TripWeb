<?php
  $query="SELECT * FROM passenger ORDER BY lname";
  $result= mysqli_query($connection,$query);
  if (!$result) {
  die("databases query failed.");
  }
  echo "<table>";
  echo "<tr>";
  echo "<th>Last Name</th>";
  echo "<th>First Name</th>";
  echo "<th>PassengerID</th>";
  echo "<th>Passport Number</th>";
  echo "</tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" .$row["lname"]. "</td>";
    echo "<td>" .$row["fname"]. "</td>";
    echo "<td>" .$row["passengerid"]. "</td>";
    echo "<td>" .$row["passportnum"]. "</td>";
    echo "</tr>";  
  }
  echo "</table>";
   mysqli_free_result($result);
?>


