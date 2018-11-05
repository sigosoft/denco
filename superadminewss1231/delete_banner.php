
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

$BannerID=$_GET['id'];




$sql="DELETE FROM banner WHERE BannerID=$BannerID";
 mysqli_query($conn,$sql);
 header("location:banner_images.php");

?>