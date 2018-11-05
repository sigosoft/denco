<?php



include 'Device_connection.php';
$Mode=$_POST['Mode'];
$ClinicID=$_POST['ClinicID'];
$AgentID=$_POST['AgentID'];
$from=$_POST['From'];
$to=$_POST['To'];



if($Mode=='Filter')
{

$from=$_POST['From'];
$to=$_POST['To'];

$query=mysqli_query($conn,"SELECT (SELECT SUM(GrandTotal) FROM orders WHERE ClinicID='$ClinicID') AS Total , (SELECT SUM(Amount) FROM payment_collection WHERE ClinicID='$ClinicID' AND PaymentDate >='$from' AND PaymentDate<='$to') AS Payed");
$row=mysqli_fetch_assoc($query);



$Total_B=$row['Total'];


if(empty($Total_B))
{

$Total=0;

}
else
{

$Total=$Total_B;

}

$Payed_B=$row['Payed'];

if(empty($Payed_B))
{


$Payed=0;

}
else
{

$Payed=$Payed_B;

}

$pass['Total']=$Total;
$pass['Payed']=$Payed;



$last_date=mysqli_query($conn,"SELECT * FROM payment_collection WHERE ClinicID='$ClinicID' AND PaymentDate >='$from' AND PaymentDate<='$to' ORDER BY PaymentID ASC LIMIT 1");
$last_row=mysqli_fetch_assoc($last_date);
$pass['Last_payment']=$last_row['PaymentDate'];



$sql=mysqli_query($conn,"SELECT payment_collection.*, clinics.* FROM payment_collection INNER JOIN clinics ON payment_collection.ClinicID=clinics.ClinicID WHERE  payment_collection.ClinicID='$ClinicID' AND payment_collection.PaymentDate >='$from' AND payment_collection.PaymentDate<='$to'");


if(mysqli_num_rows($sql) > 0){

while($rower=mysqli_fetch_assoc($sql))
{

$data[]=$rower;

}

}

else{

$data[]="No payments";

}




}

if($Mode=='All')
{



$query=mysqli_query($conn,"SELECT (SELECT SUM(GrandTotal) FROM orders WHERE ClinicID='$ClinicID') AS Total , (SELECT SUM(Amount) FROM payment_collection WHERE ClinicID='$ClinicID' ) AS Payed");
$row=mysqli_fetch_assoc($query);



$Total_B=$row['Total'];


if(empty($Total_B))
{

$Total=0;

}
else
{

$Total=$Total_B;

}

$Payed_B=$row['Payed'];

if(empty($Payed_B))
{


$Payed=0;

}
else
{

$Payed=$Payed_B;

}

$pass['Total']=$Total;
$pass['Payed']=$Payed;



$last_date=mysqli_query($conn,"SELECT * FROM payment_collection WHERE ClinicID='$ClinicID' ORDER BY PaymentID ASC LIMIT 1");
$last_row=mysqli_fetch_assoc($last_date);
$pass['Last_payment']=$last_row['PaymentDate'];



$sql=mysqli_query($conn,"SELECT payment_collection.*, clinics.* FROM payment_collection INNER JOIN clinics ON payment_collection.ClinicID=clinics.ClinicID WHERE  payment_collection.ClinicID='$ClinicID'");


if(mysqli_num_rows($sql) > 0){

while($rower=mysqli_fetch_assoc($sql))
{

$data[]=$rower;

}

}

else{

$data[]="No payments";

}






}
$pass['Payments']=$data;

print_r(json_encode($pass));

?>