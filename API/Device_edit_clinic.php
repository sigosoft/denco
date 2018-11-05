<?php
include 'Device_connection.php';


$ClinicID=$_POST['ClinicID'];



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





$Update="UPDATE clinics SET ClinicName='$ClinicName', DoctorName='$DoctorName', KeyPersonName='$KeyPersonName', DoctorPhone='$DoctorPhone', Email='$Email', OfficePhone='$OfficePhone', Street='$Street', City='$City', Latitude ='$Latitude', Longitude ='$Longitude' WHERE ClinicID='$ClinicID'";

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