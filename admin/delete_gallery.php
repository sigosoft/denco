
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

$GalleryID=$_GET['id'];




$sql="DELETE FROM gallery WHERE GalleryID=$GalleryID";
 mysqli_query($conn,$sql);
 header("location:gallery_images.php");

?>