<?php



include 'Device_connection.php';


$current_date = date('Y-m-d');

$AgentID=$_POST['AgentID'];


$query=mysqli_query($conn,"SELECT * FROM expense_table WHERE AgentID='$AgentID'");


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