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
//get all the data needed from a3shen.php
$newName=$_POST["newtripname"];
$newSDate=$_POST["newStartDate"];
$newEDate=$_POST["newEndDate"];
$newImage=$_POST["image"];
$Mtrip=$_POST["modify"];

$query1='SELECT urImage FROM trip WHERE tripid="'.$Mtrip.'"';
$result=mysqli_query($connection,$query1);
if (!$result) {
die("databases query failed.");
}
//check if there is a image stored in selected trip

while ($row = mysqli_fetch_assoc($result)) {
if($row["urImage"]!==NULL && $newImage!==""){
  echo "image already exists";
}

//else insert the image
else{
//check if url is jpg or png
  if(strpos($newImage,'.png')!==false || strpos($newImage,'.jpg') !== false){
     $query2='UPDATE trip SET urImage="'.$newImage.'" WHERE tripid="'.$Mtrip.'"';
     if (!mysqli_query($connection, $query2)) {
        die("Error: insert failed" . mysqli_error($connection));
     }
  }
  elseif($newImage!==""){
    echo "not a jpg or png url";
  }

}
}
//check if any data is null, then only update the data that is not null which is entered by the user
if($_POST["newStartDate"]==NULL){
  if($_POST["newEndDate"]==NULL){
     if($_POST["newtripname"]!==""){
       $query='UPDATE trip SET tripname="'.$newName.'" WHERE tripid="'.$Mtrip.'"';
       mysqli_query($connection, $query);

     }
     else{
      if($newImage==""){
          echo "no input<br>";
      }
    }
  }
  else{
      if($_POST["newtripname"]!==""){
         $query='UPDATE trip SET tripname="'.$newName.'",enddate="'.$newEDate.'" WHERE tripid="'.$Mtrip.'"';
	mysqli_query($connection, $query);

      }
      else{
        $query='UPDATE trip SET enddate="'.$newEDate.'" WHERE tripid="'.$Mtrip.'"';
	mysqli_query($connection, $query);

      }
     
    }
    
}
elseif($_POST["newStartDate"]!==NULL){
    if($_POST["newEndDate"]==NULL){
        if($_POST["newtripname"]!==""){
            $query='UPDATE trip SET tripname="'.$newName.'", startdate="'.$newSDate.'" WHERE tripid="'.$Mtrip.'"';
	    mysqli_query($connection, $query);

        }
        else{
            $query='UPDATE trip SET startdate="'.$newSDate.'" WHERE tripid="'.$Mtrip.'"';
	    mysqli_query($connection, $query);

        }
    }
    else{
        if($_POST["newtripname"]!==""){
            $query='UPDATE trip SET tripname="'.$newName.'", startdate="'.$newSDate.'", enddate="'.$newEDate.'" WHERE tripid="'.$Mtrip.'"';
	    mysqli_query($connection, $query);

        }
        else{
            $query='UPDATE trip SET startdate="'.$newSDate.'", enddate="'.$newEDate.'" WHERE tripid="'.$Mtrip.'"';
	    mysqli_query($connection, $query);

        }
    }

}

mysqli_free_result($result);
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
