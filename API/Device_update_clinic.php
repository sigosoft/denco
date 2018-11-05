<?php
include 'Device_connection.php';


$ClinicID=$_POST['ClinicID'];
$Latitude=$_POST['Latitude'];
$Longitude=$_POST['Longitude'];





$Update="UPDATE clinics SET Latitude ='$Latitude', Longitude ='$Longitude' WHERE ClinicID='$ClinicID'";

if (mysqli_query($conn,$Update))
{

$pass['status']="Success";


}
else
{

$pass['status']="Failed";

}



print_r(json_encode($pass));

?>