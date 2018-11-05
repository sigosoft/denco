<?php 

include 'Device_connection.php';


$current_date = date('Y-m-d');

$AgentID=$_POST['AgentID'];







$completed="SELECT agent_live_task.*, clinics.* FROM agent_live_task INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE agent_live_task.AgentID='$AgentID' AND agent_live_task.Status='Completed'";
$result=mysqli_query($conn,$completed);


if(mysqli_num_rows($result)>0)

{

while($list=mysqli_fetch_assoc($result))
{
   $completed_task[]=$list;

}

}
else
{
   $completed_task[]="No Task";
}




$output['completed_task']=$completed_task;









$pass=$output;


print_r(json_encode($pass));





?>