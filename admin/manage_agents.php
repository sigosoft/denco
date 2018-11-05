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

$query="SELECT * FROM agent_table";
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
                <h3>Agent</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Agent List</h2>
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

                          <th>Name</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Designation</th>
                          <th>Status</th>
                          <th>Image</th>
                          <th>Task</th>
                          <th>Edit</th>
                          <th>Change Password</th>
                        </tr>
                      </thead>


                      <tbody>
    

                      <?php 
                      while ($row=mysqli_fetch_assoc($result))
                       {
                       
                       ?>  
                     
                        

                        <tr>
                       
                          <td><?php echo $row['AgentName']; ?></td>
                          <td><?php echo $row['Phone']; ?></td>
                          <td><?php echo $row['Email']; ?></td>
                          <td><?php echo $row['Designation']; ?></td>
                          <td><?php echo $row['StatusA']; ?></td>
                          <td> <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" >
            <div class="feats-items11">
            
            <?php $image=$row['Image']; 
            if(empty($image))
            { ?>
            
            <div class="col-lg-12" ><img src="../uploads/noimage.png" width="150px" height="150px" class="img-thumbnail"/></div></div></div></td>
            
           <?php  }
            else
            { ?>
            
            <div class="col-lg-12" ><img src="../uploads/Agent/<?php echo $row['Image']; ?>" width="150px" height="150px" class="img-thumbnail"/></div></div></div></td>
            
           <?php }
            
            ?>

           
                          <td><a href="agent_tasks.php?id=<?php echo $row['AgentID']; ?>">Task</a></td>
                          


                          <td><a href="edit_agents.php?id=<?php echo $row['AgentID'];?>" >Edit</a></td>
                          <td><a href="agent_password.php?id=<?php echo $row['AgentID'];?>" >Change Password</a></td>
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