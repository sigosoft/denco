<?php

session_start();

if(!isset($_SESSION['admin']))
 {
   header('location:index.php');
 };


$current = date('Y-m-d');

$Admin=$_SESSION['admin'];
$AdminName=$Admin['AdminName'];
$AdminImage=$Admin['AdminImage'];
include "db/config.php";



$TaskID=$_GET['id'];


$Delete="DELETE FROM agent_tasks WHERE TaskID='$TaskID'";

mysqli_query($conn, $Delete);

header('location:manage_task.php');
 

?>