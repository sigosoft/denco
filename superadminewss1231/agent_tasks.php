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

$AgentID=$_GET['id'];





$query="SELECT agent_live_task.*, clinics.* FROM agent_live_task INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE agent_live_task.AgentID='$AgentID' AND agent_live_task.Status='Completed'";
$result=mysqli_query($conn,$query);

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
                <h3>Agent Tasks</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Completed Tasks</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        
                          <th>Clinic</th>
                          <th>Task Type</th>
                          <th>CreatedDate</th>
                          <th>DueDate</th>
                          <th>StartDate</th>
                          <th>EndDate</th>
                          <th>StartTime</th>  
                          <th>EndTime</th>
                          <th>Task Details</th>
                          <th>Map</th>
                        </tr>
                      </thead>


                      <tbody>
    

                      <?php 
                      while ($row=mysqli_fetch_assoc($result))
                       {
                       
                       ?>  
                     
                        

                        <tr>
                          <td><?php echo $row['ClinicName']; ?></td>
                          <td><?php echo $row['TaskType']; ?></td>
                          
                          <td><?php 
                          $CreatedDate=$row['CreatedDate'];
                          echo date("jS F, Y", strtotime("$CreatedDate")); ?></td>
                           
                          <td><?php 
                          $DueDate=$row['DueDate'];
                          echo date("jS F, Y", strtotime("$DueDate")); ?></td> 
                          
                         
                          <td><?php 
       $StartDate=$row['StartDate'];
       echo date("jS F, Y", strtotime("$StartDate")); ?></td>
       
       <td><?php 
       $EndDate=$row['EndDate'];
       if(!empty($EndDate))
       {
       echo date("jS F, Y", strtotime("$EndDate"));
       }
        ?></td>
       
                         
                         
                          <td><?php $StartTime =  $row['StartTime'];
                          echo date('h:i a' , strtotime($StartTime));
                          ?></td>
      
                          
                          <td><?php $End =  $row['EndTime'];
        if(!empty($End))
        {
        echo date('h:i a' , strtotime($End));
        }
       ?></td>
      
                          <td><a href="task_details.php?id=<?php echo $row['AgentLiveTaskID']; ?>">View</a></td>

                          <td><a href="http://maps.google.com/?q=<?php echo $row['EndLat'].','.$row['EndLong']; ;?>" target="_blank">MAP</a> </td>

                        </tr>

                
                    <?php }; ?>
                       
                        
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


        </div>
        </div>
        </div>       

              
          
        <!-- /page content -->

        <!-- footer content -->
         <footer>
          <div class="pull-right">
            Powered By <a href="">Denco Dentals</a>
          </div>
          <div class="clearfix"></div>
        </footer>
    

 
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

  </body>
</html>