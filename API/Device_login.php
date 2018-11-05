<?php 

include 'Device_connection.php';

$Phone=$_POST['phone'];
$Password=md5($_POST['password']);




$login=mysqli_query($conn,"SELECT * FROM agent_table WHERE phone='$Phone' AND password='$Password' AND StatusA='Active'");

if(mysqli_num_rows($login)==1)
{

$row=mysqli_fetch_assoc($login);
$AgentID=$row['AgentID'];


 
    $pass['login']="Success";
    $pass['AgentID']=$row;



}

else
{

    $pass['login']="Failed";
    $pass['AgentID']="0";
   

}



print_r(json_encode($pass));


?>