<?php 

include 'Device_connection.php';


$current_date = date('Y-m-d');

$AgentID=$_POST['AgentID'];




$tasks="SELECT agent_tasks.*, clinics.* FROM agent_tasks INNER JOIN clinics ON agent_tasks.ClinicID=clinics.ClinicID WHERE agent_tasks.AgentID='$AgentID' AND agent_tasks.Flag='1'";

$result=mysqli_query($conn,$tasks);






if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $task_list[]=$row;

}

}
else
{
   $task_list[]="No Task";
}




$output['task_list']=$task_list;




$temporary="SELECT agent_live_task.*, clinics.* FROM agent_live_task INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE agent_live_task.AgentID='$AgentID' ORDER BY agent_live_task.AgentLiveTaskID DESC";
$result=mysqli_query($conn,$temporary);


if(mysqli_num_rows($result)>0)

{

while($list=mysqli_fetch_assoc($result))
{
   $temporary_task[]=$list;

}

}
else
{
   $temporary_task[]="No Task";
}




$output['temporary_task']=$temporary_task;









$pass=$output;


print_r(json_encode($pass));





?>