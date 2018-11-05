<?php 

include 'Device_connection.php';



$query="SELECT * FROM expense_category WHERE StatusExp='Active'";
$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)

{

while($row=mysqli_fetch_assoc($result))
{
   $ExpenseCategory[]=$row;

}

}
else
{
   $ExpenseCategory[]="No Expense Category";
}




$output['ExpenseCategory']=$ExpenseCategory;





$pass=$output;


print_r(json_encode($pass));





?>