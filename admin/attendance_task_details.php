<?php

session_start();

if(!isset($_SESSION['admin']))
 {
   header('location:index.php');
 };


$current_date = date('Y-m-d');

$Admin=$_SESSION['admin'];
$AdminName=$Admin['AdminName'];
$AdminImage=$Admin['AdminImage'];


include "db/config.php";


$TaskID=$_GET['id'];

$tasks="SELECT agent_live_task.*, clinics.* FROM agent_live_task INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE agent_live_task.AgentLiveTaskID='$TaskID'";
$result=mysqli_query($conn,$tasks);
$row=mysqli_fetch_assoc($result);


$order_items="SELECT * FROM order_items WHERE TaskID='$TaskID'";

$resultered=mysqli_query($conn,$order_items);


$orders="SELECT * FROM orders WHERE TaskID='$TaskID'";

$resulter=mysqli_query($conn,$orders);




$dat=mysqli_fetch_assoc($resulter)







?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Denco Dentals | Admin</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">


  <?php require 'partials/sidebar.php'; ?>

                       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Task Details</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>
            <div class="container " style="padding-top: 5%;">
            <div class="col-md-6">



            <table class="table" style="width: 50%;margin-left: 20%;">
  <thead>
    <tr>
     
    
    </tr>
  </thead>
  <tbody class="table-striped">

     <tr>
      <th scope="row"><strong>Task No</strong></th>
      <td><?php echo $row['AgentLiveTaskID'];?></td>
      
    </tr>
    
     <tr>
      <th scope="row"><strong>Task Type</strong></th>
      <td><?php echo $row['TaskType'];?></td>
      
    </tr>
    
     <tr>
      <th scope="row"><strong>Clinic Name</strong></th>
      <td><?php echo $row['ClinicName'];?></td>
      
    </tr>
  <tr>
      <th scope="row"><strong>Created Date</strong></th>
      
      <td><?php 
       $CreatedDate=$row['CreatedDate'];
       echo date("jS F, Y", strtotime("$CreatedDate")); ?></td>

      
    </tr>
   
    

   
    <tr>
      <th scope="row"><strong> Start Date </strong></th>
     
      <td><?php 
       $StartDate=$row['StartDate'];
       echo date("jS F, Y", strtotime("$StartDate")); ?></td>
      
    </tr>
    
    <tr>
      <th scope="row"><strong> Start Time </strong></th>
       <td><?php $Start =  $row['StartTime'];
      echo date('h:i a' , strtotime($Start)); ?></td>
      
    </tr>
    
    <tr>
      <th scope="row"><strong>Start Location</strong></th>
      <td><a href="http://maps.google.com/?q=<?php echo $row['StartLat'].','.$row['StartLong'];?>" target="_blank">View</a></td>
      
    </tr>

    <tr>
      <th scope="row"><strong>Admin Notes</strong></th>
      <td><?php echo $row['AdminNotes'];?></td>
      
    </tr>

   



  
  </tbody>
</table>
</div>
      <div class="col-md-6">



            <table class="table" style="width: 50%;margin-left: 20%;">
  <thead>
    <tr>
     
    
    </tr>
  </thead>
  <tbody class="table-striped">

 <tr>
      <th scope="row"><strong> Priority </strong></th>
      <td><?php echo $row['Priority'];?></td>
      
    </tr>
    
    <tr>
      <th scope="row"><strong> Due Date </strong></th>
      <td><?php 
       $DueDate=$row['DueDate'];
       echo date("jS F, Y", strtotime("$DueDate")); ?></td>
      
     
      
    </tr>
     <tr>
      <th scope="row"><strong>Status</strong></th>
      <td><?php echo $row['Status'];?></td>
      
    </tr>
  <tr>
      <th scope="row"><strong> End Date </strong></th>
      <td>
      <?php $EndDate=$row['EndDate'];
       echo date("jS F, Y", strtotime("$EndDate")); ?></td>
      
    </tr>

   
    <tr>
      <th scope="row"><strong>End Time</strong></th>
      
     
      
        <td><?php $End =  $row['EndTime'];
        if(!empty($End))
        {
        echo date('h:i a' , strtotime($End));
        }
       ?></td>
      
    </tr>
    
    <tr>
      <th scope="row"><strong>End Location</strong></th>
      <?php if($row['EndLat']=="")
      {?>
      <td></td>
      <?php }
      else
      { ?>
      <td><a href="http://maps.google.com/?q=<?php echo $row['EndLat'].','.$row['EndLong'];?>" target="_blank">View</a></td>
      <?php } ?>
    </tr>



    <tr>
      <th scope="row"><strong>Agent Notes</strong></th>
      <td><?php echo $row['AgentNotes'];?></td>
      
    </tr>
 


  
  </tbody>
</table>
</div>
</div>



<div class="container" style="padding: 5%;">

<h4>Saved Locations</h4>

<?php 
$saved=mysqli_query($conn,"SELECT * FROM saved_locations WHERE TaskID='$TaskID'");
while($save=mysqli_fetch_assoc($saved))
{
?>

<h5><?php $timestamp=$save['Timestamp']; echo date('h:i A', $timestamp); ?>: <a href="http://maps.google.com/?q=<?php echo $save['Latitude'].','.$save['Longitude'];?>" target="_blank">View</a><h4>

<?php }; ?>
</div>	




<div class="container" style="padding: 5%;">
<div class="row">
    <table class="table">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Product Price</th>
        <th>Total</th>
        
      </tr>
    </thead>
    <tbody>

     <?php 
     while($data=mysqli_fetch_assoc($resultered))
    {

     ?>
 
      <tr>
        <td><?php echo $data['ProductName'];?></td>
        <td><?php echo $data['Quantity'];?></td>
        <td><?php echo $data['ProductPrice'];?></td>
        <td><?php echo $data['Total'];?></td>
       

       
      
  


      </tr>
      <?php }; ?>
    </tbody>
  </table>

<h3> Grand Total: <?php echo $dat['GrandTotal'];?></h3>


</div>
  
</div>

<a href="attendance.php"><button class="btn btn-success" style="margin-left: 5%;" name="submit">back</button></a>
        </div>

        <!-- footer content -->
        
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgres->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
</html>
