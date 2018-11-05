<?php 

include 'Device_connection.php';

$OrderID=$_POST['OrderID'];


$query="SELECT * FROM order_items WHERE OrderID ='$OrderID'";


$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $OrderDetails[]=$row;

}

}
else
{
   $OrderDetails[]="No Order Details";
}




$output['OrderDetails']=$OrderDetails;





$pass=$output;


print_r(json_encode($pass));





?>