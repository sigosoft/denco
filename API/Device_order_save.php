<?php 

include 'Device_connection.php';



$AgentID=$_POST['AgentID'];
$ClinicID=$_POST['ClinicID'];
$StartLat=$_POST['StartLat'];
$StartLong=$_POST['StartLong'];
$GrandTotal=$_POST['GrandTotal'];
$CartData=$_POST['CartData'];
$AgentNotes=$_POST['AgentNotes'];
$TaskID=$_POST['TaskID'];
$TaskType =$_POST['TaskType'];
$CreatedDate =$_POST['CreatedDate'];
$DueDate =$_POST['DueDate'];
$AdminNotes =$_POST['AdminNotes'];

$Priority =$_POST['Priority'];

$Mode=$_POST['Mode'];


$Named=mysqli_query($conn,"SELECT * FROM agent_table WHERE AgentID='$AgentID'");
$Named_row=mysqli_fetch_assoc($Named);
$AgentName=$Named_row['AgentName'];

$NamedC=mysqli_query($conn,"SELECT * FROM clinics WHERE ClinicID ='$ClinicID'");
$Named_rowC=mysqli_fetch_assoc($NamedC);
$DoctorPhone =$Named_rowC['DoctorPhone'];

date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
$current_time = date('H:i:s');



if($Mode=='Finish')
{




$query="INSERT INTO agent_live_task(AgentID, ClinicID, CreatedDate, DueDate, StartDate, EndDate, StartTime , StartLat, StartLong, EndTime, EndLat, EndLong, AdminNotes, AgentNotes, TaskID, Status, TaskType, Priority) VALUES ('$AgentID', '$ClinicID', '$CreatedDate', '$DueDate', '$current_date', '$current_date', '$current_time' , '$StartLat', '$StartLong', '$current_time' , '$StartLat', '$StartLong', '$AdminNotes', '$AgentNotes', '$TaskID', 'Completed', 'Permanent', '$Priority')";


//$customer_message="Thank%20you%20for%20purchasing%20from%20Denco%20Dentals.%20Your%20total%20amount%20is%20".$GrandTotal."%20INR%20Your%20agent%20name%20is%20".$AgentName.".%20For%20any%20queries%20please%20call%20us%20on%209746478500.";



//$customer= file_get_contents("http://sms2.sigosoft.com/pushsms.php?username=denco&api_password=0f41e68gyxlhrunaj&sender=DNCODL&to=".$DoctorPhone."&message=".$customer_message."&priority=11");


 $authKey = "234958AaETodXa5b8a17a1"; //Your Authentkation key
        $mobileNumber = $DoctorPhone;
        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "DDENCO";
        $mymsg = "Thank you for purchasing from Denco Dentals. Your total amount is ".$GrandTotal." INR Your agent name is ".$AgentName.". For any queries please call us on 9746478500.";
        //Your message to send, Add URL encoding here.
        $message = urlencode("$mymsg");
        $route = "4";
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );
        //API URL provided by your SMS service provider
        $url = "http://api.msg91.com/api/sendhttp.php";
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
        ));
        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
        }
        curl_close($ch);

}
elseif($Mode=='Save')
{

$query="INSERT INTO agent_live_task(AgentID, ClinicID, CreatedDate, DueDate, StartDate, StartTime , StartLat, StartLong, AdminNotes, AgentNotes, TaskID, Status, TaskType, Priority) VALUES ('$AgentID', '$ClinicID', '$CreatedDate', '$DueDate', '$current_date', '$current_time' , '$StartLat', '$StartLong', '$AdminNotes', '$AgentNotes', '$TaskID', 'Started', 'Permanent','$Priority')";

};








if(mysqli_query($conn,$query))
{

$AgentLiveTaskID=mysqli_insert_id($conn);

if($Mode=='Save')
{

$save_loc=mysqli_query($conn,"INSERT INTO saved_locations(AgentID, TaskID, ClinicID, Latitude, Longitude) VALUES ('$AgentID', '$AgentLiveTaskID', '$ClinicID', '$StartLat', '$StartLong')");



};


    
    
if($TaskType=='Temporary')
{

$update=mysqli_query($conn,"UPDATE agent_tasks SET Flag='0' WHERE TaskID='$TaskID'");

};

    $pass['Status']="Success";
    $pass['AgentLiveTaskID']=$AgentLiveTaskID;

  $query="INSERT INTO orders(TaskID, ClinicID, GrandTotal, AgentID, OrderDate, OrderTime, StatusO) VALUES ('$AgentLiveTaskID', '$ClinicID', '$GrandTotal', '$AgentID', '$current_date', '$current_time' , 'Live')";

   if(mysqli_query($conn,$query))
   {

    $OrderID=mysqli_insert_id($conn);
     
    $pass['OrderID']=$OrderID;


   $pass['Order']="Success";
   
   
   

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

}
else
{

$pass['AgentLiveTaskID']=$AgentLiveTaskID;
$pass['Order']="Failed";
$pass['OrderID']="0";


}


}

else
{

    $pass['AgentLiveTaskID']="0";
    $pass['Status']="Failed";
    $pass['Order']="Failed";
    $pass['OrderID']="0";
}



print_r(json_encode($pass));


?>