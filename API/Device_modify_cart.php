<?php
include 'Device_connection.php';


$Mode=$_POST['Mode'];
$OrderItemID=$_POST['OrderItemID'];
$GrandTotal=$_POST['GrandTotal'];
$AgentLiveTaskID=$_POST['AgentLiveTaskID'];


if($Mode=='Delete')
{

$delete="DELETE FROM order_items WHERE OrderItemID='$OrderItemID'";
if (mysqli_query($conn,$delete))
{

$query="UPDATE orders SET GrandTotal='$GrandTotal' WHERE TaskID='$AgentLiveTaskID'";
$pass['status']="Success";

}
else
{

$pass['status']="Failed";


}



}
elseif($Mode=='Edit')
{

$Quantity=$_POST['Quantity'];
$Total=$_POST['Total'];

$edit="UPDATE order_items SET Quantity='$Quantity', Total='$Total' WHERE OrderItemID='$OrderItemID'";

if (mysqli_query($conn,$edit))
{

$query="UPDATE orders SET GrandTotal='$GrandTotal' WHERE TaskID='$AgentLiveTaskID'";
$pass['status']="Success";


}
else
{

$pass['status']="Failed";

}




};

print_r(json_encode($pass));

?>