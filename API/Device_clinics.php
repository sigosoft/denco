<?php

include 'Device_connection.php';




$output=array();




$sql= mysqli_query($conn,"SELECT * FROM clinics WHERE StatusC='Active'");
 

if(mysqli_num_rows($sql) > 0){

while($row=mysqli_fetch_assoc($sql))
{

$Clinic[]=$row;

}



}

else{

$Clinic[]="No Clinic";

}


$output['Clinic']=$Clinic;





$pass=$output;


print(json_encode($output));


?>

