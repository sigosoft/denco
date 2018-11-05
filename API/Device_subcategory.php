<?php

include 'Device_connection.php';

$CategoryID=$_POST['CategoryID'];


$output=array();




$sql= mysqli_query($conn,"SELECT * FROM subcategory WHERE CategoryID='$CategoryID' AND StatusSub='Active'");
 

if(mysqli_num_rows($sql) > 0){

while($row=mysqli_fetch_assoc($sql))
{

$SubCategory[]=$row;

}



}

else{

$SubCategory[]="No SubCategory";

}


$output['SubCategory']=$SubCategory;





$pass=$output;


print(json_encode($output));


?>

