<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Bus Country</title>
</head>
<body>
<?php
   include 'connecttodb.php';
?>
<h1>The bus from selected country</h1>
<ol>
<?php
//list all the bus from selected country 
  $selectcountry=$_POST["buscountry"];

  $query='SELECT bus.licenseplate FROM bus,trip WHERE bus.licenseplate=trip.licenseplate AND country="'.$selectcountry.'"';
  $result=mysqli_query($connection,$query);
  if(!$result) {
    die("databases query failed.");
  }
//if the result is not empty echo the bus's licenseplate
if(mysqli_num_rows($result)>0){
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>";
    echo $row["licenseplate"];
  }   
}
else{
   echo "No bus coming from selected country";
}
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>

