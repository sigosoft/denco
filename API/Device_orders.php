<?php

include 'Device_connection.php';



$Mode=$_POST['Mode'];

$AgentID=$_POST['AgentID'];


if($Mode=='All')
{

$query="SELECT orders.*, clinics.* FROM orders INNER JOIN clinics ON orders.ClinicID=clinics.ClinicID WHERE orders.AgentID='$AgentID'";

$Total_query=mysqli_query($conn,"SELECT (SELECT SUM(GrandTotal) FROM orders WHERE AgentID='$AgentID') AS Total");

$total_row=mysqli_fetch_assoc($Total_query);


$output['Total']=$total_row['Total'];


}
elseif($Mode=='Filter')
{

$From=$_POST['From'];
$To=$_POST['To'];	

$query="SELECT orders.*, clinics.* FROM orders INNER JOIN clinics ON orders.ClinicID=clinics.ClinicID WHERE orders.AgentID='$AgentID' AND (orders.OrderDate >= '$From' AND orders.OrderDate <= '$To')";

$Total_query=mysqli_query($conn,"SELECT (SELECT SUM(GrandTotal) FROM orders WHERE AgentID='$AgentID' AND (OrderDate >= '$From' AND OrderDate <= '$To')) AS Total");

$total_row=mysqli_fetch_assoc($Total_query);



$tot=$total_row['Total'];

if(empty($tot))
{
$output['Total']=0;
}
else
{

$output['Total']=$tot;

}



};





$result=mysqli_query($conn,$query);
 

if(mysqli_num_rows($result) > 0){

while($row=mysqli_fetch_assoc($result))
{

$Orders[]=$row;

}



}

else{

$Orders[]="No Orders";

}


$output['Orders']=$Orders;





$pass=$output;


print(json_encode($output));


?>

