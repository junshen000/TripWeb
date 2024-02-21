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
//php code to create a new trip

$newName=$_POST["newtripname"];   
$newSDate=$_POST["newStartDate"];
$newEDate=$_POST["newEndDate"];
$newBus=$_POST["create"];
$newId=$_POST["newtripid"];
$newcountry=$_POST["newcountry"];
$newImage=$_POST["image"];

// to check if the id entered is already in the databases
$query2='SELECT * FROM trip WHERE tripid="'.$newId.'"';
$result2=mysqli_query($connection,$query2);
if(mysqli_num_rows($result2)>0){
  echo "id already exists";
}
// if not add it
else{
//check if any entered value is empty, if not add the tip into databases 
  if($newImage==""){
    // add if new image is entered
    if($newId==NULL || $newName=="" || $newSDate==NULL || $newcountry=="" || $newBus==NULL || $newEDate==NULL){
        echo " missing a value";
    }
    else{
    $query3='INSERT INTO trip values("'.$newId.'","'.$newName.'","'.$newSDate.'","'.$newEDate.'","'.$newcountry.'","'.$newBus.'","'.$newImage.'")'; 
    if (!mysqli_query($connection, $query3)) {
       die("Missing a value" . mysqli_error($connection));
    }  
    }
  }
  else{  
  //if there is a url given, check if the url is jpg or png
       if($newId==NULL || $newName=="" || $newSDate==NULL || $newcountry=="" || $newBus==NULL || $newEDate==NULL){
        echo " missing a value";
      }
      else{
      if(strpos($newImage,'.png')!==false || strpos($newImage,'.jpg') !== false){
        $query3='INSERT INTO trip values("'.$newId.'","'.$newName.'","'.$newSDate.'","'.$newEDate.'","'.$newcountry.'","'.$newBus.'","'.$newImage.'")';
        if (!mysqli_query($connection, $query3)) {
           die("Insert faill" . mysqli_error($connection));
        }
      }
//if url given but not jpg or png echo not a jpg or png
      elseif($newImage!==""){
        echo "not a jpg or png url";
     }
     }  
  }

} 

mysqli_free_result($result2);
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
