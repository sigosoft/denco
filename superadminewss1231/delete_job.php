
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

require 'db/config.php';

$CareerID=$_GET['id'];




$sql="DELETE FROM career WHERE CareerID=$CareerID";
 mysqli_query($conn,$sql);
 header("location:manage_jobs.php");

?>