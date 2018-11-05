<?php

include 'Device_connection.php';




$output=array();




$sql= mysqli_query($conn,"SELECT * FROM products WHERE StatusP='Active' ORDER BY ProductName ASC");
 

if(mysqli_num_rows($sql) > 0){

while($row=mysqli_fetch_assoc($sql))
{

$Products[]=$row;

}



}

else{

$Products[]="No Products";

}


$output['Products']=$Products;





$pass=$output;


print(json_encode($output));


?>

