
<!DOCTYPE html>
<html>
<head>
	<title>Assignment 3</title>
   <link rel="stylesheet" type="text/css" href="column.css">


</head>
<body>
<?php
  include "connecttodb.php";
?>

<h1>Assignment 3</h1>
<!-- list all the bus trip data -->
<h2>Order by trip name or country: </h2>
  
  <form action ="gettrip.php" method='post'>
 <!-- ask for the way user want to display -->
  <input type="radio" name="TorC" value="country">Country<br>
  <input type="radio" name="TorC" value="tripname">Trip name<br>
  Order by ascending or descending<br>
  <input type="radio" name="order" value="ascending">ascending<br>
  <input type="radio" name="order" value="descending">descending<br>
  <input type="submit" value="Select">
  </form>

<p>
<hr>
<p>
<!-- allow the user to update the info -->
<h2>Modify Trip data</h2>
  Which trip do you want to modify<br>
<!-- list all the trip name for selection -->
  <form action="modifytrip.php" method='post'>
  <?php
  include "gettripname.php";
  ?>
<!-- ask inputs -->
  New trip name:<br>
  <input type="text" name="newtripname"><br>
  New start date:<br>
  <input type="date" name="newStartDate"><br>
  New end date:<br>
  <input type="date" name="newEndDate"><br>
  Insert a image:<br>
  <input type="url" name="image"><br>
  <input type="submit" Value="Modify" onclick="window.location.reload()">
  </form>

<p>
<hr>
<p>
<!-- allow user to delete a trip -->
<h2>Delete the trip</h2>
  Which trip you want to delete<br>
  <form action="deletetrip.php" method="post">
<!-- display all the trip name -->
  <?php
  include "gettripname.php";
  ?>
  <input type="submit" Value="Delete" onclick="window.location.reload()">
  </form>


<p>
<hr>
<p>
<!-- to create a new trip -->
<h2>Create a new trip</h2>
  <form action="createtrip.php" method='post'>
  New trip name:<br>
  <input type="text" name="newtripname"><br>
  New start date:<br>
  <input type="date" name="newStartDate"><br>
  New end date:<br>
  <input type="date" name="newEndDate"><br>
  Select a valid bus:<br>
<!-- display all the bus -->
  <?php
  include "getbus.php";
  ?>
  New trip country:<br>
  <input type="text" name=newcountry><br>
  New trip ID:<br>
  <input type="text" name=newtripid><br>
  Insert a image:<br>
<!-- add a url for image ( only jpg and png allowed) -->
  <input type="url" name="image"><br>
  <input type="submit" Value="Modify" onclick="window.location.reload()">
  </form>

<p>
<hr>
<p>


<!-- check bus trip from selected country -->
<h2>Check the bus by country</h2>
  <form action ="buscountry.php" method='post'>
<!-- list all the country -->
  Select the country:<br>
  <?php
    include "getcountry.php";
  ?>
  <input type="submit" Value="Find">
  </form>

<p>
<hr>
<p>
<!-- create a new booking -->
<h2>Create a booking</h2>
  <!-- use div and css to make two column -->
  <form action ="createbook.php" method="post">
  <div class="row">
   <div class="column">
<!-- list all passenger -->
     Select a passenger:<br>
      <?php
       include "getpassenger.php"
      ?>
   </div>
   <div class="column">
     Select a trip:<br>
<!-- list all the trip -->
      <?php
       include "gettripname.php"
      ?>
   </div>
   </div>  
 price of the trip:<br>
 <input type="text" name="price"><br>
 <input type="submit" Value="Book" onclick="window.location.reload()">
  </form>

<p>
<hr>
<p>

<h2>Information for all passenger</h2>
  <?php
   include "getpassport.php"
  ?>
  
<p>
<hr>
<p>
<!-- check the booking by passenger name -->
<h2>Check booking by passenger</h2>
  <form action="passengerbook.php" method="post">
  Select a passenger:<br>
  <?php
    include "getpassenger.php"
  ?>
  <input type="submit" Value="Check">
  </form>

<p>
<hr>
<p>
<!-- delect a selected booking -->
<h2>Delete a selected booking</h2>
  <form action="deletebook.php" method="post">
  Select a booking to delete:<br>
<!-- list all booking -->
  <?php
    include "getbooklist.php"
  ?>
  <input type="submit" Value="Delete" onclick="window.location.reload()">
  </form>

<p>
<hr>
<p>
<!-- list all the trip withou booking -->
<h2>All the bus trip without a booking</h2>
  <?php
   include "getemptybus.php";
  ?>


</body>
</html>

 
