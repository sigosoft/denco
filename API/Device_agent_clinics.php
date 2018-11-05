<?php



include 'Device_connection.php';


$current_date = date('Y-m-d');

$AgentID=$_POST['AgentID'];


$query=mysqli_query($conn,"SELECT DISTINCT agent_tasks.ClinicID, clinics.ClinicName FROM agent_tasks INNER JOIN clinics ON agent_tasks.ClinicID=clinics.ClinicID WHERE agent_tasks.AgentID='$AgentID'");


if(mysqli_num_rows($query) > 0){

while($row=mysqli_fetch_assoc($query))
{

$data[]=$row;

}

}

else{

$data[]="No Clinic";

}


$output['Clinic']=$data;

$pass=$output;



print_r(json_encode($pass));


?>