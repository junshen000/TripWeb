<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Modified trip</title>
</head>
<body>
<?php
   include 'connecttodb.php';
?>
<h1>Updated trip info</h1>
<ol>
<?php
//echo if booking deleted
//get the passengerid and tripid from getbooklist.php
  $book=explode('-',$_POST["deletebook"]);
  $query='DELETE FROM book WHERE tripid="'.$book[0].'" AND passengerid="'.$book[1].'"';
  if (!mysqli_query($connection, $query)) {
    die("Error: insert failed" . mysqli_error($connection));
  }
  else{
   echo "Booking deleted";
  }
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html> 
