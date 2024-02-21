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
<h1>Update trip info</h1>
<ol>
<?php
//Mtrip from get tripnname.php
$Mtrip=$_POST["modify"];
//delete the trip
$query='DELETE FROM trip WHERE tripid="'.$Mtrip.'"';
$re=mysqli_query($connection, $query);
if($re==FALSE){
//if not success then echo a booking exsits
 echo "Cannot delete this trip because it has booked";
}
else{
  echo "trip deleted";
}
?>
</ol>
<?php
   mysqli_close($connection);
?>
<?php
  include "gettrip.php";
?>
</body>
</html>
