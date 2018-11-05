<?php

include 'Device_connection.php';

$LiveTaskID=$_POST['LiveTaskID'];

$tasks="SELECT agent_live_task.*, clinics.* FROM agent_live_task INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE agent_live_task.AgentLiveTaskID='$LiveTaskID'";
$result=mysqli_query($conn,$tasks);


if(mysqli_num_rows($result)>0)

{

while($list=mysqli_fetch_assoc($result))
{
   $task[]=$list;

}

}
else
{
   $task[]="No Task";
}




$output['task']=$task;


$orders="SELECT * FROM orders WHERE TaskID='$LiveTaskID'";

$resulter=mysqli_query($conn,$orders);


if(mysqli_num_rows($resulter)>0)

{

while($lister=mysqli_fetch_assoc($resulter))
{
   $order[]=$lister;

}

}
else
{
   $order[]="No Task";
}


$output['order']=$order;




$order_items="SELECT * FROM order_items WHERE TaskID='$LiveTaskID'";

$resultered=mysqli_query($conn,$order_items);


if(mysqli_num_rows($resultered)>0)

{

while($listered=mysqli_fetch_assoc($resultered))
{
   $order_item[]=$listered;

}

}
else
{
   $order_item[]="No Task";
}


$output['order_item']=$order_item;


$pass=$output;


print_r(json_encode($pass));


?>