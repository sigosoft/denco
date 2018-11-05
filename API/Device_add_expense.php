<?php 

include 'Device_connection.php';

date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
$current_time = date('H:i:s');


$AgentID=$_POST['AgentID'];
$ExpenseCategoryID=$_POST['ExpenseCategoryID'];
$ExpenseCategoryName=$_POST['ExpenseCategoryName'];
$Amount=$_POST['Amount'];
$ExpenseDescription=$_POST['ExpenseDescription'];

$Latitude=$_POST['latitude'];
$Longitude=$_POST['longitude'];







$query="INSERT INTO expense_table(AgentID, expense_date, expense_time, ExpenseDescription, ExpenseCategoryID, ExpenseCategoryName, Amount, Latitude, Longitude) VALUES ('$AgentID', '$current_date', '$current_time', '$ExpenseDescription', '$ExpenseCategoryID', '$ExpenseCategoryName', '$Amount','$Latitude', '$Longitude')";
if (mysqli_query($conn,$query))
{

$pass['status']="Success";


}
else
{

$pass['status']="Failed";



}






print_r(json_encode($pass));

?>














