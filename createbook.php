<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>New booking</title>
</head>
<body>
<?php
include 'connecttodb.php';
?>
<h1>New booking</h1>
<ol>
<?php
//get tripname from gettripname.php  
  $trip=$_POST["modify"];
//get passengerid from getpassenger.php
  $passengerID=$_POST["passenger"];
//price from input
  $price=$_POST["price"];
//check if any input is null
  if($trip!==NULL && $passengerID!==NULL){
    $query='INSERT INTO book VALUES ("'.$trip.'","'.$passengerID.'","'.$price.'")';
     if (!mysqli_query($connection, $query)) {
       die("Missing a value or duplicate booking" . mysqli_error($connection));
    }
     else{
       echo "Booking added";
     }
  }

?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>
  
