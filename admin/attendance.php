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


$from=date('Y-m-d');
$to=date('Y-m-d');





$task_list="SELECT agent_tasks.*, clinics.* FROM agent_tasks INNER JOIN clinics ON agent_tasks.ClinicID=clinics.ClinicID AND agent_tasks.Flag='1' AND TaskStartDate > $current_date AND agent_tasks.TaskType='Temporary' order by TaskID desc ORDER BY agent_tasks.TaskID desc";
$result_task_list=mysqli_query($conn,$task_list);


$started="SELECT agent_live_task.*, clinics.*,agent_table.* FROM agent_live_task INNER JOIN agent_table ON agent_table.AgentID=agent_live_task.AgentID INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE agent_live_task.Status='Started' AND agent_live_task.StartDate='$current_date' order by AgentLiveTaskID desc";
$result_started=mysqli_query($conn,$started);

$completed="SELECT agent_live_task.*, clinics.* FROM agent_live_task INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE agent_live_task.Status='Completed' AND agent_live_task.EndDate='$current_date' order by AgentLiveTaskID desc";
$result_completed=mysqli_query($conn,$completed);







if(isset($_POST['submit']))
{







$AgentIDE=$_POST['AgentIDE'];
$from=$_POST['from'];
$to=$_POST['to'];


$Getaname=mysqli_query($conn,"SELECT * FROM agent_table WHERE AgentID='$AgentIDE'");
$Get_a_row=mysqli_fetch_assoc($Getaname);
$a_name=$Get_a_row['AgentName'];


$task_list="SELECT agent_tasks.*, clinics.* FROM agent_tasks  INNER JOIN clinics ON agent_tasks.ClinicID=clinics.ClinicID AND agent_tasks.Flag='1' AND agent_tasks.TaskStartDate >= '$from' AND agent_tasks.TaskStartDate <= '$to' AND agent_tasks.AgentID='$AgentIDE' AND agent_tasks.TaskType='Temporary' ORDER BY agent_tasks.TaskID desc";
$result_task_list=mysqli_query($conn,$task_list);




$started="SELECT agent_live_task.*, clinics.*,agent_table.* FROM agent_live_task INNER JOIN agent_table ON agent_table.AgentID=agent_live_task.AgentID INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE (agent_live_task.Status='Started' OR agent_live_task.Status='Completed') AND agent_live_task.AgentID='$AgentIDE' AND agent_live_task.StartDate >= '$from' AND agent_live_task.StartDate <= '$to' ORDER BY agent_live_task.AgentLiveTaskID desc";
$result_started=mysqli_query($conn,$started);

$completed="SELECT agent_live_task.*, clinics.* FROM agent_live_task INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE agent_live_task.Status='Completed' AND agent_live_task.AgentID='$AgentIDE' AND agent_live_task.EndDate >= '$from' AND agent_live_task.EndDate <= '$to' ORDER BY agent_live_task.AgentLiveTaskID desc";

$result_completed=mysqli_query($conn,$completed);





$current_location="SELECT * FROM current_location WHERE AgentID='$AgentIDE' ORDER BY SavedID DESC  LIMIT 1";
$current=mysqli_query($conn,$current_location);


};




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
    <link href="build/css/style1.css" rel="stylesheet">
  </head>

  <body class="nav-md">


  <?php require 'partials/sidebar.php'; ?>

        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">


<div class="container">

  <form method="POST">
             <div class="row">
               <div class="col-md-8 search-field" style="display: inline-flex;padding: 2%;">


<?php if(isset($_POST['submit']))
{ ?>

                  
                   

                    <label>From</label>&nbsp;&nbsp;
                       <input type="date" name="from">
                       <div class="clearfix"></div>
                       
                       <label>To</label>&nbsp;&nbsp;
                       <input type="date" name="to">
                       <div class="clearfix"></div>
                       
                       <label>Agent</label>&nbsp;&nbsp;
                        <select name="AgentIDE">

                        <?php
                        $SAgents=mysqli_query($conn,"SELECT * FROM agent_table");
                                       while($SAgentsR=mysqli_fetch_assoc($SAgents))
                                        { ?>

                                        <option value="<?php echo $SAgentsR['AgentID']; ?>"><?php echo $SAgentsR['AgentName']; ?></option>

                                        <?php } ?>
                                        </select>
                   

                      <button class="btn btn-success" style="margin-left: 5%;" name="submit">Submit</button>

                 </div>
                   
<?php }
else
{ ?>
                    
                    
    
                   
                       <label>From</label>&nbsp;&nbsp;
                       <input type="date" name="from">
                       <div class="clearfix"></div>
                       
                       <label>To</label>&nbsp;&nbsp;
                       <input type="date" name="to">
                       <div class="clearfix"></div>
                       
                       <label>Agent</label>&nbsp;&nbsp;
                        <select name="AgentIDE">

                        <?php
                        $SAgents=mysqli_query($conn,"SELECT * FROM agent_table");
                                       while($SAgentsR=mysqli_fetch_assoc($SAgents))
                                        { ?>

                                        <option value="<?php echo $SAgentsR['AgentID']; ?>"><?php echo $SAgentsR['AgentName']; ?></option>

                                        <?php } ?>
                                        </select>
                   

                      <button class="btn btn-success" style="margin-left: 5%;" name="submit">Submit</button>

                 </div>

<?php } ?>

               </div>

               </form>
             </div>




            

                <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <?php 
                      echo $a_name."  (   " . $from ."   -   ". $to.")";
                       ?> 
                       
                       <br><br>
                       <?php 
                      while ($row1=mysqli_fetch_assoc($current))
                       {
                       
                       ?>  
                       Current Location : <a href="http://maps.google.com/?q=<?php echo $row1['StartLat'].','.$row1['StartLong'];?>" target="_blank">View</a>
                       <?php } ?>
                       <br><br>
                       
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Agent Name</th>
                          <th>Clinic Name</th>
                          
                          
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Start Location</th>
                          <th>End Location</th>
                          <th>Status</th>
                        </tr>
                      </thead>


                      <tbody>
    

                      <?php 
                      while ($row=mysqli_fetch_assoc($result_started))
                       {
                       
                       ?>  
                     
                        <tr>
                            
                          <td> <?php echo $row['AgentName']; ?></td>
                          <td>
                             
                              
                              <?php echo $row['ClinicName']; ?></td>
                          
                          
                          <td><?php echo $row['StartDate']; ?></td>
                           <td><?php echo $row['EndDate']; ?></td>
                           <td><?php echo $row['StartTime']; ?></td>
                           <td><?php echo $row['EndTime']; ?></td>
                           <td><a href="http://maps.google.com/?q=<?php echo $row['StartLat'].','.$row['StartLong'];?>" target="_blank">View</a></td>
                          <?php if($row['EndLat']=="")
                          {?>
                          <td></td>
                          <?php }
                          else
                          { ?>
                          <td><a href="http://maps.google.com/?q=<?php echo $row['EndLat'].','.$row['EndLong'];?>" target="_blank">View</a></td>
                          <?php } ?>
                           <td><?php echo $row['Status']; ?></td>
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


        <!-- footer content -->
        <footer class="clearfix">
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
