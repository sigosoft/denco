<?php 

include 'Device_connection.php';


$AgentLiveTaskID=$_POST['AgentLiveTaskID'];
$OrderID=$_POST['OrderID'];

$GetID=mysqli_query($conn,"SELECT AgentID,ClinicID FROM agent_live_task WHERE AgentLiveTaskID='$AgentLiveTaskID'");
$Get_row=mysqli_fetch_assoc($GetID);




$AgentID=$Get_row['AgentID'];
$ClinicID=$Get_row['ClinicID'];



$Named=mysqli_query($conn,"SELECT * FROM agent_table WHERE AgentID='$AgentID'");
$Named_row=mysqli_fetch_assoc($Named);
$AgentName=$Named_row['AgentName'];

$NamedC=mysqli_query($conn,"SELECT * FROM clinics WHERE ClinicID ='$ClinicID'");
$Named_rowC=mysqli_fetch_assoc($NamedC);
$DoctorPhone =$Named_rowC['DoctorPhone'];




$EndLat=$_POST['EndLat'];
$EndLong=$_POST['EndLong'];




$CartData=$_POST['CartData'];

$AgentNotes=$_POST['AgentNotes'];

$Mode=$_POST['Mode'];

$GrandTotal=$_POST['GrandTotal'];

date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
$current_time = date('H:i:s');


if($Mode=='Save')
{

$query="UPDATE agent_live_task SET AgentNotes='$AgentNotes' WHERE AgentLiveTaskID='$AgentLiveTaskID'";


}
elseif($Mode=='Finish')
{



$query="UPDATE agent_live_task SET EndTime='$current_time', EndDate='$current_date', EndLat='$EndLat', EndLong='$EndLong', AgentNotes='$AgentNotes',  Status='Completed' WHERE AgentLiveTaskID='$AgentLiveTaskID'";





$customer_message="Thank%20you%20for%20purchasing%20from%20Denco%20Dentals.%20Your%20total%20amount%20is%20".$GrandTotal."%20INR%20Your%20agent%20name%20is%20".$AgentName.".%20For%20any%20queries%20please%20call%20us%20on%209746478500.";



$customer= file_get_contents("http://sms2.sigosoft.com/pushsms.php?username=denco&api_password=0f41e68gyxlhrunaj&sender=DNCODL&to=".$DoctorPhone."&message=".$customer_message."&priority=11");


};







if(mysqli_query($conn,$query))
{


if($Mode=='Save')
{


$save_loc=mysqli_query($conn,"INSERT INTO saved_locations(AgentID, TaskID, ClinicID, Latitude, Longitude) VALUES ('$AgentID', '$AgentLiveTaskID', '$ClinicID', '$EndLat', '$EndLong')");



};

  $pass['Status']="Success";

  $query="UPDATE orders SET GrandTotal='$GrandTotal' WHERE TaskID='$AgentLiveTaskID'";

   if(mysqli_query($conn,$query))
   {

  $pass['Order']="Success";
  
  if(!empty($CartData)){ 

   

   $json = json_decode($CartData, true);



   $elementCount  = count($json);


for ($i=0;$i < $elementCount; $i++) 
{

$ProductID = $json[$i]['product_id'];
$ProductName = $json[$i]['product_name'];
$ProductPrice = $json[$i]['unit_price'];
$Total = $json[$i]['price'];
$Quantity = $json[$i]['quantity'];



$order_item=mysqli_query($conn,"INSERT INTO order_items(OrderID, ProductID, ProductName, Quantity, ProductPrice, Total, TaskID) VALUES ('$OrderID', '$ProductID', '$ProductName', '$Quantity', '$ProductPrice', '$Total', '$AgentLiveTaskID')");




}

};

}
else
{

$pass['Order']="Failed";

}


}

else
{
    $pass['Status']="Failed";
    $pass['Order']="Failed";
}



print_r(json_encode($pass));


?>