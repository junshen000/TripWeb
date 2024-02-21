<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Select the passenger</title>
</head>
<body>
<?php
include 'connecttodb.php';
?>
<h1>Booking data for selected passenger</h1>
<ol>
<?php
  

//get passengerid from getpassenger.php from a3shen.php    
  $passengerID=$_POST["passenger"];
  $query='SELECT tripname,price FROM book,trip WHERE passengerid="'.$passengerID.'" AND trip.tripid=book.tripid';
  $result= mysqli_query($connection,$query);
  if (!$result) {
  die("databases query failed.");
  }
//echo all the booking data for the selected passenger
  if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<li>";
      echo "Trip name:  ";
      echo $row["tripname"];
      echo ",  price: ";
      echo $row["price"];
    }
   }
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>

