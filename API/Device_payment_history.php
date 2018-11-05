<?php



include 'Device_connection.php';


$current_date = date('Y-m-d');

$AgentID=$_POST['AgentID'];


$query=mysqli_query($conn,"SELECT payment_collection.*, clinics.* FROM payment_collection INNER JOIN clinics ON payment_collection.ClinicID=clinics.ClinicID WHERE payment_collection.AgentID='$AgentID'");


if(mysqli_num_rows($query) > 0){

while($row=mysqli_fetch_assoc($query))
{

$data[]=$row;

}

}

else{

$data[]="No payments";

}


$output['Payments']=$data;

$pass=$output;



print_r(json_encode($pass));


?>