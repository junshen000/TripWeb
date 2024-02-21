<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Select the trip you wnat</title>
</head>
<body>
<?php
include 'connecttodb.php';
?>
<h1>Trip Data</h1>
<ol>
<?php
//get all the trip and echo it as a table
//if the input is asscending tripname then echo it as ascending order by tripname
if($_POST["TorC"]=="tripname"){
   if($_POST["order"]=="ascending"){
     $query="SELECT * FROM trip ORDER BY tripname ASC";
   }
   else{
     $query="SELECT * FROM trip ORDER BY tripname DESC";
   }
 }
//else echo it order bu country
else{
  if($_POST["order"]=="ascending"){
    $query="SELECT * FROM trip ORDER BY country ASC";
  }
  else{
    $query="SELECT * FROM trip ORDER BY country DESC";
  }
}

 $result= mysqli_query($connection,$query);
 if (!$result) {
 die("databases query failed.");
 }
// echo the result as a table
if($_POST["TorC"]=="tripname"){
 echo "<table>";
 echo "<tr>";
 echo "<th>Trip Name</th>";
 echo "<th>Trip ID</th>";
 echo "<th>Start Date</th>";
 echo "<th>End Date</th>";
 echo "<th>Country</th>";
 echo "<th>License Plate</th>";
 echo "<th>Image</th>";
 echo "</tr>";

 while ($row = mysqli_fetch_assoc($result)) {
   echo "<tr>";
   echo "<td>" .$row["tripname"]. "</td>";
   echo "<td>" .$row["tripid"]. "</td>";
   echo "<td>" .$row["startdate"]. "</td>";
   echo "<td>" .$row["enddate"]. "</td>";
   echo "<td>" .$row["country"]. "</td>";
   echo "<td>" .$row["licenseplate"]. "</td>";
   echo "<td>";
   echo '<img src="' .$row["urImage"].'" height="60" width="60">';
   echo "</td>";
   echo "</tr>";
 }
}
else{
 echo "<table>";
 echo "<tr>";
 echo "<th>Country</th>";
 echo "<th>Trip Name</th>";
 echo "<th>Trip ID</th>";
 echo "<th>Start Date</th>";
 echo "<th>End Date</th>";
 echo "<th>License Plate</th>";   
 echo "<th>Image</th>";
 echo "</tr>";  
 while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" .$row["country"]. "</td>";
    echo "<td>" .$row["tripname"]. "</td>";
    echo "<td>" .$row["tripid"]. "</td>";
    echo "<td>" .$row["startdate"]. "</td>";
    echo "<td>" .$row["enddate"]. "</td>";
    echo "<td>" .$row["licenseplate"]. "</td>";
    echo "<td>";
    echo '<img src="' .$row["urImage"].'" height="60" width="60">';
    echo "</td>";

    echo "</tr>";
  }
}
 mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>

