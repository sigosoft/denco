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









$task_list="SELECT agent_tasks.*, clinics.* FROM agent_tasks INNER JOIN clinics ON agent_tasks.ClinicID=clinics.ClinicID AND agent_tasks.Flag='1'";
$result_task_list=mysqli_query($conn,$task_list);



$started="SELECT agent_live_task.*, clinics.* FROM agent_live_task INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE agent_live_task.Status='Started' AND agent_live_task. StartDate ='$current_date'";
$result_started=mysqli_query($conn,$started);

$completed="SELECT agent_live_task.*, clinics.* FROM agent_live_task INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE agent_live_task.Status='Completed' AND agent_live_task. StartDate ='$current_date'";
$result_completed=mysqli_query($conn,$completed);







if(isset($_POST['submit']))
{


$type=$_POST['type'];


if($type=='Clinic')
{


$clinicIDE=$_POST['ClinicIDE'];
$Getname=mysqli_query($conn,"SELECT * FROM clinics WHERE clinicID='$clinicIDE'");
$Get_c_row=mysqli_fetch_assoc($Getname);
$c_name=$Get_c_row['DoctorName'];




$task_list="SELECT agent_tasks.*, clinics.* FROM agent_tasks INNER JOIN clinics ON agent_tasks.ClinicID=clinics.ClinicID WHERE agent_tasks.ClinicID='$clinicIDE'";
$result_task_list=mysqli_query($conn,$task_list);



$started="SELECT agent_live_task.*, clinics.* FROM agent_live_task INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE agent_live_task.Status='Started' AND agent_live_task. StartDate ='$current_date' AND agent_live_task.ClinicID='$clinicIDE'";
$result_started=mysqli_query($conn,$started);

$completed="SELECT agent_live_task.*, clinics.* FROM agent_live_task INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE agent_live_task.Status='Completed' AND agent_live_task.StartDate ='$current_date' AND agent_live_task.ClinicID='$clinicIDE'";
$result_completed=mysqli_query($conn,$completed);




}
elseif($type=='Agent')
{


$AgentIDE=$_POST['AgentIDE'];


$Getaname=mysqli_query($conn,"SELECT * FROM agent_table WHERE AgentID='$AgentIDE'");
$Get_a_row=mysqli_fetch_assoc($Getaname);
$a_name=$Get_a_row['AgentName'];


$task_list="SELECT agent_tasks.*, clinics.* FROM agent_tasks INNER JOIN clinics ON agent_tasks.ClinicID=clinics.ClinicID WHERE agent_tasks.AgentID='$AgentIDE'";
$result_task_list=mysqli_query($conn,$task_list);

$started="SELECT agent_live_task.*, clinics.* FROM agent_live_task INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE agent_live_task.Status='Started' AND agent_live_task.StartDate='$current_date' AND agent_live_task.AgentID='$AgentIDE'";
$result_started=mysqli_query($conn,$started);

$completed="SELECT agent_live_task.*, clinics.* FROM agent_live_task INNER JOIN clinics ON agent_live_task.ClinicID=clinics.ClinicID WHERE agent_live_task.Status='Completed' AND agent_live_task.StartDate='$current_date' AND agent_live_task.AgentID='$AgentIDE'";
$result_completed=mysqli_query($conn,$completed);




}




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

                  <div class="radio">

                    <?php if($type=='Clinic')
                    { ?>
                    
                    <label><input type="radio" name="type" value="Clinic" checked style="margin-top: 1px ;">Clinic</label>

                    <?php }
                    else
                    { ?>

                    <label><input type="radio" name="type" value="Clinic" style="margin-top: 1px ;">Clinic</label>

                    <?php }
                    ?>


                      <select name="ClinicIDE">
                         <?php if($type=='Clinic')
                        { ?>
                        <option value="<?php echo $clinicIDE ?>"><?php echo $c_name; ?></option>
                        <?php };

                        $Sclinic=mysqli_query($conn,"SELECT * FROM clinics");


                                       while($SclinicR=mysqli_fetch_assoc($Sclinic))
                                        { ?>

                                        <option value="<?php echo $SclinicR['ClinicID']; ?>"><?php echo $SclinicR['DoctorName']; ?></option>

                                        <?php } ?>
                                        </select>
                   </div>
                   <div class="radio" style="margin-left: 4%; margin-top: 10px;" >

                     <?php if($type=='Agent')
                    { ?>
                    
                      <label><input style="margin-top: 1px;" type="radio" name="type" checked value="Agent">Agent</label>

                    <?php }

                    else
                    { ?>

                      <label><input style="margin-top: 1px;" type="radio" name="type" value="Agent">Agent</label>

                    <?php }
                    ?>
                     
                        <select name="AgentIDE">

                            <?php if($type=='Agent')
                        { ?>
                        <option value="<?php echo $AgentIDE ?>"><?php echo $a_name; ?></option>
                        <?php };

                        $SAgents=mysqli_query($conn,"SELECT * FROM agent_table");
                                       while($SAgentsR=mysqli_fetch_assoc($SAgents))
                                        { ?>

                                        <option value="<?php echo $SAgentsR['AgentID']; ?>"><?php echo $SAgentsR['AgentName']; ?></option>

                                        <?php } ?>
                                        </select>
                   </div>

                      <button class="btn btn-success" style="margin-left: 5%;" name="submit">Submit</button>

                 </div>
                   
<?php }
else
{ ?>

    <div class="radio">
                      <label><input type="radio" name="type" value="Clinic" checked style="margin-top: 1px ;">Clinic</label>
                      <select name="ClinicIDE">

                        <?php
                        $Sclinic=mysqli_query($conn,"SELECT * FROM clinics");
                                       while($SclinicR=mysqli_fetch_assoc($Sclinic))
                                        { ?>

                                        <option value="<?php echo $SclinicR['ClinicID']; ?>"><?php echo $SclinicR['DoctorName']; ?></option>

                                        <?php } ?>
                                        </select>
                   </div>
                   <div class="radio" style="margin-left: 4%; margin-top: 10px;" >
                       <label><input style="margin-top: 1px;" type="radio" name="type" value="Agent">Agent</label>
                        <select name="AgentIDE">

                        <?php
                        $SAgents=mysqli_query($conn,"SELECT * FROM agent_table");
                                       while($SAgentsR=mysqli_fetch_assoc($SAgents))
                                        { ?>

                                        <option value="<?php echo $SAgentsR['AgentID']; ?>"><?php echo $SAgentsR['AgentName']; ?></option>

                                        <?php } ?>
                                        </select>
                   </div>

                      <button class="btn btn-success" style="margin-left: 5%;" name="submit">Submit</button>

                 </div>

<?php } ?>

               </div>

               </form>
             </div>




            

                <div class="row">

                 
                        <div class="col-md-4 colum">
                                <h4>Pending Task</h4>





                  <?php while($row_tem=mysqli_fetch_assoc($result_task_list))
                  {?>
                         <div class="boxx"> 
                          
                              <div class="discription">
                                <h6><?php echo $row_tem['DoctorName']; ?></h6><br>
                                <p><?php echo $row_tem['AdminNotes']; ?></p>
                            </div>
                                <div class="foot">
                                   <ul>
                                       <li class="pull-left"><?php $ATaskStartDate=$row_tem['TaskStartDate'];
       echo date("jS F, Y", strtotime("$ATaskStartDate")); ?>
</li>
                                                                              <?php

                                       $AgentIDT=$row_tem['AgentID'];

                                       $Agent_namet=mysqli_query($conn,"SELECT * FROM agent_table WHERE AgentID='$AgentIDT'");
                                       $agent_rowt=mysqli_fetch_assoc($Agent_namet);


                                       ?>
                                        <li class="pull-right"><?php echo $agent_rowt['AgentName']; ?></li></br></br>
                                     
                                   <li class="pull-left">Task Type: <?php echo $row_tem['TaskType']; ?></li>
                                   <li class="pull-right">Priority: <?php echo $row_tem['Priority']; ?></li></br></br>
                                   
                                   
                                   
                                   </ul>
                                   
                                 

                                 </div>   
                         
                                    
                           </div> 
                        <?php }; ?>             


           

                         </div> 

                       
                    
                          
                         
                            <div class="col-md-4 colum">
                             <h4>Started Task</h4>

                  <?php while($row_start=mysqli_fetch_assoc($result_started))
                  {?>
                             <a href="task_details.php?id=<?php echo $row_start['AgentLiveTaskID']; ?>">  <div class="boxx"> 
                            <div class="discription">
                                <h6><?php echo $row_start['DoctorName']; ?></h6><br>
                                <p><?php echo $row_start['AdminNotes']; ?></p>
                            </div>
                            <div class="foot">
                                   <ul>
                                       <li class="pull-left"><?php $STaskStartDate=$row_start['StartDate'];
       echo date("jS F, Y", strtotime("$STaskStartDate")); ?></li>
                                         <?php

                                       $AgentIDS=$row_start['AgentID'];

                                       $Agent_names=mysqli_query($conn,"SELECT * FROM agent_table WHERE AgentID='$AgentIDS'");
                                       $agent_rows=mysqli_fetch_assoc($Agent_names);


                                       ?>
                                        <li class="pull-right"><?php echo $agent_rows['AgentName']; ?></li></br></br>
                                        <li class="pull-left">Start Time: <?php $Start =  $row_start['StartTime'];
      echo date('h:i a' , strtotime($Start)); ?></li><br><br>

                                   </ul>

                                 </div>   
                           </div> </a>

                           <?php }; ?> 

                         </div>  


                         <div class="col-md-4 colum">
                             <h4>Completed Task</h4>

                              <?php while($row_com=mysqli_fetch_assoc($result_completed))
                              {?>

                              <a href="task_details.php?id=<?php echo $row_com['AgentLiveTaskID']; ?>"> <div class="boxx"> 
                            <div class="discription">
                                <h6><?php echo $row_com['DoctorName']; ?></h6><br>
                                <p><?php echo $row_com['AdminNotes']; ?></p>
                            </div>
                            <div class="foot">
                                   <ul>
                                       <li class="pull-left"><?php $CTaskEndDate=$row_com['EndDate'];
       echo date("jS F, Y", strtotime("$CTaskEndDate")); ?></li>
                                        <?php

                                       $AgentIDC=$row_com['AgentID'];

                                       $Agent_namec=mysqli_query($conn,"SELECT * FROM agent_table WHERE AgentID='$AgentIDC'");
                                       $agent_rowc=mysqli_fetch_assoc($Agent_namec);


                                       ?>
                                        <li class="pull-right"><?php echo $agent_rowc['AgentName']; ?></li><br><br>
                                        
                                        
                                        
                                        <li class="pull-left">End Time: <?php $End =  $row_com['EndTime'];
                                        echo date('h:i a' , strtotime($End));
                                        ?></li><br><br>
                                     

                                   </ul>

                                 </div>   
                           </div> </a>

                            <?php }; ?>  

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
