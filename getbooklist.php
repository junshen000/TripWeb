<?php
//get all the data from book with passenger name and trip name
  $query="SELECT * FROM trip,book,passenger WHERE book.tripid=trip.tripid AND passenger.passengerid=book.passengerid";
  $result= mysqli_query($connection,$query);
  if (!$result) {
  die("databases query failed.");
  }
//use tripid and passengerid for values, use '-' in between to seperate them for latter use in deletebook.php
//display the trip  name and passenger name for user select which booking to delete
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="radio" name="deletebook" value="';
    echo $row["tripid"]."-". $row["passengerid"];
    echo '">' .$row["tripname"]. " booked BY:  " .$row["fname"]. "  " .$row["lname"].  "<br>";
  }
   mysqli_free_result($result);
?>
