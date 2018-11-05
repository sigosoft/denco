<?php 

include 'Device_connection.php';

date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
$current_time = date('H:i:s');


$AgentID=$_POST['AgentID'];
$TaskID=$_POST['TaskID'];
$ClinicID=$_POST['ClinicID'];

$Latitude=$_POST['latitude'];
$Longitude=$_POST['longitude'];







$query="INSERT INTO saved_locations(AgentID, TaskID, ClinicID, Latitude, Longitude) VALUES ('$AgentID', '$TaskID', '$ClinicID', '$Latitude', '$Longitude')";
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














