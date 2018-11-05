<?php

include 'Device_connection.php';




$output=array();

$ClinicName=$_POST['ClinicName'];
$DoctorName=$_POST['DoctorName'];
$KeyPersonName=$_POST['KeyPersonName'];
$DoctorPhone=$_POST['DoctorPhone'];
$OfficePhone=$_POST['OfficePhone'];
$Email=$_POST['email'];

$Street=$_POST['street'];
$City=$_POST['city'];

$Latitude=$_POST['Latitude'];
$Longitude=$_POST['Longitude'];

$AgentID=$_POST['AgentID'];

$AdminNotes="Agent Created Task";


$current = date('Y-m-d');





$query="INSERT INTO clinics(ClinicName, DoctorName, KeyPersonName, DoctorPhone, Email, OfficePhone, Street, City, Latitude, Longitude) VALUES ('$ClinicName', '$DoctorName', '$KeyPersonName', '$DoctorPhone', '$Email', '$OfficePhone', '$Street', '$City','$Latitude', '$Longitude')";

if (mysqli_query($conn, $query))
 {

  $pass['status']="Success";
  
  $ClinicID=mysqli_insert_id($conn);


  $sql="INSERT INTO agent_tasks(AgentID, ClinicID, TaskStartDate, TaskEndDate, AdminNotes, Flag, TaskType, Priority) VALUES ('$AgentID', '$ClinicID', '$current ', '$current ', '$AdminNotes', '1', 'Permanent', 'Low')";
  
  if (mysqli_query($conn, $sql))
 {

  $pass['Task']="Success";
 
 }
  else
  {
   
   $pass['Task']="Failed";
   
  }

 } 

else 
{

$pass['status']="Failed";
$pass['Task']="Failed";


}

print_r(json_encode($pass));


?>


