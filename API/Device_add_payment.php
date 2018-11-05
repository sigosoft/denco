<?php 

include 'Device_connection.php';

date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
$current_time = date('H:i:s');


$AgentID=$_POST['AgentID'];
$ClinicID=$_POST['ClinicID'];
$Amount=$_POST['Amount'];
$PaymentNotes=$_POST['PaymentNotes'];



$Agent_namet=mysqli_query($conn,"SELECT * FROM agent_table WHERE AgentID='$AgentID'");
$agent_rowt=mysqli_fetch_assoc($Agent_namet);
$AgentName=$agent_rowt['AgentName'];

$NamedC=mysqli_query($conn,"SELECT * FROM clinics WHERE ClinicID ='$ClinicID'");
$Named_rowC=mysqli_fetch_assoc($NamedC);
$DoctorPhone =$Named_rowC['DoctorPhone'];




$query="INSERT INTO payment_collection(AgentID, ClinicID, Amount, PaymentDate, PaymentTime, PaymentNotes, AgentName) VALUES ('$AgentID', '$ClinicID', '$Amount', '$current_date', '$current_time', '$PaymentNotes', '$AgentName')";
if (mysqli_query($conn,$query))
{

$authKey = "234958AaETodXa5b8a17a1"; //Your Authentkation key
        $mobileNumber = $DoctorPhone;
        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "DDENCO";
        $mymsg = "Thank You for your order.We have received your payment ".$Amount;
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
        
$pass['status']="Success";

}
else
{

$pass['status']="Failed";


}






print_r(json_encode($pass));

?>














